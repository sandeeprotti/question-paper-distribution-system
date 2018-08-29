<?php
// check request
if(isset($_POST['fac_id']) || isset($_POST['fac_id']) != "")
{
    // include Database connection file
    include("db_connection.php");
   // echo($fac_id);
    // get user id
    $fac_id = $_POST['fac_id'];
    //echo($fac_id)
    // delete User
    $query = "DELETE FROM faculty WHERE fac_id = '$fac_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>