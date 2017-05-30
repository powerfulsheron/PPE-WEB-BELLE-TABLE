<?php
include('sessionlogin.php');
include('header.php'); 
include('parametres.php');
include('fonction.php');

$result = $bdd->query('SELECT * FROM `t_commande` WHERE `dateenvoi` IS NULL');

if(isset($_POST["id"])){

$delivry = '\''.date('Y-m-d', strtotime("+10 days")).'\'';
$datenvoie = '\''.date('Y-m-d', strtotime("+2 days")).'\'';
$sql = 'UPDATE t_commande SET dateenvoi='.$datenvoie.', datelivraison ='.$delivry.' WHERE numcommande='.$_POST["id"];

$bdd->query($sql);
header("Refresh:0");
}
?>

	<div class="contenupage">
		<div class="container"><br/><br/><br/>
		<div class="sousmenu">
					<div class="list-group">
						<a href="addproduct.php" class="list-group-item">Ajouter un produit</a>
						<a href="gescommande.php" class="list-group-item">Gerer les commandes en attente</a>
						<a href="gesclient.php" class="list-group-item">Gerer les comptes clients</a>
						<a href="deconnexionadmin.php" class="list-group-item">Deconnexion</a>
					</div>
				</div>
				<div class="encadrecommande commandes">
				
					<h2>Commandes en attente :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premiercommande">Numero commande</th>
								<th class="deuxiemecommande">Date Commande</th>
								<th class="troisiemecommande">Prix Commande</th>
								<th class="quatriemecommande">Valider commande</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($row2 = $result->fetch()){
									$ladate = $row2['datecommande'];
									$newDate = date("d/m/Y", strtotime($ladate));
									echo'
									<form id="'.$row2['numcommande'].'" action="" method="post">
									<tr>
										<td class="premier">'.$row2['numcommande'].'</td>
										<td class="deuxieme">'.$newDate.'</td>
										<td class="troisieme">'.$row2['prixcommande'].' euros</td>
										<td class="quatrieme"><button type="submit" id="btnvalidercommande" value="Valider">Valider</button></td>
									</tr>';
									echo '<input form="'.$row2['numcommande'].'" type="hidden" name="id" value="'.$row2['numcommande']. '"></form>';
								}
							?>
						</tbody>
					</table>
					<br/>
				</div>
		</div>
	</div>
				<?php
				include('footer.php'); 
				?>