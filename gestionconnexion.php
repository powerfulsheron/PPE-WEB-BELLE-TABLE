<?php
include('sessionlogin.php');

include('parametres.php');

include('header.php'); 

if(isset($_POST['datedebut'])){
	$datedebutsearch = $_POST['datedebut'];
	$datefinsearch = $_POST['datefin'];
	
	//Date de fin
	$madatefin = explode("-", $datefinsearch);
	$anneefin = $madatefin[0];
	$moisfin = $madatefin[1];
	$jourfin = $madatefin[2];
	$jourcorrect = $jourfin + 1;
	$datedefin = $anneefin.'-'.$moisfin.'-'.$jourcorrect;
	$ladatedefin = $jourfin.'/'.$moisfin.'/'.$anneefin;
	
	$result = $bdd->query('SELECT * FROM t_connexion WHERE dateheuredebut BETWEEN "'.$datedebutsearch.'" AND "'.$datedefin.'"');
	$numrows = $result->rowCount();
	
	//Date de début
	$madatedebut = explode("-", $datedebutsearch);
	$annedebut = $madatedebut[0];
	$moisdebut = $madatedebut[1];
	$jourdebut = $madatedebut[2];
	$ladatededebut = $jourdebut.'/'.$moisdebut.'/'.$annedebut;
	
}
else{
	$result = $bdd->query('SELECT * FROM t_connexion');
	$numrows = $result->rowCount();
}

?>

	<script>
	function confirmationSupp()
	{
		return (confirm("Etes-vous sûr de vouloir supprimer les enregistrements ?"));
	}
	</script>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<form action="gestionconnexion.php" method="post">
				<?php
					if(isset($ladatededebut)){
						echo'<p><b>Date début de recherche : </b>'.$ladatededebut.'</p>';
					}
					else{
						echo' <p><b>Date début de recherche :</b> </p>';
					}
				?>
				<input type="date" name="datedebut">
				<?php
					if(isset($ladatedefin)){
						echo'<p><b>Date fin de recherche : </b>'.$ladatedefin.'</p>';
					}
					else{
						echo'<p><b>Date fin de recherche :</b></p>';
					}
				?>
				<input type="date" name="datefin">
				<input type="submit" name="rechercher" value="Rechercher">
				</form>
				<br/>
				<?php
				if(isset($result)){
					echo'
					<table width="100%">
						<thead align="center">
							<tr>
								<td>
									<b>Numéro Client</b>
								</td>
								<td>
									<b>Email Client</b>
								</td>
								<td>
									<b>Nom Prénom Client</b>
								</td>
								<td>
									<b>Date et heure de début</b>
								</td>
								<td>
									<b>Date et heure de fin</b>
								</td>
							</tr>
						</thead>
						<tbody align="center">';
						while($row = $result->fetch()){
							$result2 = $bdd->query('SELECT * FROM t_client WHERE numclient = '.$row['numclient'].'');
							$row2 = $result2->fetch();
							echo'
							<tr>							
								<td>';
									echo $row['numclient'];
								echo'	
								</td>
								<td>';
									echo $row2['emailclient'];
								echo'	
								</td>
								<td>';
									echo $row2['nomclient'].' '.$row2['prenomclient'];
								echo'	
								</td>
								<td>';
									echo $row['dateheuredebut'];
								echo'	
								</td>
								<td>';
									echo $row['dateheurefin'];
								echo'	
								</td>
							</tr>';
						}
						echo'
						</tbody>
					</table>';
				}
				?>
				<br>
				<p align="center"><a onclick="return confirmationSupp();" href="sup.php">Supprimer les enregistrements antérieur à 3 mois</a></p>
			</div>
		</div>		
	</div>

<?php include('footer.php'); ?>

</body>
</html>
