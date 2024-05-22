<!-- reset_password.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="reset_password_process.php" method="post">
        <label for="password">New Password:</label>
        <input type="password" name="password" required>
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
