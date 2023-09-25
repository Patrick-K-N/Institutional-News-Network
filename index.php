<?php
//database credentials
$host = 'localhost';
$username = 'mysql';
$password = 'password01';
$dbname = 'institutiondb';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
