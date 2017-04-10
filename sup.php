<?php
include('parametres.php');
date_default_timezone_set('Europe/Paris');

$hour = date('H');
$minute = date('i');
$second = date('s');
$month = date('m');
$day = date('d');
$year = date('Y');

$datediff = date("Y-m-d H:i:s", mktime($hour,$minute,$second,$month-3,$day,$year));

echo $datediff;

$bdd->exec('DELETE FROM `t_connexion` WHERE `t_connexion`.dateheuredebut <= "'.$datediff.'"');

header('Location:gestionconnexion.php');

