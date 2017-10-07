<?php
   session_start();
   include "../inc/dbinfo.inc"; 
   $table = "users";
	include "ConnectandCreateTable.php";
	VerifyEmployeesTable($table, $connection, DB_DATABASE); 
       
 ?>

 <?php
            
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
               	$username=$_POST['username'];
				$result = mysqli_query($connection, "SELECT * FROM users WHERE name= '$username'"); 
        		if (mysqli_num_rows($result)==1) {
    				$row = mysqli_fetch_assoc($result);
    				if($row["password"]==md5($_POST['password'])){
    					$_SESSION['valid'] = true;
                  		$_SESSION['username'] = $_POST['username'];
                  		header('Location: Welcome.php');
                  		exit;
    				}
               	
            	}
            	header('Location: Login.php');
            	exit;

              
            }
            
         ?>


<?php


?>