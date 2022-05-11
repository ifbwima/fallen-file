<?php
//recuperation des variable pour la connexion
if (isset($_POST["pseudo"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])){
    $pseudo=$_POST["pseudo"];
    $mdp=$_POST["mdp"];
    $mdp2=$_POST["mdp2"];

    if($mdp == $mdp2)
    {
        $tmp = addutilisateur($pseudo, $mdp);
        if($tmp != true){
            $message = "Echec de la création du profil... Essayez un autre pseudo";
            include_once './vue/entete.php';
            include_once './vue/inscription.php';
            include_once './vue/pied.php';
        }
        else{
            include_once './vue/entete.php';
            include_once './vue/connexion.php';
            include_once './vue/pied.php';
        }
    }
    else{
        $message = "les mots de passe ne correspondent pas...";
        include_once './vue/entete.php';
        include_once './vue/inscription.php';
        include_once './vue/pied.php';
    }
}
else{
    $message = "Champs manquants";
    include_once './vue/entete.php';
    include_once './vue/inscription.php';
    include_once './vue/pied.php';
}