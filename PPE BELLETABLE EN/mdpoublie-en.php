<?php
include('sessionlogin-en.php');
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

<?php include('header-en.php'); ?>

<body>
	<?php 
		if(isset($erreur)){
			switch($erreur){
				case 1:
					echo'
					<script type="text/javascript">
						sweetAlert("Failed", "Please enter your email Adress", "error");
					</script>';		
				break;
				case 2:
					echo'
					<script type="text/javascript">
						sweetAlert("Failed", "Unknown User !", "error");
					</script>';
				break;
			}
		}
	?>
	<div class="contenupage">
		<div class="container">
			<div class="row formulaireconnect">
				<div class="connexion">
					<h1>Forgot password </h1>
					<form  action="mdpoublie-en.php" id="myform" method="GET" enctype="multipart/form-data">
						<p>Mail Adress*</p>
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