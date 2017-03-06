<?php
include('sessionlogin.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

	include('parametres.php');
	
$ladate = date('Y-m-d');
$result = $bdd->query('SELECT `t_panier`.*,`t_produit`.libelproduit,`t_produit`.prixproduit  FROM `t_panier`,`t_produit` WHERE `t_produit`.refprod=`t_panier`.numproduit AND `idclient` LIKE "'.$_SESSION['login'].'" AND `heurecreation` LIKE "'.$ladate.' %:%:%" ORDER BY `numproduit` ASC');
	
$n = 0;

if(isset($_GET)){
    $totalcommande = $_REQUEST['totalcommande'];
    //livraison
    if(isset($_REQUEST['livraison'])){
        $livraison = 'O';
        $totalcommande = $totalcommande + 25;
    }
    else{
        $livraison = 'N';
    }
    //mise en place
    if(isset($_REQUEST['miseplace'])){
        $miseplace = 'O';
        $totalcommande = $totalcommande + 25;
    }
    else{
        $miseplace = 'N';
    }
    //service
    if(isset($_REQUEST['service'])){
        $service = 'O';
        $totalcommande = $totalcommande + 50;
    }
    else{
        $service = 'N';
    }
    //vaisselle
    if(isset($_REQUEST['vaisselle'])){
        $vaisselle = 'O';
        $totalcommande = $totalcommande + 20;
    }
    else{
        $vaisselle = 'N';
    }
    //lessive
    if(isset($_REQUEST['lessive'])){
        $lessive = 'O';
        $totalcommande = $totalcommande + 30;
    }
    else{
        $lessive = 'N';
    }
    
    
}

?>
<?php include('header.php'); ?>
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
					<table align="center">
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
                                }
                                if($livraison == 'O'){
                                    echo'
                                    <tr>
                                        <th colspan="4">Livraison</th>
                                        <td>25</td>          
                                    </tr>';
                                }
                                if($miseplace == 'O'){
                                    echo'
                                    <tr>
                                        <th colspan="4">Mise en place</th>
                                        <td>25</td>          
                                    </tr>';
                                }
                                if($service == 'O'){
                                    echo'
                                    <tr>
                                        <th colspan="4">Service à table</th>
                                        <td>50</td>          
                                    </tr>';
                                }
                                if($vaisselle == 'O'){
                                    echo'
                                    <tr>
                                        <th colspan="4">Vaisselle</th>
                                        <td>20</td>          
                                    </tr>';
                                }
                                if($lessive == 'O'){
                                    echo'
                                    <tr>
                                        <th colspan="4">Lessive</th>
                                        <td>30</td>          
                                    </tr>';
                                }
							?>
						</tbody>
                        <tfooter>
                            <tr>
                                <th colspan="3">&nbsp;</th>
                                <th >Total TTC (€)</th>
                                <td><?php echo $totalcommande;?></td>
                            </tr>
                        </tfooter>
					</table>
                    <br/>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                        <?php
                        echo'
                        <input type="hidden" value="'.$totalcommande.'" name="amount" />';
                        ?>
                        <input name="currency_code" type="hidden" value="EUR" />

                        <input name="shipping" type="hidden" value="0.00" />

                        <input name="tax" type="hidden" value="0.00" />
                        <?php
                        echo'
                        <input name="return" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>

                        <input name="cancel_return" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>

                        <input name="notify_url" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>';
                        ?>
                        <input name="cmd" type="hidden" value="_xclick" />

                        <input name="business" type="hidden" value="testvendeur@belletable.com" />

                        <input name="item_name" type="hidden" value="Commande BelleTable" />

                        <input name="no_note" type="hidden" value="1" />

                        <input name="lc" type="hidden" value="FR" />

                        <input name="bn" type="hidden" value="PP-BuyNowBF" />

                        <input name="custom" type="hidden" value="ID_ACHETEUR" />
                        
                        <p align="right"><input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" /></p>
                        
                    </form>
					<br/>
				</div>
		</div>
	</div>

		<?php include('footer.php'); ?>

</body>

</html>
