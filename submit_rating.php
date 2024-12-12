<?php
header('Content-Type: application/json'); // Set content type to JSON

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tachs_db";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Retrieve and sanitize the input data
$rating = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_INT);
$comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($rating)) {
    echo json_encode(["success" => false, "message" => "Rating is required."]);
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO ratings (rating, comment) VALUES (?, ?)");
$stmt->bind_param("is", $rating, $comment); // "is" stands for integer and string

// Execute the statement and check for success
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Thank You Very Much For Rating Us.We Hope To Serve You Much Better!.."]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

// Close connections
$stmt->close();
$conn->close();
?>
