<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped table-hover">
	<thead class="thead-dark">
						<tr>
							<th>Faculty ID</th>
							<th>Faculty Name</th>
							<th>Password</th>
							<th>BLOCK ID</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>
	</thead>';
	$query = "SELECT * FROM faculty";

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
				<td>'.$row['fac_id'].'</td>
				<td>'.$row['fac_name'].'</td>
				<td>'.$row['fac_pass'].'</td>
				<td>'.$row['room_id'].'</td>
				<td>
					<button onclick="GetUserDetails(\''.$row['fac_id'].'\')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser(\''.$row['fac_id'].'\')" class="btn btn-danger">Delete</button>
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
