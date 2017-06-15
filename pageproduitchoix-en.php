<?php
include('sessionlogin.php');
include('fonction.php');

	if(isset($_REQUEST['produit'])){$nomproduit = $_REQUEST['produit'];};
	if(isset($_REQUEST['back'])){$back = $_REQUEST['back'];};

	include('parametres.php');

	$result = $bdd->query('SELECT * FROM `t_produit` WHERE `numgamme` LIKE '.$nomproduit.'');

	$result2 = $bdd->query('SELECT * FROM `t_gamme` WHERE `numgamme` LIKE '.$nomproduit.'');

?>

<?php include('header-en.php'); ?>

<body>
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
									if($nomproduit < 4){$retour = 'Plates and Cups';}
									elseif(($nomproduit > 3)&&($nomproduit < 8)){$retour = 'Cutlery';}
									elseif(($nomproduit > 7)&&($nomproduit < 11)){$retour = 'Glasses';}
									elseif(($nomproduit > 10)&&($nomproduit < 14)){$retour = 'Tablecloths and Napkins';}
									elseif(($nomproduit > 13)&&($nomproduit < 21)){$retour = 'Furniture';}
									else{$retour = 'Accessories';}
								}
								
								echo'<a href=javascript:history.go(-1)>Back '.$retour.'</a>';
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
										<p><b>PRICE RANGE</b></p>';
										switch($row2['gammeprix']){
											case 1:
												echo'
												<p><img src="img/gammes/bas.PNG" alt=""></p>';
											break;
											case 2:
												echo'
												<p><img src="img/gammes/moyen.PNG" alt=""></p>';
											break;
											case 3:
												echo'
												<p><img src="img/gammes/haut.PNG" alt=""></p>';
											break;
											case 4:
												echo'
												<p><img src="img/gammes/prestige.PNG" alt=""></p>';
											break;
										}
									}									
									if($row2['description_en'] != ""){
										echo'
										<p><b>Description</b><br/>'.$row2['description_en'].'</p>';
									}							
								echo'
								<br/><br/><br/><br/>
								<p align="right"><input type="submit" id="btnpanier" value="ADD TO BASKET" onclick="document.forms[\'myform\'].submit();"></p> 
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
			<h4><b>THE LINE OF PRODUCTS</b></h4>
			<form action="lepanier-en.php" id="myform" method="GET" enctype="multipart/form-data">
			<table class="ligneprod">
				<thead>
					<tr>
						<td width="5%"></td>
						<td width="5%"></td>
						<td width="70%"></td>
						<td width="10%"></td>
						<td width="10%">Amount</td>
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
							<input type="hidden" name="action" id="action" value="ajout">
							<input type="hidden" name="groupe" id="groupe" value="groupe">
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">By unit</td>
							<td width="10%"><input type="button" id="btnsupprimer0" value="Delete" onclick="javascript:nbvoulu0.value=\'\'"></td>
							<td width="5%"><input type="number" name="nbvoulu0" id="nbvoulu0" value=""  min=0></td>
							<input type="hidden" name="produit0" id="produit0" value="'.$row['refprod'].'">
							</tr>
							<tr>
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">Pack of 10</td>
							<td width="10%"><input type="button" id="btnsupprimer1" value="Delete" onclick="javascript:nbvoulu1.value=\'\'"></td>
							<td width="5%"><input type="number" name="nbvoulu1" id="nbvoulu1" value="" min=0></td>
							<input type="hidden" name="produit1" id="produit1" value="'.$row['refprod'].'">
							</tr>
							<tr>
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b></b></td>
							<td width="70%">Pack of 100</td>
							<td width="10%"><input type="button" id="btnsupprimer2" value="Delete" onclick="javascript:nbvoulu2.value=\'\'"></td>
							<td width="5%"><input type="number" name="nbvoulu2" id="nbvoulu2" value="" min=0></td>
							<input type="hidden" name="produit2" id="produit2" value="'.$row['refprod'].'">
							</tr>';
						}
						else{
							echo'
							<tr>
							<input type="hidden" name="action" id="action" value="ajout">
							<td width="5%" class="fondimage"><img src="img/'.$row['refimagedetail'].'" alt="" width="70px"></td>
							<td width="10%"><b>'.AjoutZero($row['refprod']).'</b></td>
							<td width="70%">'.$row['libelproduit_en'].'</td>
							<td width="10%"><input type="button" id="btnsupprimer'.$n.'" value="Delete" onclick="javascript:nbvoulu'.$n.'.value=\'\'"></td>
							<td width="5%"><input type="number" name="nbvoulu'.$n.'" id="nbvoulu_'.$n.'" value="" min=0></td>
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
	
    <?php include('footer-en.php'); ?>


</body>

</html>
