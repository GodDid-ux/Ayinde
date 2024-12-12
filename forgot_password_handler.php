<?php
// Database connection
$db = new mysqli("localhost", "root", "", "Tachs_db");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['resetEmail'];

    // Check if email exists in the users table
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate password reset token
        $token = bin2hex(random_bytes(50));
        $resetLink = "http://Tachs.com/reset_password.php?token=" . $token;

        // Set token expiration time (e.g., 1 hour from now)
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Save token and expiry to the users table
        $stmt = $db->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();

        // Return the token to the front-end (for redirection)
        echo json_encode([
            'status' => 'success',
            'token' => $token,
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No account found with this email.',
        ]);
    }
}
?>
