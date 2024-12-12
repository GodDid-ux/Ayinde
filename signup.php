<?php
// signup.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tachs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$user_username = $conn->real_escape_string($_POST['signupUsername']);
$name = $conn->real_escape_string($_POST['signupName']);
$email = $conn->real_escape_string($_POST['signupEmail']);
$password = $conn->real_escape_string($_POST['signupPassword']);

// Prepare response array
$response = array();

// Check if email or username already exists
$emailCheckSql = "SELECT email FROM users WHERE email='$email'";
$usernameCheckSql = "SELECT username FROM users WHERE username='$user_username'";
$emailCheckResult = $conn->query($emailCheckSql);
$usernameCheckResult = $conn->query($usernameCheckSql);

if ($emailCheckResult->num_rows > 0) {
    $response['status'] = 'error';
    $response['message'] = 'This email has already been used by another user.';
} elseif ($usernameCheckResult->num_rows > 0) {
    $response['status'] = 'error';
    $response['message'] = 'This username is already taken.';
} else {
    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Generate reset token and expiry
    $resetToken = bin2hex(random_bytes(16)); // 32 characters long
    $resetTokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // 1 hour expiry

    // Insert data into the database
    $sql = "INSERT INTO users (username, name, email, password, reset_token, reset_token_expiry)
            VALUES ('$user_username', '$name', '$email', '$hashedPassword', '$resetToken', '$resetTokenExpiry')";

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'Sign up successful!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $conn->error;
    }
}

// Close the connection
$conn->close();

// Send response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
