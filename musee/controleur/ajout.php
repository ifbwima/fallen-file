<?php
include_once './modele/oeuvre.php';
include_once './modele/collection.php';

if(isLoggedOn() && $_SESSION["id"] == 1){
    if (isset($_POST["nom"]) && isset($_POST["date"]) && isset($_POST["description"]) && isset($_FILES['file']['name']) && isset($_POST["collection"])){
        $nom=$_POST["nom"];
        $date=$_POST["date"];
        $description=$_POST["description"];
        $collection=$_POST["collection"];

        $fileExt = explode('.',$_FILES['file']['name']);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('png','jpeg','jpg');

            if(in_array($fileActualExt, $allowed)){
                if($_FILES['file']['error'] === 0){

                    $image_final= count_files('./image/').".".$fileActualExt;

                    $fileDirectory = 'image/'.$image_final;

                    move_uploaded_file($_FILES['file']['tmp_name'],$fileDirectory);

                    $tmp = dao_oeuvre::addoeuvre($nom, $date, $description, $image_final, $collection);

                    $oeuvre = new oeuvre(0, $nom, $date, $description, $collection, $image_final);

                    if($tmp != true){
                        $message = "Echec de la création de l'oeuvre... Reessaye mon gars (si t'arrives pas dis moi)";
                        include_once './vue/entete.php';
                        include_once './vue/ajout.php';
                        include_once './vue/pied.php';
                    }
                    else{
                        include_once './vue/entete.php';
                        include_once './vue/oeuvre.php';
                        include_once './vue/pied.php';
                    }

                } else {
                    $message = "t'as un probleme avec le fichier...";
                    include_once './vue/entete.php';
                    include_once './vue/ajout.php';
                    include_once './vue/pied.php';
                }

            } else {
                $message = "extension du fichier non pris en charge";
                include_once './vue/entete.php';
                include_once './vue/ajout.php';
                include_once './vue/pied.php';
            }
    }
    elseif(isset($_POST["nom_collection"]) && isset($_POST["description_collection"])){
        $nom=$_POST["nom_collection"];
        $description=$_POST["description_collection"];

        $tmp = dao_collections::addcollection($nom, $description);

        if($tmp != true){
            $message = "Echec de la création de la collection... Reessaye mon gars (si t'arrives pas dis moi)";
            include_once './vue/entete.php';
            include_once './vue/ajout.php';
            include_once './vue/pied.php';
        }
        else{
            include 'collection.php';
        }
    }
    else{
        $collections = dao_collections::getallcollection();
        //ajoutez les collection en list dans la vue ajout et modifier le controleur et la fonction insert

        $message = "Merci de remplir tous les champs";
        include_once './vue/entete.php';
        include_once './vue/ajout.php';
        include_once './vue/pied.php';
    }
}
else{
    include './index.php';
}