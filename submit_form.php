<?php
// Database connection settings
$servername = "localhost"; // or your server name
$username = "root";
$password = "";
$dbname = "Tachs_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// SQL query to insert data into a table called 'form_submissions'
$sql = "INSERT INTO form_submissions (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
       // Redirect to index.html
       header("Location: index.php");
       exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
