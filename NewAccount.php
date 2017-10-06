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

        if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
               	$username=$_POST['username'];
               	$password=md5($_POST['password']);
               	$query = "INSERT INTO `users`(`name`, `password`) VALUES ('$username','$password')";
               	$result = mysqli_query($connection, $query);
               	if(!$result){
               		echo("couldn't insert");
               		exit;
               	}
               	header("Location: Login.php");
               	exit;
               }

 ?>