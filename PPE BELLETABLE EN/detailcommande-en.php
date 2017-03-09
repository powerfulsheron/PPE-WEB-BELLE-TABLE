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
								<th class="deuxiemedetail">Product Name</th>
								<th class="troisiemedetail">Quantity</th>
								<th class="quatriemedetail">Unitary Price</th>
								<th class="quatriemedetail">Total Price</th>
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
</div>
	<?php include('footer.php'); ?>


</body>

</html>
