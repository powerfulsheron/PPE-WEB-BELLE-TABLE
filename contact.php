<?php
session_start();
include('fonction.php');
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
if(isset($_REQUEST['email'])){
	$nom=$_REQUEST['nom'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($nom=="")||($email=="")||($message=="")){
        Contact($email,$message,$nom);
	}
}
	
?>
<?php include('header.php'); ?>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulairenevoi">
					<h1>Contactez-Nous</h1>
					<p>Pour nous contacter veuillez remplir ce formulaire.</p><br/>
					<form  action="contact.php" id="myform" method="GET" enctype="multipart/form-data">
						<p>Votre Nom et Prénom :</p>
						<input name="nom" type="text" value="" size="30"/><br><br>
						<p>Votre Email :</p>
						<input name="email" type="text" value="" size="30"/><br><br>
						<p>Votre Message :</p>
						<textarea name="message" rows="7" cols="35"></textarea><br><br>
						<input type="submit" id="envoimail" value="Envoyer" onclick="document.forms[\'form\'].submit();"/>
					</form>
					<br><br>
				</div>
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>
	
</body>
</html>
