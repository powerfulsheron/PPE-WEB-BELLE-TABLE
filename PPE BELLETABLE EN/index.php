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
<?php include('header-en.php'); ?>
	<div class="fondrecherche" align="center">
		<br/>
		<div class="recherche" align="center">
			<form id="myform" method="get" action="index.php" align="center">
				<table width="100%">
				<thead>
					<tr>
						<td width="55%" align="right"><input type="text" name="search" id="search" value="Search for article" onclick="javascript:this.value='';"></td>
						<td width="45%" align="left"><input class="btnrecherche" type="submit" name="Search" value=""></td>
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