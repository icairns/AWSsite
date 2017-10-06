<?php
   //ob_start();
   session_start();
?>

<?php
	if($_SESSION['username']){
		echo("Welcome"." ".$_SESSION['username']);
	}else{
		header('Location: Login.php');
		exit;
	}
?>