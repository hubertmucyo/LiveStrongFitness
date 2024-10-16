<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Enable verbose debug output
        $mail->isSMTP();                                      // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                 // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                             // Enable SMTP authentication
        $mail->Username   = 'marshaquavo@gmail.com';          // SMTP username
        $mail->Password   = 'your_app_password_here';         // SMTP password (use an App Password for Gmail)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Enable implicit TLS encryption
        $mail->Port       = 465;                              // TCP port to connect to, use 587 if using ENCRYPTION_STARTTLS

        // Recipients
        $mail->setFrom('marshaquavo@gmail.com', 'Hubert');
        $mail->addAddress('marshaquavo@gmail.com');           // Add your email address

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New Comment Submission';
        $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Website:</strong> $website<br><strong>Comment:</strong> $comment";
        $mail->AltBody = "Name: $name\nEmail: $email\nWebsite: $website\nComment: $comment"; // Plain text for non-HTML clients

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
