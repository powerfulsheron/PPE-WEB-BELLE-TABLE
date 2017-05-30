<?php
include('sessionlogin.php');
include('parametres.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

	if(isset($_SESSION['totalcommande'])){
        $totalttc = $_SESSION['totalcommande'];
    }
	if(isset($_SESSION['bonus'])){
		$decoupestring = explode("/",$_SESSION['bonus']);
		$livraison = $decoupestring[0];
		$miseplace = $decoupestring[1];
		$service = $decoupestring[2];
		$vaisselle = $decoupestring[3];
		$lessive = $decoupestring[4];
	}
    
    $ladate = date('Y-m-d H:i:s');
    $nb_insert = $bdd->exec('INSERT INTO t_commande (datecommande,dateenvoi,prixcommande,numclient,livraison,miseplace,service,vaisselle,lessive) VALUES  ("'.$ladate.'",null,'.$totalttc.','.$_SESSION['login'].',"'.$livraison.'","'.$miseplace.'","'.$service.'","'.$vaisselle.'","'.$lessive.'")');
    
    if (!$nb_insert) {
       echo "\nPDO::errorInfo():\n";
       print_r($bdd->errorInfo());
    }
    
    if($nb_insert){
        $result = $bdd->query('SELECT * FROM t_commande ORDER BY datecommande DESC LIMIT 1');
        while($row = $result->fetch()){
            $numcommande = $row['numcommande'];
        }
    }
	
	$error = 0;
	
	$nbArticles=count($_SESSION['panier']['idproduit']);
	
	for ($i=0 ;$i < $nbArticles ; $i++)
	{
		$idproduit = $_SESSION['panier']['idproduit'][$i];
		$qutprod = $_SESSION['panier']['qteProduit'][$i];
		
		$insert = $bdd->exec('INSERT INTO t_commander (numcommande,numproduit,quantite) VALUES  ('.$numcommande.','.$idproduit.','.$qutprod.')');
		
		if (!$insert) {
		   echo "\nPDO::errorInfo():\n";
		   print_r($bdd->errorInfo());
			$error = $error + 1;
		}
	}
	
	if($error == 0){
		$_SESSION['panier'] = "";
		
		$result = $bdd->query('SELECT * FROM t_commande WHERE numclient LIKE '.$_SESSION['login'].' ORDER BY datecommande DESC LIMIT 1');
		while($row = $result->fetch()){
			$numcommande = $row['numcommande'];
			$totalcom = $row['prixcommande'];
			$datecom = $row['datecommande'];
		}
		
		$result = $bdd->query('SELECT * FROM t_client WHERE numclient LIKE '.$_SESSION['login'].'');
		while($row = $result->fetch()){
			$email = $row['emailclient'];
			$nbcom = $row['nbcommandes'];
		}
	
		EnvoiMailCommande($email,$numcommande,$totalcom,$datecom);
		
		$nbcom = $nbcom + 1;
		
		$bdd->exec('UPDATE t_client SET
						nbcommandes='.$nbcom.'
						WHERE numclient = '.$_SESSION['login'].'');
	
		echo'
		<script type="text/javascript">
			location.href = \'commandeencours-en.php\';
		</script>';
	}
	

?>