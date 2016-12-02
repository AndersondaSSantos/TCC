<?php

if($_GET["act"]=="logout"){

	session_start();
	session_destroy();
	session_unset();
	header("location:sair.php");  
	exit;
	

}
?>