<?php
include_once 'utilisateur.php';

function connexionPDO() {
    $login = "root";
    $mdp = "root";
    $bd = "musée";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

//test si l'utilisateur est connecter
function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;
    if (isset($_SESSION["pseudo"])) {
        $ret = true;
    }
    return $ret;
}

//fonction de connexion
function login($pseudo, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $util = dao_utilisateur::getutilisateurbypseudo($pseudo);

    if ($util->getmdp() == $mdp) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["id"] = $util->getid();
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["mdp"] = $mdp;

        return true;
    }
    else{
        return false;
    }
}

//deconnexion
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["id"]);
    unset($_SESSION["pseudo"]);
    unset($_SESSION["mdp"]);
}

function addutilisateur($pseudo, $mdp)
{
    try {
        $util = dao_utilisateur::getutilisateurbypseudo($pseudo);
        if(isset($util))
        {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into utilisateur (pseudo, mdp) values (:pseudo, :mdp);");
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $req->execute();
    
            return true;
        }
        else{
            return false;
        }
    } catch (PDOException $e) {
    }
}