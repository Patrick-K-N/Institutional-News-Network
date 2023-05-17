<?php
//database credentials
$host = 'localhost';
$username = 'patrick';
$password = 'password';
$dbname = 'Users';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
