<?php
	if(isset($_POST['room_id']) && isset($_POST['no_of_students']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$room_id = $_POST['room_id'];
		$no_of_students = $_POST['no_of_students'];

		$query = "INSERT INTO room(room_id, no_of_students) VALUES('$room_id', '$no_of_students')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>