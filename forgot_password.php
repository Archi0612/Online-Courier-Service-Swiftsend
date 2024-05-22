<?php
session_start();
include('db_connect.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset_password'])) {
    // Sanitize and validate user input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Additional validation and sanitation can be added as needed

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        $message = '<div class="alert alert-danger">Passwords do not match.</div>';
    } else {
        // Update user password in the 'users' table
        $update_password = $conn->query("
            UPDATE users 
            SET password = '$new_password' 
            WHERE email = '$email'
        ");

        if ($update_password) {
            // Redirect to login page after a successful password reset
            header('Location: login.php');
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            $message = '<div class="alert alert-danger">Error resetting password. Please check your email.</div>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ff4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #d9534f;
            border-radius: 4px;
            color: #d9534f;
            background-color: #f2dede;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php echo $message; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary" name="reset_password">Reset Password</button>
        </form>
    </div>
</body>
</html>
