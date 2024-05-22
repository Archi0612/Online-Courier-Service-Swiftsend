<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }
        form {
            max-width: 400px;
            margin: 100px auto;
            
        }
        h2{
            font-weight: 50%;
            
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            
        }
    </style>
</head>
<body>

<form id="registrationForm" action="register_customer.php" method="post">
    <div>
    <h2>Customer Registration</h2>
    <input type="text" name="firstname" placeholder="First Name" required>
    <input type="text" name="lastname" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact" placeholder="Contact Number" required>
    <input type="password" name="password" id="password" placeholder="Password" required>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
    <p class="error" id="password_error"></p>
    <button type="submit" name="register_customer">Register</button>
    </div>
</form>

<script>
    document.getElementById("registrationForm").addEventListener("submit", function (event) {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (password !== confirm_password) {
            document.getElementById("password_error").innerText = "Passwords do not match!";
            event.preventDefault();
        }
    });
</script>

</body>
</html>
