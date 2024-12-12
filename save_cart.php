<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Tachs_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Function to generate a unique 8-digit tracking code
function generateUniqueTrackingCode($conn) {
    do {
        $tracking_code = mt_rand(10000000, 99999999); // Generate a random 8-digit number

        $stmt = $conn->prepare("
            SELECT COUNT(*) 
            FROM (
                SELECT tracking_code FROM cart_items WHERE tracking_code = ?
                UNION ALL
                SELECT tracking_code FROM shipping_details WHERE tracking_code = ?
            ) as combined_tracking_codes
        ");
        if (!$stmt) {
            echo json_encode(['success' => false, 'message' => 'Error preparing statement: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param("ss", $tracking_code, $tracking_code);
        $stmt->execute();
        $stmt->bind_result($code_exists);
        $stmt->fetch();
        $stmt->close();

    } while ($code_exists > 0);

    return $tracking_code;
}

// Set headers for JSON response
header('Content-Type: application/json');

// Read and decode the JSON input
$inputData = file_get_contents('php://input');
$data = json_decode($inputData, true);

// Validate JSON input
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data received: ' . json_last_error_msg()]);
    exit;
}

// Check if cart data is present and valid
if (!isset($data['cart']) || !is_array($data['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid cart data received.']);
    exit;
}

$cart = $data['cart'];

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO cart_items (productID, title, price, quantity, img, total, orderid, tracking_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error preparing SQL statement: ' . $conn->error]);
    exit;
}

// Process each cart item
foreach ($cart as $item) {
    if (!isset($item['productID'], $item['title'], $item['price'], $item['quantity'], $item['img'], $item['total'], $item['orderid'])) {
        echo json_encode(['success' => false, 'message' => 'Missing fields in cart item.']);
        exit;
    }

    $productID = $item['productID'];
    $title = $item['title'];
    $price = $item['price'];
    $quantity = $item['quantity'];
    $img = $item['img'];
    $total = $item['total'];
    $orderid = $item['orderid'];
    $tracking_code = generateUniqueTrackingCode($conn);

    $stmt->bind_param("ssdisdss", $productID, $title, $price, $quantity, $img, $total, $orderid, $tracking_code);

    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $stmt->error]);
        exit;
    }
}

// Close resources
$stmt->close();
$conn->close();

// Return success JSON response with redirect URL
echo json_encode(['success' => true, 'redirect' => 'shipping.html']);
exit;
