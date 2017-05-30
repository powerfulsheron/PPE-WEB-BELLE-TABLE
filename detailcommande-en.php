<?php
include('fonction.php');
include('sessionlogin.php');
require('utilities/fpdf.php');

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
	//$result = $bdd->query('SELECT `t_commander`.*, `t_produit`.libelproduit , `t_produit`.prixproduit FROM `t_commander`, `t_produit` WHERE `t_commander`.numproduit = `t_produit`.refprod AND `t_commander`.`numcommande` LIKE '.$numcommande.'');
	
	$result = $bdd->query('SELECT `t_commande`.*, `t_commander`.*, `t_client`.*, `t_produit`.libelproduit_en , `t_produit`.prixproduit 

FROM `t_commander`, `t_produit`, `t_commande`, `t_client`

WHERE `t_commander`.numproduit = `t_produit`.`refprod`
	AND `t_commander`.`numcommande`= `t_commande`.`numcommande`
	AND `t_commande`.`numclient` = `t_client`.`numclient`
	AND `t_commander`.`numcommande` = '.$numcommande.';');
	
	if(isset($_POST["commandToPDF"])){
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Image('img\logo.png',170,10,30);
	$pdf->Cell(40,10,'Order: '.$_POST["commandToPDF"]);
	$pdf->Ln(30);
	$totalcommande;
	$addlivraison;
	$datelivraison;
	$cpclient;
	$villeclient;
	$nomclient;
	$prenomclient;
	while($row = $result->fetch()){
	$pdf->SetFont('Arial','B',12);
		$pdf->Cell(15,10,utf8_decode('Product Number: ..........................................................................'.$row['numproduit']));
		$pdf->Ln(10);
		$pdf->Cell(15,10,utf8_decode('Product Name: ...................................................................'.$row['libelproduit_en']));
		$pdf->Ln(10);
		$pdf->Cell(15,10,utf8_decode('Product Unitary Price: ...................................................................'.$row['prixproduit'].' euros'));
		$pdf->Ln(10);
		$pdf->Cell(15,10,utf8_decode('Quantity: ......................................................................................'.$row['quantite']));
		$pdf->Ln(10);
		$pdf->Cell(15,10,utf8_decode('Amount: ............................................................................................'.$row['prixproduit'] * $row['quantite'].' euros'));
		$pdf->Ln(30);
		$totalcommande = $row['prixcommande'];
		$addlivraison = $row['rueclient'];
		$cpclient = $row['cpclient'];
		$villeclient = $row['villeclient'];
		$datelivraison = $row['livraison'];
		$nomclient = $row['nomclient'];
		$prenomclient = $row['prenomclient'];
	}

	$pdf->Cell(15,10,utf8_decode('-------------------------------------------------------------------------------------------------------------------------------------------------------'));
	$pdf->Ln(10);	
	$pdf->Cell(15,10,utf8_decode('Amount TTC: '.$totalcommande.' euros'));
	$pdf->Ln(10);
	$pdf->Cell(15,10,utf8_decode('-------------------------------------------------------------------------------------------------------------------------------------------------------'));
	$pdf->Ln(10);
	$pdf->Cell(15,10,utf8_decode('Delivery on: '.$datelivraison));
	$pdf->Ln(10);
	$pdf->Cell(15,10,utf8_decode('Delivery Address: '.$prenomclient.' '.$nomclient.' '.$addlivraison.' '.$cpclient.' '.$villeclient));
	$pdf->Output('I','Order_'.$_POST["commandToPDF"].'.pdf');

	}
?>
<?php include('header.php'); ?>

	<div class="contenupage">
		<div class="container">
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
							$i=0;
								while($row = $result->fetch()){
									echo'

									<tr>
										<td class="premierdetail">'.AjoutZero($row['numproduit']).'</td>
										<td class="deuxiemedetail">'.$row['libelproduit_en'].'</td>
										<td class="troisiemedetail">'.$row['quantite'].'</td>
										<td class="quatriemedetail">'.$row['prixproduit'].' €</td>
										<td class="quatriemedetail">'.$row['prixproduit'] * $row['quantite'].' €</td>
									</tr>';
									if($i == 0){
										echo'	<form id="'.$row['numcommande'].'" action="" method="post">
										<button type="submit" id="btnPDF" value="PDF">Bill Details</button>
										<input form="'.$row['numcommande'].'" type="hidden" name="commandToPDF" value="'.$row['numcommande']. '">
										</form>';
										$i++;
									}
									
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