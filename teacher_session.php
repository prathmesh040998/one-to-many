<?php
include_once("db.php");
include_once("gtag.php");
$students = getUsers("student");
/*
 ACP reward = Accuracy, creativity and perseverance reward.
 => ALTER TABLE schedules ADD acp_reward VARCHAR(25) DEFAULT ''; Query for ACP reward
*/
$schedule_id = $_GET['schedule_id'];
$room_id = "";
$lesson_id = "";
if (empty($schedule_id)) {
  // header("Location: teacher_dashboard.php");
}
$schedule = getScheduleDetails($schedule_id);

// echo "<pre>";
//print_r($schedule);
// echo "</pre>";
$room_id = $schedule->room_id;
$lesson_id = $schedule->lesson_id;

$studentsLinks = getStudentsLinks($lesson_id);
$teachersLinks = getTeachersLinks($lesson_id);
$username = "";
$loggedIn = true;
$role = "";

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  $username = $_SESSION["username"];
  $role = $_SESSION["role"];
  $loggedIn = $_SESSION["loggedIn"];
  $user_id = $_SESSION['user_id'];
  if ($user_id == $schedule->teacher_id) {
    // echo "";
  } else {
    header("Location: teacher_dashboard.php");
  }

  if ($schedule->over == 1) {
    header("Location: student_dashboard.php");
  }

  if ($role == "student") {
    header("Location: student_dashboard.php");
  }
} else {
  header("Location: login.php");
}


$userData = getUserData($_SESSION['user_id']);
// echo "<pre>";
// print_r($userData);
// echo "</pre>";

$firstName = "";

foreach ($userData as $value) {
  $firstName  = $value->first_name;
}

?>

<!-- for jit si -->
<input type="hidden" id="room_id" value="<?= $room_id ?>" />
<input type="hidden" id="username" value="<?= $username ?>" />

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <script src="https://meet.jit.si/external_api.js"></script>

  <title>Teacher Session</title>
  <!-- custom css -->
  <link rel="stylesheet" href="css/vc.css" />
</head>

