<?php
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "usernameistakenqwerty0@gmail.com";
$mail->Password = "bghm wjxx hleg gyei";

$mail->addAddress($email);
$mail->setFrom("usernameistakenqwerty0@gmail.com", "SmartGate");

$mail->Subject = $subject;
$mail->Body = $message;

if ($mail->send()) {
    echo 'success';
} else {
    echo 'error';
}
?>
