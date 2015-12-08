<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = $_POST['emailTo'];
$subject = "From aibol.kz: ".$name;
$message = wordwrap($message, 70, "\r\n");
$headers = 'From: '.$email . "\r\n" .
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$result = mail($to, $subject, $message, $headers);

echo $result;

?>