<?php
include_once './modele/collection.php';
include_once './modele/oeuvre.php';

if(isLoggedOn() && $_SESSION["id"] == 1) {
    if (isset($_GET["id_oeuvre"]) && isset($_GET["id_collection"])) {
        if(dao_oeuvre::deleteoeuvre($_GET["id_oeuvre"])){

            $tab_oeuvre = dao_oeuvre::getoeuvrebyidcollection($_GET["id_collection"]);

            $collection = dao_collections::getcollectionbyid($_GET["id_collection"]);

            $nom_col = $collection->getNom();
        }
        else{
            print("
                <div class=\"form-group\">
                   <h6 class=\"card-subtitle mb-2 text-danger\">l'oeuvre n'a pas été supprimée.\"</h6>
                </div>\")
            ");
        }

    } elseif (isset($_GET["id_collection"])) {
        $tab_collection = dao_collections::getcollection();
    }

    include_once './vue/entete.php';
    include_once './vue/collection.php';
    include_once './vue/pied.php';

}