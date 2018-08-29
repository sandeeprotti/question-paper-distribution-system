<?php
// check request
if(isset($_POST['dept_id']) || isset($_POST['dept_id']) != "")
{
    // include Database connection file
    include("db_connection.php");
   // echo($fac_id);
    // get user id
    $dept_id = $_POST['dept_id'];
    //echo($fac_id)
    // delete User
    $query = "DELETE FROM department WHERE dept_id = '$dept_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>