<?php
// submit_feedback.php

include('db_connect.php'); // Make sure to include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $parcel_id = mysqli_real_escape_string($conn, $_POST['parcel_id']);
    $rating = intval($_POST['rating']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);

    // Insert feedback into the 'feedback' table
    $insert_feedback = $conn->query("
        INSERT INTO feedback (name, email, parcel_id, rating, comments)
        VALUES ('$name', '$email', '$parcel_id', $rating, '$comments')
    ");

    if ($insert_feedback) {
        // If insertion is successful, send a success response
        $response = ['success' => true];
        echo json_encode($response);
        exit();
    } else {
        // If insertion fails, send an error response
        $response = ['success' => false];
        echo json_encode($response);
        exit();
    }
}

// Handle invalid requests
http_response_code(400);
?>
