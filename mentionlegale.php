<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');

?>

<?php include('header.php'); ?>

<body>
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<h1 align="center">Mentions Légales</h1>
				<p align="justify">
					Le site belletable.fr est édité par la société BelleTable, SARL au capital de 7 622,45 €, dont le siège social est 20 rue de la gare, 75100 PARIS, immatriculée au Registre du Commerce et des sociétés de Versailles sous le numéro 732 829 320 00074.<br/><br/>
					Le site web est hébergé par Campus Montsouris, 2 rue Lacaze 75014 PARIS.<br/><br/>
					Le site internet belletable.fr a fait l'objet d'une déclaration à la CNIL sous le numéro suivant : XXXXXXX<br/><br/>
					Les informations vous concernant sont destinées uniquement à la société BelleTable. Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art. 34 de la loi "Informatique et Libertés"). Pour l'exercer, adressez vous à BelleTable, 20 rue de la gare, 75100 Paris ou à contact.belletable@gmail.com
				</p>
			</div>
		</div>
	</div>
	
	<?php include('footer.php'); ?>

	</div>

</body>

</html>
