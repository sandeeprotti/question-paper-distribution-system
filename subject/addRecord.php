<?php
	if(isset($_POST['sub_code']) && isset($_POST['sub_name']) && isset($_POST['dept_id']) && isset($_POST['sem_id']))
	{

		// include Database connection file 
		include("db_connection.php");

		// get values 
		$sub_code = $_POST['sub_code'];
		$sub_name = $_POST['sub_name'];
		$dept_id= $_POST['dept_id'];
		$sem_id= $_POST['sem_id'];

		$query = "INSERT INTO subjects(sub_code, sub_name, sem_id, dept_id) VALUES('$sub_code', '$sub_name', '$sem_id', '$dept_id')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>