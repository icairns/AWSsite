<!doctype html>
<html>
   <head>
      <title>Change Username</title>
      <?php
            include("../Template/Template.php"); 
            include "../../inc/dbinfo.inc"; 
            echo('<h2 align="center">Change Password</h2> ');
            $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

            if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
            $database = mysqli_select_db($connection, DB_DATABASE);
            if (isset($_POST['login']) && !empty($_POST['curpassword'])&& !empty($_POST['password'])&& !empty($_POST['password2']) ) {
               $curpassword=md5($_POST['curpassword']);
               $password=md5($_POST['password']);
               $password2=md5($_POST['password2']);
               $username=$_SESSION['username'];
               $stmt = $connection->prepare("SELECT * FROM users WHERE name =?");
               $stmt->bind_param("s", $username);
               $stmt->execute();
               $result = $stmt->get_result();
               if($result){
                  $row = mysqli_fetch_assoc($result);
                  $id=$row["id"];
                  if($row["password"]==$curpassword){
                     if($password==$password2){
                        $stm = $connection->prepare("UPDATE `users` SET `password` = ? WHERE `users`.`id` = ?");
                        $stm->bind_param("ss", $password,$id);
               
                        $result2=$stm->execute();
                        if(!$result2){
                           echo(' <h4 align="center"><font color="red">Unable to Change Password</font></h4> ');

                        }else{
                           echo(' <h4 align="center"><font color="green">Change Successful</font></h4> ');
                        }
                  
                     }else{
                        echo(' <h4 align="center"><font color="red">Passwords do not match</font></h4> ');
                     }


                  }else{
                     echo(' <h4 align="center"><font color="red">Wrong Password</font></h4> ');
                  }
                  
               }


            }
            
           
           
      ?>

      <!-- <h2 align="center">Change Password</h2>  -->
      <div class = "container form-signin">
         
         
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <!-- <h4 class = "form-signin-heading"><?php echo $msg; ?></h4> -->
            <h5>Current Password</h5>
            <input type = "password" class = "form-control"
               name = "curpassword" placeholder = "password" required>
            <br>
            <h5>New Password</h5>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <br>
            <h5>Confirm New Password</h5>
            <input type = "password" class = "form-control"
               name = "password2" placeholder = "password" required>
            <br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">submit</button>
         </form>
         
         
      </div> 
      

<?php
   include("../Template/Footer.php");
?>