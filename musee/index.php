<?php
include_once 'modele/connexion.php';
include_once "controleur/controleur_principal.php";


//trouve un moyen de blur le background du bdy dans l'entete


if (isset($_GET["action"]))
{
    $action = $_GET["action"];
}
else
{
    $action = "defaut";
}

function count_files($folder)
{
     // on rajoute le / à la fin du nom du dossier s'il ne l'est pas
     if(substr($folder, -1) != '/')
        $folder .= '/';

     // ouverture du répertoire
     $rep = @opendir($folder);
     if(!$rep)
        return -1;
        
     $nb_files = 0;
     // tant qu'il y a des fichiers
     while($file = readdir($rep))
     {
        // répertoires . et ..
        if($file == '.' || $file == '..')
        {continue;}

        $nb_files++;
     }
     
     // fermeture du rep
     closedir($rep);
     return $nb_files;
} 

$fichier = controleur_principal($action);
include_once "controleur/$fichier";