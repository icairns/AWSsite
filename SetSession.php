<?php
   ob_start();
   session_start();
?>
<?php include "../inc/dbinfo.inc"; ?>


<?php
		$table = "users";
         /* Connect to MySQL and select the database. */
         $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

         if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
        $database = mysqli_select_db($connection, DB_DATABASE);

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



               /*if ($_POST['username'] == 'tutorialspoint' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password';
               }else {
                  header('Location: Login.php');
               }*/
            }
            
         ?>


<?php

/* Add an employee to the table. */
function AddEmployee($connection, $name, $address) {
   $n = mysqli_real_escape_string($connection, $name);
   $a = mysqli_real_escape_string($connection, $address);

   $query = "INSERT INTO `Employees` (`Name`, `Address`) VALUES ('$n', '$a');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding employee data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyEmployeesTable($table,$connection, $dbName) {
  if(!TableExists($table , $connection, $dbName)) 
  { 
  	$query = "CREATE TABLE `Employees`.`users` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  	$result = mysqli_query($connection, $query); 
  	if (!$result){
  		echo("couldn't create table");
  	}
  	//header('Location: Login.php');
     echo("added Table");
     exit;
  }

}

/* Check for the existence of a table. */
function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection, 
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>