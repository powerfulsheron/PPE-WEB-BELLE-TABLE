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
	if($_REQUEST['password'] != ""){
		$password=md5($_REQUEST['password']);
	}
	if(($email=="")||($password=="")){
		if(($email=="")&&($password!="")){
			$erreur = 1;
		}
		elseif(($password=="")&&($email!="")){
			$erreur = 2;
		}
		else{
			$erreur = 3;
		}
	}
    else{
        $result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$email.'" AND `mdpclient` LIKE "'.$password.'"');
		
		if($result != ""){
			while($row = $result->fetch()){
				$_SESSION['login'] = $row['numclient'];
			}
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
				case 3:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Veuillez renseigner votre adresse mail et votre mot de passe", "error");
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
				<a href="#">A Propos</a>
			<li>
				<a href="contact.php">Contact</a>
			<li>
				<?php
				if(isset($menuchange)){
					echo'
					<a href="commandeencours.php">Mon Compte</a>';
				}
				else{
					echo'
					<a href="connexion.php">Connexion</a>';
				}
                if(isset($menuchange2)){
					echo'
                    <li>
					<a href="lepanier.php">Mon Panier</a>';
				}
				?>
		</ul>
	</div>
	<br/>
	
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
									<h1>Créer Votre Compte</h1>
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
