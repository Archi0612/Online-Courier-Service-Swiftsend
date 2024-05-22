<?php
// Add your existing PHP code for session management and any necessary includes here

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle photo upload logic here
    $uploadDir = ' C:/xampp/htdocs/cms/uploads'; // Specify the correct path to your "uploads" directory
    $uploadedFile = $uploadDir . basename($_FILES['photo']['name']);
    
    // Validate file type
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $fileExtension = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
        // Move the uploaded file to the specified directory
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadedFile);
        
        // TODO: Save the file path to the database or perform other actions as needed
        // For example, you can insert the file path into the parcels table along with the parcel information.
        // $filePath = $uploadedFile;
        // $parcelId = $_POST['parcel_id'];
        // Perform database update or insert here

        echo "File uploaded successfully.";
    } else {
        echo "Invalid file type. Allowed types: " . implode(", ", $allowedExtensions);
    }
}
?>

<!-- HTML form for photo upload -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>
        <!-- Add any additional input fields you need, such as parcel_id -->
        <!-- <input type="hidden" name="parcel_id" value="your_parcel_id"> -->
        <button type="submit">Upload</button>
    </form>
</body>
</html>
