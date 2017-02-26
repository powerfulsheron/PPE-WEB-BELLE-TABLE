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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
				
				<h1 align="center">Nos Inspirations</h1><br/>
				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=1" ><img src="img/thèmes/theme1view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=1">Ambiance Taupe</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=2" ><img src="img/thèmes/theme2view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=2">Azul Opale</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=3" ><img src="img/thèmes/theme3view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=3">Baroque</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=4" ><img src="img/thèmes/theme4view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=4">Dorure d'Automne</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=5" ><img src="img/thèmes/theme5view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=5">Reflet Doré</a></h4>                         
						</div> 
					</div>
				</div>	
				
				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=6" ><img src="img/thèmes/theme6view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=6">Table Nature</a></h4>                         
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>