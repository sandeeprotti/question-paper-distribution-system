<?php
	if(isset($_POST['sch_code']) && isset($_POST['sch_date']) && isset($_POST['sub_code']) && isset($_POST['paper']))
	{

		// include Database connection file 
		include("db_connection.php");

		// get values 
		$sch_code = $_POST['sch_code'];
		$sch_date = $_POST['sch_date'];
		$sub_code= $_POST['sub_code'];
		$paper= $_POST['paper'];
	

		$query = "INSERT INTO schedule(sch_id, sch_date, sub_code, id) VALUES('$sch_code', '$sch_date', '$sub_code', '$paper')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>