<body>
  <main>
    <!-- nav start -->
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="home.php">
        <img src="images/logo.jpg" width="50" height="80" alt="" loading="lazy" />
      </a>
      <button class="navbar-toggler pt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="mr-auto"></ul>
        <div>
          <ul class="navbar-nav custom-navbar br mb-5">
            <li class="nav-item pr-4 pl-4 pt-1 pb-1">
              <button type="button" class="btn nav-btn">
                Welcome <?= ucfirst($firstName) ?>
                <img class="btn-img" src="images/Boy_avatar.png" />
              </button>
            </li>
            <li class="nav-item pr-4 pl-4 pt-1" style="display: none;">
              <button type="button" class="btn nav-btn">
                Lesson Guide
                <img class="btn-img" src="images/information.png" />
              </button>
            </li>
            <li class="nav-item pr-4 pl-4 pt-1" style="display: none;">
              <button type=" button" class="btn nav-btn">
                Help
                <img class=" btn-img" src="images/question-mark.png" />
              </button>
            </li>
            <li class="nav-item pr-4 pl-4 pt-1">
              <a href="teacher_dashboard.php" target="_blank">
                <button type="button" class="btn nav-btn">
                  Dashboard
                  <img class="btn-img" src="images/dashboard.png" />
                </button>
              </a>
            </li>
            <li class="nav-item pr-4 pl-4 pt-1 pb-1">
              <a href="logout.php?logout=1">
                <button type="button" class="btn nav-btn">
                  Logout
                  <img class="btn-img" src="images/arrow.png" />
                </button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav end -->
    <!-- body start -->
    <div class="container-fluid pl-5 pr-5">

      <!-- lesson name on top -->

      <div id="lesson" class="row text-center">
        <div class="col">
          <h6><b>Lesson Name: <?= $schedule->lesson_name ?></b></h6>
        </div>
      </div>
      <!-- ti button start -->
      <?php
      // if ($schedule->acp_reward == '' || $schedule->acp_reward == null || strlen($schedule->acp_reward) == 0) {
      ?>
      <div class="row" id="acp_before">
        <div class="col-sm-3"></div>
        <div class="col-sm">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <button id="acc" type="button" onclick="confetti('Accuracy', <?php echo $schedule_id; ?>)" class="btn btn-radius btn-pink">
                Accuracy
              </button>
            </li>
            <li class="nav-item">
              <button id="per" type="button" onclick="confetti('Perseverance', <?php echo $schedule_id; ?>)" class="btn btn-radius btn-blue">
                Perseverance
              </button>
            </li>
            <li class="nav-item">
              <button id="cre" type="button" onclick="confetti('Creativity', <?php echo $schedule_id; ?>)" class="btn btn-radius btn-brown">
                Creativity
              </button>
            </li>
          </ul>
        </div>
      </div>

      <div id="acp_after" style="display: none">

        <div class="col-sm" style="margin-bottom: 10px;">
          <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <span class="badge badge-pill badge-info" style="padding: 10px 20px;">
                You can only reward the student once per Session.
              </span>
            </li>
          </ul>
        </div>
      </div>
      <?php
      // } // if close
      // else {
      ?>
      <!-- <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm">
            <ul class="nav nav-pills nav-fill">
              <li class="nav-item">
                <span class="badge badge-pill badge-info" style="padding: 10px 20px;">
                  You've rewarded the Student with : <?php echo $schedule->acp_reward; ?>
                </span>
              </li>
            </ul>
          </div>
        </div> -->
      <?php
      // }
      ?>
      <!-- confetti button end -->
      <div class="row">
        <!-- left side -->
        <div class="col-sm">
          <!-- top eazel -->
          <div class="row">
            <img src="images/eazel-top.png" class="eazel-top img-fluid" alt="Responsive image" />
          </div>
          <!-- top eazel end -->
          <!-- jit si-->
          <div class="row" style="text-align: center" id="meet" style="width: 100%"></div>
          <!-- jit si end -->
          <!-- bottom eazel -->
          <div class="row">
            <div class="card col-sm">
              <img class="img-fluid eazel-bottom" src="images/eazel-bottom.png" alt="Card image" width="500px" />
              <div class="card-img-overlay">
                <!-- bottom button -->
                <ul class="nav nav-pills nav-fill">
                  <li class="nav-item">
                    <a href="<?= $schedule->project_link ?>" target="_blank" rel="noopener noreferrer">
                      <button type="button" class="btn nav-btn mt-1
                      <?php
                      if (strlen($schedule->project_link) == 0) {
                        echo "btn-secondary";
                      }
                      ?>
                    " <?php
                      if (strlen($schedule->project_link) == 0) {
                        echo "disabled";
                      }
                      ?>>
                        Project Link
                      </button>
                    </a>
                  </li>
                  <li class="nav-item">
                  <!-- <a href="<?= $schedule->project_desc ?>"> -->
                    <button type="button" class="btn nav-btn toggleProject mt-1
                    <?php
                    if (strlen($schedule->project_desc) == 0) {
                      echo "btn-secondary";
                    }
                    ?>
                    " <?php
                      if (strlen($schedule->project_desc) == 0) {
                        echo "disabled";
                      }
                      ?>>
                    
                      Project Info
                    </button>
                  </li>
                  <li class="nav-item">
                    <button type="button" id="assign_project" class="btn nav-btn mt-1
                    <?php
                    if (strlen($schedule->project_link) == 0 || strlen($schedule->status) != 0) {
                      echo "btn-secondary";
                    }
                    ?>
                    " onclick="assignProject(<?= $schedule_id ?>)">
                      Project Assign
                    </button>
                  </li>
                  <li id="showStudentActivity" class="nav-item">
                    <button type="button" class="btn btn-pink toggleStudent mt-1">
                      Activity
                    </button>
                  </li>
                </ul>
                <!-- bottom button end -->
              </div>
            </div>
          </div>
          <!-- bottom eazel end -->

          <!-- project info -->
          <div class="row" id="project-info">
            <div class="container embed-responsive embed-responsive-16by9 mt-5 mb-5">

              <?php

              $ext = explode(".", $schedule->project_desc);

              if (end($ext) == "pdf") {
              ?>
                <iframe frameborder="0" class="embed-responsive-item" src="<?= $file_path ?><?= $schedule->project_desc ?>#toolbar=0&navpanes=0"></iframe>

              <?php
              } else {
              ?>
                <iframe class=" embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?= $file_path ?><?= $schedule->project_desc ?>"></iframe>

              <?php
              }
              ?>

            </div>
          </div>
          <!-- project info end -->
        </div>
        <!-- left side end -->
        <!-- right side -->
        <div class="col-sm" id="right-side">
          <div class="p-2">
            <!-- wide screen button -->
            <div class="float-right">

              <button type="button" class="btn btn-secondary btn-sm toggleStudent">
                Wide Screen Mode
              </button>
            </div>
            <!-- activity table -->
            <table width="100% ">
              <tr class="text-center">
                <th colspan="2">
                  <p>Lesson Name: <?= $schedule->lesson_name ?></p>
                </th>
              </tr>
              <tr class="text-center">
                <!-- teacher activity -->
                <td>
                  <button class="btn btn-sm btn-orange" type="button">
                    Teacher Activity
                  </button>
                </td>
                <!-- teacher activity end -->
                <!-- student activity -->
                <td>
                  <button class="btn btn-sm btn-pink" type="button">
                    Student Activity
                  </button>
                </td>
                <!-- student activity end -->
              </tr>
              <tr>
                <td class="align-baseline">
                  <div class="text-center">
                    <?php
                    $count = 0;
                    foreach ($teachersLinks as $tLink) {
                      $count = $count + 1;
                    ?>

                      <button class="btn btn-activity">
                        <a href="<?= $tLink->link ?>" target="_blank">Activity
                          <?= $count ?></a>
                      </button>
                      <br />
                    <?php
                    }
                    ?>
                  </div>
                </td>
                <td class="align-baseline">
                  <div class="text-center">
                    <?php
                    $count = 0;
                    foreach ($studentsLinks as $sLink) {
                      $count = $count + 1;
                    ?>

                      <button class="btn btn-activity">
                        <a href="<?= $sLink->link ?>" target="_blank">Activity
                          <?= $count ?></a>
                      </button>
                      <br />
                    <?php
                    }
                    ?>
                  </div>
                </td>
              </tr>

            </table>
          </div>
        </div>
        <!-- right side end -->
      </div>
    </div>
    <!-- body end -->
  </main>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- javascript -->
  <script src="javascript/teacher_sessionV1.0.js"></script>

  <?php gtag()  ?>

</body>

</html>