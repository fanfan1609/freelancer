<?php
define("GUSER", 'xxxxx@gmail.com'); // Set up your gmail 
define("GPWD", 'xxxx'); // Set up your gmail password
define("URL","http://workspace.local/freelancer/question");
define("FROM_EMAIL",'xxxx@abc.com');
define("FROM_NAME",'Admin');
// Define question array

$question = array(
    'Vad är viktigast för dig',
    'Vad är viktigast',
    'Sortera vad som är viktigast för dig'
);


include 'Mailer/PHPMailerAutoload.php';

function smtpmailer($to,$from,$from_name,$subject,$body){
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}