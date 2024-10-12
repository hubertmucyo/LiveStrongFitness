<?php
// connection.php should contain your database connection logic
include "connection.php";

// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$email = $_POST['email'];
$address = $_POST['address'];

// Prepare SQL query to insert data
$sql = "INSERT INTO users (first_name, last_name, age, email, address) VALUES ('$first_name', '$last_name', '$age', '$email', '$address')";

// Execute the query
if (mysqli_query($con, $sql)) {
    echo 'success';  // Return success response
} else {
    echo 'error';  // Return error response
}
?>
