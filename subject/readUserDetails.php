<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['sub_code']) || isset($_POST['sub_code']) != "")
{
    // get User ID
    $sub_code = $_POST['sub_code'];

    // Get User Details
    $query = "SELECT * FROM subjects WHERE sub_code = '$sub_code'";
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