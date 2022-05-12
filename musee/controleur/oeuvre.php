<?php
include_once './modele/oeuvre.php';

if(isset($_GET['id_oeuvre']))
{
    $oeuvre = dao_oeuvre::getoeuvrebyid($_GET['id_oeuvre']);

    $num_results = 1;
    $delta = 24;
    $reduce_brightness = 1;
    $reduce_gradients = 1;

    include_once("./modele/colors.inc.php");
    $ex=new GetMostCommonColors();
    $colors=$ex->Get_Color("./image/".$oeuvre->getChemin(), $num_results, $reduce_brightness, $reduce_gradients, $delta);

    include './vue/entete.php';
    include './vue/oeuvre.php';
    include './vue/pied.php';
}
else{
    include 'accueil.php';
}