<?php
include('parametres.php');

function AjoutZero($string){
	$constant = $string;
	if(strlen($string)<5){	
		$string = '0'.$string;
		for($i=strlen($constant);$i<4;$i++){
			$string = '0'.$string;
		}
	}
	return $string;
}

function CalculDeltaDate($madate){
	$datejours = date('Y-m-d H:i:s');
	$intervale = $datejours->diff($madate)->format('%d;%m;%y;%h;%i;%s');
	list($nbj, $nbm, $nba,$nbh,$nbmn,$nbs) = split('[;.-]', $intervale);
	if($nba < 0){
		if($nbm < 0){
			if($nbj < 0){
				if($nbh > 1){
					return false;
				}
				else{
					return true;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;	
		}
	}
	else{
		return false;		
	}
}

function AjouterCommande($datecommande,$prixtotal,$numclient,$livraison,$miseplace,$service,$vaisselle,$lessive){
    
    if($livraison == 'O'){
        $prixtotal = $prixtotal + 25;
    }
    if($miseplace == 'O'){
        $prixtotal = $prixtotal + 25;
    }
    if($service == 'O'){
        $prixtotal = $prixtotal + 50;
    }
    if($vaisselle == 'O'){
        $prixtotal = $prixtotal + 20;
    }
    if($lessive == 'O'){
        $prixtotal = $prixtotal + 30;
    }
    
    $bdd->exec('INSERT INTO t_commande (datecommande,dateenvoi,prixcommande,numclient,livraison,miseplace,service,vaisselle,lessive) VALUES  ('.$datecommande.',null,'.$prixtotal.','.$numclient.','.$livraison.','.$miseplace.','.$service.','.$vaisselle.','.$lessive.')');
    
    $result = $bdd->query('SELECT * FROM t_commande ORDER BY datecommande DESC LIMIT 1');
    while($row = $result->fetch()){
        $numcommande = $row['numcommande'];
    }
    return $numcommande;
}

function AjouterProduitCommande($numcommande,$numproduit,$quantite,$prixproduit){
    $bdd->exec('INSERT INTO t_commander (numcommande,numproduit,quantite,prixttc) VALUES  ('.$numcommande.','.$numproduit.','.$quantite.','.$prixproduit.')');
}


?>
