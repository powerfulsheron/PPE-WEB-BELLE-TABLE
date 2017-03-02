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
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BelleTable - Elegance a la Francaise</title>

    <link href="css/cssbelletable.css" rel="stylesheet">

    <link href="css/shop-homepage.css" rel="stylesheet">

	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    	
</head>

<body>
	<br/>
	<div id="menuprincipal" align="center">
		<ul class="barremenu">
			<li>
				<a href="index.php"><img src="img/logo.png" alt="" width="150px"></a>	
			<li>
				<a href="pageproduits.php">Nos Produits</a>
			<li>
				<a href="pageinspi.php">Nos Inspirations</a>
			<li>
				<a href="apropos.php">A Propos</a>
			<li>
				<a href="contact.php">Contact</a>
			<li>
				<?php
				if(isset($menuchange)){
					echo'
					<a href="commandeencours.php">Mon Compte</a>
                    <li>
					<a href="lepanier.php">Mon Panier</a>';
				}
				else{
					echo'
					<a href="connexion.php">Connexion</a>';
				}
				?>
		</ul>
	</div>
	<br/>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="passercommande">
					<form  action="resumepanier.php" id="myform" method="GET" enctype="multipart/form-data">
						<table width="100%">
							<thead>
                                <tr>
									<th colspan="2"><h1>Services complémentaires</h1></th>
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
                                    <td class="totalcommande">Livraison (+25€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="livraison" name="livraison" value="livraison" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Mise en place (+25€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="miseplace" name="miseplace" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Service à table (+50€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="service" name="service" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Lavage de la vaiselle (+20€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="vaisselle" name="vaisselle" ></td>
                                </tr>
                                <tr>
                                    <td class="totalcommande">Lessive du linge (+30€)</td>
                                    <td class="totalcommande"><input type="checkbox" id="lessive" name="lessive" ></td>
                                </tr>
							</tbody>
						</table>
                        <input type="submit" id="seconnecter" value="Valider" onclick="document.forms[\'myform\'].submit();"/>
					</form>				
					<br><br>
				</div>
			</div>
		</div>		
	</div>
	
	
	<div class="divfooter">
        <hr>
        <footer>
        	<div class="socialnet">
        	<a href="http://twitter.com/share" target="_blank" class="twitter-share-button" data-count="vertical" data-via="Belle_TableSIO"><img src="twitter.png" height="5%" width="5%"></a>
		<a name="fb_share" type="box_count" href="https://www.facebook.com/Belle-Table-1113642382077898/" target="_blank"><img src ="fb.jpg" height="6%" width="6%"></a>
		<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
		</div>
			<ul class="footer">
			<li class="lifooter"><a href="mentionlegale.php">Mentions Légales</a></li>
			<li class="lifooter">Copyright &copy; BelleTable 2017</li>
			<li class="lifooter"><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a></li>
			</ul>
        </footer>
    </div>

</body>
</html>
