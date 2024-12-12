<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input[type="email"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="email"]:focus {
    border-color: #007bff;
    outline: none;
}

.error {
    color: red;
    font-size: 12px;
    display: none;
    margin-top: 5px;
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
}

button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
<form id="forgotPasswordForm" action="forgot_password_handler.php" method="POST" onsubmit="return validateForgotPasswordForm()">
    <h2>Reset Password</h2>
    <div class="form-group">
        <label for="resetEmail">Enter your email:</label>
        <input type="email" id="resetEmail" name="resetEmail" required>
        <div class="error" id="resetEmailError">Please enter a valid email address.</div>
    </div>
    <button type="submit">Send Reset Link</button>
</form>

<script>
    function validateForgotPasswordForm() {
        var isValid = true;
        var email = document.getElementById("resetEmail").value;

        // Basic email validation
        if (email === "" || !validateEmail(email)) {
            document.getElementById("resetEmailError").style.display = "block";
            isValid = false;
        } else {
            document.getElementById("resetEmailError").style.display = "none";
        }

        if (isValid) {
            // Make an AJAX call to forgot_password_handler.php
            var formData = new FormData();
            formData.append("resetEmail", email);

            fetch("forgot_password_handler.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                     // Alert user and redirect to a page after success
                     alert("A password reset link has been sent to your registered email.");
                    // Redirect to reset_password.php with the token
                    window.location.href = "reset_password.php?token=" + data.token;
                } else {
                    alert(data.message || "An error occurred. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        }

        return false; // Prevent default form submission
    }

    function validateEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
</script>

</body>
</html>