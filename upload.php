<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cms_db";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle file upload
    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the file is a valid image
    $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert data into parcels_photos table
            $user_id = 4; // Change this to the actual user ID
            $parcel_id = $_POST['parcel_id']; // Assuming you have a parcel ID from the form
            $date_uploaded = date("Y-m-d H:i:s");

            $insertQuery = "INSERT INTO `parcels_photos` (`user_id`, `parcel_id`, `file_name`, `file_path`, `date_uploaded`)
                            VALUES ('$user_id', '$parcel_id', '$fileName', '$targetFilePath', '$date_uploaded')";

            if ($conn->query($insertQuery) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Error inserting data: " . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose File:</label>
        <input type="file" name="file" id="file" required>
        <br>
        <label for="parcel_id">Parcel ID:</label>
        <input type="text" name="parcel_id" id="parcel_id" required>
        <br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
