<?php
// signin.php

// Start session
session_start();

// Database connection
$servername = "localhost"; // or your server name
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "Tachs_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed']));
}

// Collect and sanitize form data
$username = $conn->real_escape_string($_POST['signinUsername']);
$password = $conn->real_escape_string($_POST['signinPassword']);

// Query to fetch the user by username and their password
$sql = "SELECT name, password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        // Password matches, set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $row['name']; // Store the user's name in the session

        // Return JSON success response
        echo json_encode(['status' => 'success', 'message' => 'Sign in successful', 'redirectUrl' => 'index.php']);
    } else {
        // Invalid password
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
    }
} else {
    // Invalid username
    echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
}

// Close the connection
$conn->close();
?>
