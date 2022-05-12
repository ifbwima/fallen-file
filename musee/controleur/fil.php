<?php
include_once './modele/oeuvre.php';

$tab_oeuvre = dao_oeuvre::getoeuvre();

include './vue/entete.php';
include './vue/fil.php';
include './vue/pied.php';