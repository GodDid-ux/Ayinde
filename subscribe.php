<?php
// Database connection
$servername = "localhost"; // Change this to your server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "Tachs_db"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $agree = isset($_POST['agree']) ? 1 : 0;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO subscribers (email, gender, agree) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $email, $gender, $agree);

    if ($stmt->execute()) {
        // Display success message and redirect
        echo "<script>
                alert('Subscription successful!');
                window.location.href='index.php';
              </script>";
        exit(); // Ensure no further code runs after redirection
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
