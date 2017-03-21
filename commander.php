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
					<form  action="resumepanier.php" id="myform" method="POST" enctype="multipart/form-data">
						<h1 align="center">Services complémentaires</h1>
						<p align="center">Livraison (+25€) &nbsp; <input type="checkbox" id="livraison" name="livraison" value="livraison" ></p>
						<p align="center">Mise en place (+25€) &nbsp; <input type="checkbox" id="miseplace" name="miseplace" ></p>
						<p align="center">Service à table (+50€) &nbsp; <input type="checkbox" id="service" name="service" ></p>
						<p align="center">Lavage de la vaiselle (+20€) &nbsp; <input type="checkbox" id="vaisselle" name="vaisselle" ></p>
						<p align="center">Lessive du linge (+30€) &nbsp; <input type="checkbox" id="lessive" name="lessive" ></p>
						<br/>
						<p align="center">Code de réduction <input type="text" id="reduction" name="reduction" ></p>
						<br/>
                        <p align="right"><input type="submit" id="seconnecter" value="Valider" onclick="document.forms[\'myform\'].submit();"/></p>
					</form>				
				</div>
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>
</html>
