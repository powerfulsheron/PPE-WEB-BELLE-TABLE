<?php
include('sessionlogin.php');

include('parametres.php');

if(isset($_REQUEST['email'])){
	$erreur = 0;
    $email=$_REQUEST['email'];
	if($email == ""){
		$erreur = 1;
	}
	if(isset($_REQUEST['password'])){
		if($_REQUEST['password'] != ""){
			$password=md5($_REQUEST['password']);
		}
		else{
			$erreur = 2;
		}
	}
	else{
		$erreur = 2;
	}
	if($erreur == 0){
		$result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$email.'" AND `mdpclient` LIKE "'.$password.'"');
		if($result != ""){
			while($row = $result->fetch()){
				$_SESSION['login'] = $row['numclient'];
			}
			if(isset($_SESSION['login'])){
				echo'
				<script type="text/javascript">
					location.href = \'commandeencours.php\';
				</script>';
			}
			else{
				$erreur = 4;
			}
		}
	}
}
	
?>
<?php include('header.php'); ?>

	<?php 
		if(isset($erreur)){
			switch($erreur){
				case 1:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Veuillez renseigner votre adresse mail", "error");
					</script>';		
				break;
				case 2:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Veuillez renseigner votre mot de passe", "error");
					</script>';
				break;
				case 4:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Couple adresse mail/mot de passe erroné", "error");
					</script>';
				break;
			}
			if($erreur == 1){
				echo'
				<script type="text/javascript">
					sweetAlert("Echec", "Veuillez renseigner votre adresse mail", "error");
				</script>';	
			}
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
									<form  action="connexion.php" id="myform" method="GET" enctype="multipart/form-data">
										<p>Adresse Mail*</p>
										<input name="email" type="text" value="" size="30"/><br><br>
										<p>Mot de Passe*</p>
										<input name="password" type="password" value="" size="30"/><br><br>
										<input type="submit" id="seconnecter" value="Connexion" onclick="document.forms[\'myform\'].submit();"/><br/><br/>
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
