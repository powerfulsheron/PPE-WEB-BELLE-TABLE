<?php
include('sessionlogin.php');
include('header.php'); 
include('parametres.php');
include('fonction.php');

if(!isset($_SESSION['login']) && empty($_SESSION['login']))
{
	echo '<body>
	<html>
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
										<h1>Administraion</h1>
										<form  action="" id="myform" method="POST" enctype="multipart/form-data">
											<p>Login:</p>
											<input name="login" type="text" value="" size="30"/><br><br>
											<p>Password:</p>
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
		</div>';
}

else if(isset($_SESSION['login']))
{
echo '<html>
	<body>
	<div class="contenupage">
		<div class="container">
			<div class="row">
			<h1 align="center">Espace administration<h1>
				<div class="paneladmin">
				<p>
				<a href="addproduct.php">Ajouter un produit</a> </br>
				<a href="gescommande.php">Gerer les commandes en attente</a> </br>
				<a href="gesclient.php">Gerer les comptes clients</a> </br> </br> </br>
				Il y a ';
				$nbclients = nbclients($bdd);
				echo $nbclients['nbclients'],' clients dans la base.
				</p>
				</div>
			</div>	
		</div>			
	</div>
		</body>';
}


	include('footer.php');
?>




<?php
if(!isset($_REQUEST['login']))
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
		$result = $bdd->query('SELECT * FROM `t_user` WHERE `loginuser` LIKE "'.$_REQUEST['login'].'" AND `mdpuser` LIKE "'.md5($_REQUEST['password']).'"');
		if($result != "")
		{
			while($row = $result->fetch())
			{
				$_SESSION['login'] = $row['loginuser'];
			}

			if(isset($_SESSION['login']))
			{
				
					echo'
					<script type="text/javascript">
						location.href = \'admin.php\';
					</script>';
				
			}
			
			else
			{
				$erreur = " \\n Couple login/mot de passe erroné";
				
			}
		}
	
}
if(isset($erreur)&&isset($_POST['bouton']))
{

						echo'
					<script type="text/javascript">
						sweetAlert("Echec","'.$erreur.'","error");
					</script>';
		}

?>
