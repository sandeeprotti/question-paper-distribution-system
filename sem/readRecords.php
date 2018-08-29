<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							
							<th>Semester ID</th>
							<th>Semester</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT * FROM semester";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['sem_id'].'</td>
				<td>'.$row['sem'].'</td>
				<td>
					<button onclick="GetUserDetails(\''.$row['sem_id'].'\')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser(\''.$row['sem_id'].'\')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>