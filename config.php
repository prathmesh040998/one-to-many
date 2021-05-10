<?php
$mshost = getenv('MYSQL_Host');
$mspasswd = getenv('MYSQL_Pass');
$pusher_app_key = getenv('P_AppKey');
$pusher_app_secret = getenv('P_AppSec');
$pusher_app_id = getenv('P_AppID');
$smtppass = getenv('SMTP_Pass');
$msdb = getenv('MYSQL_DB');
$msusr = getenv('MYSQL_User');

// $dbCon = new PDO(
//     sprintf('mysql:host=%s;dbname=%s', $mshost, $msdb),
//     $msusr,
//     $mspasswd,
//     array(
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_PERSISTENT => false
//     )
// );


$dbCon = new PDO(
    'mysql:host=localhost;dbname=cg_new;charset=utf8mb4',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false
    )
);

//pusher

require __DIR__ . '/vendor/autoload.php';
$options = array(
    'cluster' => 'ap2',
    'useTLS' => true
);


$pusher = new Pusher\Pusher(
    $pusher_app_key,
    $pusher_app_secret,
    $pusher_app_id,
    $options
);



// mail
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();                                            // Send using SMTP
// $mail->SMTPDebug  = 2;                                      //for testing
$mail->Host       = 'smtp.mail.us-west-2.awsapps.com';                       // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'support@code-gurukul.com';                   // SMTP username
$mail->Password   = $smtppass;                             // SMTP password
$mail->SMTPSecure = 'ssl';                                  // Enable SSL encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = 465;
$mail->SetFrom('support@code-gurukul.com', 'Code Gurukul');

// $mail = new PHPMailer;
// $mail->isSMTP();                                            // Send using SMTP
// // $mail->SMTPDebug  = 2;                                      //for testing
// $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
// $mail->Username   = 'codegurukul21@gmail.com';                   // SMTP username
// $mail->Password   = 'CodeGurukul21';                             // SMTP password
// $mail->SMTPSecure = 'tls';                                  // Enable SSL encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
// $mail->Port       = 587;
// $mail->SetFrom('codegurukul21@gmail.com', 'Code Gurukul');

//admin


if ($_SERVER['HTTP_HOST'] == "code-gurukul.com") {
    $admin_email = array("meenakshia.edu@gmail.com", "kabrarekha@gmail.com", "purvanand999@gmail.com");
} else {
    $admin_email = array("tempm966@gmail.com", "fepos14791@drluotan.com", "codegurukul21@gmail.com");
}
