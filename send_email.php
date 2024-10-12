<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/path/to/PHPMailer/src/Exception.php';
require 'C:/path/to/PHPMailer/src/PHPMailer.php';
require 'C:/path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comment = $_POST['comment'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'marshaquavo@gmail.com'; // Your Gmail address
        $mail->Password = 'qwerasdzx:123'; // Your Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('marshaquavo@gmail.com', 'Hubert');
        $mail->addAddress('marshaquavo@gmail.com'); // Add your email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Comment Submission';
        $mail->Body = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Website:</strong> $website<br><strong>Comment:</strong> $comment";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
