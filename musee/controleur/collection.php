<?php
include_once './modele/collection.php';
include_once './modele/oeuvre.php';

if(isset($_GET["id_collection"]))
{
    $tab_oeuvre = dao_oeuvre::getoeuvrebyidcollection($_GET["id_collection"]);

    $collection = dao_collections::getcollectionbyid($_GET["id_collection"]);

    $nom_col = $collection->getNom();
}
else
{
    $tab_collection = dao_collections::getcollection();
}


include_once './vue/entete.php';
include_once './vue/collection.php';
include_once './vue/pied.php';