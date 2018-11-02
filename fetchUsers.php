<?php
	// include Database connection file 
	include("dbConnection.php");

	$query = "SELECT * FROM users";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    $totalData = mysqli_num_rows($result);
    $totalFiltered = $totalData;  // when there is no search parameter.
    
    // if query results contains rows then fetch those rows 
    if(mysqli_num_rows($result) > 0)
    {	
        $json_response['draw'] = 1;
        $json_response["recordsTotal"] =  9;
        $json_response["recordsFiltered"] = 9;
        $json_response['data']= array();
    	$number = 1;
    	while($row = mysqli_fetch_array($result))
    	{	
            $row_array['number'] = $number;
    		$row_array['firstName']=$row['firstName'];
			$row_array['lastName']=$row['lastName'];
			$row_array['gender']=$row['gender'];
			$row_array['email']=$row['email'];
			$row_array['designation']=$row['designation'];
			$row_array['address']=$row['address'];
            $row_array['edit'] = '<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning tbl_btn">Update</button>';
            $row_array['delete'] ='<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger tbl_btn">Delete</button>';
			$number++;

			array_push($json_response['data'],$row_array);
    	}
    	
        //echo "<pre>"; print_r($json_response); echo "</pre>"; 
    	echo json_encode($json_response);
    }
   
?>