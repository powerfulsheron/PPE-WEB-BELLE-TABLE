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
$result = $bdd->query('SELECT `t_panier`.*,`t_produit`.libelproduit,`t_produit`.prixproduit  FROM `t_panier`,`t_produit` WHERE `t_produit`.refprod=`t_panier`.numproduit AND `idclient` LIKE "'.$_SESSION['login'].'" AND `heurecreation` LIKE "'.$ladate.' %:%:%" ORDER BY `numproduit` ASC');
?>
<?php include('header-en.php'); ?>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="passercommande">
					<form  action="resumepanier.php" id="myform" method="GET" enctype="multipart/form-data">
						<table width="100%">
							<thead>
                                <tr>
									<th colspan="2"><h1>Additional Services</h1></th>
								</tr>
							</thead>
							
							<tbody>
                            <?php
                                $n = 0;
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
                                            $totalttc =  $totalttc + ($lignecommande[3] * $lignecommande[2]);
                                            $lignecommande = array(AjoutZero($row['numproduit']),$row['libelproduit'],$row['quantiteprod'],$row['prixproduit']);
                                            $n=1;
                                        }
                                    }
								}
                                if(isset($lignecommande)){                                    
                                    $totalttc =  $totalttc + ($lignecommande[3] * $lignecommande[2]);
                                    echo'
                                    <input type="hidden" name="totalcommande" id="totalcommande" value="'.($totalttc+$totalttc*0.20).'" />';
                                    
                                }
                                ?>
                                <tr>
                                    <td class="totalcommande">Delivery (+25€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="livraison" name="livraison" value="livraison" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Setting up (+25€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="miseplace" name="miseplace" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Table Service (+50€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="service" name="service" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Dishes Washing (+20€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="vaisselle" name="vaisselle" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Laundry(+30€)</td>

                                    <td class="totalcommande"><input type="checkbox" id="lessive" name="lessive" ></td>
                                </tr>
							</tbody>
						</table>
                        <input type="submit" id="seconnecter" value="Ok" onclick="document.forms[\'myform\'].submit();"/>

					</form>				
					<br><br>
				</div>
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>
</html>
