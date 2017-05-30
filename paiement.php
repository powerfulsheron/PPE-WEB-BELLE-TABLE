<?php
include('sessionlogin.php');
include('parametres.php');
include('fonction.php');
date_default_timezone_set('Europe/Paris');

$ladate = date('Y-m-d');

$annee = date('Y');
$mois = date('m');

    
	if(isset($_POST['numcard'])){
		if(isset($_POST['card'])){		
		}
		else{
			$erreur = "Veuillez choisir un type de carte.";	
		}
		if(isset($_POST['numcard'])){
			if($_POST['numcard'] == ""){
				$erreur = "Veuillez renseigner le numéro de carte.";
			}
			else{
				if(preg_match('#^(?=.*[a-z])#', $_POST['numcard'])){
					$erreur = "Veuillez renseigner un numéro de carte correct (16 chiffres).";
				}
				elseif(preg_match('#^(?=.*[A-Z])#', $_POST['numcard'])){
					$erreur = "Veuillez renseigner un numéro de carte correct (16 chiffres).";
				}
				elseif(preg_match('#^(?=.*\W)#', $_POST['numcard'])){
					$erreur = "Veuillez renseigner un numéro de carte correct (16 chiffres).";
				}
				else{
					if((strlen($_POST['numcard'])>16)||(strlen($_POST['numcard'])<16)){
						$erreur = "Veuillez renseigner un numéro de carte correct (16 chiffres).";
					}
				}
			}
		}
		if(isset($_POST['annee'])){
			if($_POST['annee'] == $annee){
				if($_POST['mois'] < $mois){
					$erreur = "La carte n'est plus valide.";
				}
			}
		}
		if(isset($_POST['crypto'])){
			if($_POST['crypto'] == ""){
				$erreur = "Veuillez renseigner le cryptogramme visuel.";
			}
			else{		
				if(preg_match('#^(?=.*[a-z])#', $_POST['crypto'])){
					$erreur = "Veuillez renseigner un cryptogramme visuel correct (voir l'aide fournis).";
				}
				elseif(preg_match('#^(?=.*[A-Z])#', $_POST['crypto'])){
					$erreur = "Veuillez renseigner un cryptogramme visuel correct (voir l'aide fournis).";
				}
				elseif(preg_match('#^(?=.*\W)#', $_POST['crypto'])){
					$erreur = "Veuillez renseigner un cryptogramme visuel correct (voir l'aide fournis).";
				}
				else{
					if((strlen($_POST['crypto'])>3)||(strlen($_POST['crypto'])<3)){
						$erreur = "Veuillez renseigner un cryptogramme visuel correct (voir l'aide fournis).";
					}
				}				
			}
		}
		
		if(isset($erreur)){
			
		}
		else{
			echo'
			<script type="text/javascript">
				location.href = \'resumecommande.php\';
			</script>';
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
    <meta name="author" content="SIOSLAM2017">

    <title>BelleTable - Elegance a la Francaise</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <link href="css/cssbelletable.css" rel="stylesheet">
    <script src="dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	
	<style>
		a.infoBulle em {
			display:none;
		}
		a.infoBulle:hover {
			position: relative; 
			z-index: 100; 
		}
		a.infoBulle:hover em {
			position:absolute;
			display: block;
			width:auto;
			height:auto;
			top: 20px; 
			left: 0; 
			border: 1px solid #808080; 
			font-style: normal; 
			font-weight:normal;
			color: #000;
		}
		a.infoBulle:hover em.imageSeule {border:0;}
		a.infoBulle:hover em img {float:left;margin-right:5px;}
		
	</style>
	
	<script language="javascript">
		function clickcard(numcard){
			document.forms[0].card[numcard].checked=true;
		}
	</script>
    
</head>
<body>
	<?php
		if(isset($erreur)){
			echo'
				<script type="text/javascript">
					sweetAlert("Echec","'.$erreur.'","error");
				</script>';
		}
	
	?>
	<div>
		<h1>DONNEES DE PAIEMENT</h1>
		
		<fieldset>
		<?php
		echo'
		<p><b><u>Prix TTC</u> :</b>'.$_SESSION['totalcommande'].' €</p><br/>';
		?>

		<form name="myform" id="myform" action="paiement.php" method="post">
			<p><b>Type de carte</b></p>
			<input type="radio" name="card" id="cb" value="cb"><a onclick="clickcard(0)"><img src="img/cartes/cb.png" alt=""></a>
			<input type="radio" name="card" id="visa" value="visa"><a onclick="clickcard(1)"><img src="img/cartes/visa.png" alt=""></a>
			<input type="radio" name="card" id="master" value="master"><a onclick="clickcard(2)"><img src="img/cartes/master.png" alt=""></a>
			<input type="radio" name="card" id="american" value="american"><a onclick="clickcard(3)"><img src="img/cartes/american.png" alt=""></a><br/><br/>
		
			<p><b>Numéro de carte</b></p>
			<input name="numcard" type="text" value="" size="30"/><br/><br/>
			<p><b>Date de fin de validité</b></p>
			<select id="mois" name="mois" onchange="">
			<?php
			switch($mois){
				case '01':
					echo'
					<option value="01" selected>01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '02':
				echo'
					<option value="01">01</option>
					<option value="02" selected>02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '03':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03"selected>03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '04':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04" selected>04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '05':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05" selected>05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '06':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06" selected>06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '07':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07" selected>07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '08':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08" selected>08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '09':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09" selected>09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '10':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10" selected>10</option>
					<option value="11">11</option>
					<option value="12">12</option>';
				break;
				case '11':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11" selected>11</option>
					<option value="12">12</option>';
				break;
				case '12':
				echo'
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12" selected>12</option>';
				break;
			}
				
			?>
			</select>
			<select id="annee" name="annee" onchange="">
			<?php
			echo'
				<option value="'.$annee.'" selected>'.$annee.'</option>
				<option value="'.($annee + 1).'">'.($annee + 1).'</option>
				<option value="'.($annee + 2).'">'.($annee + 2).'</option>
				<option value="'.($annee + 3).'">'.($annee + 3).'</option>
				<option value="'.($annee + 4).'">'.($annee + 4).'</option>
				<option value="'.($annee + 5).'">'.($annee + 5).'</option>
				<option value="'.($annee + 6).'">'.($annee + 6).'</option>';
			?>
			</select><br/><br/>
			
			<p><b>Cryptogramme visuel</b></p>
			<input name="crypto" type="text" value="" size="30"/>&nbsp;
			<a class="infoBulle" style="border-bottom:0;float:center; margin:0;vertical-align:text-bottom;">
			<em class="bg_c7">
				<img src="img/cartes/cryptogramme.jpg" alt="">
			</em><img src="img/quest.png" alt="" width="20px" height="20px"></a><br/><br/>
			<input type="submit" id="payer" value="Payer" onclick="document.forms[\'myform\'].submit();"/>
		</form>
		</fieldset>
	</div>
</body>

</html>