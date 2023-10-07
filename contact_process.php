<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to Composer's autoloader

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = "recipient@example.com"; // Replace with the recipient's email address
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $name = $_POST["name"];
    $fromEmail = $_POST["email"];

    // Create a PHPMailer object
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtpout.secureserver.net';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@csaect.com';           // SMTP username
        $mail->Password = 'Root$1234';               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($fromEmail, $name);
        $mail->addAddress($toEmail);                          // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>
