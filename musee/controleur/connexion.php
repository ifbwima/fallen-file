<?php
//recuperation des variable pour la connexion
if (isset($_POST["pseudo"]) && isset($_POST["mdp"])){
    $pseudo=$_POST["pseudo"];
    $mdp=$_POST["mdp"];

    if(login($pseudo, $mdp)){
        $con = true;
    }
    else{
        $con = false;
    }

}

//appel des fichiers de la vue
if(isLoggedOn()){
    if(isset($_GET['deco'])){logout();}
    include './controleur/accueil.php';
}
else{
    include './vue/entete.php';
    include './vue/connexion.php';
    include './vue/pied.php';
}
