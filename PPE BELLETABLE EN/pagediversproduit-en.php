<?php
include('sessionlogin-en.php');
if(isset($_REQUEST['typeproduit'])){$typeproduit = $_REQUEST['typeproduit'];};
include('parametres.php');
$result = $bdd->query('SELECT * FROM `t_gamme` WHERE `numcateg` LIKE '.$typeproduit.'');
?>

<?php include('header-en.php'); ?>

<body>
<div class="contenupage">
    <div class="container">

        <div class="row">
            <div class="sousmenu">
			<br/><br/><br/>
                <div class="list-group">
                    <a href="pagediversproduit.php?typeproduit=1" class="list-group-item">Plates and Cups</a>
                    <a href="pagediversproduit.php?typeproduit=2" class="list-group-item">Cutlery</a>
                    <a href="pagediversproduit.php?typeproduit=3" class="list-group-item">Glasses</a>
					<a href="pagediversproduit.php?typeproduit=4" class="list-group-item">Table Clothing and Napkins</a>
					<a href="pagediversproduit.php?typeproduit=5" class="list-group-item">Furniture</a>
					<a href="pagediversproduit.php?typeproduit=6" class="list-group-item">Accessories</a>
                </div>
            </div>

            <div class="col-md-9">
				
                <div class="row lienproduits">
				<?php
					switch($typeproduit){
						case 1:
							echo'
							<h1 align="center">Our Plates and Cups</h1><br/>';
						break;
						case 2:
							echo'
							<h1 align="center">Our Cutlery</h1><br/>';
						break;
						case 3:
							echo'
							<h1 align="center">Our Glasses</h1><br/>';
						break;
						case 4:
							echo'
							<h1 align="center">Our Table Clothing and Napkins</h1><br/>';
						break;
						case 5:
							echo'
							<h1 align="center">Our Furniture</h1><br/>';
						break;
						case 6:
							echo'
							<h1 align="center">Our Accessories</h1><br/>';
						break;
					}
					
					while($row = $result->fetch()){
						echo'
							<div class="encadreproduit">
								<div class="encadre">
									<img src="img/'.$row['refimage'].'" alt="">
									<div class="caption">
										<h4><a href="pageproduitchoix-en.php?produit='.$row['numgamme'].'">'.$row['nomgamme'].'</a></h4>                         
									</div>               
								</div>
							</div>';
					}
				?>
                          
                </div>

            </div>

        </div>

    </div>
    
<?php include('footer.php'); ?>

</body>

</html>