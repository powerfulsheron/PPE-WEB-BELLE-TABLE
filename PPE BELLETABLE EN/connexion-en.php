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
				location.href = \'commandeencours-en.php\';
			</script>';
		}
		else{
			$erreur = 4;
		}
		
	}
}
	
?>
<?php include('header-en.php'); ?>

	<?php 
		if(isset($erreur)){
			switch($erreur){
				case 1:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Please enter your email adress", "error");
					</script>';		
				break;
				case 2:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Please enter yout password", "error");
					</script>';
				break;
				case 3:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Please enter your email adress and your password", "error");
					</script>';
				break;
				case 4:
					echo'
					<script type="text/javascript">
						sweetAlert("Echec", "Wrong mail adress or password", "error");
					</script>';
				break;
			}
			if($erreur == 1){
				echo'
				<script type="text/javascript">
					sweetAlert("Echec", "Please enter your email adress", "error");
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
									<h1>Create your account</h1>
									<p>Create your account<br/>in order to do <br/>and follow your orders</p><br/>
									<input type="button" id="creercompte" value="Sign in" onclick="location.href='inscription-en.php';"/>
									<br><br>
								</div>
							</td>
							
							<td>
								<div class="connexion">
									<h1>Log in</h1>
									<form  action="connexion-en.php" id="myform" method="GET" enctype="multipart/form-data">
										<p>Email adress*</p>
										<input name="email" type="text" value="" size="30"/><br><br>
										<p>Password*</p>
										<input name="password" type="password" value="" size="30"/><br><br>
										<input type="submit" id="seconnecter" value="Log In" onclick="document.forms[\'myform\'].submit();"/><br/><br/>
										<a href="mdpoublie-en.php">Forgot password</a>
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

