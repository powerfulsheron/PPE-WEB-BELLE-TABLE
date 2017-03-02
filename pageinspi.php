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
            <div class="lienproduits">
				
				<h1 align="center">Nos Inspirations</h1><br/>
				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=1" ><img src="img/themes/theme1view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=1">Ambiance Taupe</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=2" ><img src="img/themes/theme2view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=2">Azul Opale</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=3" ><img src="img/themes/theme3view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=3">Baroque</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=4" ><img src="img/themes/theme4view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=4">Dorure d'Automne</a></h4>                         
						</div> 
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=5" ><img src="img/themes/theme5view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=5">Reflet Doré</a></h4>                         
						</div> 
					</div>
				</div>	
				
				<div class="encadreproduit">
					<div class="encadre">
						<a href="pageinspirationchoix.php?inspi=6" ><img src="img/themes/theme6view.jpg" alt=""></a>
						<div class="caption">
							<h4><a href="pageinspirationchoix.php?inspi=6">Table Nature</a></h4>                         
						</div> 
					</div>
				</div>	
			</div>
		</div>
		
    </div>

    <div class="divfooter">
        <hr>
        <footer>
        	<div class="socialnet">
        	<a href="http://twitter.com/share" target="_blank" class="twitter-share-button" data-count="vertical" data-via="Belle_TableSIO"><img src="twitter.png" height="5%" width="5%"></a>
		<a name="fb_share" type="box_count" href="https://www.facebook.com/Belle-Table-1113642382077898/" target="_blank"><img src ="fb.jpg" height="6%" width="6%"></a>
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
		</div>
			<ul class="footer">
			<li class="lifooter"><a href="mentionlegale.php">Mentions Légales</a></li>
			<li class="lifooter">Copyright &copy; BelleTable 2017</li>
			<li class="lifooter"><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a></li>
			</ul>
        </footer>
    </div>


	
</body>

</html>
