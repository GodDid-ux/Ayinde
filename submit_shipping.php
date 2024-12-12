<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tachs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Function to generate a unique 8-digit tracking code
function generateUniqueTrackingCode($conn) {
    do {
        $tracking_code = mt_rand(10000000, 99999999); // Generate a random 8-digit number
        
        // Check if the tracking code already exists in either cart_items or shipping_details table
        $stmt = $conn->prepare("
            SELECT COUNT(*) 
            FROM (
                SELECT tracking_code FROM cart_items WHERE tracking_code = ?
                UNION ALL
                SELECT tracking_code FROM shipping_details WHERE tracking_code = ?
            ) as combined_tracking_codes
        ");
        $stmt->bind_param("ss", $tracking_code, $tracking_code);
        $stmt->execute();
        $stmt->bind_result($code_exists);
        $stmt->fetch();
        $stmt->close();
        
        // Continue loop until a unique tracking code is found
    } while ($code_exists > 0);
    
    return $tracking_code;
}

// Generate a unique tracking code
$tracking_code = generateUniqueTrackingCode($conn);

// Sanitize and validate form data
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
$city = filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING);
$state = filter_var(trim($_POST['state']), FILTER_SANITIZE_STRING);
$postalCode = filter_var(trim($_POST['postalCode']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);

// Check if all required fields are filled
if (empty($name) || empty($address) || empty($city) || empty($state) || empty($postalCode) || empty($phone)) {
    echo json_encode(["success" => false, "errors" => ["message" => "All fields are required."]]);
    exit;
}

// Prepare SQL statement with tracking code
$stmt = $conn->prepare("INSERT INTO shipping_details (name, address, city, state, postal_code, phone, tracking_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $address, $city, $state, $postalCode, $phone, $tracking_code);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Shipping details submitted successfully!", "tracking_code" => $tracking_code]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

// Close connections
$stmt->close();
$conn->close();
?>
