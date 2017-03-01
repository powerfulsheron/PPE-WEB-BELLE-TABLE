<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
include('parametres.php');

$idclient = $_SESSION['login'];

$result = $bdd->query('SELECT * FROM `t_client` WHERE `numclient` LIKE '.$idclient.'');

if(isset($_REQUEST['email'])){
	
    $email=$_REQUEST['email'];
    $lastpassword=$_REQUEST['lastpassword'];
	$newpassword=$_REQUEST['newpassword'];
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
	echo $newsletter;
	$erreur = 0;
	
	if(isset($fixe)){if(($fixe == null)&&($portable == null)){$erreur = 3;}}
	if(isset($email)){if($email == null){$erreur = 1;}}
	$modificationmdp = false;
	$lastmdp = $_SESSION['mdp'];
	if(($newpassword != "")&&($lastpassword != "")&&($confirm != "")){
        $lastpassword= md5($_REQUEST['lastpassword']);
		if($lastpassword == $lastmdp)
		{
			if(($newpassword != null)&&($confirm != null))
			{
				if($newpassword != $confirm)
				{
					$erreur = 2;
				}
				else{
					$modificationmdp = true;
				}
			}
			else{
				$erreur = 7;
			}
		}
		else{
			$erreur = 6;
		}
	}
	else{
		if(($newpassword != null)&&($lastpassword == null)){
			$erreur = 5;
		}
	}
	if(isset($civilite)){if($civilite == null){$erreur = 1;}}
	if(isset($nom)){if($nom == null){$erreur = 1;}}
	if(isset($prenom)){if($prenom == null){$erreur = 1;}}
	if(isset($activite)){if($activite == null){$erreur = 1;}}
	if(isset($activite)){if(($activite == 'Société')&&($denomsociale == null)){$erreur = 4;}}
	if(isset($rue)){if($rue == null){$erreur = 1;}}
	if(isset($cp)){if($cp == null){$erreur = 1;}}
	if(isset($ville)){if($ville == null){$erreur = 1;}}	
	
	$email='\''.$_REQUEST['email'].'\'';
	if($modificationmdp == true){
		$newpassword='\''.md5($_REQUEST['newpassword']).'\'';
	}
	$civilite = '\''.$_REQUEST['civilite'].'\'';
	$nom='\''.$_REQUEST['nom'].'\'';
	$prenom='\''.$_REQUEST['prenom'].'\'';
	$activite='\''.$_REQUEST['activite'].'\'';
	$denomsociale='\''.$_REQUEST['denomsociale'].'\'';
	if($denomsociale == ""){
		$denomsociale = NULL;
	}
	$rue='\''.$_REQUEST['rue'].'\'';
	$complement='\''.$_REQUEST['complement'].'\'';
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
	$newsletter ='\''.$newsletter.'\'';
	if($erreur == 0){
		if($modificationmdp == true){
            $bdd->exec('UPDATE t_client SET
						typeclient='.$activite.',
						nomclient='.$nom.',
						prenomclient='.$prenom.',
						denomsociale='.$denomsociale.',
						rueclient ='. $rue.',
						complementadresse='.$complement.',
						cpclient='.$cp.',
						villeclient='.$ville.',
						emailclient='.$email.',
						telfixeclient='.$fixe.',
						telportableclient='.$portable.',
						mdpclient='.$newpassword.',
						civiliteclient='.$civilite.',
						newsletter='.$newsletter.'
						WHERE numclient = '.$idclient.'');
		}
		else{
            $bdd->exec('UPDATE t_client SET
						typeclient='.$activite.',
						nomclient='.$nom.',
						prenomclient='.$prenom.',
						denomsociale='.$denomsociale.',
						rueclient ='. $rue.',
						complementadresse='.$complement.',
						cpclient='.$cp.',
						villeclient='.$ville.',
						emailclient='.$email.',
						telfixeclient='.$fixe.',
						telportableclient='.$portable.',
						civiliteclient='.$civilite.',
						newsletter='.$newsletter.'
						WHERE numclient = '.$idclient.'');
		}
		
        echo'
        <script type="text/javascript">
            location.href = \'coordonnees.php\';
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
				case 5:
					$message = 'Vous devez renseigner votre ancien Mot de Passe pour pouvoir le modifier.';
				break;
				case 6:
					$message = 'Votre Ancien mot de passe est incorrect.';
				break;
				case 7:
					$message = 'Merci de confirmer votre mot de passe.';
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
			<div class="sousmenu">
			<br/><br/><br/>
				<div class="list-group">
					<a href="commandeencours.php" class="list-group-item">Mes Commandes En Cours</a>
					<a href="commandetermines.php" class="list-group-item">Mes Commandes Terminées</a>
					<a href="coordonnees.php" class="list-group-item">Mes Coordonnées</a>
					<a href="deconnexion.php" class="list-group-item">Déconnexion</a>
				</div>
			</div>
			<br/><br/>
			<div class="formulairecoordonnees">
				<form  action="coordonnees.php" id="myform" method="GET" enctype="multipart/form-data">
					<table width="100%">
						<thead>
							<tr>
								<th colspan="2"><h1>Mes Coordonnées</h1></th>
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
							<?php
							while($row = $result->fetch()){
								$_SESSION['mdp'] = $row['mdpclient'];
								echo'
								<td>
									Votre Email*<br/><br/>
								</td>
								<td>
										<input name="email" type="text" value="'.$row['emailclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Ancien Mot de Passe<br/><br/>
								</td>
								<td>
									<input name="lastpassword" type="password" value="" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Nouveau Mot de Passe<br/><br/>
								</td>
								<td>
									<input name="newpassword" type="password" value="" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Confirmation Mot de Passe<br/><br/>
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
								<td>';
									$civilite = $row['civiliteclient'];
									if($civilite == 1){
										echo'
										<input type="radio" name="civilite" value="1" checked> Madame
										<input type="radio" name="civilite" value="2"> Monsieur<br/><br/>';
									}
									else{
										echo'
										<input type="radio" name="civilite" value="1"> Madame
										<input type="radio" name="civilite" value="2" checked> Monsieur<br/><br/>';
									}	
								echo'	
								</td>
							</tr>
							<tr>
								<td>
									Nom*<br/><br/>
								</td>
								<td>
									<input name="nom" type="text" value="'.$row['nomclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Prénom*<br/><br/>
								</td>
								<td>
									<input name="prenom" type="text" value="'.$row['prenomclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Activité*<br/><br/>
								</td>
								<td>';
									$activite = $row['typeclient'];
									if($activite == 1){
										echo'
										<select name="activite" onchange="">
											<option value="1" selected>Particulier</option>
											<option value="2">Société</option>
										</select><br/><br/>';
									}
									else{
										echo'
										<select name="activite" onchange="">
											<option value="1">Particulier</option>
											<option value="2" selected>Société</option>
										</select><br/><br/>';
									}	
								echo'
								</td>
							</tr>
							<tr>
								<td>
									Dénomination sociale<br/><br/>
								</td>
								<td>
									<input name="denomsociale" type="text" value="'.$row['denomsociale'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Adresse*<br/><br/>
								</td>
								<td>
									<input name="rue" type="text" value="'.$row['rueclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Complément Adresse<br/><br/>
								</td>
								<td>
									<input name="complement" type="text" value="'.$row['complementadresse'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Code Postal*<br/><br/>
								</td>
								<td>
									<input name="cp" type="text" value="'.$row['cpclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Ville*<br/><br/>
								</td>
								<td>
									<input name="ville" type="text" value="'.$row['villeclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Téléphone Fixe**<br/><br/>
								</td>
								<td>
									<input name="telfixe" type="text" value="'.$row['telfixeclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Téléphone Portable**<br/><br/>
								</td>
								<td>
									<input name="telportable" type="text" value="'.$row['telportableclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Newsletter<br/><br/><br/>
								</td>
								<td align="left">';
									if($row['newsletter'] == 'O'){
										echo'
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter" checked><br/><br/><br/>';
									}
									else{
										echo'
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter"><br/><br/><br/>';
									}									
								echo'
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" id="sinscrire" value="Valider" onclick="document.forms[\'myform\'].submit();"/>
								</td>
							</tr>';
							}
						?>
						</tbody>
					</table>	
				</form>

				
				<br><br>
			</div>
		</div>		
	</div>
	
	
	<div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="encadrefooter">
			<ul class="footer">
			<li><a href="mentionlegale.php">Mentions Légales</a>
			<li>&nbsp;
			<li><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a>
			</ul>
			<br/>
			<p>Copyright &copy; BelleTable 2017</p>
		</div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

</body>
</html>
