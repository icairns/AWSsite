<?php
   session_start();
	if(!$_SESSION['id']){
		header('Location: ../Login/Login.php');
		exit;
	}
?>