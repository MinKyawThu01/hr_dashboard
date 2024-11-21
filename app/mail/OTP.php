<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

require_once ('config/DB.php');
require_once ('vendor/autoload.php');


class OTP extends DB {

    private $con;

    public function __construct()
    {
        $this->con = $this->connect();
    }

    public function sendOTP($data) {
        try {
            // var_dump($data);
            // echo 'hi';
            // die();
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';            // Specify SMTP server (e.g., smtp.gmail.com for Gmail)
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'supermkt2001@gmail.com'; // SMTP username (your email address)
            $mail->Password = 'bviqvzmowqcdrdzl';          // SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587;                          // TCP port to connect to (587 is common for TLS)
            // $mail->Port = 465;                          // TCP port to connect to (587 is common for TLS)

            // Debugging: Set to 2 or 3 to see detailed error messages
            // $mail->SMTPDebug = 3; // 2 or 3 will show detailed debug information
            // $mail->Debugoutput = 'html'; // Debug output in HTML format
            // Set the sender's email address and name
            $mail->setFrom('supermkt2001@gmail.com', 'Your Name');

            // Add recipient email address
            $mail->addAddress($data['email'], 'test'); // Recipient email

            // Set the email format to HTML (optional: you can change it to plain text if needed)
            $mail->isHTML(true);

            // Set the email subject
            $mail->Subject = 'OTP';

            $messageBody = "
            Hi {$data['email']},

            Your OTP code is {$_SESSION['otp']}

            If you didn't for this, please ignore this email.

            Thank you,
            [Tesing Company]

            ---

            © [2024] [Testing Company]. All rights reserved.";


            // Set the email body
            $mail->Body    = $messageBody;

            // Send the email
            if ($mail->send()) {
                echo "<script> location.href = '/2FA' </script>";
                // echo 'Message has been sent';
                // die();
            } else {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
                /* creates object */
                // $mailid = $email;
                // $subject = "Thank u";
                // $text_message = "Hello";
                // $message = "Thank You for Contact with us.";
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }


}