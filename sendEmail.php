<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Ensure PHPMailer is loaded

// SMTP configuration
$mail_host = "localhost";  // Change to your SMTP provider
$from_name = "442 Trading";  // From name
$from_email = "info@442trading.com";   // From email
$to_email = "muzammil.mykhan@gmail.com"; // The recipient's email address

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the message content
    $message = htmlspecialchars($_POST['message']);  // Sanitize message input

    if (!empty($message)) {

        // Set up PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Set SMTP host name                          
            $mail->Host = $mail_host;
            //Set this to true if SMTP host requires authentication to send email
            $mail->SMTPAuth = false;
            //Provide username and password     
            $mail->Username = $user_name;
            $mail->Password = $mail_pass;
            //If SMTP requires TLS encryption then set it
            // $mail->SMTPSecure = "none";
            $mail->SMTPAutoTLS = false;
            //Set TCP port to connect to
            $mail->Port = 25;
            
            // Set the sender's email and name
            $mail->From = $from_email;
            $mail->FromName = $from_name;

            // Add the recipient's email
            $mail->addAddress($to_email);

            // Content settings
            $mail->isHTML(true);
            $mail->Subject = "New Message Submission";

            // Read the email template from the "templates" folder
            $emailTemplate = file_get_contents('templates/email_template.php');

            // Replace the placeholder with the actual message
            $emailContent = str_replace('{{message_content}}', nl2br($message), $emailTemplate);

            // Set the email body
            $mail->Body = $emailContent;

            // Send the email
            if ($mail->send()) {
                // Redirect to success page
                header("Location: success_page.php");  // Adjust the URL to your success page
                exit(); // Ensure the script stops executing after the redirect
            } else {
                echo 'Failed to send message.';
            }
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo 'No message content provided.';
    }
}
?>
