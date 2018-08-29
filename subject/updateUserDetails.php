<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];
    $dept_id= $_POST['dept_id'];
    $sem_id= $_POST['sem_id'];
   

    // Updaste User details
    $query = "UPDATE subjects SET sub_name = '$sub_name', dept_id = '$dept_id', sem_id='$sem_id' WHERE sub_code = '$sub_code'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}