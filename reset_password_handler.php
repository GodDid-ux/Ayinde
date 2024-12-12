<?php
// Database connection (replace with your own connection logic)
$db = new mysqli("localhost", "root", "", "Tachs_db");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];
    $token = $_POST['token'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Verify the token and update the password
    $stmt = $db->prepare("SELECT * FROM users WHERE reset_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the password and clear the reset token
        $stmt = $db->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $hashedPassword, $token);
        if ($stmt->execute()) {
            echo "Password has been successfully reset.";
        } else {
            echo "Failed to reset the password.";
        }
    } else {
        echo "Invalid reset token.";
    }
}
?>
