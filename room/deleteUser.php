<?php
// check request
if(isset($_POST['room_id']) || isset($_POST['room_id']) != "")
{
    // include Database connection file
    include("db_connection.php");
   // echo($fac_id);
    // get user id
    $room_id = $_POST['room_id'];
    //echo($fac_id)
    // delete User
    $query = "DELETE FROM room WHERE room_id = '$room_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>