<?php

require_once ('../../config/DB.php');
require_once ('vendor/autoload.php');


class OTP extends DB {

    private $con;

    public function __construct()
    {
        $this->con = $this->connect();
    }

    public function sendMail() {
        try {

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            $mail->isSMTP();                            // Set mailer to use SMTP
            $mail->Host = 'smtp.example.com';            // Specify SMTP server (e.g., smtp.gmail.com for Gmail)
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = 'your_email@example.com'; // SMTP username (your email address)
            $mail->Password = 'your_password';          // SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587;                          // TCP port to connect to (587 is common for TLS)

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