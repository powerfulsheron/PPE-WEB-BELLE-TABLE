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
<?php include('header-en.php'); ?>
	<div class="contenupage">
				<div class="sousmenu">
				<br/><br/><br/>
					<div class="list-group">
						<a href="commandeencours-en.php" class="list-group-item">Current Orders </a>
						<a href="commandetermines-en.php" class="list-group-item">Completed Orders</a>
						<a href="coordonnees-en.php" class="list-group-item">Contact Informations</a>
						<a href="deconnexion-en.php" class="list-group-item">Log Off</a>
					</div>
				</div>
				<br/><br/>
				<div class="encadredetailcom detailcom">
					<img src="img/btnretour.png" width="30px">
					<a href=javascript:history.go(-1)>Back to Orders</a>
					<h2>&nbsp;Order Number Details <?php $numcommande;?> :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premierdetail">Product Ref</th>
								<th class="premierdetail">Product Name</th>
								<th class="premierdetail">Quantity</th>
								<th class="premierdetail">Unitary Price</th>
								<th class="premierdetail">Total Price</th>
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
	<?php include('footer-en.php'); ?>


</body>

</html>