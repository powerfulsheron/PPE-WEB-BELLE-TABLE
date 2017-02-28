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
						sweetAlert("Echec", "Utilisateur inconnu !", "error");
					</script>';
				break;
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
	
	
	<div class="container">
        <hr>
        <footer>
            <div class="row">
                <div class="encadrefooter">
                    <p>Copyright &copy; BelleTable 2017</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->

</body>
</html>
