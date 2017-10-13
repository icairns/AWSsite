<!doctype html>
<html>
   <head>
      <title>Change Username</title>
      <?php
            include("../Template/Template.php"); 
            include "../../inc/dbinfo.inc"; 

            $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

            if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $database = mysqli_select_db($connection, DB_DATABASE);
            if(!$database){
            echo("couldn't connect to database");
            }
            if (isset($_POST['login']) && !empty($_POST['username']) ) {
               $username=$_POST['username'];
               $num=$_SESSION['username'];
               $stmt = $connection->prepare("SELECT * FROM users WHERE name =?");
               $stmt->bind_param("s", $num);
               
               $stmt->execute();
               $result = $stmt->get_result();
               if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  
                  $id=$row["id"];
                  
                  

                  $stm = $connection->prepare("UPDATE `users` SET `name` = ? WHERE `users`.`id` = ?");
               $stm->bind_param("ss", $username,$id);
               
               $result2=$stm->execute();
                  if(!$result2){
                  echo("didn't get it" );
                  exit;
                  }
                  $_SESSION['username'] = $username;
                  header('Location: ../index.php');
                  exit;
               }
               else{

               echo("Nothing in result");
               exit;
               }
            }
            
           
           
      ?>

      <h2 align="center">Enter New Username</h2> 
      <div class = "container form-signin">
         
         
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">submit</button>
         </form>
         
         
      </div> 
      

<?php
   include("../Template/Footer.php");
?>