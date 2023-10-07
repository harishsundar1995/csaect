<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $toEmail = "harishsundarg@gmail.com"; // Replace with the recipient's email address
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $name = $_POST["name"];
    $fromEmail = $_POST["email"];

    $headers = "From: $name <$fromEmail>\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Check if all fields are filled
    if (!empty($subject) && !empty($message) && !empty($name) && !empty($fromEmail)) {
        // Attempt to send the email
        if (mail($toEmail, $subject, $message, $headers)) {
            echo "success"; // You can customize this success message as needed
        } else {
            echo "error"; // Display an error message if the email couldn't be sent
        }
    } else {
        echo "empty"; // Display a message if any of the fields are empty
    }
} else {
    echo "error"; // Handle invalid form submissions
}
?>
