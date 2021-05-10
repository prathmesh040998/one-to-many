<?php
include_once("config.php");
function send_registration_mail($fname, $lname, $pfname, $plname, $username, $email, $phone, $role)
{
    global $mail;
    global $admin_email;
    // mail for student

    // email content
    // $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/registration_notification.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data =  $content . $footer;
    $data = str_replace("{{sname}}", $fname, $data);
    $data = str_replace("{{pname}}", $pfname, $data);
    $mail->addAddress($email, $fname);
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'Welcome! ' . $fname . ' ' . $lname;
    // $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->Body    = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // mail for admin
    foreach ($admin_email as $aemail) {
        $mail->addAddress($aemail);
    }
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'new registation!';
    $content = file_get_contents('./Email_Contents/admin_registration_notification.html');
    $data1 = $content;
    $data1 = str_replace("{{sname}}", $fname . " " . $lname, $data1);
    $data1 = str_replace("{{pname}}", $pfname . " " . $plname, $data1);
    $data1 = str_replace("{{role}}", ucwords(strtolower($role)), $data1);
    $data1 = str_replace("{{username}}", $username, $data1);
    $data1 = str_replace("{{email}}", $email, $data1);
    $data1 = str_replace("{{pno}}", $phone, $data1);
    $mail->Body    = $data1;
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}



function send_contact_us_mail($sender_name, $sender_mail, $message)
{
    global $mail;
    global $admin_email;
    $mail->addAddress($admin_email[0]);
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'contact us';

    $data = "
    <table style='width:100%; ;  border-collapse: collapse;'>
        <tr style='border: 1px solid black'>
            <td style='border: 1px solid black'>Sender Name</td>
            <td style='border: 1px solid black'>$sender_name</td>
        </tr>
        <tr style='border: 1px solid black'>
            <td style='border: 1px solid black'>Sender Email</td>
            <td style='border: 1px solid black'>$sender_mail</td>
        </tr>
        <tr style='border: 1px solid black'>
            <td style='border: 1px solid black'>Mesaage</td>
            <td>$message</td>
        </tr>
    </table>
    ";


    $mail->Body    = $data;
    if (!$mail->Send()) {
        echo "Fail";
    } else {
        echo "done";
    }
}

function testing_mail(){
    global $mail;
    global $admin_email;
  
    $email = "tempm966.com";
    $mail->addAddress($email,"test");
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'contact us';
    $data = "test";
    $mail->Body    = $data;
    if (!$mail->Send()) {
        echo "Fail";
    } else {
        echo "done";
    }
}

// testing_mail();

// send_contact_us_mail("alok", "alok@gmail.com", "hiiiii......");

// send_registration_mail("alok", "shete", "raj", "shete", "alok", "alokshete1@gmail.com", "9172100642", "student");

