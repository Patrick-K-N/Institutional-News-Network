<?php

// Connect to the phpMyAdmin database
$db = new PDO('mysql:host=localhost;dbname=institutiondb', 'root', '');

// Get the user email address and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Verify the user login information
$sql = 'SELECT * FROM students WHERE email = :email AND password = :password';
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$user = $stmt->fetch();

// Check if the user login was successful
if ($user) {
    // The user login was successful
    // Set the loggedIn flag in local storage
    localStorage.setItem('loggedIn', 'true');
  
    // Redirect the user to the dashboard page
    header('Location: dashboard.html');
  } else {
    // The user login was unsuccessful
    // Redirect the user back to the login page
    header('Location: login.html');
  }

?>