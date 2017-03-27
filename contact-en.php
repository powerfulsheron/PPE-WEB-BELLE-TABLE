<?php
include('sessionlogin.php');


if(isset($_POST['email'])){
	$nom=$_POST['nom'];
    $email=$_POST['email'];
	$numero=$_POST['numero'];
    $message=$_POST['message'];
    if (($nom=="")||($email=="")||($message=="")){
	}
	$verif = Contact($email,$numero,$message,$nom);
}
	
?>
<!DOCTYPE html>
<html lang="fr">

<?php include('header-en.php'); ?>

<body>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulairenevoi">
					<h1>Contact Us</h1>
					<p>To contact us please fill the following Form.</p><br/>
					<form  action="contact-en.php" id="myform" method="POST" enctype="multipart/form-data">
						<p>Your Name and First Name </p>
						<input name="nom" type="text" value="" size="30"/><br><br>
						<p>Your Email :</p>
						<input name="email" type="text" value="" size="30"/><br><br>
						<p>Your Phone Number :</p>
						<input name="numero" type="text" value="" size="30"/><br><br>
						<p>Your Message :</p>
						<textarea name="message" rows="7" cols="35"></textarea><br><br>
						<input type="submit" id="envoimail" value="Envoyer" onclick="document.forms[\'form\'].submit();"/>
					</form>
					<br><br>
				</div>
			</div>
		</div>		
	</div>
<?php include('footer-en.php'); ?>
</body>
</html>