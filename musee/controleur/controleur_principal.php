<?php
function controleur_principal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["fil"] = "fil.php";
    $lesActions["collection"] = "collection.php";
    $lesActions["oeuvre"] = "oeuvre.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["ajout"] = "ajout.php";
    $lesActions["supprimer"] = "supprimer.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    }
    else {
        return $lesActions["defaut"];
    }
}
?>