<?php
session_start();

include('fonction.php');

if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}

	if(isset($_REQUEST['produit'])){$nomproduit = $_REQUEST['produit'];};
	if(isset($_REQUEST['back'])){$back = $_REQUEST['back'];};

	include('parametres.php');

	$result = $bdd->query('SELECT * FROM `t_produit` WHERE `numgamme` LIKE '.$nomproduit.'');

	$result2 = $bdd->query('SELECT * FROM `t_gamme` WHERE `numgamme` LIKE '.$nomproduit.'');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
			<br/>
			<table>
				<thead>
					<tr>
						<td colspan="3" align="left">
							<img src="img/btnretour.png" width="30px">
							<?php
								if(isset($back)){
									$retour = 'Inspirations';
								}
								else{
									if($nomproduit < 4){$retour = 'Assiettes et Tasses';}
									elseif(($nomproduit > 3)&&($nomproduit < 8)){$retour = 'Couverts';}
									elseif(($nomproduit > 7)&&($nomproduit < 11)){$retour = 'Verres';}
									elseif(($nomproduit > 10)&&($nomproduit < 14)){$retour = 'Nappes et Serviettes';}
									elseif(($nomproduit > 13)&&($nomproduit < 21)){$retour = 'Mobilier';}
									else{$retour = 'Accessoires';}
								}
								
								echo'<a href=javascript:history.go(-1)>Retour '.$retour.'</a>';
							?>
						</td>
					</tr>
					<tr><td colspan="3">&nbsp;</td></tr>
				</thead>
				<tbody>
					
					<tr>
						<td width="45%">
							<div class="imgprod">
								<div class="thumbnail">
									<?php
										while($row2 = $result2->fetch()){
											
											echo'
											<img  src="img/'.$row2['refimage'].'" alt="">
								</div>
							</div>
						</td>
						<td width="10%"></td>
						<td width="45%">
							<div class="detailprod">         
									<h2>'.$row2['nomgamme'].'</h2>';
									if((($nomproduit > 13)&&($nomproduit < 18))||($nomproduit > 20)){
										$reference = AjoutZero($row2['refproduitunique']);									
										echo'
										<p>Ref. '.$reference.'</p>';																				
									}
									if(($nomproduit > 17)&&($nomproduit < 21)){
										
									}
									else{
										echo'
										<p><b>GAMME DE PRIX</b></p>';
										switch($row2['gammeprix']){
											case 1:
												echo'
												<p><img src="img/gammes/bas.png" alt=""></p>';
											break;
											case 2:
												echo'
												<p><img src="img/gammes/moyen.png" alt=""></p>';
											break;
											case 3:
												echo'
												<p><img src="img/gammes/haut.png" alt=""></p>';
											break;
											case 4:
												echo'
												<p><img src="img/gammes/prestige.png" alt=""></p>';
											break;
										}
									}									
									if($row2['description'] != ""){
										echo'
										<p><b>Description</b><br/>'.$row2['description'].'</p>';
									}							
								echo'
								<br/><br/><br/><br/>
								<p align="right"><input type="submit" id="btnpanier" value="AJOUTER AU PANIER" onclick="document.forms[\'myform\'].submit();"></p> 
							</div>
						</td>';
						}
						?>
                    </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="basdepage">
    <div class="container">

        <div class="row">
			<h4><b>LA LIGNE DE PRODUITS</b></h4>
			<form action="lepanier.php" id="myform" method="GET" enctype="multipart/form-data">
			<table class="ligneprod">
				<thead>
					<tr>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="70%"></td>
						<td width="10%"></td>
						<td width="10%">Quantite</td>
					</tr>
				</thead>
				<tfoot>
					<tr><td colspan="5">&nbsp;</td></tr>
				</tfoot>
				<tbody>
					<?php
					$n = 0;
					while($row = $result->fetch()){
						if((($nomproduit > 13)&&($nomproduit < 18))||($nomproduit > 20)){
							echo'
							<tr>
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">A l\'unite</td>
							<td width="10%"><input type="button" id="btnsupprimer1" value="Supprimer" onclick="javascript:nbvoulu1.value=\'\'"></td>
							<td width="5%"><input type="text" name="nbvoulu1" id="nbvoulu1" value=""></td>
							</tr>
							<tr>
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">Pack de 10</td>
							<td width="10%"><input type="button" id="btnsupprimer2" value="Supprimer" onclick="javascript:nbvoulu2.value=\'\'"></td>
							<td width="5%"><input type="text" name="nbvoulu2" id="nbvoulu2" value=""></td>
							</tr>
							<tr>
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">Pack de 100</td>
							<td width="10%"><input type="button" id="btnsupprimer3" value="Supprimer" onclick="javascript:nbvoulu3.value=\'\'"></td>
							<td width="5%"><input type="text" name="nbvoulu3" id="nbvoulu3" value=""></td>
							</tr>';
						}
						else{
							echo'
							<tr>
							<input type="hidden" name="ajout" id="ajout" value="">
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b>'.AjoutZero($row['refprod']).'</b></td>
							<td width="70%">'.$row['libelproduit'].'</td>
							<td width="10%"><input type="button" id="btnsupprimer'.$n.'" value="Supprimer" onclick="javascript:nbvoulu'.$n.'.value=\'\'"></td>
							<td width="5%"><input type="text" name="nbvoulu'.$n.'" id="nbvoulu_'.$n.'" value=""></td>
							<input type="hidden" name="produit'.$n.'" id="produit'.$n.'" value="'.$row['refprod'].'">
							</tr>';
						}
						$n++;	
					}
					?>	
				</tbody>
			</table>
			</form>
		</div>
		
    </div>

	</div>
	
    <div class="divfooter">
        <hr>
        <footer>
			<ul class="footer">
			<li class="lifooter"><a href="mentionlegale.php">Mentions Légales</a></li>
			<li class="lifooter">Copyright &copy; BelleTable 2017</li>
			<li class="lifooter"><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a></li>
			</ul>
        </footer>
    </div>


</body>

</html>
