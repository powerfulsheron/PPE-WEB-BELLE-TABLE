<?php
include('parametres.php');
include('fonction.php');

$result = $bdd->query('SELECT * FROM `t_client`');

while($row = $result->fetch()){
	$idclient = $row['numclient'];
	$email = $row['emailclient'];
	$nbcommandes = $row['nbcommandes'];
	
	if(($nbcommandes >= 10)&&($nbcommandes < 20)){
		if($row['code10'] == 'N'){
			$reduc = "REDUC10";
			$bdd->exec('UPDATE t_client SET
						code10= "O"
						WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 20)&&($nbcommandes < 30)){
		if($row['code20'] == 'N'){
			$reduc = "REDUC20";
			$bdd->exec('UPDATE t_client SET
							code20= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 30)&&($nbcommandes < 40)){
		if($row['code30'] == 'N'){
			$reduc = "REDUC30";
			$bdd->exec('UPDATE t_client SET
							code30= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 40)&&($nbcommandes < 50)){
		if($row['code40'] == 'N'){
			$reduc = "REDUC40";
			$bdd->exec('UPDATE t_client SET
							code40= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 50)&&($nbcommandes < 60)){
		if($row['code50'] == 'N'){
			$reduc = "REDUC50";
			$bdd->exec('UPDATE t_client SET
							code50= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 60)&&($nbcommandes < 70)){
		if($row['code60'] == 'N'){
			$reduc = "REDUC60";
			$bdd->exec('UPDATE t_client SET
							code60= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 70)&&($nbcommandes < 80)){
		if($row['code70'] == 'N'){
			$reduc = "REDUC70";
			$bdd->exec('UPDATE t_client SET
							code70= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif(($nbcommandes >= 80)&&($nbcommandes < 90)){
		if($row['code80'] == 'N'){
			$reduc = "REDUC80";
			$bdd->exec('UPDATE t_client SET
							code80= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	elseif($nbcommandes >= 90){
		if($row['code90'] == 'N'){
			$reduc = "REDUC90";
			$bdd->exec('UPDATE t_client SET
							code90= "O"
							WHERE numclient = '.$idclient.'');
		}
	}
	if(isset($reduc)){
		EnvoiMailReduc($email,$reduc,$nbcommandes);
	}
}

?>
