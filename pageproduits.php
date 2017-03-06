<?php
include('sessionlogin.php');	
?>

<?php include('header.php'); ?>

<body>
<div class="contenupage">
    <div class="container">

        <div class="row">
            <div class="lienproduits">
				
				<h1 align="center">Nos Produits</h1><br/>
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/assiettes/assiettes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=1">Assiettes et Tasses</a></h4>                         
						</div>               
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/couverts/couverts.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=2">Couverts</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/verres/verres.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=3">Verres</a></h4>
						</div>
					</div>
				</div>

				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/nappes/nappes.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=4">Nappes et Serviettes</a></h4>
						</div>
					</div>
				</div>
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/mobilier/mobiliers.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=5">Mobilier</a></h4>
						</div>
					</div>
				</div> 				
				
				<div class="encadreproduit">
					<div class="encadre">
						<img src="img/accessoires/accessoires.png" alt="">
						<div class="caption">
							<h4><a href="pagediversproduit.php?typeproduit=6">Accessoires</a></h4>
						</div>
					</div>
				</div> 
				
			</div>
		</div>
		
    </div>
</div>

    <?php include('footer.php'); ?>

</body>

</html>
