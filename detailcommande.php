<?php
session_start();
include('fonction.php');

if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');
	
if(isset($_REQUEST['idcommande'])){
	$numcommande = $_REQUEST['idcommande'];
}
	$result = $bdd->query('SELECT `t_commander`.*, `t_produit`.libelproduit FROM `t_commander`, `t_produit` WHERE `t_commander`.numproduit = `t_produit`.refprod AND `t_commander`.`numcommande` LIKE '.$numcommande.'');
	
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
				<div class="sousmenu">
				<br/><br/><br/>
					<div class="list-group">
						<a href="commandeencours.php" class="list-group-item">Mes Commandes En Cours</a>
						<a href="commandetermines.php" class="list-group-item">Mes Commandes Terminées</a>
						<a href="coordonnees.php" class="list-group-item">Mes Coordonnées</a>
						<a href="deconnexion.php" class="list-group-item">Déconnexion</a>
					</div>
				</div>
				<br/><br/>
				<div class="encadredetailcom detailcom">
					<img src="img/btnretour.png" width="30px">
					<a href=javascript:history.go(-1)>Retour aux commandes</a>
					<h2>&nbsp;Détail de la commande numéro <?php $numcommande;?> :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premierdetail">Réf produit</th>
								<th class="premierdetail">Libelé produit</th>
								<th class="premierdetail">Quantité</th>
								<th class="premierdetail">Prix Unitaire</th>
								<th class="premierdetail">Prix Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row = $result->fetch()){
									echo'
									<tr>
										<td class="premierdetail">'.AjoutZero($row['numproduit']).'</td>
										<td class="deuxiemedetail">'.$row['libelproduit'].'</td>
										<td class="troisiemedetail">'.$row['quantite'].'</td>
										<td class="quatriemedetail">'.($row['prixttc'])/$row['quantite'].' €</td>
										<td class="quatriemedetail">'.$row['prixttc'].' €</td>
									</tr>';
								}
							?>
						</tbody>
					</table>
					<br/>
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
