<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}	
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BelleTable - Elegance a la Francaise</title>

    <link href="css/cssbelletable.css" rel="stylesheet">

    <link href="css/shop-homepage.css" rel="stylesheet">

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
<div class="contenupage">
    <div class="container">

        <div class="row">
            <div class="lienproduits">
				
				<h1 align="center">Nos Produits</h1><br/>
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/assiettes/assiettes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=1">Assiettes et Tasses</a></h4>                         
						</div>               
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/couverts/couverts.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=2">Couverts</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/verres/verres.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=3">Verres</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/nappes/nappes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=4">Nappes et Serviettes</a></h4>
						</div>
					</div>
				</div>
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/mobilier/mobiliers.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=5">Mobilier</a></h4>
						</div>
					</div>
				</div> 				
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/accessoires/accessoires.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=6">Accessoires</a></h4>
						</div>
					</div>
				</div> 
				
			</div>
		</div>
		
    </div>
</div>
    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="encadrefooter">
                    <p>Copyright &copy; BelleTable 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

</body>

</html>
