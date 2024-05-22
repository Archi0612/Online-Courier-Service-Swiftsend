<!-- reset_password_process.php -->

<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $token = $_POST["token"];

    // Retrieve user ID based on the token
    $token_sql = "SELECT user_id FROM password_reset_tokens WHERE token='$token'";
    $token_result = $conn->query($token_sql);

    if ($token_result->num_rows == 1) {
        $row = $token_result->fetch_assoc();
        $user_id = $row["user_id"];

        // Update the user's password in the database
        $update_sql = "UPDATE users SET password='$password' WHERE id='$user_id'";
        $conn->query($update_sql);

        // Delete the used token from the database
        $delete_sql = "DELETE FROM password_reset_tokens WHERE token='$token'";
        $conn->query($delete_sql);

        echo "Password reset successful!";
    } else {
        echo "Invalid token!";
    }
}

$conn->close();
?>
