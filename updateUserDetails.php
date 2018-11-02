<?php
// include Database connection file
include("dbConnection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $address = $_POST['address'];

    // Updaste User details
    $query = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', gender= '$gender',email = '$email', designation = '$designation' , address = '$address' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}