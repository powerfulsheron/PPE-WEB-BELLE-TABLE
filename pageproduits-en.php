<?php
include('sessionlogin.php');	
?>

<?php include('header-en.php'); ?>

<body>
<div class="contenupage">
    <div class="container">

        <div class="row">
            <div class="lienproduits">
				
				<h1 align="center">Our Products</h1><br/>
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/assiettes/assiettes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=1">Plates and Cup</a></h4>                         
						</div>               
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/couverts/couverts.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=2">Cutlery</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/verres/verres.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=3">Glasses</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/nappes/nappes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=4">Tablecloths and Napkin</a></h4>
						</div>
					</div>
				</div>
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/mobilier/mobiliers.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=5">Furniture</a></h4>
						</div>
					</div>
				</div> 				
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/accessoires/accessoires.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=6">Accessories</a></h4>
						</div>
					</div>
				</div> 
				
			</div>
		</div>
		
    </div>
</div>

    <?php include('footer-en.php'); ?>

</body>

</html>
