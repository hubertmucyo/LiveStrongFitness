<?php
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
        $mail->Username = 'mucyohubert33@gmail.com'; // Your Gmail address
        $mail->Password = 'your_app_password'; // Your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('mucyohubert33@gmail.com', 'Your Name');
        $mail->addAddress('mucyohubert33@gmail.com'); // Add your email address

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
