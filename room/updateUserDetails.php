<?php
// include Database connection file
include("db_connection.php");

// check request
//if(isset($_POST['fac_id']) && isset($_POST['fac_name']) && isset($_POST['fac_pass']) != "")
if(isset($_POST))
{
    // get values
    $room_id = $_POST['room_id'];
    $no_of_students = $_POST['no_of_students'];  

    // Updaste User details
    $query = "UPDATE room SET no_of_students = '$no_of_students' WHERE room_id = '$room_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}