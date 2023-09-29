<?php

// Connect to the phpMyAdmin database
$db = new PDO('mysql:host=localhost;dbname=institutiondb', 'root', '');

// Get the user email address and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Verify the user login information
$sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$user = $stmt->fetch();

// Redirect the user to the appropriate page
if ($user) {
  // The user login was successful
  header('Location: dashboard.html');
} else {
  // The user login was unsuccessful
  header('Location: login.html');
}

?>