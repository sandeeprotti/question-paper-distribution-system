<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							
							<th>Subject Code</th>
							<th>Subject Name</th>
							<th>Semester ID</th>
							<th>Department ID</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT * FROM subjects";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	//$number = 1;
    	while($row = mysql_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$row['sub_code'].'</td>
				<td>'.$row['sub_name'].'</td>
				<td>'.$row['sem_id'].'</td>
				<td>'.$row['dept_id'].'</td>
				<td>
					<button onclick="GetUserDetails(\''.$row['sub_code'].'\')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser(\''.$row['sub_code'].'\')" class="btn btn-danger">Delete</button>
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