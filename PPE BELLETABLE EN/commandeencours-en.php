<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');
	
	$idclient = $_SESSION['login'];
	
    $result2 = $bdd->query('SELECT * FROM `t_commande` WHERE `numclient` LIKE '.$idclient.' AND `dateenvoi` IS NULL');
	/*$query2 = 
	$result2 = mysql_query($query2);
	$num_rows2 = mysql_num_rows($result2);*/
	
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
				<div class="encadrecommande commandes">
					<h2>&nbsp;Current Orders :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premiercommande">Order Number</th>
								<th class="deuxiemecommande">Order Date</th>
								<th class="troisiemecommande">ORder Price</th>
								<th class="quatriemecommande">Order Details</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row2 = $result2->fetch()){
									$ladate = $row2['datecommande'];
									$newDate = date("d/m/Y", strtotime($ladate));
									echo'
									<tr>
										<td class="premier">'.$row2['numcommande'].'</td>
										<td class="deuxieme">'.$newDate.'</td>
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
		
	<?php include('footer.php'); ?>

</body>

</html>

