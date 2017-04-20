<?php
session_start();

if(isset($_SESSION['loginadmin'])){
	if($_SESSION['loginadmin'] != ""){
		$_SESSION['loginadmin'] = "";
		session_destroy();
	}	
}
echo'
	<script type="text/javascript">
		location.href = \'index.php\';
	</script>';
?>