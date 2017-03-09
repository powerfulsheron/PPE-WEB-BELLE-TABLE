<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
include('parametres.php');
$idclient = $_SESSION['login'];
$result = $bdd->query('SELECT * FROM `t_client` WHERE `numclient` LIKE '.$idclient.'');
if(isset($_REQUEST['email'])){
	
    $email=$_REQUEST['email'];
    $lastpassword=$_REQUEST['lastpassword'];
	$newpassword=$_REQUEST['newpassword'];
	$confirm=$_REQUEST['confirm'];
	if(isset($_REQUEST['civilite'])){$civilite = $_REQUEST['civilite'];}else{$civilite = "";}
	$nom=$_REQUEST['nom'];
	$prenom=$_REQUEST['prenom'];
	$activite=$_REQUEST['activite'];
	$denomsociale=$_REQUEST['denomsociale'];
	$rue=$_REQUEST['rue'];
	$complement = $_REQUEST['complement'];
	$cp=$_REQUEST['cp'];
	$ville=$_REQUEST['ville'];
	$fixe=$_REQUEST['telfixe'];
	$portable=$_REQUEST['telportable'];
	
	if(isset($_REQUEST['newsletter'])){
		$newsletter = 'O';
	}
	else{
		$newsletter = 'N';
	}
	echo $newsletter;
	$erreur = 0;
	
	if(isset($fixe)){if(($fixe == null)&&($portable == null)){$erreur = 3;}}
	if(isset($email)){if($email == null){$erreur = 1;}}
	$modificationmdp = false;
	$lastmdp = $_SESSION['mdp'];
	if(($newpassword != "")&&($lastpassword != "")&&($confirm != "")){
        $lastpassword= md5($_REQUEST['lastpassword']);
		if($lastpassword == $lastmdp)
		{
			if(($newpassword != null)&&($confirm != null))
			{
				if($newpassword != $confirm)
				{
					$erreur = 2;
				}
				else{
					$modificationmdp = true;
				}
			}
			else{
				$erreur = 7;
			}
		}
		else{
			$erreur = 6;
		}
	}
	else{
		if(($newpassword != null)&&($lastpassword == null)){
			$erreur = 5;
		}
	}
	if(isset($civilite)){if($civilite == null){$erreur = 1;}}
	if(isset($nom)){if($nom == null){$erreur = 1;}}
	if(isset($prenom)){if($prenom == null){$erreur = 1;}}
	if(isset($activite)){if($activite == null){$erreur = 1;}}
	if(isset($activite)){if(($activite == 'Société')&&($denomsociale == null)){$erreur = 4;}}
	if(isset($rue)){if($rue == null){$erreur = 1;}}
	if(isset($cp)){if($cp == null){$erreur = 1;}}
	if(isset($ville)){if($ville == null){$erreur = 1;}}	
	
	$email='\''.$_REQUEST['email'].'\'';
	if($modificationmdp == true){
		$newpassword='\''.md5($_REQUEST['newpassword']).'\'';
	}
	$civilite = '\''.$_REQUEST['civilite'].'\'';
	$nom='\''.$_REQUEST['nom'].'\'';
	$prenom='\''.$_REQUEST['prenom'].'\'';
	$activite='\''.$_REQUEST['activite'].'\'';
	$denomsociale='\''.$_REQUEST['denomsociale'].'\'';
	if($denomsociale == ""){
		$denomsociale = NULL;
	}
	$rue='\''.$_REQUEST['rue'].'\'';
	$complement='\''.$_REQUEST['complement'].'\'';
	if($complement == ""){
		$complement = NULL;
	}
	$cp='\''.$_REQUEST['cp'].'\'';
	$ville='\''.$_REQUEST['ville'].'\'';
	$fixe='\''.$_REQUEST['telfixe'].'\'';
	if($fixe == ""){
		$fixe = NULL;
	}
	$portable='\''.$_REQUEST['telportable'].'\'';
	if($portable == ""){
		$portable = NULL;
	}
	$newsletter ='\''.$newsletter.'\'';
	if($erreur == 0){
		if($modificationmdp == true){
            $bdd->exec('UPDATE t_client SET
						typeclient='.$activite.',
						nomclient='.$nom.',
						prenomclient='.$prenom.',
						denomsociale='.$denomsociale.',
						rueclient ='. $rue.',
						complementadresse='.$complement.',
						cpclient='.$cp.',
						villeclient='.$ville.',
						emailclient='.$email.',
						telfixeclient='.$fixe.',
						telportableclient='.$portable.',
						mdpclient='.$newpassword.',
						civiliteclient='.$civilite.',
						newsletter='.$newsletter.'
						WHERE numclient = '.$idclient.'');
		}
		else{
            $bdd->exec('UPDATE t_client SET
						typeclient='.$activite.',
						nomclient='.$nom.',
						prenomclient='.$prenom.',
						denomsociale='.$denomsociale.',
						rueclient ='. $rue.',
						complementadresse='.$complement.',
						cpclient='.$cp.',
						villeclient='.$ville.',
						emailclient='.$email.',
						telfixeclient='.$fixe.',
						telportableclient='.$portable.',
						civiliteclient='.$civilite.',
						newsletter='.$newsletter.'
						WHERE numclient = '.$idclient.'');
		}
		
        echo'
        <script type="text/javascript">
            location.href = \'coordonnees.php\';
        </script>';
	}
}
	
?>
<?php include('header-en.php');
		if(isset($erreur)){
			switch($erreur){
				case 1:
					$message = 'All fieds are mandatory exceot for \"Company name\" and \"Additional address\".';	
				break;
				case 2:
					$message = 'Passwords are not identical. ';
				break;
				case 3:
					$message = 'You must at least fill you phone number.';
				break;
				case 4:
					$message = 'All fieds are mandatory exceot for \"Additional address\".';
				break;
				case 5:
					$message = 'You must fill you old password to modify it.';
				break;
				case 6:
					$message = 'Your old password is incorrect.';
				break;
				case 7:
					$message = 'Please confirm your password.';
				break;
			}
			if($erreur != 0){
				echo'
				<script type="text/javascript">
					sweetAlert("Failed", "'.$message.'", "error");
				</script>';	
			}
			
		}
	?>
	
	
	<div class="contenupage">
		<div class="container">
			<div class="sousmenu">
			<br/><br/><br/>
					<div class="list-group">
						<a href="commandeencours-en.php" class="list-group-item">Current Orders </a>
						<a href="commandetermines-en.php" class="list-group-item">Completed Orders</a>
						<a href="coordonnees-en.php" class="list-group-item">Contact Informations</a>
						<a href="deconnexion-en.php" class="list-group-item">Log Off</a>
					</div>
			</div>
			<br/><br/>
			<div class="formulairecoordonnees">
				<form  action="coordonnees-en.php" id="myform" method="GET" enctype="multipart/form-data">
					<table width="100%">
						<thead>
							<tr>
								<th colspan="2"><h1>Contact Informations</h1></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td id="exception"><br/><br/>*Mandatory fields</td>
								<td id="exception"><br/><br/>**Please fill at leatst one on two fields</td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td colspan="2">
									<h2>Log in parameters </h2><br/>
								</td>
							</tr>
							<tr>
							<?php
							while($row = $result->fetch()){
								$_SESSION['mdp'] = $row['mdpclient'];
								echo'
								<td>
									Your email*<br/><br/>
								</td>
								<td>
										<input name="email" type="text" value="'.$row['emailclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Former password <br/><br/>
								</td>
								<td>
									<input name="lastpassword" type="password" value="" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									New password <br/><br/>
								</td>
								<td>
									<input name="newpassword" type="password" value="" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Confirm password <br/><br/>
								</td>
								<td>
									<input name="confirm" type="password" value="" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h2>Personnal Informations </h2><br/>
								</td>
							</tr>
							<tr>
								<td>
									Civility*<br/><br/>
								</td>
								<td>';
									$civilite = $row['civiliteclient'];
									if($civilite == 1){
										echo'
										<input type="radio" name="civilite" value="1" checked> Miss
										<input type="radio" name="civilite" value="2"> Mister<br/><br/>';
									}
									else{
										echo'
										<input type="radio" name="civilite" value="1"> Miss
										<input type="radio" name="civilite" value="2" checked> Lister<br/><br/>';
									}	
								echo'	
								</td>
							</tr>
							<tr>
								<td>
									Name*<br/><br/>
								</td>
								<td>
									<input name="nom" type="text" value="'.$row['nomclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									First name *<br/><br/>
								</td>
								<td>
									<input name="prenom" type="text" value="'.$row['prenomclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Activity*<br/><br/>
								</td>
								<td>';
									$activite = $row['typeclient'];
									if($activite == 1){
										echo'
										<select name="activite" onchange="">
											<option value="1" selected>Particulier</option>
											<option value="2">Société</option>
										</select><br/><br/>';
									}
									else{
										echo'
										<select name="activite" onchange="">
											<option value="1">Individual</option>
											<option value="2" selected>Company</option>
										</select><br/><br/>';
									}	
								echo'
								</td>
							</tr>
							<tr>
								<td>
									Company name <br/><br/>
								</td>
								<td>
									<input name="denomsociale" type="text" value="'.$row['denomsociale'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Adress*<br/><br/>
								</td>
								<td>
									<input name="rue" type="text" value="'.$row['rueclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Additional Adress<br/><br/>
								</td>
								<td>
									<input name="complement" type="text" value="'.$row['complementadresse'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Postal Code*<br/><br/>
								</td>
								<td>
									<input name="cp" type="text" value="'.$row['cpclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									City*<br/><br/>
								</td>
								<td>
									<input name="ville" type="text" value="'.$row['villeclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Phone Number**<br/><br/>
								</td>
								<td>
									<input name="telfixe" type="text" value="'.$row['telfixeclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Mobile Phone Number**<br/><br/>
								</td>
								<td>
									<input name="telportable" type="text" value="'.$row['telportableclient'].'" size="30"/><br/><br/>
								</td>
							</tr>
							<tr>
								<td>
									Newsletter<br/><br/><br/>
								</td>
								<td align="left">';
									if($row['newsletter'] == 'O'){
										echo'
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter" checked><br/><br/><br/>';
									}
									else{
										echo'
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter"><br/><br/><br/>';
									}									
								echo'
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" id="sinscrire" value="Submit" onclick="document.forms[\'myform\'].submit();"/>
								</td>
							</tr>';
							}
						?>
						</tbody> 
					</table>	
				</form>

				
				<br><br>
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>
</html>
