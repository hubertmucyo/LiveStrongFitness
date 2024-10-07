<?php
include "connection.php";

$fullname = $_POST['Fullname'];
$age = $_POST['age'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Insert data into the database
$sql2 = "INSERT INTO data (fullname, age, email, username, password) VALUES('$fullname', '$age', '$email', '$username', '$password')";

if (mysqli_query($con, $sql2)) 
{
    echo 'success';  // Return plain success string
} else {
    echo 'error';  // Return error string
}

?>
