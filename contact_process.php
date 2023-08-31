<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "harishsundarg@gmail.com"; // Change this to your email address
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: " . $_POST["email"] . "\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
