<?php
include('sessionlogin.php');
	include('parametres.php');
	
	$idclient = $_SESSION['login'];
	
    $result2 = $bdd->query('SELECT * FROM `t_commande` WHERE `numclient` LIKE '.$idclient.' AND `dateenvoi` IS NOT NULL ORDER BY datecommande DESC');
	
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
	<?php include('footer.php'); ?>

</body>

</html>
