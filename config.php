<?php

// Database credentials
define('DB_HOST', 'your_database_host'); // Replace with your database host
define('DB_USER', 'your_database_user'); // Replace with your database username
define('DB_PASSWORD', 'your_database_password'); // Replace with your database password
define('DB_NAME', 'your_database_name'); // Replace with your database name

// Establish a database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
