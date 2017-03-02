<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
	include('parametres.php');
	
if(isset($_REQUEST['search'])){
	if($_REQUEST['search'] != ""){
		$recherche = strtolower($_REQUEST['search']);
		$result = $bdd->query('SELECT * FROM `t_search` WHERE `keyword` LIKE "%'.$recherche.'%"');
		if($result != ""){
			while($row = $result->fetch()){
				$destination = $row['urlsearch'];
				echo'
				<script type="text/javascript">
					location.href = \''.$destination.'\';
				</script>';
			}		
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
    <meta name="author" content="SIOSLAM2017">

    <title>BelleTable - Elegance a la Francaise</title>

    <link href="css/cssbelletable.css" rel="stylesheet">
	<link href="css/carrouselcss.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/carrouselbis.js" type="text/javascript"></script>
	<script src="js/carrousel.js" type="text/javascript"></script>

</head>

<body>
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
				<a href="apropos.php">A Propos</a>
			<li>
				<a href="contact.php">Contact</a>
			<li>
				<?php
				if(isset($menuchange)){
					echo'
					<a href="commandeencours.php">Mon Compte</a>
                    <li>
					<a href="lepanier.php">Mon Panier</a>';
				}
				else{
					echo'
					<a href="connexion.php">Connexion</a>';
				}
				?>
		</ul>
	</div>
	<br/>
	<div class="fondrecherche" align="center">
		<br/>
		<div class="recherche" align="center">
			<form id="myform" method="get" action="index.php" align="center">
				<table width="100%">
				<thead>
					<tr>
						<td width="55%" align="right"><input type="text" name="search" id="search" value="Rechercher un article" onclick="javascript:this.value='';"></td>
						<td width="45%" align="left"><input class="btnrecherche" type="submit" name="rechercher" value=""></td>
					</tr>
				</thead>								
				</table>
			</form>
		</div>
		<br/>
	</div>
	<br/>
	<!--Carrousel -->
	<div id="wrapper">
		<div id="carousel">
			<img src="img/accueil/tablebleu.jpg" alt="tablebleu" width="990" height="450" />
			<img src="img/accueil/tableor.jpg" alt="tableor" width="990" height="450" />
			<img src="img/accueil/tableblanche.jpg" alt="tableblanche" width="990" height="450" />
			<img src="img/themes/theme1.jpg" alt="tablebleu" width="990" height="450" />
			<img src="img/themes/theme5.jpg" alt="tableor" width="990" height="450" />
			<img src="img/themes/theme2.jpg" alt="tableblanche" width="990" height="450" />
		</div>
		<a href="#" id="prev" title="Show previous"> </a>
		<a href="#" id="next" title="Show next"> </a>
		<div id="pager"></div>
	</div>
	
	<div class="divfooter">
        <hr>
        <footer>
			<ul class="footer">
			<li class="lifooter"><a href="mentionlegale.php">Mentions Légales</a></li>
			<li class="lifooter">Copyright &copy; BelleTable 2017</li>
			<li class="lifooter"><a href="doc/CGV.pdf" target="_blank">Conditions générales de vente</a></li>
			</ul>
        </footer>
    </div>

</body>

</html>
