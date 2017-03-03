<?php
session_start();
include('fonction.php');
date_default_timezone_set('Europe/Paris');
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}

	include('parametres.php');
	
if(isset($_REQUEST['ajout'])){
    $ladatetime = '\''.date('Y-m-d H:i:s').'\'';
    
    for($i=0;$i<3;$i++){
        if($_REQUEST['nbvoulu'.$i] > 0){
            $bdd->exec('INSERT INTO t_panier (idclient,heurecreation,numproduit,quantiteprod) VALUES ('.$_SESSION['login'].','.$ladatetime.','.$_REQUEST['produit'.$i].','.$_REQUEST['nbvoulu'.$i].')');
        }
    }
}
$ladate = date('Y-m-d');
$result = $bdd->query('SELECT `t_panier`.*,`t_produit`.libelproduit,`t_produit`.prixproduit  FROM `t_panier`,`t_produit` WHERE `t_produit`.refprod=`t_panier`.numproduit AND `idclient` LIKE "'.$_SESSION['login'].'" AND `heurecreation` LIKE "'.$ladate.' %:%:%" ORDER BY `numproduit` ASC');
	
$n = 0;
?>

<?php include('header.php'); ?>

<body>
	<div class="contenupage">
		<div class="container">
				<div class="sousmenu">
				<br/><br/><br/>
					<div class="list-group">
						<a href="commandeencours.php" class="list-group-item">Mes Commandes En Cours</a>
						<a href="commandetermines.php" class="list-group-item">Mes Commandes Terminees</a>
						<a href="coordonnees.php" class="list-group-item">Mes Coordonnees</a>
						<a href="deconnexion.php" class="list-group-item">Deconnexion</a>
					</div>
				</div>
				<br/><br/>
				<div class="encadredetailcom detailcom">
					<h2>&nbsp;Mon Panier :</h2>
					<hr>
					<table align="center" id="lescommandes">
						<thead>
							<tr>
								<th class="premierdetail">Ref produit</th>
								<th class="deuxiemedetail">Libele produit</th>
								<th class="troisiemedetail">Quantite</th>
								<th class="quatriemedetail">Prix Unitaire (€)</th>
								<th class="quatriemedetail">Prix Total (€)</th>
							</tr>
						</thead>
						<tbody>
							<?php
                                
                                $totalttc = 0;
								while($row = $result->fetch()){
                                    if($n <= 0){
                                        $lignecommande=array(AjoutZero($row['numproduit']),$row['libelproduit'],$row['quantiteprod'],$row['prixproduit']);
                                        $n++;
                                    }
                                    else{
                                        if(AjoutZero($row['numproduit']) == $lignecommande[0]){
                                            $lignecommande[2] = $lignecommande[2] + $row['quantiteprod'];
                                            $n++;
                                        }
                                        else{
                                            echo'
                                            <tr>
                                                <td class="premierdetail">'.$lignecommande[0].'</td>
                                                <td class="deuxiemedetail">'.$lignecommande[1].'</td>
                                                <td class="troisiemedetail">'.$lignecommande[2].'</td>
                                                <td class="quatriemedetail">'.$lignecommande[3].'</td>
                                                <td class="quatriemedetail">'.$lignecommande[3] * $lignecommande[2].'</td>            
                                            </tr>';
                                            $totalttc =  $totalttc + ($lignecommande[3] * $lignecommande[2]);
                                            $lignecommande = array(AjoutZero($row['numproduit']),$row['libelproduit'],$row['quantiteprod'],$row['prixproduit']);
                                            $n=1;
                                        }
                                    }
								}
                                if(isset($lignecommande)){
                                    echo'
                                    <tr>
                                        <td class="premierdetail">'.$lignecommande[0].'</td>
                                        <td class="deuxiemedetail">'.$lignecommande[1].'</td>
                                        <td class="troisiemedetail">'.$lignecommande[2].'</td>
                                        <td class="quatriemedetail">'.$lignecommande[3].'</td>
                                        <td class="quatriemedetail">'.$lignecommande[3] * $lignecommande[2].'</td>          
                                        </tr>';
                                    $totalttc =  $totalttc + ($lignecommande[3] * $lignecommande[2]);
                                }
							?>
						</tbody>
                        <tfooter>
                            <tr>
                                <th colspan="3">&nbsp;</th>
                                <th >Total HT (€)</th>
                                <td><?php echo $totalttc;?></td>
                            </tr>
                            <tr>
                                <th colspan="3">&nbsp;</th>
                                <th >Total TTC (€)</th>
                                <td><?php echo $totalttc+$totalttc*0.20;?></td>
                            </tr>
                        </tfooter>
					</table>
                    <br/>
                    <p align="right"><input type="button" id="btncommander" value="Commander" onclick="javascript:location.href='commander.php'"></p>
					<br/>
				</div>
		</div>

	<?php include('footer.php'); ?>
    
</body>

</html>
