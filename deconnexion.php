<?php
session_start();
include('sessionlogin.php');

if(isset($_SESSION['login'])){
	if($_SESSION['login'] != ""){
		$_SESSION['login'] = "";
		session_destroy();
	}	
}
echo'
	<script type="text/javascript">
		location.href = \'index.php\';
	</script>';
?>