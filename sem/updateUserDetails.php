<?php
// include Database connection file
include("db_connection.php");

// check request
//if(isset($_POST['fac_id']) && isset($_POST['fac_name']) && isset($_POST['fac_pass']) != "")
if(isset($_POST))
{
    // get values
    $sem_id = $_POST['sem_id'];
    $sem = $_POST['sem'];  

    // Updaste User details
    $query = "UPDATE semester SET sem = '$sem' WHERE sem_id = '$sem_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}