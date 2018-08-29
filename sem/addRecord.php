<?php
	if(isset($_POST['sem_id']) && isset($_POST['sem']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$sem_id = $_POST['sem_id'];
		$sem = $_POST['sem'];

		$query = "INSERT INTO semester(sem_id, sem) VALUES('$sem_id', '$sem')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>