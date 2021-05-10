<?php

require_once 'vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Twilio\Rest\Client;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
function register_mail($parent_name, $student_name, $email)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    // $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->Username = "rootiam903@gmail.com";
    $mail->Password = "iamGroot#1@";


    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/registration_notification.html');
    $footer = file_get_contents('./Email_Contents/footer.html');

    $data = $header . $content . $footer;
    $data = str_replace("{{sname}}", ucwords(strtolower($student_name)), $data);
    $data = str_replace("{{pname}}", ucwords(strtolower($parent_name)), $data);


    $mail->SetFrom('rootiam903@gmail.com', 'De Yo');
    $mail->FromName = "From";
    $mail->AddAddress($email);
    $mail->Subject = "Registration Notification";

    $mail->AddEmbeddedImage('./images/logo.jpg', 'logo');
    $mail->Body = $data;

    $mail->IsHTML(true);
    if (!$mail->Send()) {
        echo "Error: $mail->ErrorInfo";
    } else {
        echo "Message Sent!";
    }
}


function register_whatsapp_message($parent_name, $student_name, $phone_no)
{
    $sid    = "AC1bc45a1c9498b926ce7cdd8cba6bb5a5";
    $token  = "88ce868751fd208b20a5ebfe0ae6b4f6";
    $twilio = new Client($sid, $token);

    $no = $phone_no;
    $content = "*Dear {{pname}}*,\nCongratulations, *{{sname}}'s* account has been successfully created.";
    $content = str_replace("{{pname}}", ucwords(strtolower($parent_name)), $content);
    $content = str_replace("{{sname}}", ucwords(strtolower($student_name)), $content);
    $body = $content;

    $message = $twilio->messages
        ->create(
            "whatsapp:$no", // to 
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "$body"
            )
        );
    // print_r($message);
    print($message->sid);
}

register_mail("raj", "alok", "alokshete1@gmail.com");
register_whatsapp_message("raj", "alok", "+919172100642");
