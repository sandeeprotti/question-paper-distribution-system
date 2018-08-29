<?php
// check request
if(isset($_POST['sem_id']) || isset($_POST['sem_id']) != "")
{
    // include Database connection file
    include("db_connection.php");
   // echo($fac_id);
    // get user id
    $sem_id = $_POST['sem_id'];
    //echo($fac_id)
    // delete User
    $query = "DELETE FROM semester WHERE sem_id = '$sem_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>