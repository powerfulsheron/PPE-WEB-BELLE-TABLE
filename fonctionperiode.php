<?php
include('parametres.php');
include('fonction.php');

$result = $bdd->query('SELECT * FROM `t_client`');

while($row = $result->fetch()){
	$idclient = $row['numclient'];
	$email = $row['emailclient'];
	
	$datejour = date("d/m");
	
	if($datejour == "26/05"){
		$reduc = "FETEDESMERES15";
		$occasion = "de la Fête des Mères";
		$montant = 15;
	}
	elseif($datejour == "07/03"){
		$reduc = "JOURNEEFM30";
		$occasion = "de la Journée des Droits de la Femme";
		$montant = 30;
	}
	elseif($datejour == "13/08"){
		$reduc = "FETENATIONALE14";
		$occasion = "de la Fête Nationale";
		$montant = 25;
	}
	elseif((($datejour >= "10/01")&&($datejour <= "21/02"))||(($datejour >= "27/06")&&($datejour <= "08/08"))){
		$reduc = "SOLDEPLUS";
		$occasion = "des Soldes";
		$montant = 20;
	}

	if(isset($reduc)){
		EnvoiMailReducPeriode($email,$reduc,$occasion,$montant);
	}
}

?>
