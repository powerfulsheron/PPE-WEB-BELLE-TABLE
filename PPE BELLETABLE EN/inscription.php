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
    $password=$_REQUEST['password'];
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
	$erreur = 0;
	
	if(isset($fixe)){if(($fixe == null)&&($portable == null)){$erreur = 3;}}
	if(isset($email)){if($email == null){$erreur = 1;}}
	if(isset($password)){if($password == null){$erreur = 1;}}
	if(isset($confirm)){if($confirm == null){$erreur = 1;}}
	if(($password != null)&&($confirm != null)){if($password != $confirm){$erreur = 2;}}
	if(isset($civilite)){if($civilite == null){$erreur = 1;}}
	if(isset($nom)){if($nom == null){$erreur = 1;}}
	if(isset($prenom)){if($prenom == null){$erreur = 1;}}
	if(isset($activite)){if($activite == null){$erreur = 1;}}
	if(isset($activite)){if(($activite == 2)&&($denomsociale == null)){$erreur = 4;}}
	if(isset($rue)){if($rue == null){$erreur = 1;}}
	if(isset($cp)){if($cp == null){$erreur = 1;}}
	if(isset($ville)){if($ville == null){$erreur = 1;}}	
	
	$email='\''.$_REQUEST['email'].'\'';
	$emailbis = $_REQUEST['email'];
	$password='\''.md5($_REQUEST['password']).'\'';
	$mdpbis = md5($_REQUEST['password']);
	$confirm=md5($_REQUEST['confirm']).'\'';
	$civilite = '\''.$_REQUEST['civilite'].'\'';
	$nom='\''.$_REQUEST['nom'].'\'';
	$prenom='\''.$_REQUEST['prenom'].'\'';
	$activite='\''.$_REQUEST['activite'].'\'';
	$denomsociale='\''.$_REQUEST['denomsociale'].'\'';
	if($denomsociale == ""){
		$denomsociale = NULL;
	}
	$rue='\''.$_REQUEST['rue'].'\'';
	$complement = '\''.$_REQUEST['complement'].'\'';
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
	
	if($erreur == 0){
		
        $bdd->exec('INSERT INTO t_client (typeclient,nomclient,prenomclient,denomsociale,rueclient,complementadresse,cpclient,villeclient,emailclient,telfixeclient,telportableclient,mdpclient,civiliteclient,newsletter) VALUES ('.$activite.','.$nom.','.$prenom.','.$denomsociale.','.$rue.','.$complement.','.$cp.','.$ville.','.$email.','.$fixe.','.$portable.','.$password.','.$civilite.','.$newsletter.')');
		//Envoi des requêtes
        $result = $bdd->query('SELECT * FROM `t_client` WHERE `emailclient` LIKE "'.$emailbis.'" AND `mdpclient` LIKE "'.$mdpbis.'"');
        while($row = $result->fetch()){
            $_SESSION['login'] = $row['numclient'];
        }
        echo'
        <script type="text/javascript">
            location.href = \'commandeencours-en.php\';
        </script>';
	}	
}
	
?>
<?php include('header-en.php'); ?>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulaireinscription">
					<form  action="inscription-en.php" id="myform" method="GET" enctype="multipart/form-data">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="2"><h1>Inscription</h1></th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td id="exception"><br/><br/>*Mandatory fields</td>
									<td id="exception"><br/><br/>**Fill at least one of this two fields </td>
								</tr>
							</tfoot>
							<tbody>
								<tr>
									<td colspan="2">
										<h2>Log in parameters</h2><br/>
									</td>
								</tr>
								<tr>
									<td>
										Your email*<br/><br/>
									</td>
									<td>
										<input name="email" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Password*<br/><br/>
									</td>
									<td>
										<input name="password" type="password" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Confirm Password* <br/><br/>
									</td>
									<td>
										<input name="confirm" type="password" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<h2>Personnal Informations</h2><br/>
									</td>
								</tr>
								<tr>
									<td>
										Civility*<br/><br/>
									</td>
									<td>
										<input type="radio" name="civilite" value="1"> Miss
										<input type="radio" name="civilite" value="2"> Mister<br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Name*<br/><br/>
									</td>
									<td>
										<input name="nom" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										First Name*<br/><br/>
									</td>
									<td>
										<input name="prenom" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Activity*<br/><br/>
									</td>
									<td>
										<select name="activite" onchange="">
											<option value="1">Particulier</option>
											<option value="2">Société</option>
										</select><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Company name <br/><br/>
									</td>
									<td>
										<input name="denomsociale" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Adress*<br/><br/>
									</td>
									<td>
										<input name="rue" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Addictional Adress<br/><br/>
									</td>
									<td>
										<input name="complement" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Postal Code*<br/><br/>
									</td>
									<td>
										<input name="cp" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										City*<br/><br/>
									</td>
									<td>
										<input name="ville" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Phone Number **<br/><br/>
									</td>
									<td>
										<input name="telfixe" type="text" value="" size="30"/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Mobile Phone Number **<br/><br/><br/>
									</td>
									<td>
										<input name="telportable" type="text" value="" size="30"/><br/><br/><br/>
									</td>
								</tr>
								<tr>
									<td>
										Newsletter<br/><br/><br/>
									</td>
									<td>
										<input type="checkbox" id="newsletter" name="newsletter" value="newsletter" >
									</td>
								</tr>
								<tr>
									<td colspan="2">

										<input type="submit" id="sinscrire" value="Ok" onclick="document.forms[\'myform\'].submit();"/>

									</td>
								</tr>								
							</tbody>
						</table>	
					</form>

					
					<br><br>
				</div>
			</div>
		</div>		
	</div>
	
	
	<?php include('footer.php'); ?>

</body>

</html>

