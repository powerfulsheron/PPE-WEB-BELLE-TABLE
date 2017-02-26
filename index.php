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
     <link href="css/carousel.css" rel="stylesheet">

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
	<div>
	<div id="tableaccueil" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#tableaccueil" data-slide-to="0" class="active"></li>
			<li data-target="#tableaccueil" data-slide-to="1"></li>
			<li data-target="#tableaccueil" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img class="slide-image" src="img/accueil/tablebleu.jpg" alt="">
			</div>
			<div class="item">
				<img class="slide-image" src="img/accueil/tableor.jpg" alt="">
			</div>
			<div class="item">
				<img class="slide-image" src="img/accueil/tableblanche.jpg" alt="">
			</div>
		</div>
		<a class="left carousel-control" href="#tableaccueil" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#tableaccueil" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
	</div>
    <div class="container">
		<?php
			//echo $_SESSION['login'];
		?>
    </div>
		<div class="container">
		<br/><br/>
			<hr>

			<footer>
				<div class="row">
					<div class="encadrefooter">
						<p>Copyright &copy; BelleTable 2017</p>
					</div>
				</div>
			</footer>

		</div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
