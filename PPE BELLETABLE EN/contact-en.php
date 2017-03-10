<?php
session_start();
include('fonction.php');
if(isset($_SESSION['login'])){
	$menuchange = true;
}
if(isset($_POST['email'])){
	$nom=$_POST['nom'];
    $email=$_POST['email'];
	$numero=$_POST['numero'];
    $message=$_POST['message'];
    if (($nom=="")||($email=="")||($message=="")){
	}
	$verif = Contact($email,$numero,$message,$nom);
}
	
?>
<!DOCTYPE html>
<html lang="fr">

<?php include('header-en.php'); ?>

<body>
	 <br/>
	<div id="menuprincipal" align="center">
		<ul class="barremenu">
		<li>
				<a href="index-en.php"><img src="img/logo.png" alt="" width="150px"></a>	
			<li>
				<a href="pageproduits-en.php">Our Products</a>
			<li>
				<a href="pageinspi-en.php">Our Inspirations </a>
			<li>
				<a href="apropos-en.php">About Us</a>
			<li>
				<a href="contact-en.php">Contact</a>
			<li>
				<?php
				if(isset($menuchange)){
					echo'
					<a href="commandeencours-en.php">Account</a>
                    <li>
					<a href="lepanier-en.php">Basket</a>';
				}
				else{
					echo'
					<a href="connexion-en.php">Log in</a>';
				}
                
				?>
		</ul>
	</div>
	<br/>
	
	<div class="contenupage">
		<div class="container">
			<div class="row">
				<div class="formulairenevoi">
					<h1>Contact Us</h1>
					<p>To contact us please fill the following Form.</p><br/>
					<form  action="contact-en.php" id="myform" method="POST" enctype="multipart/form-data">
						<p>Your Name and First Name </p>
						<input name="nom" type="text" value="" size="30"/><br><br>
						<p>Your Email :</p>
						<input name="email" type="text" value="" size="30"/><br><br>
						<p>Your Phone Number :</p>
						<input name="numero" type="text" value="" size="30"/><br><br>
						<p>Your Message :</p>
						<textarea name="message" rows="7" cols="35"></textarea><br><br>
						<input type="submit" id="envoimail" value="Send" onclick="document.forms[\'form\'].submit();"/>

					</form>
					<br><br>
				</div>
			</div>
		</div>		
	</div>
<?php include('footer.php'); ?>
</body>

</html>

