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
               
               echo("<h3>Username and password incorrect</h3>");

              
            }
            
?>







<html lang = "en">
   
   <head>
      <title>Tutorialspoint.com</title>
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
      
      
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
            Enter Username<input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            Enter Password <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         <a href = "CreateAccount.php" tite = "Logout">Create Account
         
      </div> 
      



   </body>
</html>


  


