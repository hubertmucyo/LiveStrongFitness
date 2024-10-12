<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $website = htmlspecialchars($_POST['website']);
    $comment = htmlspecialchars($_POST['comment']);

    $to = "mucyohubert33@gmail.com";
    $subject = "New Comment from $name";
    $message = "Name: $name\nEmail: $email\nWebsite: $website\nComment: $comment";
    $headers = "From: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo '<div style="color: green;">Comment submitted successfully!</div>';
    } else {
        echo '<div style="color: red;">Failed to send email. Please try again later.</div>';
    }
} else {
    echo '<div style="color: red;">Invalid request method.</div>';
}
?>
