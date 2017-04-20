<?php
session_start();
date_default_timezone_set('Europe/Paris');
include('sessionlogin.php');

include('parametres.php');

if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$datefin = date('Y-m-d H:i:s');
		$bdd->exec('UPDATE t_connexion SET dateheurefin = "'.$datefin.'" WHERE numclient = '.$_SESSION['login'].' AND dateheuredebut = "'.$_SESSION['datedebut'].'"');
		$_SESSION['login'] = "";
		session_destroy();
	}	
}
echo'
	<script type="text/javascript">
		location.href = \'index.php\';
	</script>';
?>