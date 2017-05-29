<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SIOSLAM2017">

    <title>BelleTable - French Elegance</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <link href="css/cssbelletable.css" rel="stylesheet">
    <link href="css/carrouselcss.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/carrouselbis.js" type="text/javascript"></script>
	<script src="js/carrousel.js" type="text/javascript"></script>
    
    <script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	
	
    
</head>

<div id="menuprincipal" align="center">
		<ul class="barremenu">
			<li>
				<a href="index.php"><img src="img/logo.png" alt="" width="150px"></a>	
			<li>
				<a href="pageproduits.php">Nos Produits</a>
			<li>
				<a href="pageinspi.php">Nos Inspirations</a>
			<li>
				<a href="apropos.php">A Propos</a>
			<li>
				<a href="contact.php">Contact</a>
			<li>
				<?php
				if(isset($menuchange)){
					echo'
					<a href="commandeencours.php">Mon Compte</a>
                    <li>
					<a href="lepanier.php">Mon Panier</a>';
				}
				else if(isset($menuadmin)){
					echo'
					<a href="admin.php">Tableau de bord</a>
                    <li>
					<a href="deconnexion.php">Se deconnecter</a>';
				}
				else{
					echo'
					<a href="connexion.php">Connexion</a>';
				}
                
				?>
		</ul>
	</div>
    <br/>