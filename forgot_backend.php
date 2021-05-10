<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = 'ssl://smtp.gmail.com';                       // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'rootiam903@gmail.com';                   // SMTP username
$mail->Password   = 'iamGroot#1@';                             // SMTP password
$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 465;

// Database Connectivity
$mysqli = new mysqli("localhost", "root", "kdyUDK63782^", "cg_2a_beta");
if ($mysqli->connect_error) {
    exit('Error connecting to database'); //Should be a message a typical user could understand in production
}

// $mysqli = new mysqli("localhost", "alok", "alok", "cg_2b_dev");
// if ($mysqli->connect_error) {
//     exit('Error connecting to database'); //Should be a message a typical user could understand in production
// }
error_reporting(0);

if (isset($_POST['forgot_password'])) {
    $username = $mysqli->real_escape_string($_POST['username']);
    //Find username to email
    $stmt = $mysqli->prepare("SELECT parent_first_name,email FROM users WHERE username='$username'");
    $stmt->execute();
    $result = $stmt->get_result();
    $arr = [];
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    if (!$arr) {
        echo 3;
    } else {
        $email = $arr[0]["email"];
        $pname = $arr[0]["parent_first_name"];

        $stmt->close();

        $mail->setFrom('rootiam903@gmail.com', 'CG');
        $mail->addAddress($email);       // Add a recipient
        //$mail->addReplyTo('SENDER-EMAIL-ID', 'Information');

        // $data = file_get_contents('template2.html');

        //Token generation
        $token = "qwertyuiopasdfghjklzxcvbnm1234567890";
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);

        $stmt = $mysqli->prepare("UPDATE users SET token='$token' ,tokenExpire=DATE_ADD(NOW(),INTERVAL 5 MINUTE) WHERE email='$email'");
        $stmt->execute();
        $result = $stmt->get_result();


        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        // Append the requested resource location to the URL   
        $url .= $_SERVER['REQUEST_URI'];

        // echo $url;

        $url =  str_replace("forgot_backend", "reset_password", $url);
        $link = $url . "?email=$email&token=$token";
        $header = file_get_contents('Email_Contents/header.html');
        $content = file_get_contents('Email_Contents/content.html');
        $footer = file_get_contents('Email_Contents/footer.html');
        $data = $header . $content . $footer;
        $data = str_replace("{{pname}}", $pname, $data);
        $data = str_replace("{{username}}", $username, $data);
        $data = str_replace("{{link}}", $link, $data);
        $xy = "";

        // $data = str_replace("{{username}}",$username,$data);
        // $data = str_replace("{{date}}",date("Y/m/d"),$data);

        $mail->isHTML(true);                                         // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->AddEmbeddedImage('logo.png', 'logo');
        $mail->Body    = $data;

        if ($mail->send()) {
            echo 1;
        } else {
            echo 0;
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}

if (isset($_POST['forgot_username'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);

    // $username ="vivek903";

    //Find username to email
    $stmt = $mysqli->prepare("SELECT first_name,parent_first_name,username FROM users WHERE email='$email' and mobile='$phone'");
    $stmt->execute();
    $result = $stmt->get_result();
    $arr = [];
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }


    if (!$arr) {
        echo 3;
    } else {
        $username = $arr[0]["username"];
        $pname = $arr[0]["parent_first_name"];
        $sname = $arr[0]["first_name"];
        $stmt->close();

        $mail->setFrom('rootiam903@gmail.com', 'CG');
        $mail->addAddress($email);       // Add a recipient;

        $header = file_get_contents('Email_Contents/header.html');
        $content = file_get_contents('Email_Contents/forgot_username.html');
        $footer = file_get_contents('Email_Contents/footer.html');
        $data = $header . $content . $footer;
        $data = str_replace("{{pname}}", $pname, $data);
        $data = str_replace("{{username}}", $username, $data);
        $data = str_replace("{{student}}", $sname, $data);

        // $data = str_replace("{{username}}",$username,$data);
        // $data = str_replace("{{date}}",date("Y/m/d"),$data);

        $mail->isHTML(true);                                         // Set email format to HTML
        $mail->Subject = 'Forgotten Username';
        $mail->AddEmbeddedImage('logo.png', 'logo');
        $mail->Body    = $data;

        if ($mail->send()) {
            echo 1;
        } else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo "Mail Not Sent";
        }
    }
}


if (isset($_POST['remove_token'])) {
    $email = $mysqli->real_escape_string($_POST['email']);

    $stmt = $mysqli->prepare("UPDATE users SET tokenExpire='',token='' WHERE email='$email'");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($stmt) {
        echo 1;
    }
} else if (isset($_POST['reset_password'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("UPDATE users SET password='$password' ,tokenExpire='',token='' WHERE email='$email'");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($stmt) {
        $time = date('d-m-y h:i:s');
        $mail->setFrom('rootiam903@gmail.com', 'CG');
        $mail->addAddress($email);       // Add a recipient
        $header = file_get_contents('Email_Contents/header.html');
        $content = file_get_contents('Email_Contents/reset.html');
        $footer = file_get_contents('Email_Contents/footer.html');
        $data = $header . $content . $footer;

        $stmt = $mysqli->prepare("SELECT parent_first_name,username FROM users WHERE email='$email'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        date_default_timezone_set('Asia/Kolkata');
        $time = date('d-m-y h:i:s');

        $username = $row['username'];
        $pname = $row['parent_first_name'];

        $data = str_replace("{{pname}}", $pname, $data);
        $data = str_replace("{{username}}", $username, $data);
        $data = str_replace("{{time}}", $time, $data);
        $mail->isHTML(true);                                         // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->AddEmbeddedImage('logo.png', 'logo');
        $mail->Body    = $data;


        if ($mail->send()) {
            echo 1;
        } else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo "Confirmation Mail Not Sent";
        }
    } else {
        echo "Password Not Resetted";
    }
}
