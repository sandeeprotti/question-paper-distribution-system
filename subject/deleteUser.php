<?php
// check request
if(isset($_POST['sub_code']) || isset($_POST['sub_code']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $sub_code =$_POST['sub_code'];
   
    // delete User
    $query = "DELETE FROM subjects WHERE sub_code ='$sub_code'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>