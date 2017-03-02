<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
include('parametres.php');

if(isset($_REQUEST['email'])){
	
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
	$confirm=$_REQUEST['confirm'];
	if(isset($_REQUEST['civilite'])){$civilite = $_REQUEST['civilite'];}else{$civilite = "";}
	$nom=$_REQUEST['nom'];
	$prenom=$_REQUEST['prenom'];
	$activite=$_REQUEST['activite'];
	$denomsociale=$_REQUEST['denomsociale'];
	$rue=$_REQUEST['rue'];
	$complement = $_REQUEST['complement'];
	$cp=$_REQUEST['cp'];
	$ville=$_REQUEST['ville'];
	$fixe=$_REQUEST['telfixe'];
	$portable=$_REQUEST['telportable'];
	if(isset($_REQUEST['newsletter'])){
		$newsletter = 'O';
	}
	else{
		$newsletter = 'N';
	}

	$erreur = 0;
	
	if(isset($fixe)){if(($fixe == null)&&($portable == null)){$erreur = 3;}}
	if(isset($email)){if($email == null){$erreur = 1;}}
	if(isset($password)){if($password == null){$erreur = 1;}}
	if(isset($confirm)){if($confirm == null){$erreur = 1;}}
	if(($password != null)&&($confirm != null)){if($password != $confirm){$erreur = 2;}}
	if(isset($civilite)){if($civilite == null){$erreur = 1;}}
	if(isset($nom)){if($nom == null){$erreur = 1;}}
	if(isset($prenom)){if($prenom == null){$erreur = 1;}}
	if(isset($activite)){if($activite == null){$erreur = 1;}}
	if(isset($activite)){if(($activite == 2)&&($denomsociale == null)){$erreur = 4;}}
	if(isset($rue)){if($rue == null){$erreur = 1;}}
	if(isset($cp)){if($cp == null){$erreur = 1;}}
	if(isset($ville)){if($ville == null){$erreur = 1;}}	
	
	$email='\''.$_REQUEST['email'].'\'';
	$emailbis = $_REQUEST['email'];
	$password='\''.md5($_REQUEST['password']).'\'';
	$mdpbis = md5($_REQUEST['password']);
	$confirm=md5($_REQUEST['confirm']).'\'';
	$civilite = '\''.$_REQUEST['civilite'].'\'';
	$nom='\''.$_REQUEST['nom'].'\'';
	$prenom='\''.$_REQUEST['prenom'].'\'';
	$activite='\''.$_REQUEST['activite'].'\'';
	$denomsociale='\''.$_REQUEST['denomsociale'].'\'';
	if($denomsociale == ""){
		$denomsociale = NULL;
	}
	$rue='\''.$_REQUEST['rue'].'\'';
	$complement = '\''.$_REQUEST['complement'].'\'';
	if($complement == ""){
		$complement = NULL;
	}
	$cp='\''.$_REQUEST['cp'].'\'';
	$ville='\''.$_REQUEST['ville'].'\'';
	$fixe='\''.$_REQUEST['telfixe'].'\'';
	if($fixe == ""){
		$fixe = NULL;
	}
	$portable='\''.$_REQUEST['telportable'].'\'';
	if($portable == ""){
		$portable = NULL;
	}

	
	if($erreur == 0){
		
        $bdd->exec('INSERT INTO t_client (typeclient,nomclient,prenomclient,denomsociale,rueclient,complementadresse,cpclient,villeclient,emailclient,telfixeclient,telportableclient,mdpclient,civiliteclient,newsletter) VALUES ('.$activite.','.$nom.','.$prenom.','.$denomsociale.','.$rue.','.$complement.','.$cp.','.$ville.','.$email.','.$fixe.','.$portable.','.$password.','.$civilite.','.$newsletter.')');

		//Envoi des requêtes
        $result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$emailbis.'" AND `mdpclient` LIKE "'.$mdpbis.'"');

        while($row = $result->fetch()){
            $_SESSION['login'] = $row['numclient'];
        }

        echo'
        <script type="text/javascript">
            location.href = \'commandeencours.php\';
        </script>';

	}	
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

	<script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	
</head>

<body>
	<?php
		if(isset($erreur)){
			switch($erreur){
				case 1:
					$message = 'Tous les champs sont obligatoires sauf \"Dénomination sociale\" et \"Complément Adresse\".';	
				break;
				case 2:
					$message = 'Les mots de passes ne sont pas identiques.';
				break;
				case 3:
					$message = 'Vous devez renseigner au moins un numéro de téléphone.';
				break;
				case 4:
					$message = 'Tous les champs sont obligatoires sauf \"Complément Adresse\".';
				break;
			}
			if($erreur != 0){
				echo'
				<script type="text/javascript">
					sweetAlert("Echec", "'.$message.'", "error");
				</script>';	
			}
			
		}
	?>
	
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
				<div class="formulaireinscription">
					<form  action="inscription.php" id="myform" method="GET" enctype="multipart/form-data">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="2"><h1>Inscription</h1></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td id="exception"><br/><br/>*Champs obligatoire</td>
									<td id="exception"><br/><br/>**Remplissez au moins un des deux champs</td>
								</tr>
							</tfoot>
							<tbody>
								<tr>
									<td colspan="2">
										<h2>Paramètres de connexion</h2><br/>
									</td>
								</tr>
								<tr>
									<td>
										Votre Email*<br/><br/>
									</td>
									<td>
										<input name="email" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Mot de Passe*<br/><br/>
									</td>
									<td>
										<input name="password" type="password" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Confirmation Mot de Passe*<br/><br/>
									</td>
									<td>
										<input name="confirm" type="password" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<h2>Coordonnées personnelles</h2><br/>
									</td>
								</tr>
								<tr>
									<td>
										Civilité*<br/><br/>
									</td>
									<td>
										<input type="radio" name="civilite" value="1"> Madame
										<input type="radio" name="civilite" value="2"> Monsieur<br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Nom*<br/><br/>
									</td>
									<td>
										<input name="nom" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Prénom*<br/><br/>
									</td>
									<td>
										<input name="prenom" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Activité*<br/><br/>
									</td>
									<td>
										<select name="activite" onchange="">
											<option value="1">Particulier</option>
											<option value="2">Société</option>
										</select><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Dénomination sociale<br/><br/>
									</td>
									<td>
										<input name="denomsociale" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Adresse*<br/><br/>
									</td>
									<td>
										<input name="rue" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Complément Adresse<br/><br/>
									</td>
									<td>
										<input name="complement" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Code Postal*<br/><br/>
									</td>
									<td>
										<input name="cp" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Ville*<br/><br/>
									</td>
									<td>
										<input name="ville" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Téléphone Fixe**<br/><br/>
									</td>
									<td>
										<input name="telfixe" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Téléphone Portable**<br/><br/><br/>
									</td>
									<td>
										<input name="telportable" type="text" value="" size="30"/><br/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Newsletter<br/><br/><br/>
									</td>
									<td>
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter" >
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" id="sinscrire" value="Valider" onclick="document.forms[\'myform\'].submit();"/>
									</td>
								</tr>								
							</tbody>
						</table>	
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
