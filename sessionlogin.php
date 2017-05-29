<?php
if (!isset($_SESSION['login']))
{
    session_start();
}

if(isset($_SESSION['login']) && $_SESSION['login'] != 'admin'){
	$menuchange = true;	
}
else if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin')
{
	$menuadmin = true;
}