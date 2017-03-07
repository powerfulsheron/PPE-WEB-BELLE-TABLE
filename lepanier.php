<?php

include('sessionlogin.php');

include('fonction.php');
date_default_timezone_set('Europe/Paris');

include('parametres.php');

include_once('fonctionpanier.php');


$erreur = false;

if(isset($_POST['action'])){
	$action = $_POST['action'];
}
elseif(isset($_REQUEST['action'])){
	$action = $_REQUEST['action'];
}
else{
	$action = null;
}
echo $action;
if($action != null){
	if($action == "ajout"){
	   for($n=0;$n<3;$n++){
			if($_REQUEST['nbvoulu'.$n] > 0){
				$l = $_REQUEST['produit'.$n];
				$result = $bdd->query('SELECT `t_produit`.libelproduit,`t_produit`.prixproduit  FROM `t_produit` WHERE refprod LIKE '.$l.'');
					 while($row = $result->fetch()){
						$libel = $row['libelproduit'];
						$p = $row['prixproduit'];
					}
				$q = $_REQUEST['nbvoulu'.$n];
				ajouterArticle($l,$q,$libel,$p);
			}
		}
	}
}
	
  
?>

<?php include('header.php'); ?>

<body>
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
					<form method="post" action="lepanier.php">
					<table align="center" id="lescommandes">
						<thead>
							<tr>
								<th class="premierdetail">Ref produit</th>
								<th class="deuxiemedetail">Libele produit</th>
								<th class="troisiemedetail">Quantite</th>
								<th class="troisiemedetail">Prix Unitaire (€)</th>
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
										echo "</tr>";
									}
									echo'
									</tbody>';
									echo'
									<tfooter>
										<tr>
											<th colspan="2">&nbsp;</th>
											<th>Total HT (€)</th>
											<th>';
											echo MontantGlobal();
											echo'
											</th>
										</tr>
										<tr>
											<th colspan="2">&nbsp;</th>
											<th >Total TTC (€)</th>
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
                    <p align="right"><input type="button" id="btncommander" value="Commander" onclick="javascript:location.href='commander.php'"></p>
					<br/>
				</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
    
</body>

</html>
