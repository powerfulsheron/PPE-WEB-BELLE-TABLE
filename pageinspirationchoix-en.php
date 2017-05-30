<?php
include('sessionlogin.php');
if(isset($_REQUEST['inspi'])){$typeinspi = $_REQUEST['inspi'];};


?>

<?php include('header-en.php'); ?>

<body>
<div class="contenupage">
	<br/><img src="img/btnretour.png" width="30px">
	<a href=javascript:history.go(-1)>Back to Inspirations</a><br/><br/>
		<div class="imagetheme">
		<?php
			switch($typeinspi){
				case 1:
					echo'
					<img src="img/themes/theme1.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCENOGRAPHY JEAN-LUC BLAIS</b></p>';
				break;
				case 2:
					echo'
					<img src="img/themes/theme2.jpg" alt="">';
				break;
				case 3:
					echo'
					<img src="img/themes/theme3.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCENOGRAPHY CAROLE NICOLAS / PHOTOGRAPHER ALEXIS BOULLAY</b></p>';
				break;
				case 4:
					echo'
					<img src="img/themes/theme4.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCENOGRAPHY PHILIPPE MODEL / PHOTOGRAPHER ALEXIS BOULLAY</b></p>';
				break;
				case 5:
					echo'
					<img src="img/themes/theme5.jpg" alt="">';
				break;
				case 6:
					echo'
					<img src="img/themes/theme6.jpg" alt="">
					<br/><br/>
					<p align="right"><b>SCENOGRAPHY SOIZIC CHOMEL</b></p>';
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
							<h1>Taupe Atmosphere</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>The "taupe" atmosphere allows you to appreciate the delicacy and elegance of the Hemisphere plates, signed JL Coquet. <br/> You will associate it with the Trianon cutlery, which are noted by their simple line and the finish of the handle money. <br/></p>';					
						break;
						//Thème 2
						case 2:
							echo'
							<h1>Azul Opale</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>The roundness and romance are the words that guided our scenographer in the realization of this staging. <br/> The Azul plate line brings a Mediterranean touch to this table.<br/></p>';					
						break;
						//Thème 3
						case 3:
							echo'
							<h1>Baroque</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>
							<p>Inspire yourself from this golden "baroque" table for festive days and dare a Versace crockery for an extra touch of chic!<br/></p>';					
						break;		
						//Thème 4
						case 4:
							echo'
							<h1>Golden Autumn</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/prestige.png" alt=""></p>';
						break;
						//Thème 5
						case 5:
							echo'
							<h1>Golden Shine</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/haut.png" alt=""></p>
							<p>Opt for the black lacquered table and our golden dishes for a chic dinner!<br/></p>';					
						break;	
						//Thème 6
						case 6:
							echo'
							<h1>Nature Table</h1>
							<p><b>PRICE RANGE</b></p>
							<p><img src="img/gammes/haut.png" alt=""></p>
							<p>For a sophisticated table full of charm, play on assemblies such as the linen tablecloth, Platinium plate line, with its so so classic air, the line of cutlery Nacre, in the same style and the line of glasses Marquis Gold and its gilt edging.<br/></p>';					
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
			<h4><b>THE ART OF THE TABLE</b></h4>
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
									<td width="80%" align="left">Collection of glasses "Arom Up"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=8&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/platinium.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Platinium"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=2&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/napoleonblanv.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Napoléon III Chair</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=15&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/tableronde.jpg" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Round Table</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=20&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 2
							case 2:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/Arom Up.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of glasses "Arom Up"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=8&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/azul.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Azul"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=1&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/rocaille.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Rocaille Candlestick</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=25&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/dossantos.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Dos Santos Bread basket</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=21&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/Lin.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of tablecloths and napkins "Lin"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=11&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/napoleonbleu.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Napoléon III Toscane Chair</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=16&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 3
							case 3:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/volga.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of glasses "Volga"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=10&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/windsor.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Windsor"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=6&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/collazi.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collazi Tealight</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=24&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 4
							case 4:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of glasses "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/trianon.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Trianon"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=4&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/louis.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Louis XVI Saltcellars</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=23&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/andalouse.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of tablecloths and napkins "Andalouse"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=13&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/tablerect.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Rectangular Table</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=18&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 5
							case 5:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of glasses "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/versace.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Versace"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=3&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/soliman.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Soliman"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=7&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/birdy.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Birdy Saltcellars</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=22&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/venise.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of tablecloths and napkins "Venise"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=12&back=inspi\';"></td>
								</tr>';
							break;
							//Thème 6
							case 6:
								echo'
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/verres/MarquiOr.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of glasses "Marquis Or"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=9&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/assiettes/platinium.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of plates and cups "Platinium"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=2&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/couverts/nacre.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of cutlery "Nacre"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=5&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/accessoires/birdy.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Birdy Saltcellars</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=22&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/nappes/Lin.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Collection of tablecloths and napkins "Lin"</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=11&back=inspi\';"></td>
								</tr>
								<tr>
									<td width="10%" class="fondimage" align="center"><img src="img/mobilier/montaigne.png" alt="" width="80px"></th>
									<td width="5%"><td>
									<td width="80%" align="left">Montaigne Chair</th>
									<td width="5%"><input type="button" id="allervoir" value="Go to product details" onclick="location.href=\'pageproduitchoix-en.php?produit=14&back=inspi\';"></td>
								</tr>';
							break;
						}
					?>				
				</tbody>
			</table>	
		</div>
		
    </div>
    
    <?php include('footer-en.php'); ?>

</body>

</html>
