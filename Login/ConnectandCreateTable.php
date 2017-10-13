<?php
		
         /* Connect to MySQL and select the database. */
         $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

         if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
        $database = mysqli_select_db($connection, DB_DATABASE);
        
        



        /* Check whether the table exists and, if not, create it. */
function VerifyEmployeesTable($connection, $dbName) {
  if(!TableExists('users' , $connection, $dbName)) 
  { 
  	$query = "CREATE TABLE `users` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  	$result = mysqli_query($connection, $query); 
  	if (!$result){
  		echo("couldn't create table");
  		exit;
  	}
  	
  }

}


function VerifyHitsTable($connection, $dbName) {
  if(!TableExists('Hits' , $connection, $dbName)) 
  { 
    $query = "CREATE TABLE `Hits` ( `count` INT NOT NULL ) ENGINE = InnoDB";
    $result = mysqli_query($connection, $query); 
    if (!$result){
      echo("couldn't create hits table");
      exit;
    }
    
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