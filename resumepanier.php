<?php
include('sessionlogin.php');

include('fonction.php');
date_default_timezone_set('Europe/Paris');

include('parametres.php');

include_once('fonctionpanier.php');


$erreur = false;


if(isset($_POST)){
	
	$totalcommandeht = MontantGlobal();
	
	//reduction
	if(isset($_POST['reduction'])){
        $reduction = $_POST['reduction'];
		$result = $bdd->query('SELECT * FROM `t_reduction` WHERE `libelle_reduc` LIKE "'.$reduction.'"');
		while($row = $result->fetch())
		{
			$montantreduc = $row['reduction'];
			$idreduc = $row['id_reduc'];
		}
		if($idreduc < 10){
			$totalcommandeht = $totalcommandeht - $montantreduc;
		}
		elseif($idreduc > 10){
			$totalcommandeht = $totalcommandeht - ($totalcommandeht * ($montantreduc/100));
		}
    }
	
    //livraison
    if(isset($_POST['livraison'])){
        $livraison = 'O';
		$totalcommandeht = $totalcommandeht + 25;
    }
    else{
        $livraison = 'N';
    }
    //mise en place
    if(isset($_POST['miseplace'])){
        $miseplace = 'O';
		$totalcommandeht = $totalcommandeht + 25;
    }
    else{
        $miseplace = 'N';
    }
    //service
    if(isset($_POST['service'])){
        $service = 'O';
		$totalcommandeht = $totalcommandeht + 50;
    }
    else{
        $service = 'N';
    }
    //vaisselle
    if(isset($_POST['vaisselle'])){
        $vaisselle = 'O';
        $totalcommande = $totalcommande + 20;
		$totalcommandeht = $totalcommandeht + 20;
    }
    else{
        $vaisselle = 'N';
    }
    //lessive
    if(isset($_POST['lessive'])){
        $lessive = 'O';
		$totalcommandeht = $totalcommandeht + 30;
    }
    else{
        $lessive = 'N';
    }
	$totalcommande = $totalcommandeht + $totalcommandeht * 0.2;
    
}

?>
<?php include('header.php'); ?>
	<div class="contenupage">
		<div class="container">
				<div class="sousmenu">
				<br/><br/><br/>
					<div class="list-group">
						<a href="commandeencours.php" class="list-group-item">Mes Commandes En Cours</a>
						<a href="commandetermines.php" class="list-group-item">Mes Commandes Terminees</a>
						<a href="coordonnees.php" class="list-group-item">Mes Coordonnees</a>
						<a href="deconnexion.php" class="list-group-item">Deconnexion</a>
					</div>
				</div>
				<br/><br/>
				<div class="encadredetailcom detailcom">
					<h2>&nbsp;Mon Panier :</h2>
					<hr>
					<table align="center" id="lescommandes">
						<thead>
							<tr>
								<th class="premierdetail">Ref produit</th>
								<th class="deuxiemedetail">Libele produit</th>
								<th class="troisiemedetail">Quantite</th>
								<th class="troisiemedetail">Prix Unitaire (€)</th>
								<th class="troisiemedetail">Prix Total (€)</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (creationPanier())
							{
								$nbArticles=count($_SESSION['panier']['idproduit']);
								if ($nbArticles <= 0)
								echo "<tr><td colspan=\"5\">Votre panier est vide </ td></tr>";
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
