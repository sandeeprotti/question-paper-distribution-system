<?php
// check request
if(isset($_POST['usn']) || isset($_POST['usn']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $usn =$_POST['usn'];
   
    // delete User
    $query = "DELETE FROM student WHERE usn ='$usn'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>