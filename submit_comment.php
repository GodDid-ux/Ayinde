<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "Tachs_db"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Prepare an SQL query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $comment);

    // Execute the query
    if ($stmt->execute()) {
        // Return a JSON response for AJAX with success message
       echo "<script>
        alert('Your Comment has been Submitted Sucessfully!..');
        window.location.href = 'testimonial.php';
    </script>";
    } else {
        echo json_encode(['error' => 'Failed to save comment.']);
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
