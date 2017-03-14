<?php

include('header.php');

include('sessionlogin.php');


if((!isset($_REQUEST['email']))||(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)))
{
	if(isset($erreur)){
     $erreur = $erreur." \\n L'email n'est pas au bon format";
	}
	else{
		        $erreur = "L'email n'est pas au bon format";
	}

}

if(!isset($_REQUEST['message'])||trim($_REQUEST['message'])==='')
{
	if(isset($erreur)){
     $erreur = $erreur." \\n Le message est invalide";
	}
	else{
		    $erreur = "Le message est invalide";
	}

}


if(isset($erreur)&&isset($_POST['bouton']))
{
						echo'
					<script type="text/javascript">
						sweetAlert("Echec","'.$erreur.'","error");
					</script>';
		}

if(isset($_POST['email'])){
	$nom=$_POST['nom'];
    $email=$_POST['email'];
	$numero=$_POST['numero'];
    $message=$_POST['message'];
    if (($nom=="")||($email=="")||($message=="")){
	}
	// $verif = Contact($email,$numero,$message,$nom);
}

	
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

</head>

<body>
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulairenevoi">
					<h1>Contactez-Nous</h1>
					<p>Pour nous contacter veuillez remplir ce formulaire.</p><br/>
					<form  action="contact.php" id="myform" method="POST" enctype="multipart/form-data">
						<p>Votre Nom et Prénom :</p>
						<input name="nom" type="text" value="" size="30"/><br><br>
						<p>Votre Email :</p>
						<input id="email" name="email" type="text" value="" size="30"/><br><br>
						<p>Votre Numéro de téléphone :</p>
						<input name="numero" type="text" value="" size="30"/><br><br>
						<p>Votre Message :</p>
						<textarea id="message" name="message" rows="7" cols="35"></textarea><br><br>
						<input name="bouton" type="submit" id="envoimail" value="Envoyer" onclick="document.forms[\'form\'].submit();"/>
					</form>
					<br><br>
				</div>
			</div>
		</div>		
	</div>
	
	
		<?php include('footer.php'); ?>
	
</body>
</html>
