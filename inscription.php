<?php
// include pour session start si utilisateur loggé et le changement de menu si utilisateur loggé et/ou admin.
include('sessionlogin.php');
// Include pour la connexion à la bdd en PDO
include('parametres.php');
// Inclue du header
include('header.php'); 

// Si le mail est empty ou qu'il n'est pas au bon format, on remplit la variable erreur.
if((!isset($_REQUEST['email']))||(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)))
{
	if(isset($erreur))
	{
    	 $erreur = $erreur." \\n L'email n'est pas au bon format";
	}
	
	else
	{
		$erreur = "L'email n'est pas au bon format";
	}

}
// Si le password est vide, on remplit la variable erreur
if(!isset($_REQUEST['password'])||trim($_REQUEST['password'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le password est manquant";
	}

	else
	{
		$erreur = "Le password est manquant";
	}

}

// Si le password de confirmation est vide, on remplit la variable erreur
if(!isset($_REQUEST['confirm'])||trim($_REQUEST['confirm'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le mot de passe de confirmation est manquant";
	}

	else
	{
		$erreur = "Le mot de passe de confirmation est manquant";
	}

}

// si les deux passwords ne correspondent pas, on remplit la variable erreur
if(isset($_REQUEST['confirm'])&&isset($_REQUEST['password'])&&($_REQUEST['confirm'])!=($_REQUEST['password']))
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le mot de passe et le mot de passe de confirmation ne correspondent pas";
	}

	else
	{
		$erreur = "Le mot de passe et le mot de passe de confirmation ne correspondent pas";
	}

}

if(!isset($_REQUEST['civilite'])||trim($_REQUEST['civilite'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n La civilite est manquante";
	}

	else
	{
		$erreur = "La civilite est manquante";
	}

}

if(!isset($_REQUEST['nom'])||trim($_REQUEST['nom'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le nom est manquant";
	}

	else
	{
		$erreur = "Le nom est manquant";
	}

}

if(!isset($_REQUEST['prenom'])||trim($_REQUEST['prenom'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le prenom est manquant";
	}

	else
	{
		$erreur = "Le prenom est manquant";
	}

}

if(!isset($_REQUEST['rue'])||trim($_REQUEST['rue'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n L'adresse est manquante";
	}

	else
	{
		$erreur = "L'adresse est manquante";
	}

}

if(!isset($_REQUEST['cp'])||trim($_REQUEST['cp'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le code postal est manquant";
	}

	else
	{
		$erreur = "Le code postal est manquant";
	}

}

if(!isset($_REQUEST['ville'])||trim($_REQUEST['ville'])==='')
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n La ville est manquante";
	}

	else
	{
		$erreur = "La ville est manquante";
	}

}

if((!isset($_REQUEST['telfixe'])||trim($_REQUEST['telfixe'])==='')&&(!isset($_REQUEST['telportable'])||trim($_REQUEST['telportable'])===''))
{
	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Veuillez renseigner au moins un numéro de télphone";
	}

	else
	{
		$erreur = "Veuillez renseigner au moins un numéro de télphone";
	}

}
// le numéro de téléphone n'est pas au format
else if (!preg_match("/(\+[0-9]{2}\([0-9]\))?[0-9]{10}/", $_REQUEST['telfixe']) && $_REQUEST['telfixe'] != NULL)
 {
 	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le numéro de téléphone renseigné n'est pas au bon format";
	}

	else
	{
		$erreur = "Le numéro de téléphone renseigné n'est pas au bon format";
	}

 }

 else if (!preg_match("#(\+[0-9]{2}\([0-9]\))?[0-9]{10}#", $_REQUEST['telportable']) && $_REQUEST['telportable'] != NULL)
 {
	echo 'Je rentre ici, le num est: telport', $_REQUEST['telportable'];
 	if(isset($erreur))
	{
    	$erreur = $erreur." \\n Le numéro de téléphone renseigné n'est pas au bon format";
	}

	else
	{
		$erreur = "Le numéro de téléphone renseigné n'est pas au bon format";
	}

 }

// si la variable erreur n'est pas vide et que le bouton à été cliqué, on affiche les erreurs en js
if(isset($erreur)&&isset($_POST['bouton']))
{
						echo'
					<script type="text/javascript">
						sweetAlert("Echec","'.$erreur.'","error");
					</script>';
		}

// si le bouton à été cliqué et qu'il n'y a pas d'erreurs, on fait l'assignation des variables
if(isset($_POST['bouton'])&&!isset($erreur))
	{
	
// inscription à la newsletter O = oui N = non
	if(isset($_REQUEST['newsletter']))
	{
		$newsletter = 'O';
	}
	else
	{
		$newsletter = 'N';
	}
	
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
	if($denomsociale == "")
	{
		$denomsociale = NULL;
	}
	$rue='\''.$_REQUEST['rue'].'\'';
	$complement = '\''.$_REQUEST['complement'].'\'';
	if($complement == "")
	{
		$complement = NULL;
	}

	$cp='\''.$_REQUEST['cp'].'\'';
	$ville='\''.$_REQUEST['ville'].'\'';
	$fixe='\''.$_REQUEST['telfixe'].'\'';
	$newsletter = '\''.$newsletter.'\'';
	if($fixe == "")
	{
		$fixe = NULL;
	}

	$portable='\''.$_REQUEST['telportable'].'\'';

	if($portable == "")
	{
		$portable = NULL;
	}
	
	// Toutes les données sont initialisées, on éxecute l'insert des données pour la création du compte.
        $bdd->exec('INSERT INTO t_client (typeclient,nomclient,prenomclient,denomsociale,rueclient,complementadresse,cpclient,villeclient,emailclient,telfixeclient,telportableclient,mdpclient,civiliteclient,newsletter) VALUES ('.$activite.','.$nom.','.$prenom.','.$denomsociale.','.$rue.','.$complement.','.$cp.','.$ville.','.$email.','.$fixe.','.$portable.','.$password.','.$civilite.','.$newsletter.')');

		//On teste si le client à bien été inséré
        $result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$emailbis.'" AND `mdpclient` LIKE "'.$mdpbis.'"');
        // Si ok on crée une variable session
        while($row = $result->fetch()){
            $_SESSION['login'] = $row['numclient'];
        }
        // On redirige sur le panier/les commandes de l'utilisateur.
        echo'
        <script type="text/javascript">
            location.href = \'commandeencours.php\';
        </script>';

	}	
	

?>
	<!-- Le formulaire de création de compte -->
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulaireinscription">
					<form  action="inscription.php" id="myform" method="POST" enctype="multipart/form-data">
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
										<input type="radio" name="civilite" value="1" checked> Madame
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
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter" ><br/><br/><br/>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input name="bouton" type="submit" id="sinscrire" value="Valider" onclick="document.forms[\'myform\'].submit();"/>
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
	
	
	<?php include('footer.php'); ?>

</body>
</html>
