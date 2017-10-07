
<?php
   session_start();
?>
<?php include "../inc/dbinfo.inc"; 
$table = "users";
include "ConnectandCreateTable.php";
VerifyEmployeesTable($table, $connection, DB_DATABASE); 
?>




<html lang = "en">
   
   <head>
      <title>Create Account</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
         h1{
            text-align: center;
            color: #017572;
         }
         h3{
            text-align: center;
            color: red;
         }
      </style>
      
   </head>
	
   <body>
      
      <h1>Create Account</h1> 
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         
      </div> <!-- /container -->

      <?php
        if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
                  $username=$_POST['username'];
                  $password=md5($_POST['password']);
                  $password2=md5($_POST['password2']);
                  $result = mysqli_query($connection, "SELECT * FROM users WHERE name= '$username'"); 
                  if($password!=$password2){
                     echo("<h3>Passwords do not Match</h3>");
                  }
                  elseif(mysqli_num_rows($result)){
                     echo("<h3>Username Already Exists</h3>");
                  }
                  else{
                     $query = "INSERT INTO `users`(`name`, `password`) VALUES ('$username','$password')";
                     $result = mysqli_query($connection, $query);
                     if(!$result){
                        echo("couldn't insert");
                        exit;
                     }
                     header("Location: Login.php");
                     exit;
                  }
               }

?>
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo $_SERVER['PHP_SELF']; ?>"  method = "post">
            <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
            Enter Username
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            Enter Password
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required></br>
            Re-enter Password
            <input type = "password" class = "form-control"
               name = "password2" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Add Account</button>

            <?php

            ?>
         </form>
			
         
         
      </div> 
      



   </body>
</html>


  


