<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// $mail = new PHPMailer;
// $mail->isSMTP();                                               // Send using SMTP
// $mail->Host       = 'smtp.gmail.com';                          // Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                      // Enable SMTP authentication
// $mail->Username   = 'rootiam903@gmail.com';                    // SMTP username
// $mail->Password   = 'iamGroot#1@';                             // SMTP password
// $mail->SMTPSecure = 'tls';                                     // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
// $mail->Port       = 587;
// try {
// 	$mail->setFrom('rootiam903@gmail.com', 'CGdemo');
// 	$mail->addAddress('alokshete1@gmail.com');

// 	$mail->isHTML(true);
// 	$mail->Subject = 'Subject';
// 	$mail->Body    = 'HTML message body in <b>bold</b> ';
// 	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
// 	$mail->send();
// 	if ($mail->send()) {
// 		echo "Mail has been sent successfully!";
// 	} else {
// 		echo "Mail has been sent fail!";
// 		echo 'Mailer Error: ' . $mail->ErrorInfo;
// 		// echo !extension_loaded('openssl') ? "Not Available" : "Available";
// 	}
// } catch (Exception $e) {
// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtppro.zoho.in";
$mail->Port = 465;
$mail->Username = "support@code-gurukul.com";
$mail->Password = "aiT7h0sq2jiT";
$mail->SetFrom('support@code-gurukul.com', 'Code Gurukul');
$mail->FromName = "From";
$mail->AddAddress("alokshete1@gmail.com");
$mail->Subject = "PHPMailer demo";
$mail->Body = "<H3>test message</H3>";
$mail->IsHTML(true);
if (!$mail->Send()) {
	echo "Error: $mail->ErrorInfo";
} else {
	echo "Message Sent!";
}

$GLOBALS['debugOutput'] = [];

$mail->Debugoutput = function ($debugOutputLine, $level) {
	$GLOBALS['debugOutput'][] = $debugOutputLine;
};

//...Put your mail code here that could cause an error

$debug_output = implode("\n", $GLOBALS['debugOutput']);
echo $debugOutput;
