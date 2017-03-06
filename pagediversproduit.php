<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$menuchange = true;
	}	
}
if(isset($_REQUEST['typeproduit'])){$typeproduit = $_REQUEST['typeproduit'];};

include('parametres.php');

$result = $bdd->query('SELECT * FROM `t_gamme` WHERE `numcateg` LIKE '.$typeproduit.'');

?>

<?php include('header.php'); ?>

<body>
<div class="contenupage">
    <div class="container">

        <div class="row">
            <div class="sousmenu">
			<br/><br/><br/>
                <div class="list-group">
                    <a href="pagediversproduit.php?typeproduit=1" class="list-group-item">Assiettes et Tasses</a>
                    <a href="pagediversproduit.php?typeproduit=2" class="list-group-item">Couverts</a>
                    <a href="pagediversproduit.php?typeproduit=3" class="list-group-item">Verres</a>
					<a href="pagediversproduit.php?typeproduit=4" class="list-group-item">Nappes et Serviettes</a>
					<a href="pagediversproduit.php?typeproduit=5" class="list-group-item">Mobilier</a>
					<a href="pagediversproduit.php?typeproduit=6" class="list-group-item">Accessoires</a>
                </div>
            </div>

            <div class="col-md-9">
				
                <div class="row lienproduits">
				<?php
					switch($typeproduit){
						case 1:
							echo'
							<h1 align="center">Nos Assiettes et Tasses</h1><br/>';
						break;
						case 2:
							echo'
							<h1 align="center">Nos Couverts</h1><br/>';
						break;
						case 3:
							echo'
							<h1 align="center">Nos Verres</h1><br/>';
						break;
						case 4:
							echo'
							<h1 align="center">Nos Nappes et Serviettes</h1><br/>';
						break;
						case 5:
							echo'
							<h1 align="center">Notre Mobilier</h1><br/>';
						break;
						case 6:
							echo'
							<h1 align="center">Nos Accessoires</h1><br/>';
						break;
					}
					
					while($row = $result->fetch()){
						echo'
							<div class="encadreproduit">
								<div class="encadre">
									<img src="img/'.$row['refimage'].'" alt="">
									<div class="caption">
										<h4><a href="pageproduitchoix.php?produit='.$row['numgamme'].'">'.$row['nomgamme'].'</a></h4>                         
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
