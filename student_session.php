<?php
include_once("db.php");
include_once("gtag.php");
$students = getUsers("student");

$schedule_id = $_GET['schedule_id'];
$room_id = "";
$lesson_id = "";
if (empty($schedule_id)) {
  // header("Location: student_dashboard.php");
}
$schedule = getScheduleDetails($schedule_id);

$room_id = $schedule->room_id;
$lesson_id = $schedule->lesson_id;

$studentsLinks = getStudentsLinks($lesson_id);
$username = "";
$loggedIn = true;
$role = "";

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  $username = $_SESSION["username"];
  $role = $_SESSION["role"];
  $loggedIn = $_SESSION["loggedIn"];
  $user_id = $_SESSION['user_id'];

  if ($role == "teacher") {
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
<!-- hidden room id -->
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
  <!-- meet jit si javascript-->

  <title>Student Session</title>
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
            <li class="nav-item pr-5 pl-5 pt-1 pb-1">
              <button type="button" class="btn nav-btn">
                Welcome <?= ucfirst($firstName) ?>
                <img class="btn-img" src="images/Boy_avatar.png" />
              </button>
            </li>
            <li class="nav-item pr-5 pl-5 pt-1" style="display: none;">
              <button type="button" class="btn nav-btn">
                Help
                <img class="btn-img" src="images/question-mark.png" />
              </button>
            </li>
            <li class="nav-item pr-5 pl-5 pt-1">
              <a href="student_dashboard.php" target="_blank">
                <button type="button" class="btn nav-btn">
                  Dashboard
                  <img class="btn-img" src="images/dashboard.png" />
                </button>
              </a>
            </li>
            <li class="nav-item pr-5 pl-5 pt-1 pb-1">
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
                      <button type="button" class="btn nav-btn
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
                    <button type="button" class="btn nav-btn toggleProject
                    <?php
                    if (strlen($schedule->project_desc) == 0) {
                      echo "btn-secondary";
                    }
                    ?>
                    " <?php
                      if (strlen($schedule->project_desc) == 0) {
                        echo "disabled";
                      }
                      ?>> Project Info </button>
                  </li>
                  <li id="showStudentActivity" class="nav-item">
                    <button type="button" class="btn btn-pink toggleStudent">
                      Student Activity
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
            <div class="container embed-responsive embed-responsive-16by9">
              <?php

              $ext = explode(".", $schedule->project_desc);

              if (end($ext) == "pdf") {
              ?>
                <iframe allowtransparency="true" style="background: #FFFFFF;" frameborder="0" class="embed-responsive-item" src="<?= $file_path ?><?= $schedule->project_desc ?>#toolbar=0&navpanes=0"></iframe>

              <?php
              } else {
              ?>
                <iframe class=" embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?= $file_path ?><?= $schedule->project_desc ?>"></iframe>

              <?php
                echo "doc";
              }
              ?>
            </div>
          </div>
          <!-- project info end -->
        </div>
        <!-- left side end -->
        <!-- right side -->
        <div class="col-sm-4" id="right-side">
          <div class="p-2">
            <!-- wide screen button -->
            <div class="float-right">
              <button type="button" class="btn btn-secondary btn-sm toggleStudent">
                Wide Screen Mode
              </button>
            </div>
            <!-- student activity table -->
            <table width="100%">
              <thead>
                <tr class="text-center">
                  <th colspan="2">
                    <p>Lesson Name: <?= $schedule->lesson_name ?></p>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td>
                    <button class="btn btn-pink">
                      Student Activity
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="text-center">
                      <?php
                      $count = 0;
                      foreach ($studentsLinks as $link) {
                        $count = $count + 1;
                      ?>

                        <button class="btn btn-activity">
                          <a href="<?= $link->link ?>" target="_blank">Activity
                            <?= $count ?></a>
                        </button>
                        <br />
                      <?php
                      }
                      ?>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- student activity table end -->
          </div>
        </div>
        <!-- right side end -->
      </div>
    </div>
    <!-- body end -->
    <!-- modal start -->
    <div>
      <div class="modal fade" id="confettiModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">
                <span id="confettiModalTitle"></span>
              </h4>
              <button type="button" class="close" data-dismiss="modal" onclick="stopconfetti()">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center">
              <img id="confettiModalImg" src="images/arrow.png" width="250" height="240" style="padding-bottom: 4px" />
              <h6>Congratulations 🏆 You are Rewarded with 10 points</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal end -->
  </main>

  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- jit si javascript -->
  <script src="https://meet.jit.si/external_api.js"></script>
  <!-- pusher javascipt -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <!-- confeftti javascript -->
  <script src="confetti.js-master/confetti.js"></script>
  <!-- javascript -->
  <script src="javascript/student_session.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <?php gtag() ?>

</body>

</html>