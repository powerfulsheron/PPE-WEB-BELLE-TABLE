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

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="description" content="">
    <meta name="author" content="SIOSLAM2017">

    <title>BelleTable - Elegance a la Francaise</title>

    <link href="css/cssbelletable.css" rel="stylesheet">
	<link href="css/carrouselcss.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/carrouselbis.js" type="text/javascript"></script>
	<script src="js/carrousel.js" type="text/javascript"></script>

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
				<a href="#">A Propos</a>
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
	
	<!--Carrousel -->
	<div id="wrapper">
		<div id="carousel">
			<img src="img/accueil/tablebleu.jpg" alt="tablebleu" width="990" height="450" />
			<img src="img/accueil/tableor.jpg" alt="tableor" width="990" height="450" />
			<img src="img/accueil/tableblanche.jpg" alt="tableblanche" width="990" height="450" />
			<img src="img/themes/theme1.jpg" alt="tablebleu" width="990" height="450" />
			<img src="img/themes/theme5.jpg" alt="tableor" width="990" height="450" />
			<img src="img/themes/theme2.jpg" alt="tableblanche" width="990" height="450" />
		</div>
		<a href="#" id="prev" title="Show previous"> </a>
		<a href="#" id="next" title="Show next"> </a>
		<div id="pager"></div>
	</div>
	
	<div class="container">
	<br/>
		<hr>
		<footer>
			<div class="row">
				<div class="encadrefooter">
					<p>Copyright &copy; BelleTable 2017</p>
				</div>
			</div>
		</footer>

	</div>

</body>

</html>
