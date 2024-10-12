<?php
include "connection-user.php"; // Include the connection file

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL query to insert data
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if (mysqli_query($con, $sql)) {
    echo 'success';  // Return success response
} else {
    echo 'error';  // Return error response
}

// Close the connection
$con->close();
?>
