<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
if(isset($_REQUEST['inspi'])){$typeinspi = $_REQUEST['inspi'];};


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
     <link href="css/carousel.css" rel="stylesheet">

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
				<a href="#">A Propos</a>
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

<div class="contenupage">
	<br/><img src="img/btnretour.png" width="30px">
	<a href=javascript:history.go(-1)>Retour à Inspirations</a><br/><br/>
		<div class="imagetheme">
		<?php
			switch($typeinspi){
				case 1:
					echo'
					<img src="img/thèmes/theme1.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCÉNOGRAPHIE JEAN-LUC BLAIS</b></p>';
				break;
				case 2:
					echo'
					<img src="img/thèmes/theme2.jpg" alt="">';
				break;
				case 3:
					echo'
					<img src="img/thèmes/theme3.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCÉNOGRAPHIE CAROLE NICOLAS / PHOTOGRAPHE ALEXIS BOULLAY</b></p>';
				break;
				case 4:
					echo'
					<img src="img/thèmes/theme4.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCÉNOGRAPHIE PHILIPPE MODEL / PHOTOGRAPHE ALEXIS BOULLAY</b></p>';
				break;
				case 5:
					echo'
					<img src="img/thèmes/theme5.jpg" alt="">';
				break;
				case 6:
					echo'
					<img src="img/thèmes/theme6.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCÉNOGRAPHIE SOIZIC CHOMEL</b></p>';
				break;								
			}
		?>
		</div>
	<div class="container">
        <div class="row">
			<div class="grostitres">
				<?php
					switch($typeinspi){
						//Thème 1
						case 1:
							echo'
							<h1>Ambiance Taupe</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>L\'ambiance "taupe” vous permet d\'apprécier la finesse et l’élégance des assiettes Hémisphère, signée J.L Coquet.<br/>Vous l’associerez aux couverts Trianon, qui se remarquent par leur ligne simple et la finition du manche argent.<br/></p>';					
						break;
						//Thème 2
						case 2:
							echo'
							<h1>Azul Opal</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>La rondeur et le romantisme sont les mots qui ont guidé notre scénographe dans la réalisation de cette mise en scène. <br/>La ligne d’assiettes Azul apporte une tonalité méditerranéenne à cette table.<br/></p>';					
						break;
						//Thème 3
						case 3:
							echo'
							<h1>Baroque</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>Inspirez-vous de cette table "baroque" dorée pour les jours de fêtes et osez une vaisselle Versace pour une touche de chic supplémentaire!<br/></p>';					
						break;		
						//Thème 4
						case 4:
							echo'
							<h1>Dorure d\'Automne</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>';
						break;
						//Thème 5
						case 5:
							echo'
							<h1>Reflet Doré</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/haut.png" alt=""></p>
							<p>Optez pour la table laquée noire et notre vaisselle dorée pour un dîner chic!<br/></p>';					
						break;	
						//Thème 6
						case 6:
							echo'
							<h1>Table Nature</h1>
							<p><b>GAMME DE PRIX</b></p>
							<p><img src="img/gammes/haut.png" alt=""></p>
							<p>Pour une table sophistiquée et pleine de charme, jouez sur des assemblages tels que la nappe Lin, la ligne d\'assiettes Platinium, avec son petit air "so classic", la ligne de couverts Nacre, dans le même style et la ligne de verres Marqui Or et son liseret doré.<br/></p>';					
						break;
					}
				?>
				<br/>	
			</div>
		</div>
	</div>
</div>
<div class="basdepage">
    <div class="container">

        <div class="row">
			<h4><b>L'ART DE LA TABLE</b></h4>
			<table class="inspi">
				<thead>
				</thead>
				<tfoot>
					<tr><td colspan="3">&nbsp;</td></tr>
				</tfoot>
				<tbody>
					<?php
						switch($typeinspi){
							//Thème 1
							case 1:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/Arom Up.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Arom Up"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=8&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/platinium.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Platinium"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=2&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/napoleonblanv.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Chaise Napoléon III</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=15&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/tableronde.jpg" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Table Ronde</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=20&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 2
							case 2:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/Arom Up.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Arom Up"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=8&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/azul.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Azul"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=1&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/rocaille.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Bougeoir Rocaille</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=25&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/dossantos.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Panier à pain Dos Santos</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=21&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/Lin.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de nappes et serviettes "Lin"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=11&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/napoleonbleu.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Chaise Napoléon III Toscane</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=16&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 3
							case 3:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/volga.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Volga"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=10&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/windsor.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Windsor"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=6&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/collazi.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Photophore Collazi</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=24&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 4
							case 4:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/louis.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Salerons Louis XVI</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=23&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/andalouse.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de nappes et serviettes "Andalouse"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=13&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/tablerect.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Table Rectangulaire</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=18&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 5
							case 5:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/soliman.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Soliman"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=7&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/birdy.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Salerons Birdy</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=22&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/venise.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de nappes et serviettes "Venise"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=12&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 6
							case 6:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de verres "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/platinium.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection d\'assiettes et tasses "Platinium"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=2&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/nacre.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de couverts "Nacre"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=5&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/birdy.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Salerons Birdy</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=22&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/Lin.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection de nappes et serviettes "Lin"</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=11&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/montaigne.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Chaise Montaigne</th>
									<td width="5%"><input type="button" id="allervoir" value="Aller à la fiche produit" onclick="location.href=\'pageproduitchoix.php?produit=14&back=inspi\';"></td>
								</tr>';
							break;
						}
					?>				
				</tbody>
			</table>	
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
