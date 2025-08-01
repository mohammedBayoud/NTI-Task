<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'guide.me.create@gmail.com';
    $mail->Password   = 'iikkemaedfxuuuul';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        //Enable implicit TLS encryption
    $mail->Port       = 465;                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('guide.me.create@gmail.com', 'Mohammed Bayoud');
    $mail->addAddress('ahmedabubakr148@gmail.com', 'Ahmed Abubakr');

    $mail->isHTML(true);
    $mail->Subject = 'Test PHPMailer';
    $mail->Body    = '   Hello <b>This is just a test</b> ';
    $mail->AltBody = 'Hello Eng/Ahmed Abubakr';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
