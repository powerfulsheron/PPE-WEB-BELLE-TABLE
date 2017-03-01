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
    <meta name="author" content="">

    <title>BelleTable - A propos</title>

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
				<div class="apropos">
					<p>Véritable partenaire des organisateurs d’évènements depuis 2010, BelleTable propose à la location de multiples références de matériel pour réceptions à Paris et en Ile de France.</p>
					<br>
					<p>Location de vaisselle, chaises, tables, mobilier événementiel, nappes, barnums, matériel traiteur.</p>
					<br>
					<p>Nous vous proposons en location une gamme complète et tendance de matériel pour tous vos événements : Buffets, conférences, cocktails, mariages, salons, réunions, espaces éphémères, galas, défilés de mode…</p>
					<br>
					<p>Les Inspirations, toujours tendances, ont été créés pour s’inscrire dans des gammes cohérentes, actuelles et fonctionnelles. Elles permettent ainsi la création et l’installation rapide d’espaces de restauration de luxe et de convivialité.</p>
					<br>
					<p>Belletable accompagne ses clients : conseils créatifs avisés, commerciaux terrain et logisticiens sur site, sont associés à votre succès.</p>
					<br>
					<p>Des plus classiques aux plus innovants, tous vos évènements peuvent être imaginés avec Belletable, avec du matériel de luxe parfaitement entretenu.</p>
					<br>
					<p>Belletable propose aujourd'hui un service complet avec la location, incluant la livraison, la mise en place des tables, l’installation des divers matériels, le service à table ainsi que le lavage de la vaisselle et du linge.</p>
					<br>

					<p>Chez Belletable, nous mettons tout en oeuvre pour la réussite de votre événement dans les règles du Luxe à la Francaise.</p>
				</div>			
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

</body>
</html>
