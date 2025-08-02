<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

// Set the recipient email address
$to = "rajdhanicollege211@gmail.com"; // <-- Change this to your email address

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize form data
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $contact = isset($_POST['contact']) ? htmlspecialchars(trim($_POST['contact'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $request_type = isset($_POST['request_type']) ? htmlspecialchars(trim($_POST['request_type'])) : '';
    $request_subtype = isset($_POST['request_subtype']) ? htmlspecialchars(trim($_POST['request_subtype'])) : '';
    $course_name = isset($_POST['course_name']) ? htmlspecialchars(trim($_POST['course_name'])) : '';
    $semester = isset($_POST['semester']) ? htmlspecialchars(trim($_POST['semester'])) : '';
    $paper_type = isset($_POST['paper_type']) ? htmlspecialchars(trim($_POST['paper_type'])) : '';
    $paper_name = isset($_POST['paper_name']) ? htmlspecialchars(trim($_POST['paper_name'])) : '';
    $details = isset($_POST['details']) ? htmlspecialchars(trim($_POST['details'])) : '';

    // Validate required fields
    if ($name && $contact && $request_type && $request_subtype && $details) {
        $subject = "New Request from $name";
        $message = "Full Name: $name\n"
                 . "Contact Number: $contact\n"
                 . "Email: $email\n"
                 . "Request Type: $request_type\n"
                 . "Request Sub-Type: $request_subtype\n"
                 . "Course Name: $course_name\n"
                 . "Semester: $semester\n"
                 . "Paper Type: $paper_type\n"
                 . "Paper Name: $paper_name\n"
                 . "Details: $details\n";
        $headers = "From: $to\r\n";
        if ($email) {
            $headers .= "Reply-To: $email\r\n";
        }

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'rajdhanicollege211@gmail.com'; // Your Gmail address
            $mail->Password   = 'qbhm jluv kziz wedj';    // App password, not your Gmail password!
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('your_gmail@gmail.com', 'Your Name');
            $mail->addAddress('rajdhanicollege211@gmail.com'); // Recipient

            // Content
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            header("Location: submit request.html?msg=success");
            exit();
        } catch (Exception $e) {
            header("Location: submit request.html?msg=error");
            exit();
        }
    } else {
        header("Location: submit request.html?msg=error");
        exit();
    }
} else {
    echo "<h2>Invalid request.</h2>";
}
?> 