<?php
// include Database connection file
include("db_connection.php");

// check request
//if(isset($_POST['fac_id']) && isset($_POST['fac_name']) && isset($_POST['fac_pass']) != "")
if(isset($_POST))
{
    // get values
    $fac_id = $_POST['fac_id'];
    $fac_name = $_POST['fac_name'];
    $fac_pass = $_POST['fac_pass'];
    $room_id = $_POST['room_id'];

    // Updaste User details
    $query = "UPDATE faculty SET fac_name = '$fac_name', fac_pass = '$fac_pass', room_id = '$room_id' WHERE fac_id = '$fac_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}