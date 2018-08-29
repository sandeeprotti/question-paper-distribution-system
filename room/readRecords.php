<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							
							<th>BLOCK ID</th>
							<th>No_of_students</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT * FROM room";

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
				<td>'.$row['room_id'].'</td>
				<td>'.$row['no_of_students'].'</td>
				<td>
					<button onclick="GetUserDetails(\''.$row['room_id'].'\')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser(\''.$row['room_id'].'\')" class="btn btn-danger">Delete</button>
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