function send_feedback_mail_after_completing_free_session($pname, $sname, $rlink, $flink, $email)
{
    global $mail;

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/After_completing_free_session.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("link to registration form", $rlink, $data);
    $data = str_replace("feedabck link", $flink, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Feedback and registration';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_feedback_mail_after_completing_free_session("Vijay", "Siddhesh", "register@code-gurukul.com", "feedback@code-gurukul.com", "codegurukul21@gmail.com");

function send_class_scheduled_mail($fname, $lname, $pfname, $email, $mname, $time, $number, $lesson_name)
{
    global $mail;
    $time = strtotime($time);
    $date = date('d/m/Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);
    //global $admin_email;
    // mail for student

    // email content
    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/after_scheduling_class_in_paid_category.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data =  $header. $content . $footer;
    $data = str_replace("{{sname}}", $fname, $data);
    $data = str_replace("{{pname}}", $pfname, $data);
    $data = str_replace("{{mname}}", $mname, $data);
    $data = str_replace("{{number}}", $number, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{time}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);
    $data = str_replace("{{lesson}}", $lesson_name, $data);
    //$data = str_replace("{{day}}, {{date}} at {{time}}", $time, $data);
    $mail->addAddress($email, $fname);
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'Class Scheduled';
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->Body    = $data;
    $mail->Send();
    $mail->ClearAllRecipients();
    // if (!$mail->Send()) {
    //     echo "failed";
    // } else {
    //     echo "mail sent";;
    // }
   

    
}

//send_class_scheduled_mail('Siddhesh', 'Yeole', 'Vijay', 'codegurukul21@gmail.com', 'Alok', '2011-07-26 20:15:00', '9657109699');
//send_class_scheduled_mail($_POST['first_name'], $_POST['last_name'], $_POST['parent_first_name'], $_POST['email'], $mname, $_POST['scheduleTime'], $number);


function send_class_rescheduled_mail($fname, $lname, $pfname, $email, $time, $number, $lesson_name)
{
    global $mail;
    $time = strtotime($time);
    $date = date('d/m/Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);
    //global $admin_email;
    // mail for student

    // email content
    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/after_rescheduling_any_class.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data =  $header. $content . $footer;
    $data = str_replace("{{sname}}", $fname, $data);
    $data = str_replace("{{pname}}", $pfname, $data);
    $data = str_replace("{{number}}", $number, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{time}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);
    $data = str_replace("{{lesson}}", $lesson_name, $data);
    //$data = str_replace("{{day}}, {{date}} at {{time}}", $time, $data);
    $mail->addAddress($email, $fname);
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = 'Class Rescheduled';
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->Body    = $data;
    $mail->Send();
    $mail->ClearAllRecipients();
    // if (!$mail->Send()) {
    //     echo "failed";
    // } else {
    //     echo "mail sent";;
    // }
      
}
// send_class_rescheduled_mail("Siddhesh", "Yeole", "Vijay", "codegurukul21@gmail.com", $time, $number);

function send_arranging_new_competition_mail($pname, $sname, $eventname, $eventDetails, $reglink, $email)
{
    global $mail;

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/arranging_a_competition.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("{{event_name}}", $eventname, $data);
    $data = str_replace("Registration link", $reglink, $data);
    $data = str_replace("#DETAILS OF THE COMPETITION", $eventDetails, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'New Competition';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_arranging_new_competition_mail("Vijay", "Siddhesh", "EventName", "EventDetails", "register_event@code-gurukul.com", "codegurukul21@gmail.com");





function send_class_commencement_mail_after_booking_paid_session($pname, $sname, $time, $email)
{
    global $mail;
    $time = strtotime($time);
    $date = date('d:m:Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/booking_paid_session.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{time}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);   
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Beginning of the course';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_class_commencement_mail_after_booking_paid_session("Vijay", "Siddhesh", "2011-07-26 20:15:00", "codegurukul21@gmail.com");

function send_cancel_class_mail($fname, $lname, $pfname, $email, $reschedule_link, $flink, $time, $cancel_time)
{
    global $mail;
    $time = strtotime($time);
    $date = date('d/m/Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);

    $cancel_time = strtotime($cancel_time);
    $cdate = date('d/m/Y', $cancel_time);
    $chours = date('h:i A', $cancel_time);
    $cday = date('l', $cancel_time);

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/cancelling_any_class.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{sname}}", $fname, $data);
    $data = str_replace("{{pname}}", $pfname, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{time}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);
    $data = str_replace("{{cdate}}", $cdate, $data);
    $data = str_replace("{{ctime}}", $chours, $data);
    $data = str_replace("{{cday}}", $cday, $data);
    $data = str_replace("*link to reschedule the class*", $reschedule_link, $data);
    $data = str_replace("*feedback link*", $flink, $data);
    $mail->addAddress($email, $fname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Class Cancelled';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }

}

//send_cancel_class_mail("Siddhesh", "Yeole", "Vijay", "codegurukul21@gmail.com", "reschedule@code-gurukul.com", "feedabck@code-gurukul.com");

function send_submission_of_project_homework_mail($pname, $sname, $email, $project_name, $time, $teacher_name)
{
    global $mail;
    $time = strtotime($time);
    $date = date('d/m/Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/submission_of_project_homework.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("{{teacher}}", $teacher_name, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{time}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);
    $data = str_replace("{{project}}", $project_name, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Congratulations!! Project Submitted';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

function send_completion_of_project_homework_mail($pname, $sname, $email, $project_name, $teacher_name, $teacher_comments)
{
    global $mail;
    
    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/completion_of_project_homework.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("{{teacher}}", $teacher_name, $data);
    $data = str_replace("{{project}}", $project_name, $data);
    $data = str_replace("{{comments}}", $teacher_comments, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Congratulations!! Project Approved';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

function send_project_sent_back_mail($sname, $pname ,$email, $project_name, $teacher_name, $teacher_comments)
{
    global $mail;
    
    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/project_sent_back.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{sname}}", $sname, $data);
    $data = str_replace("{{teacher}}", $teacher_name, $data);
    $data = str_replace("{{project}}", $project_name, $data);
    $data = str_replace("{{comments}}", $teacher_comments, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Project Sent Back';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_completion_of_project_homework_mail("Vijay", "Siddhesh", "codegurukul21@gmail.com");

function send_forgot_username_mail($pname, $sname, $username, $email)
{
    global $mail;

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/forgot_username.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{student}}", $sname, $data);
    $data = str_replace("{{username}}", $username, $data);
    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Forgot Username';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_forgot_username_mail("Vijay", "Siddhesh", "Sid123", "codegurukul21@gmail.com");



function send_password_reset_successfully_mail($pname, $username, $time, $email)
{
    global $mail;

    $time = strtotime($time);
    $date = date('d/m/Y', $time);
    $hours = date('h:i A', $time);
    $day = date('l', $time);
    
    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/password_changed.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{username}}", $username, $data);
    $data = str_replace("{{date}}", $date, $data);
    $data = str_replace("{{hours}}", $hours, $data);
    $data = str_replace("{{day}}", $day, $data);

    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Congratulations!! Password Successfully Reset';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_password_reset_successfully_mail("Vijay", "Sid123", "2011-07-26 20:15:00", "codegurukul21@gmail.com");

function send_mail_to_reset_password($pname, $username, $link, $email)
{
    global $mail;

    $header = file_get_contents('./Email_Contents/header.html');
    $content = file_get_contents('./Email_Contents/reset_password.html');
    $footer = file_get_contents('./Email_Contents/footer.html');
    $data = $header . $content . $footer;

    $data = str_replace("{{pname}}", $pname, $data);
    $data = str_replace("{{username}}", $username, $data);
    $data = str_replace("{{link}}", $link, $data);

    $mail->addAddress($email, $pname);
    $mail->AddEmbeddedImage('logo.png', 'logo');
    $mail->isHTML(true);

    $mail->Subject = 'Reset Password';
    $mail->Body = $data;
    $mail->send();
    $mail->ClearAllRecipients();

    // if (!$mail->send()){
    //     return 0;
    // }
    // else{
    //     return 1;
    // }
}

//send_mail_to_reset_password("Vijay", "Sid123", "reset_password@code-gurukul.com", "codegurukul21@gmail.com");

