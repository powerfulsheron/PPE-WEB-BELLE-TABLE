<?php
// si l'utilisateur est loggé, on reprend la session.
if (!isset($_SESSION['login']))
{
    session_start();
}
// si l'utilisateur est loggé et qu'il n'est pas admin, on met menuchange à true pour afficher le menu utilisateur.
if(isset($_SESSION['login']) && $_SESSION['login'] != 'admin'){
	$menuchange = true;	
}
// sinon si l'utilisateur est loggé et qu'il est admin, on met menuchange à true pour afficher le menu administrateur.
else if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
{
	$menuadmin = true;
}