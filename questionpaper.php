<?php
// include Database connection file
include("subject/db_connection.php");

// check request
//if(isset($_POST['sub_code']) || isset($_POST['sub_code']) != "")

    // get User ID
   $usn=$_POST['usn'];
   $room_id=$_POST['roomid'];
//$usn="1RV16MCA38";
//$room_id="01";
   // echo $usn;

    // FROM STUDENTS
    $query = "SELECT dept_id, sem_id FROM student WHERE usn = '$usn' and room_id = '$room_id'";
    if (!$result = mysql_query($query)) {
        $response['message'] = "ILLO";
        exit();
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
            //echo json_encode($response);
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "NOT FOUND";
    }
   //echo json_encode($response);
    echo $row;
    $deptid= $response['dept_id'];
    $semid=$response['sem_id'];
   //FROM SUBJECTS
    $query = "SELECT sub_code FROM subjects WHERE sem_id = '$semid' and dept_id = '$deptid'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
           // echo json_encode($response);
            $subcode=$response['sub_code'];
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d', time());
            compare_date($date,$subcode);
            
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }


//FROM SCHEDULE
function schedule($subcode){
 $query = "SELECT id FROM schedule WHERE sub_code = '$subcode'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
            echo json_encode($response);
            $question_paper_id=$response['id'];
            upload_file($question_paper_id);
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
}

//FROM UPLOAD
function upload_file($question_paper_id){
$query = "SELECT name FROM upload WHERE id = '$question_paper_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
           // echo json_encode($response);
            echo $response['name'];
            $upload_file=$response['name'];
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
}



//COMPARE DATE
function compare_date($date,$subcode){
 $query = "SELECT id FROM schedule WHERE sch_date = '$date' and sub_code='$subcode'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
           // echo json_encode($response);
            $paper_id=$response['id'];  
            upload_file($paper_id);
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
  }   
    
