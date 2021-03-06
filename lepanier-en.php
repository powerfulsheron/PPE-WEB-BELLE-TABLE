<?php

include('sessionlogin.php');

include('fonction.php');
date_default_timezone_set('Europe/Paris');

include('parametres.php');

include_once('fonctionpanier.php');

if(isset($_REQUEST['lepanier'])){
	if($_REQUEST['lepanier'] == 'full'){
		if(isset($_SESSION['login'])){
			echo'
			<script type="text/javascript">
				location.href = \'commander-en.php\';
			</script>';
		}
		else{
			echo'
			<script type="text/javascript">
				location.href = \'connexion-en.php\';
			</script>';
		}
		
	}
	else{
		$erreur = 1;
	}
}

if(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}
else{
	$action = null;
}
if($action != null){
	if($action == "ajout"){
		if(isset($_REQUEST['groupe'])){
			for($n=0;$n<3;$n++){
				if($_REQUEST['nbvoulu'.$n] > 0){
					switch($n){
						case 0:
							$q = $_REQUEST['nbvoulu'.$n];
						break;
						case 1:
							$q = $_REQUEST['nbvoulu'.$n] * 10;
						break;
						case 2:
							$q = $_REQUEST['nbvoulu'.$n] * 100;
						break;
					}
					$l = $_REQUEST['produit'.$n];
					$result = $bdd->query('SELECT `t_produit`.libelproduit_en,`t_produit`.prixproduit  FROM `t_produit` WHERE refprod LIKE '.$l.'');
					while($row = $result->fetch()){
						$libel = $row['libelproduit_en'];
						$p = $row['prixproduit'];
					}
					ajouterArticle($l,$q,$libel,$p);
				}
			}
		}
		else{
			for($n=0;$n<3;$n++){
				if($_REQUEST['nbvoulu'.$n] > 0){
					$q = $_REQUEST['nbvoulu'.$n];
					$l = $_REQUEST['produit'.$n];
					$result = $bdd->query('SELECT `t_produit`.libelproduit_en,`t_produit`.prixproduit  FROM `t_produit` WHERE refprod LIKE '.$l.'');
					while($row = $result->fetch()){
						$libel = $row['libelproduit_en'];
						$p = $row['prixproduit'];
					}
					ajouterArticle($l,$q,$libel,$p);
				}
			}
		}
	   
	}
	elseif($action == "delete"){
		$_SESSION['panier'] = "";
	}
}
	
  
?>

<?php include('header-en.php'); ?>

<body>
	<?php 
		if(isset($erreur)){
			echo'
			<script type="text/javascript">
				sweetAlert("Error", "Your basket is empty !", "error");
			</script>';		
		}
	?>

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
					<h2>&nbsp;My Basket :</h2>
					<hr>
					<form method="get" action="lepanier-en.php" id="myform" name="myform">
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
								if ($nbArticles <= 0){
									echo "<tr><td colspan=\"5\">Your basket is empty </ td></tr>";
									echo'
									<input type="hidden" name="lepanier" id="lepanier" value="empty">';
								}							
								else
								{
									echo'
									<input type="hidden" name="lepanier" id="lepanier" value="full">';
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
									<tfooter>
										<tr>
											<th colspan="3">&nbsp;</th>
											<th>Amount excluding tax (€)</th>
											<th>';
											echo MontantGlobal();
											echo'
											</th>
										</tr>
										<tr>
											<th colspan="3">&nbsp;</th>
											<th >Amount including tax (€)</th>
											<th>';
											echo MontantGlobalTTC();
											echo'
											</th>
										</tr>';
									echo'
									</tfooter>';
									
								}
							}					
							?>                      
					</table>
					</form>
                    <br/>
					<?php
					echo'
                    <p align="right"><input type="submit" id="btncommander" value="Order" onclick="document.forms[\'myform\'].submit();"></p>';
					?>
					<p align="right"><input type="button" id="btncommander" value="Clear the basket" onclick="javascript:location.href='lepanier-en.php?action=delete'"></p>
					<br/>
				</div>
		</div>
	</div>
	<?php include('footer-en.php'); ?>
    
</body>

</html>
