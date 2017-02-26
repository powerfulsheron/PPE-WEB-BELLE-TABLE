<?php
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$_SESSION['login'] = "";
	}	
}
echo'
	<script type="text/javascript">
		location.href = \'index.php\';
	</script>';
?>