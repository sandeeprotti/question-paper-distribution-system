<?php
	if(isset($_POST['dept_id']) && isset($_POST['dept_name']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$dept_id = $_POST['dept_id'];
		$dept_name = $_POST['dept_name'];

		$query = "INSERT INTO department(dept_id, dept_name) VALUES('$dept_id', '$dept_name')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>