
<?php
	if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['designation']) && isset($_POST['address']))
	{
		include('dbConnection.php');
		// get values 
		$firstName=$_POST['firstName'];
		$lastName=$_POST['lastName'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$designation=$_POST['designation'];
		$address=$_POST['address'];
		
		$query = "INSERT INTO users(firstName, lastName, gender, email, designation,address) VALUES('$firstName', '$lastName', '$gender', '$email', '$designation', '$address')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo "Record Added Successfully!";
	}
?>