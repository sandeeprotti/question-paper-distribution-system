<?php
	if(isset($_POST['fac_id']) && isset($_POST['fac_name']) && isset($_POST['fac_pass']) && isset($_POST['room_id']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$fac_id = $_POST['fac_id'];
		$fac_name = $_POST['fac_name'];
		$fac_pass= $_POST['fac_pass'];
		$room_id = $_POST['room_id'];


		$query = "INSERT INTO faculty(fac_id, fac_name, fac_pass, room_id) VALUES('$fac_id', '$fac_name', '$fac_pass', '$room_id')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}

?>