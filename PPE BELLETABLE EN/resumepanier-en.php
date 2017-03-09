<?php
include('sessionlogin.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');
include('parametres.php');
include_once('fonctionpanier-en.php');
$erreur = false;
if(isset($_GET)){
	$totalcommandeht = MontantGlobal();
    //livraison
    if(isset($_REQUEST['livraison'])){
        $livraison = 'O';
		$totalcommandeht = $totalcommandeht + 25;
    }
    else{
        $livraison = 'N';
    }
    //mise en place
    if(isset($_REQUEST['miseplace'])){
        $miseplace = 'O';
		$totalcommandeht = $totalcommandeht + 25;
    }
    else{
        $miseplace = 'N';
    }
    //service
    if(isset($_REQUEST['service'])){
        $service = 'O';
		$totalcommandeht = $totalcommandeht + 50;
    }
    else{
        $service = 'N';
    }
    //vaisselle
    if(isset($_REQUEST['vaisselle'])){
        $vaisselle = 'O';
        $totalcommande = $totalcommande + 20;
		$totalcommandeht = $totalcommandeht + 20;
    }
    else{
        $vaisselle = 'N';
    }
    //lessive
    if(isset($_REQUEST['lessive'])){
        $lessive = 'O';
		$totalcommandeht = $totalcommandeht + 30;
    }
    else{
        $lessive = 'N';
    }
	$totalcommande = $totalcommandeht + $totalcommandeht * 0.2;
    
}
?>
<?php include('header-en.php'); ?>
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
					<h2>&nbsp;Mon Panier :</h2>
					<hr>
					<table align="center" id="lescommandes">
						<thead>
							<tr>
								<th class="premierdetail">Product Ref</th>
								<th class="deuxiemedetail">Product Name</th>
								<th class="troisiemedetail">Quantity</th>
								<th class="troisiemedetail">Unitary Price (€)</th>
								<th class="troisiemedetail">Total Price (€)</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (creationPanier())
							{
								$nbArticles=count($_SESSION['panier']['idproduit']);
								if ($nbArticles <= 0)
								echo "<tr><td colspan=\"5\">Your basket is empty</ td></tr>";
								else
								{
									for ($i=0 ;$i < $nbArticles ; $i++)
									{
										echo "<tr>";
										echo "<td class=\"premierdetail\">".htmlspecialchars($_SESSION['panier']['idproduit'][$i])."</td>";
										echo "<td class=\"deuxiemedetail\">".htmlspecialchars($_SESSION['panier']['libelleproduit'][$i])."</td>";
										echo "<td class=\"troisiemedetail\">".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
										echo "<td class=\"troisiemedetail\">".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
										echo "<td class=\"troisiemedetail\">".htmlspecialchars(($_SESSION['panier']['prixProduit'][$i])*($_SESSION['panier']['qteProduit'][$i]))."</td>";
										echo "</tr>";
									}
									echo'
									</tbody>';
									echo'
									<tfooter>';
										if($livraison == 'O'){
											echo'
											<tr>
												<th colspan="4">Livraison</th>
												<td>25</td>
											</tr>';
										}
										if($miseplace == 'O'){
											echo'
											<tr>
												<th colspan="4">Mise en place</th>
												<td>25</td>
											</tr>';
										}
										if($service == 'O'){
											echo'
											<tr>
												<th colspan="4">Service à table</th>
												<td>50</td>
											</tr>';
										}
										if($vaisselle == 'O'){
											echo'
											<tr>
												<th colspan="4">Vaisselle</th>
												<td>20</td>
											</tr>';
										}
										if($lessive == 'O'){
											echo'
											<tr>
												<th colspan="4">Lessive</th>
												<td>30</td>
											</tr>';
										}
										echo'
										<tr>
											<th colspan="3">&nbsp;</th>
											<th >Total HT (€)</th>
											<th>';
											echo $totalcommandeht;
											echo'
											</th>
										</tr>';
										echo'
										<tr>
											<th colspan="3">&nbsp;</th>
											<th >Total TTC (€)</th>
											<th>';
											echo $totalcommande;
											echo'
											</th>
										</tr>';
									echo'
									</tfooter>';
									
								}
							}					
							?>                      
					</table>
                    <br/>
					<?php echo '<p align="right"><input type="button" id="btncommander" value="Passer commande" onclick="javascript:location.href=\'resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'\'"></p>'; ?>
                    <?php //include('paypal.php'); ?>
					<br/>
				</div>
		</div>
	</div>

		<?php include('footer.php'); ?>

</body>

</html>
