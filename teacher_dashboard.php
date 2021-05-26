<?php
include_once("db.php");
include_once("gtag.php");

if ($_SESSION['role'] == 'teacher') {
    $schedules = getTeachersSchedules($_SESSION['user_id']);
    $cancelClasses = getTeacherCancelClasses($_SESSION['user_id']);
    $array = json_decode(json_encode($schedules), true);
    $getTeacherStudentSchedules = getTeacherStudentSchedules();
    // echo "<pre>";
    // print_r($getTeacherStudentSchedules);
    // echo "</pre>";
} else {
    header("Location: login.php");
}
$students = getUsers('students');
//   $links = getLinks();
// echo "<pre>"
// print_r($schedules);
// die();

$username = "";
$loggedIn = false;
$role = "";
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];
    $loggedIn = $_SESSION["loggedIn"];
    $userId = $_SESSION['user_id'];
    $userData = getUserData($_SESSION['user_id']);

    if ($role == "student") {
        header("Location: student_dashboard.php");
    }
}
// print_r($cancelClasses);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="codegurukul.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Teacher Dashboard</title>
    <style>
        .course-name {
            background-color: lightgray;
            padding: 10px 20px;
            font-size: 20px;
            font-weight: bold;
            border-style: solid;
            border-width: 1px;
        }

        .course-module {
            background-color: lightskyblue;
            padding: 8px 15px;
            font-size: 17px;
            font-weight: bold;
            border-style: solid;
            border-width: 1px;
        }

        .btn-lesson-name {
            color: black;
            border-radius: 30px;
            background-color: orange;
            border-color: black;
            border-style: solid;
            border-width: 1px;
        }
    </style>
</head>


