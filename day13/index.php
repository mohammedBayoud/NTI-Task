<?php
require_once 'mail.php';
$mail->setFrom('guide.me.create@gmail.com', 'Mohammed Mohammed Bayoud');
$mail->addAddress('ahmedabubakr148@gmail.com');
$mail->Subject = 'Test';
$mail->send();

?>