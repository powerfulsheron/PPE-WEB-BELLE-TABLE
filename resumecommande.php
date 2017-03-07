<?php
include('sessionlogin.php');
include('parametres.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

$ladate = date('Y-m-d');


	if(isset($_REQUEST['total'])){
        $totalttc = $_REQUEST['total'];
    }
    //livraison
    if(isset($_REQUEST['livraison'])){
        $livraison = $_REQUEST['livraison'];
    }
    //mise en place
    if(isset($_REQUEST['miseplace'])){
        $miseplace = $_REQUEST['miseplace'];
    }
    //service
    if(isset($_REQUEST['service'])){
        $service = $_REQUEST['service'];
    }
    //vaisselle
    if(isset($_REQUEST['vaisselle'])){
        $vaisselle = $_REQUEST['vaisselle'];
    }
    //lessive
    if(isset($_REQUEST['lessive'])){
        $lessive = $_REQUEST['lessive'];
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
	
		echo'
		<script type="text/javascript">
			location.href = \'commandeencours.php\';
		</script>';
	}
	

?>