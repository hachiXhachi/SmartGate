<?php
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$ch = curl_init();

// Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=5ea2f64ae28a442db9d975ad24706d77&email=$email");

// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Execute the request.
$data = curl_exec($ch);

// Close the cURL handle.
curl_close($ch);
// Print the data out onto the page.
$result = json_decode($data, true);
if ($result['deliverability'] === "UNDELIVERABLE" ||$result['deliverability'] === "UNKNOWN"||$result["is_disposable_email"]["value"] === true ) {
        echo "Email Not Existing";
}else{
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
        echo 'error: ' . $mail->ErrorInfo;
    }
}
 

?>
