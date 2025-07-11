<?php
// Replace with your email address
$to = 'your@email.com';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $contact = isset($_POST['contact']) ? trim($_POST['contact']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $request_type = isset($_POST['request_type']) ? trim($_POST['request_type']) : '';
    $request_subtype = isset($_POST['request_subtype']) ? trim($_POST['request_subtype']) : '';
    $details = isset($_POST['details']) ? trim($_POST['details']) : '';

    // Validate required fields
    if ($name && $contact && $request_type && $request_subtype && $details) {
        $subject = "New Request from $name";
        $message = "Full Name: $name\n" .
                   "Contact Number: $contact\n" .
                   "Email: $email\n" .
                   "Request Type: $request_type\n" .
                   "Request Sub-Type: $request_subtype\n" .
                   "Details: $details\n";
        $headers = "From: noreply@yourdomain.com\r\n";
        if ($email) {
            $headers .= "Reply-To: $email\r\n";
        }

        if (mail($to, $subject, $message, $headers)) {
            echo "<h2>Thank you! Your request has been submitted.</h2>";
        } else {
            echo "<h2>Sorry, there was a problem sending your request. Please try again later.</h2>";
        }
    } else {
        echo "<h2>Please fill in all required fields.</h2>";
    }
} else {
    // If accessed directly, redirect to form
    header('Location: submit request.html');
    exit();
}
?> 