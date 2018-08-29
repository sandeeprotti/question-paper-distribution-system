<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $usn = $_POST['usn'];
    $stud_name = $_POST['stud_name'];
    $dept_id= $_POST['dept_id'];
    $sem_id= $_POST['sem_id'];
    $room_id = $_POST['room_id'];

    // Updaste User details
    $query = "UPDATE student SET stud_name = '$stud_name', dept_id = '$dept_id', sem_id='$sem_id', room_id = '$room_id' WHERE usn = '$usn'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}