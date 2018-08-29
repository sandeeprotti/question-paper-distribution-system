<?php
	if(isset($_POST['usn']) && isset($_POST['stud_name']) && isset($_POST['dept_id']) && isset($_POST['sem_id']) && isset($_POST['room_id']))
	{

		// include Database connection file 
		include("db_connection.php");

		// get values 
		$usn = $_POST['usn'];
		$stud_name = $_POST['stud_name'];
		$dept_id= $_POST['dept_id'];
		$sem_id= $_POST['sem_id'];
		$room_id = $_POST['room_id'];

		$query = "INSERT INTO student(usn, stud_name, dept_id, sem_id, room_id) VALUES('$usn', '$stud_name', '$dept_id', '$sem_id', '$room_id')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>