<?php
include('fonction.php');
include('sessionlogin.php');

	include('parametres.php');
	
if((isset($_REQUEST['idcommande']))&&(isset($_SESSION['login']))){
	$numcommande = $_REQUEST['idcommande'];
}
else{
	echo'
		<script type="text/javascript">
			location.href = \'connexion.php\';
		</script>';
}
	$result = $bdd->query('SELECT `t_commander`.*, `t_produit`.libelproduit , `t_produit`.prixproduit FROM `t_commander`, `t_produit` WHERE `t_commander`.numproduit = `t_produit`.refprod AND `t_commander`.`numcommande` LIKE '.$numcommande.'');
	
?>
<?php include('header.php'); ?>

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
										<td class="quatriemedetail">'.$row['prixproduit'].' €</td>
										<td class="quatriemedetail">'.$row['prixproduit'] * $row['quantite'].' €</td>
									</tr>';
								}
							?>
						</tbody>
					</table>
					<br/>
				</div>
		</div>
</div>
	<?php include('footer.php'); ?>


</body>

</html>
