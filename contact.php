<?php
session_start();
include('fonction.php');
if(isset($_SESSION['login'])){
	$menuchange = true;
}
if(isset($_POST['email'])){
	$nom=$_POST['nom'];
    $email=$_POST['email'];
	$numero=$_POST['numero'];
    $message=$_POST['message'];
    if (($nom=="")||($email=="")||($message=="")){
	}
	$verif = Contact($email,$numero,$message,$nom);
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
				<div class="formulairenevoi">
					<h1>Contactez-Nous</h1>
					<p>Pour nous contacter veuillez remplir ce formulaire.</p><br/>
					<form  action="contact.php" id="myform" method="POST" enctype="multipart/form-data">
						<p>Votre Nom et Prénom :</p>
						<input name="nom" type="text" value="" size="30"/><br><br>
						<p>Votre Email :</p>
						<input name="email" type="text" value="" size="30"/><br><br>
						<p>Votre Numéro de téléphone :</p>
						<input name="numero" type="text" value="" size="30"/><br><br>
						<p>Votre Message :</p>
						<textarea name="message" rows="7" cols="35"></textarea><br><br>
						<input type="submit" id="envoimail" value="Envoyer" onclick="document.forms[\'form\'].submit();"/>
					</form>
					<br><br>
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
