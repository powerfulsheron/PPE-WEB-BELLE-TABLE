<?php
include('sessionlogin.php');
include('header.php'); 
include('parametres.php');
include('fonction.php');

$result = $bdd->query('SELECT * FROM `t_commande` WHERE `dateenvoi` IS NULL');

if(isset($_POST["id"])){

$today = '\''.date('Y-m-d', strtotime("+10 days")).'\'';
$sql = 'UPDATE t_commande SET dateenvoi='.$today.' WHERE numcommande='.$_POST["id"];
echo $sql;
$bdd->query($sql);
}
?>
				<div class="encadrecommande commandes">
					<h2>Commandes en attente :</h2>
					<hr>
					<table align="center">
						<thead>
							<tr>
								<th class="premiercommande">Numéro commande</th>
								<th class="deuxiemecommande">Date Commande</th>
								<th class="troisiemecommande">Prix Commande</th>
								<th class="quatriemecommande">Valider commande</th>
								<th class="cinquiemecommande">Annuler commande</th>
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
										<td class="troisieme">'.$row2['prixcommande'].' €</td>
										<td class="quatrieme"><button type="submit" id="btnvalidercommande" value="Valider">Valider</button></td>
										<td class="quatrieme"><button type="submit" id="btnsupprimercommande" value="Annuler">Annuler</button></td>
									</tr>';
									echo '<input form="'.$row2['numcommande'].'" type="hidden" name="id" value="'.$row2['numcommande']. '"></form>';
								}
							?>
						</tbody>
					</table>
					<br/>
				</div>
				<?php
				
				?>