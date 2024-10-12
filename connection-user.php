<?php
// Database configuration
$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = ""; // Your database password (default is empty for XAMPP)
$dbname = "user_credentials"; // Database name

// Create connection
$con = new mysqli($servername, $username, $password);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($con->query($sql) !== TRUE) {
    die("Error creating database: " . $con->error);
}

// Select the database
$con->select_db($dbname);

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if ($con->query($sql) !== TRUE) {
    die("Error creating table: " . $con->error);
}

?>
