<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TACHS ONLINE SHOPPING</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

form {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

h2 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input[type="password"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
}

button:hover {
    background-color: #0056b3;
}

input[type="password"]::placeholder {
    font-size: 12px;
    color: #999;
}
/* Styling for the password container */
.password-container {
    position: relative;
    display: flex;
    align-items: center;
}

/* Styling for the eye icon */
.eye-icon {
    position: absolute;
    right: 10px;
    cursor: pointer;
    font-size: 18px;
    user-select: none; /* Prevents text selection */
}

/* Styling for the input fields to prevent overlap with the icon */
input[type="password"] {
    padding-right: 30px; /* Adjust as needed */
}
 </style>
</head>
<body>
<?php
// Database connection
$db = new mysqli("localhost", "root", "", "cosbay_db");

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $token = $_POST['token'];

    // Check if passwords match
    if ($newPassword !== $confirmPassword) {
        echo "<script>
                alert('Passwords do not match.');
                window.history.back();
              </script>";
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Verify the token and update the password
    $stmt = $db->prepare("SELECT email FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user's email associated with the reset token
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Update the password and clear the reset token
        $stmt = $db->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);

        if ($stmt->execute()) {
            // Success message with JavaScript alert and redirection to login page
            echo "<script>
                    alert('Password has been successfully reset.');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "<script>alert('Failed to reset the password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid or expired reset token.');</script>";
    }
}
?>

<!-- Password reset form -->
<form method="POST" id="resetPasswordForm">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">

    <div class="form-group">
        <label for="newPassword">New Password:</label>
        <div class="password-container">
            <input type="password" id="newPassword" name="newPassword" required>
            <span class="eye-icon" onclick="togglePasswordVisibility('newPassword', this)">
                👁️
            </span>
        </div>
    </div>

    <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <div class="password-container">
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <span class="eye-icon" onclick="togglePasswordVisibility('confirmPassword', this)">
                👁️
            </span>
        </div>
    </div>

    <button type="submit">Reset Password</button>
</form>

<script>
    function togglePasswordVisibility(inputId, iconElement) {
        var input = document.getElementById(inputId);
        if (input.type === "password") {
            input.type = "text";
            iconElement.textContent = "🙈"; // Change the icon to indicate visibility
        } else {
            input.type = "password";
            iconElement.textContent = "👁️"; // Change the icon back to indicate hidden
        }
    }
</script>
</body>
</html>