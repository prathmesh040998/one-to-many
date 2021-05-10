<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include_once("mail.php");
include_once("config.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

date_default_timezone_set('Asia/Kolkata');
// use to disble buttons
$disabledButton = "disabled";

$file_path = getenv("CONTENT_PATH");

// session rewards
if (isset($_GET['session_rewards'])) {
  global $dbCon;
  $handle = $dbCon->prepare('update schedule_students set acp_reward=:event where schedule_id=:id');
  $handle->bindParam(':event', $_GET['event'], PDO::PARAM_STR);
  $handle->bindParam(':id', $_GET['sid'], PDO::PARAM_INT); // explicitly tell pdo to expect an int
  $handle->execute();
  echo 1;
}
// session rewards end

function getUserData($userId = null)
{
  global $dbCon;
  $handle = $dbCon->prepare('select * from users where user_id =' . $userId);
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

if (isset($_POST['saveLink'])) {
  submitProjectLink($_POST['schedule_id'], $_POST['ProjectLink']);
}

function submitProjectLink($projectId, $link)
{
  global $dbCon;
  $student_id = $_SESSION['user_id'];
  $date = date("Y-m-d H:i:s");
  $sql = "update schedule_students set  project_submit_date=NOW(),status ='awating_review', project_submit_link='$link' where schedule_id=$projectId AND student_id=$student_id";
  $handle = $dbCon->prepare($sql);
  $handle->execute();
  $schedule = (array)getScheduleDetails($projectId);
  $student = get_full_user_details($_SESSION['user_id']);
  $teacher = get_full_user_details($schedule['teacher_id']);
  send_submission_of_project_homework_mail($student['parent_first_name'], $student['first_name'], $student['email'], $schedule['project_name'], $date, $teacher['first_name']);
  echo 1;
}

function saveComments($projectId, $comments)
{
  global $dbCon;
  $handle = $dbCon->prepare('update schedule_students set teacher_comments=:comments where schedule_id=:id');
  $handle->bindParam(':id', $projectId, PDO::PARAM_INT);
  $handle->bindParam(':comments', $comments, PDO::PARAM_STR); // explicitly tell pdo to expect an int
  $handle->execute();
  return 1;
}

function sessionMarkConducted($projectId)
{
  global $dbCon;
  $handle = $dbCon->prepare('update schedule_students set status="conducted" where schedule_id=:id');
  $handle->bindParam(':id', $projectId, PDO::PARAM_INT);
  $handle->execute();
  return 1;
}

function getUsers($role)
{
  global $dbCon;
  $handle = $dbCon->prepare('select user_id, first_name, last_name from users where role =  "' . $role . '" ');
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getSchedules($userId = null)
{
  global $dbCon;
  $handle = $dbCon->prepare('select * from schedules
        left join lessons where schedules.lesson_id=lessons.lesson_id
    where user_id="' . $userId . '"');
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getTeacherStudentSchedules()
{
  $teacher_id = $_SESSION['user_id'];
  global $dbCon;
  $handle = $dbCon->prepare("select *,(schedule_time < NOW()) as expired , (schedule_time > (NOW() + INTERVAL 1 HOUR)) as upcoming, (schedule_time > (NOW() + INTERVAL 6 HOUR)) as validToCancel , (NOW() between (schedule_time - Interval 10 Minute) and (schedule_time + INTERVAL 1 HOUR)) as active, (NOW() > (schedule_time + INTERVAL 1 HOUR)) as `over` from schedule_students 
left join schedules on schedules.schedule_id=schedule_students.schedule_id 
left join lessons on schedules.lesson_id=lessons.lesson_id
left join users on schedule_students.student_id=users.user_id 
where schedule_students.status != 'cancel' and schedules.teacher_id = $teacher_id order by schedule_time ASC");
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getStudentsSchedules($userId = null)
{
  global $dbCon;
  $handle = $dbCon->prepare('select *,(schedule_time < NOW()) as expired , (schedule_time > (NOW() + INTERVAL 1 HOUR)) as upcoming, (schedule_time > (NOW() + INTERVAL 6 HOUR)) as validToCancel , (NOW() between (schedule_time - Interval 10 Minute) and (schedule_time + INTERVAL 1 HOUR)) as active, (NOW() > (schedule_time + INTERVAL 1 HOUR)) as `over` from schedules 
left join lessons on schedules.lesson_id=lessons.lesson_id 
left join users on schedules.teacher_id=users.user_id 
left join schedule_students on schedules.schedule_id=schedule_students.schedule_id 
where schedule_students.status != "cancel" and student_id=' . $userId . ' order by schedule_time ASC');
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getScheduleDetails($sid)
{
  global $dbCon;
  $handle = $dbCon->prepare('select *, (NOW() > (schedule_time + INTERVAL 1 HOUR)) as `over` from schedules
    left join lessons on schedules.lesson_id=lessons.lesson_id
    where schedule_id="' . $sid . '"');
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  if ($result)
    return $result[0];
  return null;
}

function getTeachersSchedules($userId = null)
{
  global $dbCon;
  $handle = $dbCon->prepare("
      select *,(schedule_time < NOW()) as expired , (schedule_time > (NOW() + INTERVAL 1 HOUR)) as upcoming, (schedule_time > (NOW() + INTERVAL 6 HOUR)) as validToCancel, (NOW() between (schedule_time - Interval 10 Minute) and (schedule_time + INTERVAL 1 HOUR)) as active, (NOW() > (schedule_time + INTERVAL 1 HOUR)) as `over` from schedules
       left join lessons on schedules.lesson_id=lessons.lesson_id
       left join users on schedules.teacher_id=users.user_id
   where schedule_cancellation_date IS NULL and schedules.teacher_id= $userId order by schedule_time asc");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getLinks($role = null)
{
  global $dbCon;
  $handle = $dbCon->prepare('select *, (schedule_time > NOW()) as expired from schedules
    left join lessons on lessons.lesson_id=schedules.lesson_id
    left join links on lessons.lesson_id=links.lesson_id
    group by links.for');
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getStudentsLinks($lesson_id)
{
  global $dbCon;
  $handle = $dbCon->prepare('SELECT *
FROM `links`
left join lessons on lessons.lesson_id=links.lesson_id
WHERE `for` = "Student" AND links.lesson_id = ' . $lesson_id);
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getTeachersLinks($lesson_id)
{
  global $dbCon;
  $handle = $dbCon->prepare('SELECT *
FROM `links`
left join lessons on lessons.lesson_id=links.lesson_id
WHERE `for` = "Teacher" AND links.lesson_id = ' . $lesson_id);
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

//check login
if (isset($_POST['login'])) {
  checkUser($_POST["username"], $_POST["password"]);
}
function checkUser($username, $pass)
{
  global $dbCon;
  $handle = $dbCon->prepare('select * from users where username="' . $username . '" limit 1');
  $handle->execute();

  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  // print_r(password_verify($pass, $result[0]->password));
  if (isset($result[0]) &&  password_verify($pass, $result[0]->password)) {
    $_SESSION['role'] = strtolower($result[0]->role);
    $_SESSION['user_id'] = $result[0]->user_id;
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $result[0]->username;
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_POST['checkUserName'])) {
  checkUserName($_POST['username']);
}

function checkUserName($username)
{

  global $dbCon;
  $sql = "select count(*) as total from users WHERE username = '$username'";
  $handle = $dbCon->prepare($sql);
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);

  if ($result[0]->total == 0) {
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_POST['checkUserEmail'])) {
  checkUserEmail($_POST['email']);
}

function checkUserEmail($email)
{

  global $dbCon;
  $sql = "select count(*) as total from users WHERE email = '$email'";
  $handle = $dbCon->prepare($sql);
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);

  if ($result[0]->total == 0) {
    echo 1;
  } else {
    echo 0;
  }
}


//student registration
if (isset($_POST['studentRegister'])) {
  $ParentFirstName = ucwords(strtolower($_POST['ParentFirstName']));
  $ParentLastName = ucwords(strtolower($_POST['ParentLastName']));
  $StudentFirstName = ucwords(strtolower($_POST['StudentFirstName']));
  $StudentLastName = ucwords(strtolower($_POST['StudentLastName']));
  $UserNameSReg = $_POST['UserNameSReg'];
  $StudentGender = $_POST['StudentGender'];
  $EmailIdSReg = $_POST['EmailIdSReg'];
  $PasswordSReg = password_hash($_POST['PasswordSReg'], PASSWORD_DEFAULT);
  $DOBSReg = $_POST['DOBSReg'];
  $MobileSReg = $_POST['PhoneStudent'];
  $DateSReg = date("m-d-Y");
  $RoleSReg = "student";

  //refer
  global $dbCon;
  $handle1 = $dbCon->prepare("INSERT INTO users (`first_name` ,`last_name` ,`username` ,`email`,`password` ,`role`,`registration_date`,`mobile`,`parent_first_name`,`parent_last_name`,`gender`,`birthday_date`) VALUES ('$StudentFirstName','$StudentLastName','$UserNameSReg','$EmailIdSReg','$PasswordSReg','$RoleSReg','$DateSReg','$MobileSReg','$ParentFirstName','$ParentLastName','$StudentGender','$DOBSReg')");
  $handle1->execute();

  $ReferFirstName = $_POST['ReferFirstName'];
  $ReferLastName = $_POST['ReferLastName'];
  $EmailIdRReg = $_POST['EmailIdRReg'];
  $PhoneRefer = $_POST['PhoneRefer'];
  $refered_by_id = $_POST['Referedby'];

  $handle2 = $dbCon->prepare("INSERT INTO refer_detail (`first_name` ,`last_name` ,`username` ,`referer_email`,`referer_moblie`) VALUES('$ReferFirstName','$ReferLastName','$UserNameSReg','$EmailIdRReg','$PhoneRefer')");
  $handle2->execute();

  // updating referal reward;
  if ($_POST['Referedby'] != '#cg-admin') {
    $data = get_full_user_details((int)$refered_by_id);
     $referal_reward = $data;
    if (is_null($referal_reward)) {
      $referal_reward = 1;
    } else {
      $referal_reward = $referal_reward + 1;
    }
    $handle = $dbCon->prepare('update users set referal_reward=:reward where user_id=:user_id');
    $handle->bindParam(':reward', $referal_reward, PDO::PARAM_INT);
    $handle->bindParam(':user_id', $refered_by_id, PDO::PARAM_INT);
    $handle->execute();
  }

  send_registration_mail($StudentFirstName, $StudentLastName, $ParentFirstName, $ParentLastName, $UserNameSReg, $EmailIdSReg, $MobileSReg, $RoleSReg);

  echo 1;
}

//teacher registation
if (isset($_POST['TeacherRegister'])) {
  $TeacherFirstName = ucwords(strtolower($_POST['TeacherFirstName']));
  $TeacherLastName = ucwords(strtolower($_POST['TeacherLastName']));
  $UserNameTReg = $_POST['UserNameTReg'];
  $TeacherGender = $_POST['TeacherGender'];
  $TeacherQualifications = $_POST['TeacherQualifications'];
  $EmailIdTReg = $_POST['EmailIdTReg'];
  $PasswordTReg = $_POST['PasswordTReg'];
  $PasswordTReg = password_hash($PasswordTReg, PASSWORD_DEFAULT);
  $DOBTReg = $_POST['DOBTReg'];
  $PhoneTReg = $_POST['PhoneTReg'];
  $DateTReg = date("m-d-Y");
  $RoleTReg = "teacher";

  global $dbCon;
  $handle = $dbCon->prepare("INSERT INTO users (`first_name` ,`last_name` ,`username` ,`email`,`password` ,`role`,`registration_date`,`mobile`,`qualifications`,`gender`,`birthday_date`) VALUES
      ('$TeacherFirstName','$TeacherLastName','$UserNameTReg','$EmailIdTReg','$PasswordTReg',
      '$RoleTReg','$DateTReg','$PhoneTReg','$TeacherQualifications','$TeacherGender','$DOBTReg')");
  $handle->execute();
  send_registration_mail($TeacherFirstName, $TeacherLastName, "", "", $UserNameTReg, $EmailIdTReg, $PhoneTReg, $RoleTReg);
  echo 1;
}

function getUnScheduleLesson($student_id, $course_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("SELECT * FROM lessons WHERE course_id=$course_id and NOT lesson_id in (SELECT lesson_id from schedules where schedule_id in (SELECT schedule_id from schedule_students where status != 'cancel' and student_id = $student_id)) ORDER BY sequence ASC");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}

function getTeachersAllSchedules($userId = null)
{
  global $dbCon;
  $handle = $dbCon->prepare("select * from schedules where schedule_cancellation_date IS NULL and teacher_id = '$userId'");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //    print_r($result);
  return $result;
}
//getTeachersAllSchedules(42);

function bookSchedules($lesson_id, $schedule_time, $room_id, $teacher_id, $student_id)
{
  global $dbCon;
  $date = date("Y-m-d H:i:s");
  $handle1 = $dbCon->prepare("INSERT INTO schedules (lesson_id,schedule_time,room_id,teacher_id,student_id,schedule_booking_date,status)VALUES('$lesson_id','$schedule_time','$room_id','$teacher_id','$student_id','$date','')");
  $handle1->execute();
  $student = get_full_user_details($student_id);
  $teacher = get_full_user_details($teacher_id);
  $lesson = (array)getLesson($lesson_id);
  send_class_scheduled_mail($student['first_name'], $student['last_name'], $student['parent_first_name'], $student['email'], $teacher['first_name'], $schedule_time, '+91 95118 41742', $lesson[0]->lesson_name);
  echo 1;
}

if (isset($_POST['scheduleStudentClass'])) {
  bookSchedules($_POST['lessonId'], $_POST['scheduleTime'], uniqid(), $_POST['teacherId'], $_POST['studentId']);
}

// getTeacherAvailability(42);

function getTeacherAvailability($teacher_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("SELECT * FROM `teacher_availability` WHERE teacher_id='$teacher_id'");
  $handle->execute();

  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  //print_r($result);
  return $result;
}


function projectReview($schedule_id, $teacherComments, $status, $student_id )
{
  global $dbCon;
  $handle1 = $dbCon->prepare("UPDATE `schedule_students` SET `status` = '$status',`teacher_comments`='$teacherComments' WHERE `schedule_students`.`schedule_id` = $schedule_id AND  `schedule_students`.`student_id` = $student_id ;");
  $handle1->execute();
  $schedule = (array)getScheduleDetails($schedule_id);
  $student = get_full_user_details($student_id);
  $teacher = get_full_user_details($schedule['teacher_id']);
  send_project_sent_back_mail($student['first_name'], $student['parent_first_name'], $student['email'], $schedule['project_name'], $teacher['first_name'], $teacherComments);
  echo 1;
}

if (isset($_POST['projectReview'])) {
  projectReview($_POST['scheduleId'], $_POST['teacherComments'], $_POST['status'],  $_POST['student_id']);
}
//  projectReview(3,'demo',"approved");

function cancelSchedule($schedule_id)
{

  global $dbCon;
  $date = date("Y-m-d H:i:s");
  $handle1 = $dbCon->prepare("UPDATE `schedules` SET `status` = 'cancel',schedule_cancellation_date='$date'  WHERE `schedules`.`schedule_id` = $schedule_id;");
  $handle1->execute();

  $student = get_full_user_details($_SESSION['user_id']);
  $schedule = (array)getScheduleDetails($schedule_id);
  send_cancel_class_mail($student['first_name'], $student['last_name'], $student['parent_first_name'], $student['email'], 'reschedule_link', 'feedback_link', $schedule['schedule_time'], $schedule['schedule_cancellation_date']);
  echo 1;
}

if (isset($_POST['cancelScheduleStudentClass'])) {
  cancelSchedule($_POST['reScheduleId']);
}

function reScheduleStudentClass($schedule_id, $schedule_time)
{
  global $dbCon;
  $handle1 = $dbCon->prepare("UPDATE `schedules` SET `schedule_time` = '$schedule_time' WHERE `schedules`.`schedule_id` = $schedule_id;");
  $handle1->execute();
  $student = get_full_user_details($_SESSION['user_id']);
  $schedule = (array)getScheduleDetails($schedule_id);
  $lesson = (array)getLesson($schedule['lesson_id']);
  send_class_rescheduled_mail($student['first_name'], $student['last_name'], $student['parent_first_name'], $student['email'], $schedule_time, '+91 95118 41742', $lesson[0]->lesson_name);
  echo 1;
}
if (isset($_POST['reScheduleStudentClass'])) {
  reScheduleStudentClass($_POST['reScheduleId'], $_POST['scheduleTime']);
}


function assignProject($schedule_id)
{
  global $dbCon;
  $handle1 = $dbCon->prepare("UPDATE `schedule_students` SET `status` = 'pending' WHERE `schedule_students`.`schedule_id` = $schedule_id;");
  $handle1->execute();
  echo 1;
}

if (isset($_POST['assignProject'])) {
  assignProject($_POST['session_id']);
}

function projectApproved($schedule_id, $teacherRemark, $status, $student_id)
{
  global $dbCon;
  $remark = $teacherRemark;
  $teacherRemark = date("d-m-Y H:i:s") . "\n" . $teacherRemark;
  $handle1 = $dbCon->prepare("UPDATE `schedule_students` SET `status` = '$status',`teacher_valuation`='$teacherRemark' WHERE `schedule_students`.`schedule_id` = $schedule_id AND  `schedule_students`.`student_id` = $student_id;");
  $handle1->execute();
  //echo 1;
  //echo 'Project Approved';

  //Project Submission Reward 
  $data = get_full_user_details($student_id);
  $project_sub_reward = $data['project_sub_reward'];
  if (is_null($project_sub_reward)) {
    $project_sub_reward = 1;
  } else {
    $project_sub_reward = $project_sub_reward + 1;
  }
  $handle = $dbCon->prepare('update users set project_sub_reward=:reward where user_id=:user_id');
  $handle->bindParam(':reward', $project_sub_reward, PDO::PARAM_INT);
  $handle->bindParam(':user_id', $student_id, PDO::PARAM_INT);
  $handle->execute();
  //echo 'Project Submission Reward Updated';

  // Email Notification for Project approval
  $schedule = (array)getScheduleDetails($schedule_id);
  $teacher = get_full_user_details($schedule['teacher_id']);
  send_completion_of_project_homework_mail($data['parent_first_name'], $data['first_name'], $data['email'], $schedule['project_name'], $teacher['first_name'], $remark);

  //Project Approval Reward 
  //$data = get_full_user_details($student_id);
  $project_app_reward = $data['project_app_reward'];
  if (is_null($project_app_reward)) {
    $project_app_reward = 1;
  } else {
    $project_app_reward = $project_app_reward + 1;
  }
  $handle = $dbCon->prepare('update users set project_app_reward=:reward where user_id=:user_id');
  $handle->bindParam(':reward', $project_app_reward, PDO::PARAM_INT);
  $handle->bindParam(':user_id', $student_id, PDO::PARAM_INT);
  $handle->execute();
  //echo 'Project Approval Reward Updated';


  echo 1;
}

if (isset($_POST['projectApproved'])) {
  projectApproved($_POST['scheduleId'], $_POST['teacherRemark'], $_POST['status'], $_POST['student_id']);
}



function getLesson($lesson_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("SELECT * FROM lessons WHERE lesson_id=$lesson_id");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  // print_r($result);
  return $result;
}

function getCourses($course_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("SELECT * FROM lessons WHERE course_id=$course_id");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  // print_r($result);
  return $result;
}




// teacher schedular----------------------------------------------------

function teacher_avalibity_data($teacher_id, $time)
{
  global $dbCon;
  $handle = $dbCon->prepare("SELECT * FROM `teacher_availability` WHERE teacher_id='$teacher_id' and date='$time'");
  $handle->execute();
  $getTeacherAvailabilitySlot = array();
  if ($handle->rowCount() > 0) {
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $data) {
      array_push($getTeacherAvailabilitySlot, $data->slot_1, $data->slot_2, $data->slot_3, $data->slot_4, $data->slot_5, $data->slot_6, $data->slot_7, $data->slot_8);
    }
  } else {
    array_push($getTeacherAvailabilitySlot, "", "", "", "", "", "", "", "");
  }

  echo '<form method="POST" class="Slot">';
  echo '<input type="date" class="form-control d-none" name="date" value=' . $time . ' >';
  for ($i = 0; $i < 6; $i++) {
    $temp_slot_book = 0;
    if (strlen($getTeacherAvailabilitySlot[$i])) {
      $slot =  date("H", strtotime($getTeacherAvailabilitySlot[$i]));
      $available_slot_time = $getTeacherAvailabilitySlot[$i];
    } else {
      $slot = -1;
      $available_slot_time = $getTeacherAvailabilitySlot[$i];
    }
    $count = $i + 1;
    // echo "<div class='p-1'></div>";
    echo '<small ><b>Slot ' . $count . '</b></small>';
    if (strtotime(date('Y-m-d', time())) > strtotime(date('Y-m-d', strtotime($time)))) {
      $disabledDay = "disabled";
    } else {
      $disabledDay = "";
    }

    if ($disabledDay == "disabled") {
      echo '<select name="slot_' . $i . '" select class="form-control"' . $disabledDay . '>
                <option selected value="" >Expire</option>
                ';
    } else {
      for ($x = 0; $x <= 24; $x++) {
        $create = date_create($time);
        date_time_set($create, $x, 00);
        $tempDate =  date_format($create, "Y-m-d H:i:s");

        $slot_book = slot_booking($teacher_id, date('Y-m-d H:i:s', strtotime($available_slot_time)));
        // console_log($available_slot_time);


        if ($slot_book == 1) {
          // if (strtotime(date('Y-m-d H:i:s', time())) >= strtotime($tempDate)) {

          $temp_slot_book = 1;
          // console_log("brake");
          break;
        }
      }

      if ($temp_slot_book == 1) {
        if (strtotime(date('Y-m-d H:i:s', time())) <= strtotime($available_slot_time)) {
          echo '<select name="slot_' . $i . '" select class="form-control text-white bg-danger disabled" disabled>';
          if ($i <= 9) {
            echo ' <option value="' . date('H', strtotime($available_slot_time)) . '">0' . $i . '.00</option>';
          } else {
            echo ' <option value="' . date('H', strtotime($available_slot_time)) . '">' . $i . '.00</option>';
          }
        } else {
          echo '<select name="slot_' . $i . '" select class="form-control  disabled" disabled>
                <option selected value="' . date('H', strtotime($available_slot_time)) . '" >Expire</option>
                ';
        }
        $temp_slot_book = 0;
      } else {
        if ($available_slot_time == "") {
          echo '<select name="slot_' . $i . '" select class="form-control bg-secondary text-white " >
                <option selected value="" >Empty</option>
                ';
        } else {
          if (strtotime(date('Y-m-d H:i:s', time())) <= strtotime($available_slot_time)) {
            echo '<select name="slot_' . $i . '" select class="form-control  bg-warning">
                <option selected value="" >Empty</option>
                ';
          } else {
            echo '<select name="slot_' . $i . '" select class="form-control  disabled" disabled>
                <option selected value="' . date('H', strtotime($available_slot_time)) . '" >Expire</option>
                ';
          }
        }
      }
    }


    // echo strtotime(date('Y-m-d', time()));

    for ($x = 0; $x < 24; $x++) {

      if ($disabledDay == "disabled") {
        break;
      }
      $create = date_create($time);

      date_time_set($create, $x, 00);
      $tempDate =  date_format($create, "Y-m-d H:i:s");
      // echo $tempDate;
      if (strtotime(date('Y-m-d H:i:s', time())) <= strtotime($tempDate)) {
        if ($slot == $x) {
          if ($x <= 9) {
            echo ' <option  value=' . "$x" . ' selected >0' . $x  . '.00  </option>';
          } else {
            echo ' <option value=' . "$x" . ' selected >' . $x . '.00</option>';
          }
        } else {
          if ($x <= 9) {
            echo ' <option value=' . "$x" . '>0' . $x . '.00</option>';
          } else {
            echo ' <option value=' . "$x" . '>' . $x . '.00</option>';
          }
        }
      }
    }
    echo '<select>';
  }
  echo '<div class="mt-2 text-center"><button type="submit" class="btn btn-success"' . $disabledDay . '>
  Confirm Availability</button></div>';
  echo '</form>';
}



function slot_booking($teacher_id, $slot_time)
{


  global  $dbCon;
  $handle = $dbCon->prepare("SELECT schedule_id from schedules WHERE teacher_id = $teacher_id and schedule_time ='$slot_time' and schedule_cancellation_date IS NULL");
  $handle->execute();
  if ($handle->rowCount() > 0) {
    return 1;
  } else {
    return 0;
  }
}

if (isset($_POST['teacher_schedular'])) {
  $data = $_POST;
  $data['date'] =
    date('Y-m-d', strtotime($data['date']));
  // teacher_schedular($_POST);
  for ($x = 1; $x <= 8; $x++) {
    $slot = "slot_" . $x;
    if ($data[$slot] != "") {
      $data[$slot] = $data['date'] . ' ' . $data[$slot] . ':00:00';
      $data[$slot] = "'" . date('Y-m-d H:i:s', strtotime($data[$slot])) . "'";
    } else {
      $data[$slot] = "null";
    }
  }
  // print_r($data);
  teacher_schedular($data);
}

function teacher_schedular($data)
{
  global $dbCon;
  $teacher_id = $_SESSION['user_id'];
  $handle = $dbCon->prepare("SELECT * from teacher_availability where teacher_id = $teacher_id and `date` = '$data[date]' ");
  $handle->execute();

  if ($handle->rowCount() > 0) {

    $sql = "
        UPDATE `teacher_availability` 
        SET `slot_1`=$data[slot_1], `slot_2`=$data[slot_2], `slot_3`=$data[slot_3], `slot_4`=$data[slot_4],
         `slot_5` =$data[slot_5], `slot_6`=$data[slot_6], `slot_7`=$data[slot_7], `slot_8`=$data[slot_8]
        WHERE `teacher_id` = $teacher_id and date = '$data[date]';
        ";
    // update
    $handle = $dbCon->prepare($sql);
    $handle->execute();
    echo "update";
  } else {
    // insert
    $sql = "INSERT INTO `teacher_availability` 
        (`teacher_id`, `date`, `slot_1`, `slot_2`, `slot_3`, `slot_4`, `slot_5`, `slot_6`, `slot_7`, `slot_8`)
         VALUES ($teacher_id, '$data[date]', $data[slot_1], $data[slot_2], $data[slot_3], $data[slot_4],
          $data[slot_5], $data[slot_6], $data[slot_7], $data[slot_8])";
    // echo $sql;
    $handle = $dbCon->prepare($sql);
    $handle->execute();
    echo "insert";
  }
}




function getStudentCancelClasses($student_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("select *, schedules.teacher_id as schedule_teacher_id  from schedules
left join lessons on schedules.lesson_id=lessons.lesson_id
left join users on schedules.teacher_id=users.user_id
left join schedule_students on schedules.schedule_id=schedule_students.schedule_id
where schedule_students.status = 'cancel' and student_id=$student_id order by schedule_time ASC");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  // print_r($result);
  return $result;
}



function getTeacherCancelClasses($teacher_id)
{
  global $dbCon;
  $handle = $dbCon->prepare("select *from schedules left join lessons on schedules.lesson_id=lessons.lesson_id where schedule_cancellation_date IS NOT NULL and teacher_id = $teacher_id");
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_OBJ);
  // print_r($result);
  return $result;
}



// -------------  Rewards by robin----------------------

if (isset($_POST['a'])) {
  //$user_id = $_POST['user_id'];
  $date = date('Y-m-d H:i:s');
  global $dbCon;
  $data = get_full_user_details($_SESSION['user_id']);
  $reward_time =  $data['rewards_time_stamp'];
  if (is_null($reward_time)) {
    $handle = $dbCon->prepare('update users set rewards_time_stamp=:d where user_id=:user_id');
    $handle->bindParam(':d', $date, PDO::PARAM_STR);
    $handle->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $handle->execute();
    echo 'Rewards Time updated';
  } else {
    echo 'Reward time NOOOOOOTTTTTT updated';
  }
}

function get_full_user_details($user_id)
{
  //echo $user_id;
  global $dbCon;
  $sql = "select * from users WHERE user_id =:user_id ";
  $handle = $dbCon->prepare($sql);
  $handle->bindParam(':user_id', $user_id, PDO::PARAM_STR);
  $handle->execute();
  $result = $handle->fetch(\PDO::FETCH_ASSOC);
  //$result = $handle->fetchAll(\PDO::FETCH_OBJ);
  return $result;
}


if (isset($_POST['daily_reward']) && $_POST['user_id']) {
  $daily_reward = $_POST['daily_reward'];
  $user_id = $_POST['user_id'];
  // Ressting new date and time 
  $reset_login_reward_time = date('Y-m-d H:i:s');

  global $dbCon;
  $handle1 = $dbCon->prepare('update users set daily_reward=:dr where user_id=:user_id');

  $handle1->bindParam(':dr', $daily_reward, PDO::PARAM_INT);
  $handle1->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $handle1->execute();
  echo 'Daily reward updated sucessfully';

  $handle2 = $dbCon->prepare('update users set rewards_time_stamp=:date where user_id=:user_id');
  $handle2->bindParam(':date', $reset_login_reward_time, PDO::PARAM_STR);
  $handle2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $handle2->execute();
  echo '<br>Daily Reward Time has been resert Sucessfully';
}

// ---------------- Rewards Ended --------------------

if (isset($_POST['id'])) {
  $stud_userId = $_POST['id'];
  //echo 'user_id : '.$userId;
  global $dbCon;
  $handle = $dbCon->prepare('select *,(schedule_time < NOW()) as expired , (schedule_time > (NOW() + INTERVAL 1 HOUR)) as upcoming,  (NOW() between (schedule_time - Interval 10 Minute) and (schedule_time + INTERVAL 1 HOUR)) as active, (NOW() > (schedule_time + INTERVAL 1 HOUR)) as `over` from schedules
        left join lessons on schedules.lesson_id=lessons.lesson_id
        left join users on schedules.teacher_id=users.user_id
    where  status != "cancel" and student_id="' . $stud_userId . '"'
    . ' order by schedule_time asc');
  //    $handle = $dbCon->prepare('select * from schedules
  //    where student_id="' . $userId . '"  
  //and schedule_time > (NOW() - INTERVAL 1 HOUR)
  //limit 1');
  //$handle = $dbCon->prepare('select * from users where role = "teacher"  ' );
  // $id = 7;
  // $handle->bindParam(':id', $id, PDO::PARAM_INT);
  $handle->execute();

  // Store the result into an object that we'll output later in our HTML
  // This object won't kill your memory because it fetches the data Just-In-Time to
  $result = $handle->fetchAll(\PDO::FETCH_ASSOC);
  //$_SESSION['data'] = json_encode($result);
  //print_r($result);

?>
  <div id="remove">
    <div class="SessionProjectInfoTeacherDashboardBackground col-11 shadow-lg">
      <div class="row">
        <div class="col-12">
          <h3 class="mt-3"><?php
                            $user_data = getUserData($stud_userId);
                            foreach ($user_data as $a) {
                              echo $a->first_name . ' ' . $a->last_name;
                            }
                            ?> </h3>
          <hr class="HorizontalLine">
          </hr>
          <h3 class="text-primary text-center">Sessions</h3>
        </div>
        <div class="col-12">
          <table class="table table-sm SessionProjectInfoTeacherDashboardTable">
            <thead class="text-center">
              <tr>
                <td scope="col" class="HorizontalLine"><b>Total Modules Subscribed</b></td>
                <td scope="col" class="HorizontalLine"><b> Total Classes Completed</b></td>
                <td scope="col" class="HorizontalLine"><b>Total Upcoming Classes</b></td>
              </tr>
              <tr>
                <td scope="row" class="HorizontalLine">

                </td>
                <td scope="row" class="HorizontalLine">
                  <?php
                  $count = 0;
                  foreach ($result as $s) {
                    if ($s['over'] == 1) {
                      $count = $count + 1;
                    }
                  }
                  echo $count;
                  ?>
                </td>
                <td scope="row" class="HorizontalLine">
                  <?php
                  $count = 0;
                  foreach ($result as $s) {
                    if ($s['upcoming'] == 1) {
                      $count = $count + 1;
                    }
                  }
                  echo $count;
                  ?>
                </td>
              </tr>
            </thead>

            <tbody class="text-center">
            </tbody>
          </table>
        </div>
        &nbsp;&nbsp;
        <div id="projectInformation" class="col-12">
          <h2 class="text-success text-center">Project Information</h2>
          <table rules="all" class="table table-sm AdvancedCirclePaneTeacherDashboardTable table-borderless">
            <thead class="text-center">
              <tr>
                <th>Sr.<br>no</th>
                <th scope="col">Project Name/<br>Description</th>
                <th scope="col">Project<br>Pending</th>
                <th scope="col">Awaiting Teacher's<br> Review</th>
                <th scope="col">Requiring Changes<br>By Student</th>
                <th scope="col">Project<br>Approved</th>
                <th scope="col">Teacher's <br> Remarks</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $j = 1;
              foreach ($result as $row) {
                if (strlen($row['status']) !== 0) {

              ?>

                  <tr>
                    <th scope="row"><?php echo $j; ?></th>
                    <td>
                      <p style="text-align: left;"><b>Lesson Name : </b> <?php echo $row['lesson_name']; ?> </p>

                      <p style="text-align: left;"><b>Project Name :</b> <?php echo $row['project_name']; ?> </p>

                      <p style="text-align: left;"><b>Desc : </b> <?php echo $row['project_desc']; ?> </p>
                    </td>

                    <td>
                      <input id="projectPending" type="text" name="ProjectPending" class="shadow-lg projectPending" style="background-color: 

                                                <?php
                                                //bg-danger projectPending
                                                if ($row['status'] == 'pending') {
                                                  echo 'yellow';
                                                } else {
                                                  echo '';
                                                }
                                                ?>

                                                  " disabled>

                    </td>
                    <td>
                      <button id="awaitingTeacher1" type="button" class="btn btn-sm" style="background-color:   
                                              <?php
                                              if ($row['status'] == 'awating_review') {
                                                echo '#ff3b3b;';
                                              } else {
                                                echo 'white; border: 1px solid grey;';
                                              }
                                              ?>

                                              ">
                        <a href="<?php echo $row['project_submit_link'] ?>" target='_blank' style="text-decoration: none; color: 
                                                <?php
                                                if ($row['status'] == 'awating_review') {
                                                  echo 'white;';
                                                } else {
                                                }
                                                ?>
                                                ">View Project</a>
                      </button>
                      <p><?php //echo $row['project_submit_link']; 
                          ?></p>
                    </td>


                    <td>
                      <input id="requiringChanges1" type="text" name="RequiringChanges" class="shadow-lg requiringChanges" <?php
                                                                                                                            if ($row['status'] == 'changes_for_student') {
                                                                                                                              echo 'style="background-color: #ff6d05;"';
                                                                                                                            } else {
                                                                                                                            }
                                                                                                                            ?> disabled>
                    </td>
                    <td>
                      <input id="approvedProject" type="text" name="ApprovedProject" class="shadow-lg 

                                              <?php
                                              if ($row['status'] == 'approved') {
                                                echo 'bg-success approvedProject';
                                              } else {
                                                echo 'approvedProject';
                                              }
                                              ?>

                                              " disabled>
                    </td>

                    <td>
                      <div id="teacherRemarks<?php echo $j; ?>" class="bg-light">
                        <textarea id="remarsksfromteacher" name="remarks" rows="4" cols="15" disabled>
                                                      <?php
                                                      if ($row['status'] == 'approved') {
                                                        $rest = substr($row['teacher_valuation'], 19);
                                                        echo $rest;
                                                      }
                                                      if ($row['status'] == 'changes_for_student') {
                                                        echo $row['teacher_comments'];
                                                      }
                                                      ?>
                                                    </textarea>
                      </div>
                    </td>
                  </tr>


              <?php
                  $j++;
                }
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



<?php
}
function get_all_users_details($course_id)
{
  global $dbCon;
  //echo $_SESSION['user_id'];
  $sql = "select * from users WHERE teacher_id = '" . $_SESSION['user_id'] . "' and course_id = '" . $course_id . "' ";
  //$sql = "select * from users WHERE teacher_id = 122 and category = '".$category."' ";
  $handle = $dbCon->prepare($sql);
  //$handle->bindParam(':user_id', $user_id, PDO::PARAM_STR);
  $handle->execute();
  $result = $handle->fetchAll(\PDO::FETCH_ASSOC);
  //$result = $handle->fetchAll(\PDO::FETCH_OBJ);
  return $result;
}

// contact us form 

if (isset($_POST['contact_us'])) {
  send_contact_us_mail($_POST['name'], $_POST['email'], $_POST['message']);
}