<body>
    <div class="TeacherNav">
        <nav class="navbar navbar-expand-lg navbar-light TeacherDashboardMainNavbar">
            <a class="navbar-brand" href="home.php">
                <img class="LogoForTeacherDashboard" src="images/logo.jpg" alt="" loading="lazy">
            </a>
            <h5><b><br><br><?php
                            foreach ($userData as $value) {
                                echo ucfirst(strtolower($value->first_name));
                            }
                            ?>'s DASHBOARD</b></h5>
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <div class="text-center">
                        <img class="QuestionMarkLogo" src="images/question-mark.png">
                    </div>
                    <a id="TeacherDashboardNavbarItem" class="nav-link" href="#">
                        <h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; HELP </h6>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a id="TeacherDashboardNavbarItem" class="nav-link" href="logout.php?logout=1">
                        <div class="text-center">
                            <img class="ArrowTeacherDashboardLogo" src="images/arrow.png">
                        </div>
                        <h6> &nbsp; &nbsp; &nbsp; &nbsp; LOG OUT </h6>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="row">
        <!-- _________________________________1st Partition____________________________________________ -->
        <div class="col">
            <nav class="navbarTeacherDashboard navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="btn-group dropright btn-lg btn-block TeacherDashboardButtons">
                            <button type="button" class="btn btn-warning dropdown-toggle Avatar shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="GirlAvatarTeacherDashboard" src="images/Girl_avatar.png"> -->
                                <?php
                                foreach ($userData as $value) {
                                    if ($value->gender == "male") {
                                ?>
                                        <img class="GirlAvatarTeacherDashboard" src="images/Boy_avatar.png" alt="male" />
                                    <?php
                                    } elseif ($value->gender == "female") {
                                    ?>
                                        <img class="GirlAvatarTeacherDashboard" src="images/Girl_avatar.png" alt="female" />
                                    <?php
                                    } else {
                                    ?>
                                        <img class="GirlAvatarTeacherDashboard" src="images/account.png" alt="other" />
                                <?php
                                    }
                                }
                                ?>
                                <br>
                                Teacher's <br> Profile
                            </button>
                            <div id="TeacherDashboardProfileDropdown" class="dropdown-menu TeacherDashboardDropdown">
                                <div class="row">
                                    <div class="col-4">
                                        <?php
                                        foreach ($userData as $value) {
                                            if ($value->gender == "male") {
                                        ?>
                                                <img class="BoyAvatar" src="images/Boy_avatar.png" alt="male" />
                                            <?php
                                            } elseif ($value->gender == "female") {
                                            ?>
                                                <img class="BoyAvatar" src="images/Girl_avatar.png" alt="female" />
                                            <?php
                                            } else {
                                            ?>
                                                <img class="BoyAvatar" src="images/account.png" alt="other" />
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="col-8">
                                        <h5 class="text-info">Teacher Profile</h5>
                                        <form>
                                            <?php
                                            foreach ($userData as $u) {
                                            ?>
                                                <div>
                                                    Name:
                                                    <input class="TeacherDashboardInfo" type="text" placeholder="<?php echo $u->first_name . ' ' . $u->last_name ?>" readonly="readonly" />
                                                </div>
                                                <div>
                                                    Contact:
                                                    <input class="TeacherDashboardInfo" type="text" placeholder="<?php echo $u->mobile ?>" readonly="readonly" />
                                                </div>
                                                <div>
                                                    Email:
                                                    <input class="TeacherDashboardInfo" type="text" placeholder="<?php echo $u->email ?>" readonly="readonly" />
                                                </div>
                                                <div>
                                                    User Id:
                                                    <input class="TeacherDashboardInfo" type="text" placeholder="<?php echo $u->username ?>" readonly="readonly" />
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item" style="display: none;">
                        <div class="btn-group dropright btn-lg btn-block TeacherDashboardButtons">
                            <button type="button" class="btn btn-warning dropdown-toggle Avatar shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="ConfitteeTeacherDashboard" src="images/Confittee.png">
                                <br>
                                Teacher's <br> Rewards
                            </button>
                            <div id="TeacherDashboardConfitteeDropdown" class="dropdown-menu TeacherDashboardDropdown">
                                <h5 class="text-center text-info">Teacher's Rewards</h5>
                                <div class="row">
                                    <div class="col">
                                        <img class="ConfitteeTeacherDashboardDropdown" src="images/Confittee.png">
                                    </div>
                                    <div class="col-8">
                                        <form>
                                            <div>
                                                Name:
                                                <input class="TeacherDashboardInfo" type="text" placeholder="First Name    Last Name" readonly="readonly" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                (Name's) Achivements:
                                <br>
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <p class="text-warning text-center TeacherRewardsMessage">Rewards
                                                    through Student Rewrds</p>
                                            </td>
                                            <td>
                                                <p id="TeacherRewardsMessageCoin1" class="btn btn-info">16</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <p class="text-warning text-center TeacherRewardsMessage">Rewards
                                                    through Parent's Feedback</p>
                                            </td>
                                            <td>
                                                <p id="TeacherRewardsMessageCoin2" class="btn btn-info">22</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <p class="text-warning text-center TeacherRewardsMessage">
                                                    Rewards from Code Gurukul</p>
                                            </td>
                                            <td>
                                                <p id="TeacherRewardsMessageCoin3" class="btn btn-info">33</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-7">
                                        <p class="TeacherRewardsMessage text-center">You Are Eligible To Redeem</p>
                                        <input class="TeacherDashboardInfo text-center" type="text" placeholder="71    Points" readonly="readonly" />
                                        <p class="TeacherRewardsMessage text-info text-center">Contact Us To Redeem</p>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <br>

                    <div class="btn-group btn-group-toggle btn-block btn-lg TeacherDashboardButtons" data-toggle="buttons">
                        <li class="nav-item">
                            <button type="button" id="studentDatabaseButton" class="btn btn-warning btn-block btn-sm shadow" data-toggle="tab" href="#StudentDatabaseTeacherDashboard">
                                Student <br> Database
                            </button>

                            <button type="button" id="ScheduledClassesButton" class="btn btn-info btn-block btn-sm shadow" data-toggle="tab" href="#ScheduledClassesTeacherDashboard">
                                Scheduled <br> classes
                            </button>

                            <button type="button" id="CompletedClassesButton" class="btn btn-success btn-block btn-sm shadow" data-toggle="tab" href="#CompletedClassesTeacherDashboard">
                                Completed <br> classes
                            </button>

                            <button type="button" id="CancelledClassesButton" class="btn btn-danger btn-block btn-sm shadow" data-toggle="tab" href="#CancelledClassesTeacherDashboard">
                                Cancelled <br> classes
                            </button>

                            <button type="button" id="CancelAScheduledClassButton" class="btn btn-block btn-sm shadow ButtonCancelAScheduledClass" data-toggle="tab" href="#CancelAScheduledClassesTeacherDashboard">
                                Cancel a Scheduled class
                            </button>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>

        <!-- _________________________________2nd Partition____________________________________________ -->
        <div class="col-10">
            <br>
            <div class="row">
                <div class="btn-group btn-group-toggle btn-lg btn-block TeacherDashboardButtons" data-toggle="buttons">
                    <div class="col">
                        <button type="button" id="JoinClassNowButton" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#JoinClassNowTeacherDashboard">
                            Join Class Now
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" id="SchedulerButton" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#SchedularTeacherDashboard">
                            Scheduler
                        </button>
                    </div>
                    <div class="col">
                        <button type="button" id="ReviewProjectButton" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#ReviewProjectTeacherDashboard">
                            Review Project
                        </button>
                    </div>
                    <div class="col" style="display: none;">
                        <button type="button" <?= $disabledButton ?> id="ResourcesButton" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#ResourcesTeacherDashboard">
                            Resources
                        </button>
                    </div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </div>

            <!-- ______________________________Tab Open_________________________________ -->
            <div class="tab-content">

                <!-- _____________________Pane for Join Class Now______________________ -->
                <div id="JoinClassNowTeacherDashboard" class="tab-pane active">
                    <br>
                    <div id="JoinClassNowPaneTeacherDashboardBackground" class="JoinClassNowPaneTeacherDashboardBackground shadow">
                        <div class="row">
                            <div class="col">
                                <h2>Join Class Now</h2>
                            </div>
                            <div class="col">
                                <h5><?= date("d-F-Y") ?></h5>
                            </div>
                            <div class="col">
                                <?php
                                $a = 0;
                                foreach ($schedules as $value) {
                                   
                                    // print_r($value);
                                    // die();
                                    if ($value->active) {
                                        $a = $a + 1;
                                    }
                                }

                                if ($a == 0) {
                                ?>
                                    <p class="text-center JoinClassNowMessage">
                                        Link can be accessed only 10 minutes <br>
                                        prior to the session <br>
                                        Please come back to join the session.
                                    </p>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <table rules="all" class="table table-sm JoinClassNowTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Scheduled Date<br>and Time</th>
                                    <th scope="col">Joining Link</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php

                                //    print_r($schedules);
                                foreach ($schedules as $value) {

                                    // if($value->status=='cancel')
                                    // {
                                    //     // print_r($value);
                                    //     continue;
                                    // }
                                  

                                    if (!$value->over) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo "$value->lesson_name"; ?></th>
                                            <td>
                                                <?php
                                                $uData = getUserData($value->student_id);
                                                foreach ($uData as $u) {
                                                    echo $u->first_name . " " . $u->last_name;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo "$value->schedule_time"; ?></td>
                                            <td>
                                                <?php
                                                $join_link = "teacher_session.php?room_id=" . $value->room_id . "&lesson_id=" . $value->lesson_id . "&schedule_id=" . $value->schedule_id;
                                                ?>
                                                <a href="<?= $join_link ?>" target="_blank">
                                                    <button style="border: solid 1px black; border-radius: 30px;" class=" pr-4 pl-4
                                                                <?php
                                                                if ($value->active) {
                                                                    echo " btn-warning";
                                                                } else {
                                                                    echo " btn-secondary";
                                                                }
                                                                ?>
                                                                " <?php
                                                                    if ($value->active) {
                                                                        echo "";
                                                                    } else {
                                                                        echo "disabled";
                                                                    }
                                                                    ?>>Join
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="JoinClassNowTeacherDashboardLink" class="tab-pane fade">
                    <br>
                    <div class="JoinClassNowPaneTeacherDashboardBackground shadow">
                        <div class="row">
                            <div class="col">
                                <h2>Join Class Now</h2>
                            </div>
                            <div class="col">
                                <h5><?= date("d-F-Y") ?></h5>
                            </div>
                            <div class="col"></div>
                        </div>
                        <table rules="all" class="table table-sm JoinClassNowTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Scheduled Date<br>and Time</th>
                                    <th scope="col">Joining Link</th>
                                </tr>
                            </thead>
                        </table>
                        <br>
                        <br>
                        <br>
                        <p class="text-center JoinClassNowMessage">
                            Currently no classes scheduled. Schedule your class here.
                        </p>
                        <div class="text-center">
                            <div class="btn-group btn-group-toggle btn-lg TeacherDashboardButtons" data-toggle="buttons">
                                <button type="button" class="btn btn-warning btn-lg shadow" data-toggle="tab" href="#SchedularTeacherDashboard">
                                    Scheduler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- _______________________Pane for Schedular_________________________ -->
                <div id="SchedularTeacherDashboard" class="tab-pane fade">
                    <br>
                    <div class="SchedularPaneTeacherDashboardBackground shadow mb-5">
                        <h3 class="text-center">Schedular</h3>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col">
                                <div class="btn-group btn-group-toggle btn-block TeacherDashboardButtons" data-toggle="buttons">
                                    <button type="button" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#week1TeacherDashboardTable">
                                        Week 1
                                    </button>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col">
                                <div class="btn-group btn-group-toggle btn-block TeacherDashboardButtons" data-toggle="buttons">
                                    <button type="button" class="btn btn-warning btn-block btn-lg shadow" data-toggle="tab" href="#week2TeacherDashboardTable">
                                        Week 2
                                    </button>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <div class="tab-content">
                            <div id="week1TeacherDashboardTable" class="tab-pane active">
                                <?php

                                // require_once("./db.php");
                                date_default_timezone_set('Asia/Kolkata');
                                $this_week_sd = strtotime("last monday");
                                $this_week_sd = date('w', $this_week_sd) == date('w') ? $this_week_sd + 7 * 86400 : $this_week_sd;

                                $this_week_ed = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");

                                ?>

                                <table class="table table-sm table-bordered PaneTableSchedulledClassesButtons mt-2">
                                    <thead class="ColumnHeadingScheduleClassesButtons">
                                        <tr>

                                            <?php
                                            $temp_start_date = $this_week_sd;
                                            $temp_end_date = $this_week_ed;
                                            while ($this_week_sd < $this_week_ed) {
                                            ?>
                                                <th scope="col" class="text-secondary">
                                                    <h6>
                                                        <b><?= date("D", $this_week_sd) ?></b>
                                                    </h6>
                                                    <h3 class="border-bottom pb-1">
                                                        <?= date("d", $this_week_sd) ?>
                                                    </h3>
                                                    <?php
                                                    teacher_avalibity_data($userId, '' . date("Y-m-d", $this_week_sd));
                                                    ?>
                                                </th>
                                            <?php
                                                $this_week_sd = strtotime("+1 day", $this_week_sd);
                                            }
                                            ?>

                                        </tr>
                                    </thead>
                                </table>


                            </div>
                            <div id="week2TeacherDashboardTable" class="tab-pane fade">
                                <?php

                                // require_once("./db.php");
                                date_default_timezone_set('Asia/Kolkata');
                                $this_week_sd = strtotime("last monday");
                                $this_week_sd = date('w', $this_week_sd) == date('w') ? $this_week_sd + 7 * 86400 : $this_week_sd;
                                $this_week_sd = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");
                                $this_week_ed = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");
                                //  echo date("Y:m:d H:i:s", $this_week_sd) . "<br>";
                                ?>

                                <table class="table table-sm table-bordered PaneTableSchedulledClassesButtons mt-2">
                                    <thead class="ColumnHeadingScheduleClassesButtons">
                                        <tr>

                                            <?php
                                            $temp_start_date = $this_week_sd;
                                            $temp_end_date = $this_week_ed;
                                            while ($this_week_sd < $this_week_ed) {
                                            ?>
                                                <th scope="col" class="text-secondary">
                                                    <h6>
                                                        <b><?= date("D", $this_week_sd) ?></b>
                                                    </h6>
                                                    <h3 class="border-bottom pb-1">
                                                        <?= date("d", $this_week_sd) ?>
                                                    </h3>

                                                    <?php
                                                    teacher_avalibity_data($userId, '' . date("Y-m-d", $this_week_sd));
                                                    ?>
                                                </th>
                                            <?php
                                                $this_week_sd = strtotime("+1 day", $this_week_sd);
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- _______________________Pane for Review Project____________________ -->
                <div id="ReviewProjectTeacherDashboard" class="tab-pane fade">
                    <div id="ReviewProjectPaneDashboardBackground" class="ReviewProjectPaneTeacherDashboardBackground shadow">

                        <div class="col-9">
                            <p class="text-center ReviewProjectMessage">
                                <b>Project Reviews</b>
                            </p>
                        </div>
                        <table id="tablefont" rules="all" class="table table-sm ReviewProjectTeacherDashboardTable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" style="width: 2%;">Sr.no</th>
                                    <th scope="col" style="width: 8%;">Category</th>
                                    <th scope="col" style="width: 10%;">Student Name</th>
                                    <th scope="col" style="width: 15%;">Project Name & Description</th>
                                    <th scope="col" style="width: 15%;">
                                        Submission<br>Date and Time
                                    </th>
                                    <th scope="col" style="width: 10%;">View Project</th>
                                    <th scope="col">Teacher Review</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $tempCount = 0;
                                foreach ($getTeacherStudentSchedules as $value) {
                                    if ($value->status == "awating_review") {
                                        $tempCount = $tempCount + 1;
                                ?>
                                        <!--                                  getUserData($_SESSION['user_id']);-->
                                        <tr>
                                            <td><?= $tempCount ?></td>
                                            <td>
                                                <?php
                                                $uData = getUserData($value->student_id);
                                                foreach ($uData

                                                    as $u) {
                                                    echo $u->category;
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                    echo $u->first_name;
                                                }
                                            ?>
                                            </td>
                                            <td>
                                                <b><?= $value->project_name ?></b><br>
                                                <button type="button" style="border-radius: 30px; border: 1px solid black;" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg<?= $value->schedule_id ?>">
                                                    Project Info
                                                </button>
                                            </td>
                                            <td><?= $value->project_submit_date ?></td>
                                            <td id="viewproject">
                                                <button class="btn" type="button" value="submit">
                                                    <a href="<?= $value->project_submit_link ?>" target="_blank">
                                                        click here to view project
                                                    </a>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <form method="POST" class="projectChange">
                                                        <input type="hidden" name="schedule_id" value="<?= $value->schedule_id ?>">
                                                        <input type="hidden" name="student_id" value="<?= $value->student_id ?>">
                                                        <label id="lab1" for="exampleFormControlTextarea2 text-center">1.Needs
                                                            Changes:</label>
                                                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="comment" placeholder="Add comments or change required in their project"><?= $value->teacher_comments ?></textarea>
                                                        <button id="sub1" type="submit" class="btn  float-right"> Submit
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="form-group">
                                                    <form method="POST" class="projectApproved">
                                                        <input type="hidden" name="schedule_id" value="<?= $value->schedule_id ?>">
                                                        <input type="hidden" name="student_id" value="<?= $value->student_id ?>">
                                                        <label id="lab2" for="exampleFormControlTextarea2 text-center">2.Approved</label>
                                                        <textarea class="form-control rounded-0" name="comment" id="exampleFormControlTextarea2" rows="3" placeholder="Add Review"></textarea>
                                                        <button id="sub2" type="submit" class="btn float-right"> Submit</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- Large modal -->


                <?php

                foreach ($getTeacherStudentSchedules as $value) {
                    if ($value->status == "awating_review") {
                ?>
                        <div class="modal fade bd-example-modal-lg<?= $value->schedule_id ?> " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $value->project_name ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?php

                                    $ext = explode(".", $value->project_desc);

                                    if (end($ext) == "pdf") {
                                    ?>
                                        <iframe src='<?= $file_path ?><?= $value->project_desc ?>#toolbar=0&navpanes=0' width='100%' height='500px' frameborder='0'>
                                        </iframe>
                                    <?php
                                    } else {
                                    ?>
                                        <iframe width='100%' height='500px' src="https://view.officeapps.live.com/op/embed.aspx?src=<?= $file_path ?><?= $value->project_desc ?>"></iframe>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- ________________________Pane for Resources__________________________ -->
                <div id="ResourcesTeacherDashboard" class="tab-pane fade">
                    resources
                    <div class="row mt-3">
                        <!-- basic -->
                        <div class="col-sm">
                            <div class="text-center">
                                <span class="course-name">Basic</span>
                            </div>
                            <div class="mt-3">
                                <span class="course-module">Module 1</span>
                            </div>
                            <div class="text-center border mr-2 ml-2 mt-3">
                                <?php
                                $courseData = getCourses(1);
                                // print_r($courseData);
                                foreach ($courseData as $v) {

                                    $ext = explode(".", $v->project_desc);

                                    if (end($ext) == "pdf") {
                                ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','doc','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- basic  end-->
                        <!-- intermediate -->
                        <div class="col-sm">
                            <div class="text-center">
                                <span class="course-name">Intermediate</span>
                            </div>
                            <div class="mt-3">
                                <span class="course-module">Module 1</span>
                            </div>
                            <div class="text-center border mr-2 ml-2 mt-3">
                                <?php
                                $courseData = getCourses(2);
                                // print_r($courseData);
                                foreach ($courseData as $v) {

                                    $ext = explode(".", $v->project_desc);

                                    if (end($ext) == "pdf") {
                                ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','doc','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- intermediate end -->
                        <!-- advance -->
                        <div class="col-sm">
                            <div class="text-center">
                                <span class="course-name">Advance</span>
                            </div>
                            <div class="mt-3">
                                <span class="course-module">Module 1</span>
                            </div>
                            <div class="text-center border mr-2 ml-2 mt-3">
                                <?php
                                $courseData = getCourses(3);
                                // print_r($courseData);
                                foreach ($courseData as $v) {

                                    $ext = explode(".", $v->project_desc);

                                    if (end($ext) == "pdf") {
                                ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="p-2">
                                            <button type="button" class="btn btn-lesson-name btn-block" data-toggle="modal" data-target="#lesssonDetailsModal" onclick="getLessonData('<?= $file_path ?>','<?= $v->project_desc ?>','doc','<?= $v->lesson_name ?>')">
                                                <?= $v->lesson_name ?>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- advance end -->
                    </div>
                    <!-- modal  -->
                    <div class="modal fade" id="lesssonDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="lessonNameModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="" id="lessonDoc"></div>
                            </div>
                        </div>
                    </div>
                    <!-- modal end -->

                </div>

                <!-- ____________________Pane for Student Database______________________ -->

                <div id="StudentDatabaseTeacherDashboard" class="tab-pane fade">
                    <br>
                    <div class="CirclesBtnPaneTeacherDashboardBackground shadow">
                        <h4 class="text-center font-italic">STUDENT DATABASE</h4>
                        <br>
                        <div class="row">
                            <div class="btn-group btn-group-toggle btn-lg btn-block TeacherDashboardButtons" data-toggle="buttons">
                                <!--<button type="button" class="btn btn-primary btn-circle btn-sm">Basic</button>
                        <button type="button" class="btn btn-success btn-circle btn-sm">Intermediate</button>
                        <button type="button" class="btn btn-danger btn-circle btn-sm">Advanced</button>-->
                                <div class="col">
                                    <button id="basic-btn" type="button" class="btn btn-primary btn-circle btn-sm">
                                        <a id="basic-href" data-toggle="tab" href="#BasicCirclePane">
                                            Beginner
                                        </a>
                                    </button>
                                </div>
                                <div class="col">
                                    <button id="inter-btn" type="button" class="btn btn-success btn-circle btn-sm">
                                        <a id="inter-href" data-toggle="tab" href="#IntermediateCirclePane">
                                            Intermediate
                                        </a>
                                    </button>
                                </div>
                                <div class="col">
                                    <button id="advance-btn" type="button" class="btn btn-danger btn-circle btn-sm">
                                        <a id="advance-href" data-toggle="tab" href="#AdvancedCirclePane">
                                            Advanced
                                        </a>
                                    </button>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>

                </script>

                <?php
                // get student details where teacher_id = ?: and category = ?: 
                $basic_learner = get_all_users_details(1);
                $inter_learner = get_all_users_details(2);
                $advance_learner = get_all_users_details(3);
                //print_r($advance_learner);
                ?>

                <div id="BasicCirclePane" class="tab-pane fade">
                    <br>
                    <div class="BasicCirclePaneTeacherDashboardBackground shadow">
                        <div class="row">
                            <div class="col-7">
                                <h3>Student Database-Category:<a class="text-info"> Beginner</a></h3>
                            </div>
                            <div class="col-4">
                                <input id="BasicSearchBox" onkeyup="basic()" class="form-control" type="text" placeholder="Search by names.." title="Type in a name">
                            </div>
                        </div>
                        <br>
                        <table id='basic_myTable' rules="all" class="table table-sm table-borderless BasicCirclePaneTeacherDashboardTable">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Parent's Name</th>
                                    <th scope="col">Parent's Contact</th>
                                    <th scope="col">Parent's Mail id</th>
                                </tr>
                            </thead>
                            <!-- loop -->
                            <tbody class="text-center">

                                <?php
                                $i = 1;
                                foreach ($basic_learner as $row) {
                                ?>

                                    <tr>
                                        <th scope="row"> <?php echo $i; ?> </th>
                                        <td> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning"><u><a class="r_clases" data-toggle="tab" href="#SessionProjectInfo" onclick="getid(<?php echo $row['user_id']; ?> ) "> Click Here</a></u>
                                            </button>

                                        </td>
                                        <td><?php echo $row['parent_first_name'] . ' ' . $row['parent_last_name']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>

                                <?php
                                    $i++;
                                } // closing for loop

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="IntermediateCirclePane" class="tab-pane fade">
                    <br>
                    <div class="IntermediateCirclePaneTeacherDashboardBackground shadow">
                        <div class="row">
                            <div class="col-7">
                                <h3>Student Database-Category:<a class="text-info"> Intermediate</a></h3>
                            </div>
                            <div class="col-4">
                                <input id="IntermediateSearchBox" onkeyup="inter()" class="form-control" type="text" placeholder="Search by names.." title="Type in a name">
                            </div>
                        </div>
                        <br>
                        <table id='inter_myTable' rules="all" class="table table-sm IntermediateCirclePaneTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Parent's Name</th>
                                    <th scope="col">Parent's Contact</th>
                                    <th scope="col">Parent's Mail id</th>
                                </tr>
                            </thead>
                            <!-- loop -->

                            <tbody class="text-center">
                                <?php
                                $i = 1;
                                foreach ($inter_learner as $row) {
                                ?>

                                    <tr>
                                        <th scope="row"> <?php echo $i; ?> </th>
                                        <td> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning"><u><a class="r_clases" data-toggle="tab" href="#SessionProjectInfo" onclick="getid(<?php echo $row['user_id']; ?>)"> Click Here</a></u>
                                            </button>

                                        </td>
                                        <td><?php echo $row['parent_first_name'] . ' ' . $row['parent_last_name']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>

                                <?php
                                    $i++;
                                } // closing for loop

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="AdvancedCirclePane" class="tab-pane fade">
                    <br>
                    <div class="AdvancedCirclePaneTeacherDashboardBackground shadow">
                        <div class="row">
                            <div class="col-7">
                                <h3>Student Database-Category:<a class="text-info"> Advanced</a></h3>
                            </div>
                            <div class="col-4">
                                <input id="AdvancedSearchBox" onkeyup="advance()" class="form-control" type="text" placeholder="Search by names.." title="Type in a name">
                            </div>
                        </div>
                        <br>
                        <table id="advance_myTable" rules="all" class="table table-sm AdvancedCirclePaneTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Parent's Name</th>
                                    <th scope="col">Parent's Contact</th>
                                    <th scope="col">Parent's Mail id</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $i = 1;
                                foreach ($advance_learner as $row) {
                                ?>

                                    <tr>
                                        <th scope="row"> <?php echo $i; ?> </th>
                                        <td> <?php echo $row['first_name'] . ' ' . $row['last_name']; ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning"><u><a class="r_clases" data-toggle="tab" href="#SessionProjectInfo" onclick="getid(<?php echo $row['user_id']; ?>)"> Click Here</a></u>
                                            </button>

                                        </td>
                                        <td><?php echo $row['parent_first_name'] . ' ' . $row['parent_last_name']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>

                                <?php
                                    $i++;
                                } // closing for loop

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="SessionProjectInfo" class="tab-pane fade">

                    <!--  
                Stundet database - (Project Info) gets appended after ajax call
        -->

                </div>

                <!-- ____________________Pane for Scheduled classes____________________ -->
                <div id="ScheduledClassesTeacherDashboard" class="tab-pane fade">
                    <div class="ScheduledClassesTeacherDashboardBackground shadow">
                        <h4 class="text-info text-center font-italic">SCHEDULED CLASSES</h4>
                        <table rules="all" class="table table-sm ScheduledClassesTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Session Date<br> and Time</th>
                                    <th scope="col">Booked By<br> Student's Name</th>
                                    <th scope="col">Session Activities</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $count = 0;
                                foreach ($getTeacherStudentSchedules as $s) {
                                    if ($s->over == 0) {
                                        $count = $count + 1;
                                ?>
                                        <tr>
                                            <th scope="row"><?= $count ?></th>
                                            <td>
                                                <?php
                                                $uData = getUserData($s->student_id);
                                                foreach ($uData as $u) {
                                                    echo $u->category;
                                                }
                                                ?>
                                            </td>
                                            <td><?= $s->lesson_name ?></td>
                                            <td><?= $s->schedule_time ?></td>
                                            <td>
                                                <?php
                                                $uData = getUserData($s->student_id);
                                                foreach ($uData as $u) {
                                                    echo $u->first_name . " " . $u->last_name;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="#" target="_blank" class="btn btn-sm" role="button" data-toggle="collapse" data-target="#collapseExample<?= $count ?>" aria-expanded="false" aria-controls="collapseExample<?= $count ?>">
                                                        <u>&nbsp;Activity&nbsp;</u>
                                                    </a>
                                                </div>

                                                <div class=" collapse" id="collapseExample<?= $count ?>">
                                                    <?php
                                                    $studentLink = getStudentsLinks($s->lesson_id);
                                                    $teacherLink = getTeachersLinks($s->lesson_id);
                                                    echo "<b>Teacher</b> <br>";
                                                    $tlinkCount = 0;
                                                    foreach ($teacherLink as $tLink) {
                                                        $tlinkCount = $tlinkCount + 1;
                                                        echo '<a class="btn btn-sm" target="_blank" href="' . $tLink->link . '">Activity ' . $tlinkCount . '</a>' . '<br>';
                                                    }

                                                    echo "<b>Student</b> <br>";
                                                    $slinkCount = 0;
                                                    foreach ($studentLink as $sLink) {
                                                        $slinkCount = $slinkCount + 1;
                                                        echo '<a class="btn btn-sm" target="_blank" href="' . $sLink->link . '">Activity ' . $slinkCount . '</a>' . '<br>';
                                                    }

                                                    ?>
                                                </div>


                                                <div>
                                                    <a href="<?= $s->project_link ?>" target="_blank" class="btn btn-sm" role="button">
                                                        <u>&nbsp;Project&nbsp;</u>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ____________________Pane for Completed classes____________________ -->
                <div id="CompletedClassesTeacherDashboard" class="tab-pane fade">
                    <div class="CompletedClassesTeacherDashboardBackground shadow">
                        <h4 class="text-success text-center font-italic">COMPLETED CLASSES</h4>
                        <table rules="all" class="table table-sm CompletedClassesTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Session Date<br> and Time</th>
                                    <th scope="col">Booked By<br> Student's Name</th>
                                    <th scope="col">Completed Session<br> Activities</th>
                                    <th scope="col">Session reward</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                <?php
                                $count = 0;
                                foreach ($getTeacherStudentSchedules as $s) {
                                    if ($s->over == 1) {
                                        $count = $count + 1;

                                ?>
                                        <tr>
                                            <th scope="row"><?= $count ?></th>
                                            <td>
                                                <?php
                                                $uData = getUserData($s->student_id);
                                                foreach ($uData as $u) {
                                                    echo $u->category;
                                                }
                                                ?>
                                            </td>
                                            <td><?= $s->lesson_name ?></td>
                                            <td><?= $s->schedule_time ?></td>
                                            <td>
                                                <?php
                                                $uData = getUserData($s->student_id);
                                                foreach ($uData as $u) {
                                                    echo $u->first_name . " " . $u->last_name;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-sm" role="button">
                                                    <u>Project</u>
                                                </a>
                                            </td>
                                            <!-- session rewards column -->
                                            <td>
                                                <?php
                                                if ($s->acp_reward == '' || $s->acp_reward == null || strlen($s->acp_reward) == 0) {
                                                ?>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Select Reward
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <center>
                                                                <button class="btn btn-danger btn-sm" style="width: 80%; margin-bottom: 3px;" onclick="confetti('Accuracy', <?php echo $s->schedule_id; ?>)">Accuracy
                                                                </button>

                                                                <button class="btn btn-warning btn-sm" style="width: 80%; margin-bottom: 3px;" onclick="confetti('Perseverance', <?php echo $s->schedule_id; ?>)">Perseverance</button>

                                                                <button class="btn btn-info btn-sm" style="width: 80%; margin-bottom: 3px;" onclick="confetti('Creativity', <?php echo $s->schedule_id; ?>)">Creativity
                                                                </button>
                                                            </center>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <p>Submitted</p>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ____________________Pane for Cancelled classes____________________ -->
                <div id="CancelledClassesTeacherDashboard" class="tab-pane fade">
                    <div class="CancelledClassesTeacherDashboardBackground shadow">
                        <h4 class="text-danger text-center font-italic">CANCELLED CLASSES</h4>
                        <table rules="all" class="table table-sm CancelledClassesTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Session Date<br> and Time</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Cancellation Date<br> and Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $count = 0;
                                foreach ($cancelClasses as $class) {
                                //  print_r($class);
                                    $count = $count + 1;
                                ?>

                                    <tr>
                                        <th scope="row"><?= $count ?></th>
                                        <td>
                                            <?php
                                           $uData = getUserData($class->student_id);
                                            foreach ($uData as $u) {
                                                echo $u->category;
                                            }
                                            ?>
                                        </td>
                                        <td><?= $class->lesson_name ?></td>
                                        <td><?= $class->schedule_time ?></td>
                                        <td>
                                            <?php
                                   $uData = getUserData($class->student_id);
                                            foreach ($uData as $u) {
                                                echo $u->first_name . " " . $u->last_name;
                                            }
                                            ?>
                                        </td>
                                        <td><?= $class->schedule_cancellation_date ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- ____________________Pane for cancel a Scheduled class____________________ -->
                <div id="CancelAScheduledClassesTeacherDashboard" class="tab-pane fade">
                    <div class="CancelAScheduledClassesTeacherDashboardBackground shadow">
                        <h4 class="HeadingCancelAScheduledClass text-center font-italic">CANCEL A SCHEDULED CLASS</h4>
                        <table rules="all" class="table table-sm CancelAScheduledClassTeacherDashboardTable table-borderless">
                            <thead class="text-center">
                                <tr>
                                    <th>Sr. no</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Lesson Name</th>
                                    <th scope="col">Session Date<br> and Time</th>
                                    <th scope="col">Booked By<br> Student's Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                <?php
                                $count = 0;
                          
                                foreach ($schedules as $value) {
                                    // print_r($value);
                                    // if($value->status=='cancel')
                                    // {
                                    //     // print_r($value);
                                    //     continue;
                                    // }
                                    if ($value->validToCancel == 1) {
                                        $count = $count + 1;
                                        $uData = getUserData($value->student_id);
                                ?>
                                        <tr>
                                            <th scope="row"><?= $count ?></th>
                                            <td>
                                                <?php
                                                foreach ($uData as $u) {
                                                    echo $u->category;
                                                }
                                                ?>
                                            </td>
                                            <td><?= $value->lesson_name ?></td>
                                            <td>
                                                <?php echo "$value->schedule_time"; ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($uData as $u) {
                                                    echo $u->first_name . " " . $u->last_name;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <button onclick="cancelSchedule(<?= $value->schedule_id ?>)" type="button" class="btn btn-warning btn-sm" data-toggle="tab" href="#">
                                                    Cancel this<br> Booking
                                                </button>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="javascript/Dashboard.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php gtag() ?>
    <script>
        function getLessonData(url, file_name, ext, lesson_name) {
            url = url + file_name;
            // console.log(url)
            $("#lessonDoc").empty();
            $("#lessonNameModalLabel").empty()
            $("#lessonNameModalLabel").html(`${lesson_name}`)
            console.log(ext);
            if (ext == "pdf") {
                $("#lessonDoc").html(
                    `<iframe
                        src="${url}#toolbar=0&navpanes=0"
                        style='height: 75vh; width: 100%;'
                        frameborder="0"
                        >
                    </iframe>`
                );
                // document.getElementById("showProjectDocModal").showModal();
                // $("#showProjectDocModal").modal("toggle");
            } else {
                console.log(url)
                $("#lessonDoc").html(
                    `<iframe
                        style='height: 75vh; width: 100%;'
                        src="https://view.officeapps.live.com/op/embed.aspx?src=${url}"
                        >
                    </iframe>`
                );
                // $("#showProjectDocModal").modal("toggle");
            }
        }


        // $('.projectChange').submit(function(e) {
        //     e.preventDefault();
        //     const x = $(this).serializeArray();
        //     console.log(x[0].value);
        //     console.log(x[1].value.length);
        //     if (x[1].value.length == 0) {
        //         alert("Please Fill Review");
        //     } else {
        //         const projectChange = new FormData();
        //         projectChange.append("projectReview", "projectReview");
        //         projectChange.append("teacherComments", x[1].value)
        //         projectChange.append("scheduleId", x[0].value)
        //         projectChange.append("status", "changes_for_student")
        //         $.ajax({
        //             url: "db.php", //Server api to receive the file
        //             type: "POST",
        //             dataType: "script",
        //             cache: false,
        //             contentType: false,
        //             processData: false,
        //             data: projectChange,
        //             success: function(data) {
        //                 console.log(data)
        //                 if (data == 1) {
        //                     alert("Successful");
        //                     location.reload();
        //                 } else {
        //                     alert("fail");
        //                 }
        //             },
        //         });
        //     }
        // })

        $('.projectChange').submit(function(e) {
            const x = $(this).serializeArray();
            // console.log(x);
            console.log(x[0].value); //schedule id
            console.log(x[1].value); //student_id
            console.log(x[2].value); //teacher comment
            e.preventDefault();
            if (x[2].value.length == 0) {
                alert("Please Fill Review");
            } else {
                const projectChange = new FormData();
                projectChange.append("projectReview", "projectReview");
                projectChange.append("teacherComments", x[2].value);
                projectChange.append("scheduleId", x[0].value);
                projectChange.append("status", "changes_for_student");
                //student_id;
                projectChange.append("student_id", x[1].value);
                //alert(projectChange);
                //$array[0]['student_id'];
                // console.log(projectChange);
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: projectChange,
                    success: function(data) {
                        console.log(data);
                        // alert(data);
                        if (data == 1) {
                            alert("Successful");
                            location.reload();
                        } else {
                            alert("fail");
                        }
                    },
                });
            }
        })




        $('.projectApproved').submit(function(e) {
            const x = $(this).serializeArray();
            // console.log(x);
            console.log(x[0].value); //schedule id
            console.log(x[1].value); //student_id
            console.log(x[2].value); //teacher remark
            e.preventDefault();
            if (x[2].value.length == 0) {
                alert("Please Fill Review");
            } else {
                const projectApproved = new FormData();
                projectApproved.append("projectApproved", "projectApproved");
                projectApproved.append("teacherRemark", x[2].value);
                projectApproved.append("scheduleId", x[0].value);
                projectApproved.append("status", "approved");
                //student_id;
                projectApproved.append("student_id", x[1].value);
                //alert(projectApproved);
                //$array[0]['student_id'];
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: projectApproved,
                    success: function(data) {
                        console.log(data);
                        // alert(data);
                        if (data == 1) {
                            alert("Project Approved.");
                            location.reload();
                        } else {
                            alert("fail");
                        }
                    },
                });
            }
        })





        // teacher schedular

        $('.Slot').submit(function(e) {
            e.preventDefault();
            $('.disabled').attr('disabled', false);
            const x = $(this).serializeArray();
            $('.disabled').attr('disabled', true);
            // console.log(x);


            let date = x[0].value;

            let slot = Array(8).fill("");;
            for (i = 1; i < x.length; i++) {
                slot[i - 1] = x[i].value;
            }
            console.log(slot);
            var duplicate = getDuplicateArrayElements(arrayRemove(slot, ""));
            console.log(arrayRemove(slot, ""));
            console.log(duplicate);

            if (duplicate.length > 0) {
                alert("you can not schedule more than one slot at the same time!");
            } else {
                // alert("ok");
                var slotData = new FormData();
                slotData.append('teacher_schedular', 'teacher_schedular');

                slotData.append('date', date);
                slotData.append('slot_1', slot[0]);
                slotData.append('slot_2', slot[1]);
                slotData.append('slot_3', slot[2]);
                slotData.append('slot_4', slot[3]);
                slotData.append('slot_5', slot[4]);
                slotData.append('slot_6', slot[5]);
                slotData.append('slot_7', slot[6]);
                slotData.append('slot_8', slot[7]);

                for (let [key, value] of slotData.entries()) {
                    console.log(key, ':', value);
                }

                $.post("db.php", {
                        teacher_schedular: "teacher_schedular",
                        date: date,
                        slot_1: slot[0],
                        slot_2: slot[1],
                        slot_3: slot[2],
                        slot_4: slot[3],
                        slot_5: slot[4],
                        slot_6: slot[5],
                        slot_7: slot[6],
                        slot_8: slot[7]
                    })
                    .done(function(data) {
                        alert(data);
                        location.reload();
                    });


            }
        });


        function getDuplicateArrayElements(arr) {
            var sorted_arr = arr.slice().sort();
            var results = [];
            for (var i = 0; i < sorted_arr.length - 1; i++) {
                if (sorted_arr[i + 1] === sorted_arr[i]) {
                    results.push(sorted_arr[i]);
                }
            }
            return results;
        }


        function arrayRemove(arr, value) {

            return arr.filter(function(ele) {
                return ele != value;
            });
        }


        function cancelSchedule(schedule_id) {
            var r = confirm("You Really want Cancel schedule");
            if (r == true) {
                const cancelSchedule_data = new FormData();
                cancelSchedule_data.append("cancelScheduleStudentClass", "cancelScheduleStudentClass");
                cancelSchedule_data.append("reScheduleId", schedule_id);
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: cancelSchedule_data,
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                             alert("Scheduled Cancel");
                            location.reload();
                        } else {
                            alert(data);
                        }
                    },
                });
            }
        }
        var a;

        function getid(id) {
            // alert(id);
            $.ajax({
                url: "db.php", //Server api to receive the file
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data)
                    //alert(data);
                    $("#SessionProjectInfo").append(data);
                },
            });
        }
        $(document).ready(function() {
            $("#studentDatabaseButton").click(function() {
                $("#basic-btn").removeClass('active');
                $("#inter-btn").removeClass('active');
                $("#advance-btn").removeClass('active');

                $("#basic-href").removeClass('active');
                $("#inter-href").removeClass('active');
                $("#advance-href").removeClass('active');


                $(".r_clases").removeClass('active');
                $("#remove").remove();

            });
        });



        function basic() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("BasicSearchBox");
            filter = input.value.toUpperCase();
            table = document.getElementById("basic_myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function inter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("IntermediateSearchBox");
            filter = input.value.toUpperCase();
            table = document.getElementById("inter_myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function advance() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("AdvancedSearchBox");
            filter = input.value.toUpperCase();
            table = document.getElementById("advance_myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        // Session Rewards : Accuracy, Perseverance, and Creativity
        function confetti(event, sid) {
            var choice = confirm(`Reward Student with '` + event + `' ?`);
            if (choice) {
                $.ajax({
                    url: "db.php",
                    type: "GET",
                    data: {
                        sid: sid,
                        event: event,
                        session_rewards: 'session_rewards'
                    },
                    success: function(result) {
                        if (result == 1) {
                            alert('Success. Reloading the page.')
                            location.reload();
                        } else {
                            alert('Error');
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>