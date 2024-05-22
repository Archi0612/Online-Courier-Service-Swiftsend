<?php
session_start();
include('db_connect.php');

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
            exit();
        } else {
            $message = '<div class="alert alert-danger">Error resetting password. Please check your email.</div>';
        }
    }
}
?>
