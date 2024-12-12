<?php
// Database configuration
$host = 'localhost'; // Change as needed
$db = 'Tachs_db'; // Change as needed
$user = 'root'; // Change as needed
$pass = ''; // Change as needed

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $name = $_POST['name'];
    $card_number = $_POST['card-number'];
    $expiry_date = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];

    // Prepare and execute the SQL query
    $stmt = $pdo->prepare("INSERT INTO payments (name, card_number, expiry_date, cvv) VALUES (:name, :card_number, :expiry_date, :cvv)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':card_number', $card_number);
    $stmt->bindParam(':expiry_date', $expiry_date);
    $stmt->bindParam(':cvv', $cvv);

    if ($stmt->execute()) {
        // Payment information saved successfully
        echo '<script>
                alert("Payment successful. Do well to rate our services.");
                window.location.href = "rateus.html";
              </script>';
    } else {
        echo '<script>
                alert("Failed to save payment information.");
              </script>';
    }
} catch (PDOException $e) {
    echo '<script>
            alert("Database error: ' . $e->getMessage() . '");
          </script>';
}
?>
