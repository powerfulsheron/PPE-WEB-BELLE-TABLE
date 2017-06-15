<?php
include('sessionlogin.php');
include('parametres.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

$ladate = date('Y-m-d');

?>
<?php include('header.php'); ?>
	
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
                                    <td class="totalcommande">Lavage de la vaisselle (+20€)</td>
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
	
	
	<?php include('footer.php'); ?>

</body>
</html>
