<?php
   ob_start();
   session_start();
?>
<?php include "../inc/dbinfo.inc"; 
$table = "users";
include "ConnectandCreateTable.php";
VerifyEmployeesTable($table, $connection, DB_DATABASE); 
?>


<?php
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

 ?>