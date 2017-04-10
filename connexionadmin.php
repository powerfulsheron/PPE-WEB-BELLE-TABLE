<?php
include('sessionlogin.php');

include('parametres.php');

include('header.php'); 


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
		$result = $bdd->query('SELECT * FROM `t_user` WHERE `loginuser` LIKE "'.$_REQUEST['login'].'" AND `mdpuser` LIKE "'.md5($_REQUEST['password']).'"');
		if($result != "")
		{
			while($row = $result->fetch())
			{
				$_SESSION['loginadmin'] = $row['iduser'];
			}

			if(isset($_SESSION['loginadmin']))
			{
				echo'
				<script type="text/javascript">
					location.href = \'gestionconnexion.php\';
				</script>';
			}
			
			else
			{

				if(isset($erreur))
				{
    				$erreur = $erreur." \\n Couple login/mot de passe erroné";
				}
				else
				{
		    		$erreur = "Couple login/mot de passe erroné";
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
								<div class="connexion">
									<h1>Se Connecter (Administrateurs)</h1>
									<form  action="connexionadmin.php" id="myform" method="POST" enctype="multipart/form-data">
										<p>Login*</p>
										<input name="login" type="text" value="" size="30"/><br><br>
										<p>Mot de Passe*</p>
										<input name="password" type="password" value="" size="30"/><br><br>
										<input name="bouton" type="submit" id="seconnecter" value="Connexion" onclick="document.forms[\'myform\'].submit();"/><br/><br/>
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
