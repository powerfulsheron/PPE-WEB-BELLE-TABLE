<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SIOSLAM2017">

    <title>BelleTable - Elegance a la Francaise</title>

    <link href="css/cssbelletable.css" rel="stylesheet">

</head>

<body>
	<br/>
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
				else{
					echo'
					<a href="connexion.php">Connexion</a>';
				}
				?>
		</ul>
	</div>
	<br/>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<h1 align="center">Mentions Légales</h1>
				<p align="justify">
					Le site belletable.fr est édité par la société BelleTable, SARL au capital de 7 622,45 €, dont le siège social est 20 rue de la gare, 75100 PARIS, immatriculée au Registre du Commerce et des sociétés de Versailles sous le numéro 732 829 320 00074.<br/><br/>
					Le site web est hébergé par Campus Montsouris, 2 rue Lacaze 75014 PARIS.<br/><br/>
					Le site internet belletable.fr a fait l'objet d'une déclaration à la CNIL sous le numéro suivant : XXXXXXX<br/><br/>
					Les informations vous concernant sont destinées uniquement à la société BelleTable. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi "Informatique et Libertés"). Pour l'exercer, adressez vous à BelleTable, 20 rue de la gare, 75100 Paris ou à contact.belletable@gmail.com
				</p>
			</div>
		</div>
	</div>
	
	<div class="divfooter">
        <hr>
        <footer>
			<ul class="footer">
			<li class="lifooter"><a href="mentionlegale.php">Mentions Légales</a></li>
			<li class="lifooter">Copyright &copy; BelleTable 2017</li>
			<li class="lifooter"><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a></li>
			</ul>
        </footer>
    </div>

	</div>

</body>

</html>
