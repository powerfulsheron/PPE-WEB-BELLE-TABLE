<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}

include('parametres.php');
include('fonction.php');

if(isset($_REQUEST['email'])){
    $email=$_REQUEST['email'];
	if($email==""){
		$erreur = 1;
	}
    else{
        $result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$email.'"');
		
		if($result != ""){
			while($row = $result->fetch()){
				$idclient = $row['numclient'];
			}
			$mdpgenere = '\''.md5(MdpOublie($email)).'\'';
			$bdd->exec('UPDATE t_client SET mdpclient='.$mdpgenere.' WHERE numclient = '.$idclient.'');
		}
		else{
			$erreur = 2;
		}
		
	}
}
	
?>

<?php include('header.php'); ?>

<body>
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
						sweetAlert("Echec", "Utilisateur inconnu !", "error");
					</script>';
				break;
			}
		}
	?>
	<div class="contenupage">
		<div class="container">
			<div class="row formulaireconnect">
				<div class="connexion">
					<h1>Mot de Passe Oublié</h1>
					<form  action="mdpoublie.php" id="myform" method="GET" enctype="multipart/form-data">
						<p>Adresse Mail*</p>
						<input name="email" type="text" value="" size="30"/><br><br>
						<input type="submit" id="seconnecter" value="Connexion" onclick="document.forms[\'myform\'].submit();"/><br/><br/>
					</form>
				</div>
				<br>				
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>
</html>
