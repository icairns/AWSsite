<?php
	VerifyHitsTable($connection, DB_DATABASE);
        $result = mysqli_query($connection, "SELECT `count` FROM `Hits` WHERE 1"); 
            if (mysqli_num_rows($result)>0) {
               $row = mysqli_fetch_assoc($result);
               $curCount=$row["count"];
               $count=$row["count"]+1;
               $result = mysqli_query($connection, "UPDATE `Hits` SET `count`=$count WHERE `count`=$curCount"); 
             }else{
                $count=1;
                $result = mysqli_query($connection, "INSERT INTO `Hits`(`count`) VALUES ('$count')");
             
              }
              
?>