<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
include('parametres.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

$ladate = date('Y-m-d');

if(isset($_REQUEST)){
    $totalcommande = $_REQUEST['total'];
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
    
    $ladate = date('Y-m-d');
    $nb_insert = $bdd->exec('INSERT INTO t_commande (datecommande,dateenvoi,prixcommande,numclient,livraison,miseplace,service,vaisselle,lessive) VALUES  ("'.$ladate.'",null,'.$totalcommande.','.$_SESSION['login'].',"'.$livraison.'","'.$miseplace.'","'.$service.'","'.$vaisselle.'","'.$lessive.'")');
    
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
    
    
}

$result = $bdd->query('SELECT `t_panier`.*,`t_produit`.libelproduit,`t_produit`.prixproduit  FROM `t_panier`,`t_produit` WHERE `t_produit`.refprod=`t_panier`.numproduit AND `idclient` LIKE "'.$_SESSION['login'].'" AND `heurecreation` LIKE "'.$ladate.' %:%:%" ORDER BY `numproduit` ASC');

$n=0;
while($row = $result->fetch()){
    if($n <= 0){
        $lignecommande=array($row['numproduit'],$row['libelproduit'],$row['quantiteprod'],$row['prixproduit']);
        $n++;
    }
    else{
        if($row['numproduit'] == $lignecommande[0]){
            $lignecommande[2] = $lignecommande[2] + $row['quantiteprod'];
            $n++;
        }
        else{
            $bdd->exec('INSERT INTO t_commander (numcommande,numproduit,quantite,prixttc) VALUES  ('.$numcommande.','.$lignecommande[0].','.$lignecommande[2].','.$lignecommande[3].')');
            $lignecommande = array($row['numproduit'],$row['libelproduit'],$row['quantiteprod'],$row['prixproduit']);
            $n=1;
        }
    }
}

$bdd->exec('INSERT INTO t_commander (numcommande,numproduit,quantite,prixttc) VALUES  ('.$numcommande.','.$lignecommande[0].','.$lignecommande[2].','.$lignecommande[3].')');

$bdd->exec('DELETE FROM t_panier WHERE idclient LIKE '.$_SESSION['login'].'');

 echo'
<script type="text/javascript">
    location.href = \'paypal.php?totalttc='.$totalcommande.'\';
</script>';

?>