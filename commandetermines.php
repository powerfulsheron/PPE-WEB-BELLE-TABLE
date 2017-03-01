<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');
	
	$idclient = $_SESSION['login'];
	
    $result2 = $bdd->query('SELECT * FROM `t_commande` WHERE `numclient` LIKE '.$idclient.' AND `dateenvoi` IS NOT NULL');
	
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
				<div class="encadrecommande commandes">
					<h2>&nbsp;Mes Commandes terminées :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premiercommande">Numéro commande</th>
								<th class="deuxiemecommande">Date Commande</th>
								<th class="deuxiemecommande">Date D'Envoi</th>
								<th class="troisiemecommande">Prix Commande</th>
								<th class="quatriemecommande">Détail commande</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row2 = $result2->fetch()){
									$ladate = $row2['datecommande'];
									$newDateCommande = date("d/m/Y", strtotime($ladate));
									$ladate = $row2['dateenvoi'];
									$newDateEnvoi = date("d/m/Y", strtotime($ladate));
									echo'
									<tr>
										<td class="premier">'.$row2['numcommande'].'</td>
										<td class="deuxieme">'.$newDateCommande.'</td>
										<td class="deuxieme">'.$newDateEnvoi.'</td>
										<td class="troisieme">'.$row2['prixcommande'].' €</td>
										<td class="quatrieme"><input type="button" id="btnvoircommandes" value="Voir" onclick="location.href=\'detailcommande.php?idcommande='.$row2['numcommande'].'\';"></td>
									</tr>';
								}
							?>
						</tbody>
					</table>
					<br/>
				</div>
		</div>
	</div>
		<div class="container">
			<hr>

			<footer>
				<div class="row">
					<div class="encadrefooter">
					<ul class="footer">
					<li><a href="mentionlegale.php">Mentions Légales</a>
					<li>&nbsp;
					<li><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a>
					</ul>
					<br/>
					<p>Copyright &copy; BelleTable 2017</p>
					</div>
				</div>
			</footer>

		</div>

</body>

</html>
