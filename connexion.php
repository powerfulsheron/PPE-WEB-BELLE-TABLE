<?php
include('sessionlogin.php');

include('parametres.php');

include('header.php'); 


date_default_timezone_set('Europe/Paris');

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

if(!isset($erreur))
{
		$result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$_REQUEST['email'].'" AND `mdpclient` LIKE "'.md5($_REQUEST['password']).'"');
		if($result != "")
		{
			while($row = $result->fetch())
			{
				$_SESSION['login'] = $row['numclient'];
			}

			if(isset($_SESSION['login']))
			{

				$datedebut = date('Y-m-d H:i:s');
				$bdd->exec('INSERT INTO t_connexion VALUE(null,'.$_SESSION['login'].',"'.$datedebut.'",null)');
				$_SESSION['datedebut'] = $datedebut;

				echo'
				<script type="text/javascript">
					location.href = \'commandeencours.php\';
				</script>';
			}
			
			else
			{

				if(isset($erreur))
				{
    				$erreur = $erreur." \\n Couple adresse mail/mot de passe erroné";
				}
				else
				{
		    		$erreur = "Couple adresse mail/mot de passe erroné";
				}
			}
		}
	
}
else if(isset($erreur)&&isset($_POST['bouton']))
{

						echo'
					<script type="text/javascript">
						sweetAlert("Echec","'.$erreur.'","error");
					</script>';
		}

?>
	
	<div class="contenupage">
		<div class="container">
			<div class="row formulaireconnect">
				<table width="100%">
					<thead>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="inscription">
									<h1>Créer son Compte</h1>
									<p>Créez votre compte<br/>afin d'effectuer<br/>et de suivre vos commandes.</p><br/>
									<input type="button" id="creercompte" value="Je crée mon compte" onclick="location.href='inscription.php';"/>
									<br><br>
								</div>
							</td>
							
							<td>
								<div class="connexion">
									<h1>Se Connecter</h1>
									<form  action="connexion.php" id="myform" method="POST" enctype="multipart/form-data">
										<p>Adresse Mail*</p>
										<input name="email" type="text" value="" size="30"/><br><br>
										<p>Mot de Passe*</p>
										<input name="password" type="password" value="" size="30"/><br><br>
										<input name="bouton" type="submit" id="seconnecter" value="Connexion" onclick="document.forms[\'myform\'].submit();"/><br/><br/>
										<a href="mdpoublie.php">Mot de passe oublié</a>
									</form>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<br>				
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>
</html>
