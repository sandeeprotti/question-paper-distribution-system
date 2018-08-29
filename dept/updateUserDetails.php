<?php
// include Database connection file
include("db_connection.php");

// check request
//if(isset($_POST['fac_id']) && isset($_POST['fac_name']) && isset($_POST['fac_pass']) != "")
if(isset($_POST))
{
    // get values
    $dept_id = $_POST['dept_id'];
    $dept_name = $_POST['dept_name'];  

    // Updaste User details
    $query = "UPDATE department SET dept_name = '$dept_name' WHERE dept_id = '$dept_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}