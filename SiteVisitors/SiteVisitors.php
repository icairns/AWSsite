


<!doctype html>
<html>
	<head>
		<title>Number of Visitors</title>
		<style>
		h1{
			text-align: center;
		}

		</style>
		<?php
			include "../../inc/dbinfo.inc"; 
   			$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

         	if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
        	$database = mysqli_select_db($connection, DB_DATABASE);
   			//include "../Login/ConnectandCreateTable.php";
   			include("../Template/Template.php");
		?>
		<h1>Number of Visitors</h1>
		
		<h1><?php
			$result = mysqli_query($connection, "SELECT `count` FROM `Hits` WHERE 1"); 
            if (mysqli_num_rows($result)>0) {
               $row = mysqli_fetch_assoc($result);
               $curCount=$row["count"];
               echo($curCount);
           }
		?>
		</h1>

		<?php
   			include("../Template/Footer.php");
		?>
		

		</head>
</html>