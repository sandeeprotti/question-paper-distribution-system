<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['usn']) || isset($_POST['usn']) != "")
{
    // get User ID
    $usn = $_POST['usn'];

    // Get User Details
    $query = "SELECT * FROM student WHERE usn = '$usn'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}