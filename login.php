<?php
   include("config.php"); 
    $myusername=$_POST['username'];
    $mypassword=$_POST['password'];
    $room_id=$_POST['roomid'];
      
      $sql = "SELECT fac_name FROM faculty WHERE fac_id = '$myusername' and fac_pass = '$mypassword' and room_id = '$room_id'";
      $result = mysqli_query($link,$sql);      
      $count = mysqli_num_rows($result);
    
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
    
      $response["success"] = "1";
      echo json_encode($response);
     
      }else {
         $error = "Your Login Name or Password is invalid";
         $response["failed"] = "0";
         echo json_encode($response);
 
   }
?>
