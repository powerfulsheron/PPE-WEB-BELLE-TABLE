<?php
// include pour session start si utilisateur loggé et le changement de menu si utilisateur loggé et/ou admin.
include('sessionlogin.php');
// Include pour la connexion à la bdd en PDO
include('parametres.php');
//Test

// si on à fait une recherche	
if(isset($_REQUEST['search'])){
// si la recherche n'est pas empty
	if($_REQUEST['search'] != ""){
		// On met en miniscule et on cherche dans la table t_search pour les mots clés.
		$recherche = strtolower($_REQUEST['search']);
		$result = $bdd->query('SELECT * FROM `t_search` WHERE `keyword` LIKE "%'.$recherche.'%"');
		// si le résultat n'est pas null et qu'on trouve un mot clé correspondant dans la table
		if($result != ""){
			while($row = $result->fetch()){
				// on récupère l'url correspondante de l'entrée dans la table
				$destination = $row['urlsearch'];
				// on crée l'url et on redirige automatiquement grâce à JS.
				echo'
				<script type="text/javascript">
					location.href = \''.$destination.'\';
				</script>';
			}		
		}
	}	
}
// Include du header
include('header.php'); 
?>
	<div class="fondrecherche" align="center">
		<br/>
		<div class="recherche" align="center">
		<!-- formulaire pour la recherche -->
			<form id="myform" method="get" action="index.php" align="center">
				<table width="100%">
				<thead>
					<tr>
							<!-- onclick="javascript:this.value='' : quand l'utilisateur clique dans le champ rechercher, la textbox se vide pour le laisser rentrer le mot clé. -->
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
	
	<?php include('footer.php'); ?>

</body>

</html>
