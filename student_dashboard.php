<?php
include_once("db.php");
include_once("gtag.php");
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    $role = $_SESSION["role"];
    // echo $role;
    if ($role == "teacher") {
        header("Location: teacher_dashboard.php");
    }
} else {
    header("Location: login.php");
}

ini_set("error_reporting", E_ALL);
ini_set("display_errors", true);

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

$url = str_replace("student_dashboard.php", "", $url);


// $teachers = getUsers("teacher");
// $students = getUsers("student");


$students = getUsers('students');
$username = "";
$loggedIn = false;
$role = "";
$userData = (array)null;
$teacherId = "";
$teacherName = "";
$getUnScheduleLesson  = (array)null;
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    $userId = $_SESSION['user_id'];
    $username = $_SESSION["username"];
    $role = $_SESSION["role"];
    $loggedIn = $_SESSION["loggedIn"];
    $userData = getUserData($_SESSION['user_id']);
    $schedules = getStudentsSchedules($_SESSION['user_id']);
    $cancelClasses = getStudentCancelClasses($_SESSION['user_id']);
    $otm=otm($schedules[0]->schedule_id);
    $cnt=0;
    foreach($otm as $o)
    {
    // print_r($o);
    $cnt++;
    }
    // print_r($cnt);
   
    // echo "<pre>";
    //  print_r($schedules);
    // echo "</pre>";


    // get teacher and course id
    foreach ($userData as $a) {
        $teacherId =  $a->teacher_id;
        $courseId = $a->course_id;
    }
    if ($teacherId != null) {
        $teacherData = getUserData($teacherId);
        foreach ($teacherData as $a) {
            $teacherName = $a->first_name . " " . $a->last_name;
        }
    } else {
        $teacherName = "";
    }


    // echo $teacherName;

    // get teacher availability
    $getTeachersAllSchedules = getTeachersAllSchedules($teacherId);
    $getTeacherAvailability = getTeacherAvailability($teacherId);
    $getTeacherAvailabilitySlot = array();
    foreach ($getTeacherAvailability as $a) {
        array_push($getTeacherAvailabilitySlot, $a->slot_1, $a->slot_2, $a->slot_3, $a->slot_4, $a->slot_5, $a->slot_6, $a->slot_7, $a->slot_8);
    }
    $getTeacherAvailabilitySlot = array_values(array_filter($getTeacherAvailabilitySlot));

    // check teacher id and course id is assign or not
    if (strlen($teacherId) != 0 &&  strlen($courseId)) {
        $getUnScheduleLesson = getUnScheduleLesson($userId, $courseId);
        // echo "<pre>";
        // print_r($getUnScheduleLesson);
        // echo "</pre>";
    }

    // $getUnScheduleLesson = getUnScheduleLesson();
} else {
    header("Location: login.php");
}


// --------------------------------Rewards-------------------------------
// printing all session data
//------------------------------------
//display all session variables...

// get user details (reward_time and etc)...
$get_full_user_details = get_full_user_details($_SESSION['user_id']);

$_SESSION['email'] = $get_full_user_details['email'];  // for email notification
$_SESSION['first_name'] = $get_full_user_details['first_name'];
$_SESSION['last_name'] = $get_full_user_details['last_name'];

// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

$dateB =  $get_full_user_details['rewards_time_stamp'];
$daily_reward_count = $get_full_user_details['daily_reward'];

if (is_null($daily_reward_count) || $daily_reward_count == 0) {
    $daily_reward_count = 1;
} else {
    $daily_reward_count = $daily_reward_count + 1;
}
//echo "Daily rewards Count : ".$daily_reward_count;
//echo "<br>";
// get current date...
$dateA = $date = date('Y-m-d H:i:s');
// Displaying Old and Current date/time                  
//echo 'New Date : '.$dateA.'   ||  Old Date : '.$dateB;
// Checking is 24 hours are completed for Claiming the rewards
$timediff = strtotime($dateA) - strtotime($dateB);
// Difference in Old and new Time in seconds
// echo '<br>Time in Seconds : '.$timediff.'<br>';
// 1 hr = 3600s i.e 24 hr = 86400s 
/* 
  if($timediff > 86400){     
    echo 'more than 24 hours';
    echo '<br>';
    echo 'Claim your reward';
  }
  else
  {
   echo 'less than 24 hours';
   // $time_left = 24 hours - time left to claim rewards
   $time_left = 86400 - $timediff;
   // converting time from seconds to h:m:s
   echo '<br>Time Left in seconds : '.$time_left;
   echo '<br>Please Login after : '.gmdate("H:i:s", $time_left);
  }
  */

// Referal Link
if (isset($_GET['id'])) {
    $_SESSION['refered_by'] = $_GET['id'];
} else {
    $_SESSION['refered_by'] = NULL;
}
// This student referal Link;
$referal_link = $url . 'home.php?id=' . $_SESSION['user_id'];

// echo $referal_link; 
// echo "<br>";
// echo 'refered by : '.$_SESSION['refered_by'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="codegurukul.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery.countdown/jquery.countdown.js"></script>
    <script src="jquery.countdown/jquery.countdown.min.js"></script>
    <title>Student Dashboard</title>
    <style>
        .project-nav-link {
            font-size: 18px;
            font-weight: bold;
        }

        .project-card-new {
            background-color: rgba(138, 43, 226, 0.2);
            border-color: rgba(138, 43, 226, 0.3);
        }

        .project-card-new-label {
            position: absolute;
            top: 0px;
            right: 0px;
            font-size: 13px;
            padding: 0 10px;
            background-color: blueviolet;
            color: white;
            font-weight: bold;
        }

        .project-card {
            border-color: rgba(138, 43, 226, 0.3);
        }

        .project-card-redo-label {
            position: absolute;
            top: 0px;
            right: 0px;
            font-size: 13px;
            padding: 0 10px;
            background-color: #FF5349;
            color: white;
            font-weight: bold;
        }

        .project-nav-pills>li>a {
            color: black !important;
        }

        .project-nav-pills>li>a.active {
            color: blueviolet !important;
        }

        .project-lab-link {
            color: orangered;
            text-decoration: underline;
        }

        .project-lab-link:hover {
            color: orangered;
            text-decoration: underline;
        }

        .btn-project-submit {
            color: white;
            font-weight: bold;
            background-color: #FF5349;
        }

        .btn-project-submit:hover {
            color: white;
            font-weight: bold;
            background-color: #FF5349;
        }

        .btn-project-details {
            color: rgba(138, 43, 226, 1);
            font-size: 17px !important;
            padding: 0 !important;
            text-decoration: none;
        }

        .btn-project-details:hover {
            color: rgba(138, 43, 226, 0.9);
            font-size: 17px !important;
            padding: 0 !important;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1">
                <a href="home.php">
                    <img class="LogoForAllPages" src="images/logo.jpg" />
                </a>
            </div>

            <div class="col-11">
                <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-white">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-primary" href="#">
                                Welcome
                                <?php
                                foreach ($userData as $value) {
                                    echo "$value->first_name";
                                }
                                ?>
                                <img class="AccountLogo" alt="" src="images/account.png" />
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-primary" href="#">&nbsp;Help Center & FAQ's&nbsp;&nbsp;</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="logout.php?logout=1">
                                &nbsp;Log out
                                <img class="LogoutLogo" src="images/logout.png" />
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <br />
        <h5 class="text-center studentName">
            <?php
            foreach ($userData as $value) {
                echo ucfirst(strtolower($value->first_name)) . "'s DASHBOARD";
            }
            ?>
        </h5>

        <!-- _________________________________1st Partition____________________________________________ -->
        <div class="row">
            <div class="col">
                <nav class="navbarDashboard navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item mt-4">
                            <div class="btn-group dropright">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <br />Student <br />
                                    Profile
                                </a>
                                <div id="BoyAvatarDashboardDropdown" class="dropdown-menu">
                                    <!-- Dropdown menu List-->
                                    <?php
                                    foreach ($userData as $value) {
                                        if ($value->gender == "male") {
                                    ?>
                                            <img class="BoyAvatarDropdown" src="images/Boy_avatar.png" alt="male" />
                                        <?php
                                        } elseif ($value->gender == "female") {
                                        ?>
                                            <img class="BoyAvatarDropdown" src="images/Girl_avatar.png" alt="female" />
                                        <?php
                                        } else {
                                        ?>
                                            <img class="BoyAvatarDropdown" src="images/account.png" alt="other" />
                                    <?php
                                        }
                                    }
                                    ?>
                                    <br />Student <br />
                                    Profile
                                    <div>
                                        <br />
                                        <b>Student Info</b>
                                        <form>
                                            <?php
                                            foreach ($userData

                                                as $u) {
                                            ?>
                                                <div>
                                                    Parent Name
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->parent_first_name . ' ' . $u->parent_last_name ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Mobile Number
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->mobile ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Email Id
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->email ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Student Name
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->first_name . ' ' . $u->last_name ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Date of Birth/Birth Year
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->birthday_date ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Category
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->category ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                                <div>
                                                    Username
                                                    <label>
                                                        <input class="StudentInfo" type="text" value="<?php echo $u->username ?>" readonly="readonly" />
                                                    </label>
                                                </div>
                                        </form>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mt-4 mb-3">
                            <div class="btn-group dropright">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="Confittee" src="images/Confittee.png" />
                                    <br />Student <br />
                                    Rewards
                                </a>
                                <div id="ConfitteeDashboardDropdown" class="dropdown-menu">
                                    <!-- Dropdown menu List-->
                                    <div id="ConfitteeContainer" class="container">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="ConfitteeDropdown" src="images/Confittee.png" />
                                                <br />Student <br />
                                                Rewards
                                            </div>
                                            <div class="col-8">
                                                <br />
                                                <br />
                                                <br />
                                                Student Name
                                                <p class="StudentInfo" type="text" value="Name">
                                                    <?php echo $get_full_user_details['first_name']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <b>(<?php echo $get_full_user_details['first_name']; ?> Achivements)</b>

                                    <p class="StudentInfo" type="text" value="Name">
                                        <!--Rewards Through Projects -->

                                        <?php
                                        if ($timediff > 86400) {
                                            //echo 'more than 24 hours';
                                            //echo '<br>';
                                            echo 'Daily Login Rewards';
                                            echo '<button id="claim-reward" class="btn btn-primary" style="margin: 6px 0px; border-radius: 6px; width: 95%;">Claim Reward</button>';
                                        } else {
                                            //echo 'less than 24 hours';
                                            // $time_left = 24 hours - time left to claim rewards
                                            //$time_left = 86400 - $timediff;
                                            // converting time from seconds to h:m:s
                                            //echo '<br>Time Left in seconds : '.$time_left;
                                            //echo '<br>Please Login after : '.gmdate("H:i:s", $time_left);
                                            //echo '';
                                            echo '<br><b><span class="text-dark" style="width: 95%;">Daily Login Reward in...</span></b>';
                                            echo '<span id="getting-started" class="btn badge-danger" style="margin: 4px 0px; border-radius: 6px; width: 95%;"></span>';
                                        }
                                        ?>
                                        <!-- Script for counter -->
                                        <script type="text/javascript">
                                            const date = new Date('<?php echo $get_full_user_details['rewards_time_stamp']; ?>');
                                            date.setDate(date.getDate() + 1);
                                            console.log('Count : ' + date);

                                            $("#getting-started").countdown(date, function(event) {
                                                $(this).text(
                                                    event.strftime('%H:%M:%S')
                                                );
                                                if ($('#getting-started').html() == '00:00:00') {
                                                    location.reload();
                                                }
                                            });
                                        </script>
                                        <!-- Script for claiming daily reward -->
                                        <script>
                                            $(document).ready(function() {
                                                $("#claim-reward").click(function() {
                                                    var daily_reward = '<?php echo $daily_reward_count; ?>';
                                                    var user_id = '<?php echo $_SESSION['user_id']; ?>';
                                                    alert('Daily reward count : ' + daily_reward + '\nUser id : ' + user_id);
                                                    $.ajax({
                                                        url: "db.php",
                                                        method: "POST",
                                                        data: {
                                                            daily_reward: daily_reward,
                                                            user_id: user_id,
                                                        },
                                                        success: function(data) {
                                                            alert(data);
                                                            location.reload();
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </p>


                                    <hr>
                                    <p class="StudentInfo" type="text" value="Name" style="color: black">
                                        Session Rewards
                                    </p>
                                    <?php
                                    $acc = 0;
                                    $per = 0;
                                    $cre = 0;
                                    foreach ($schedules as $value) {
                                        if ($value->over == 1) {
                                            if ($value->acp_reward == 'Accuracy') {
                                                $acc = $acc + 1;
                                            }
                                            if ($value->acp_reward == 'Perseverance') {
                                                $per = $per + 1;
                                            }
                                            if ($value->acp_reward == 'Creativity') {
                                                $cre = $cre + 1;
                                            }
                                        }
                                    }
                                    ?>
                                    <div style="font-size: 12px;">
                                        <div><span> Accuracy :
                                                <span class="badge badge-danger" style="padding: 5px;"><?php echo $acc ?> </span>
                                            </span>
                                        </div>
                                        <div><span> Perseverance :
                                                <span class="badge badge-warning" style="padding: 5px;"> <?php echo $per ?> </span>
                                            </span>
                                        </div>
                                        <div><span> Creativity :
                                                <span class="badge badge-primary" style="padding: 5px;"> <?php echo $cre ?></span>
                                            </span>
                                        </div>
                                    </div>
                                    <hr>

                                    <p class="StudentInfo" type="text" value="Name" style="color: black">
                                        Total Login Rewards
                                    </p>
                                    <center>
                                        <p id="TeacherRewardsMessageCoin1" class="btn btn-success">
                                            <?php
                                            if ($get_full_user_details['daily_reward'] == null) {
                                                echo '0';
                                            } else {
                                                echo $get_full_user_details['daily_reward'];
                                            }
                                            ?>
                                        </p>
                                    </center>

                                    <p class="StudentInfo" type="text" value="Name" style="color: black">
                                        Project Submission Rewards
                                    </p>
                                    <center>
                                        <p id="TeacherRewardsMessageCoin1" class="btn btn-dark">
                                            <?php
                                            if ($get_full_user_details['project_sub_reward'] == null) {
                                                echo '0';
                                            } else {
                                                echo $get_full_user_details['project_sub_reward'];
                                            }
                                            ?>
                                        </p>
                                    </center>

                                    <p class="StudentInfo" type="text" value="Name" style="color: black">
                                        Project Approval Rewards
                                    </p>
                                    <center>
                                        <p id="TeacherRewardsMessageCoin1" class="btn btn-info">
                                            <?php
                                            if ($get_full_user_details['project_app_reward'] == null) {
                                                echo '0';
                                            } else {
                                                echo $get_full_user_details['project_app_reward'];
                                            }
                                            ?>
                                        </p>
                                    </center>

                                    <p class="StudentInfo" type="text" value="Name" style="color: black">
                                        Rewards through Referals
                                        <center>
                                            <p id="TeacherRewardsMessageCoin1" class="btn btn-warning">
                                                <?php
                                                if ($get_full_user_details['referal_reward'] == null) {
                                                    echo '0';
                                                } else {
                                                    echo $get_full_user_details['referal_reward'];
                                                }
                                                ?>
                                            </p>
                                        </center>

                                        <br>

                                        <!--
                                <p class="StudentInfo" type="text" value="Name">
                                    Refer and Earn.
                                 -->
                                    <div class="form-group">
                                        <h5>Refer and Earn more rewards.</h5>
                                        <label for="Referal Link">Share this link with your Friends. Once they Register using this link, You earn Referal Points</label>
                                        <textarea class="form-control" id="referal-link-box" rows="2" style="font-size: 10px;"><?php echo $referal_link; ?></textarea>

                                    </div>
                                    <button class="btn btn-success" id="copy-link" style="width: 95%; margin: 4px 0px;">Copy Link</button>
                                    </p>
                                    <script>
                                        var link;
                                        $(document).ready(function() {
                                            $("#copy-link").click(function() {
                                                $("#referal-link-box").select();
                                                //$("#lol").select();
                                                document.execCommand("copy");
                                                alert('Link Copied Successfully.');
                                            });
                                        });
                                    </script>

                                    <h5>
                                        <center>Total Rewards</center>
                                    </h5>

                                    <img class="ConfitteeEmoji" src="images/emoji.jfif" />
                                    <?php
                                    $t = $get_full_user_details['daily_reward'] + $get_full_user_details['project_sub_reward'] + $get_full_user_details['project_app_reward'] + $get_full_user_details['referal_reward'] + $acc + $per + $cre;
                                    ?>
                                    <h2 class="text-warning text-center"><?php echo $t; ?></h2>
                                    <p class="text-info text-center">Contact us-Redeem</p>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item" style="display: none;">
                            <div class="btn-group dropright">
                                <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="RocketAvatar" src="images/Rocket_avatar.png">
                                    <br> Student <br> Progress
                                </a>
                                <div id="RocketDashboardDropdown" class="dropdown-menu">
                                    <!-- Dropdown menu List-->
                                    <div id="ConfitteeContainer" class="container">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="RocketAvatarDropdown" src="images/Rocket_avatar.png">
                                                <br> Student <br> Progress
                                            </div>
                                            <div class="col-8">
                                                <br></br><br>
                                                Student Name
                                                <p class="StudentInfo" type="text" value="Name">First Name</p>
                                            </div>
                                        </div>
                                    </div>
                                    <b>(Name's Category)</b>
                                    <br>
                                    Total Rewards
                                    <br>
                                    <br>
                                    <p class="StudentInfo" type="text" value="Name">Total Classes for beginners</p>
                                    <br>
                                    <p class="StudentInfo" type="text" value="Name">Total Classes Booked by (Name)</p>
                                    <br>
                                    <p class="StudentInfo" type="text" value="Name">Hurry Up-unlock Balance Classes
                                    </p>

                                    You are Eligible-Redeem
                                    <br>
                                    <br>
                                    <img class="ConfitteeEmoji" src="images/emoji.jfif">
                                    <h2 class="text-warning text-center">150</h2>
                                    <p class="text-info text-center">Contact us-Redeem</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- _________________________________2nd Partition____________________________________________ -->
            <div class="col-10">
                <div class="row">
                    <div id="container1" class="btn-group btn-group-toggle btn-lg btn-block" data-toggle="buttons">
                        <div class="col">
                            <button type="button" id="JoinClassNow" class="btn btn-warning btn-block text-center JoinClassNow" data-toggle="tab" href="#JoinClassNowPane">
                                <b> Join Class Now </b>
                            </button>
                        </div>
                        <div class="col">
                            <button type="button" id="ProjectDetails1" class="btn btn-success btn-block" data-toggle="tab" href="#ProjectDetailsPane">
                                Project Details
                            </button>
                        </div>
                        <div class="col" style="display: none;">
                            <button <?= $disabledButton ?> type="button" id="GetMoreClasses" class="btn btn-primary btn-block" data-toggle="tab" href="#GetMoreClassesPane">
                                Get More Classes
                            </button>
                        </div>

                        <div class="col">
                            <button <?= $disabledButton ?> style="height:64px" type="button" id="ScheduleYourNextClass" class="btn btn-danger btn-block" data-toggle="tab" href="#ScheduleYourNextClassPane">
                                Schedule your Next Classs
                            </button>
                        </div>
                        <div class="col">
                         
                  
                        <button <?php if ($cnt>1){ ?> disabled <?php   } ?> style="height:64px" type="button" id="CancelRescheduleClass" class="btn btn-warning btn-block" data-toggle="tab" href="#CancelRescheduleClassPane">
                            Cancel/ Reschedule a class
                       
                        
                           
                        </button>
                    </div>
                        <?php
                        // foreach($schedules as $sch)
                        // {
                        //    var_dump( $sch->schedule_id);
                        // }
                        // //  print_r( $schedules[0]->schedule_id);
                            // print_r($cnt);
                        ?>
                       
                       <!-- <input type="button" value="Add to Cart" <?php if ($cnt>1){ ?> disabled <?php   } ?> >)" /> -->
                            
                  
                    </div>
                </div>
                <br />

                <div class="row">
                    <!-- _________________________________2.1 Partition____________________________________________ -->
                    <div class="col">
                        <!-- ___________________________________Tab Open__________________________________________ -->
                        <div class="tab-content">
                            <!-- _________________________Pane for Join Class Now_______________________________ -->
                            <div id="JoinClassNowPane" class="tab-pane active">
                                <div class="BackgroungJoinClassNow">
                                    <br /><br />
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <h1 class="text-center PartationLineJoinClassNow">
                                                Join Class Now
                                            </h1>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <br /><br />
                                    <div>
                                        <table rules="all" class="table table-sm PaneTableJoinClassNow table-borderless">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Lesson Name</th>
                                                    <th scope="col">Teacher's Name</th>
                                                    <th scope="col">Scheduled Date and Time</th>
                                                    <th scope="col">Joining Link</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php
                                                $a = 0;
                                                foreach ($schedules as $value) {
                                                    if (!$value->over) {
                                                        $a = $a + 1;
                                                    }
                                                }

                                                foreach ($schedules as $value) {
                                                    if (!$value->over) {
                                                ?>
                                                        <tr>
                                                            <th scope="row"><?php echo "$value->lesson_name"; ?></th>
                                                            <td><?php echo "$value->first_name $value->last_name"; ?></td>
                                                            <td><?php echo "$value->schedule_time"; ?></td>
                                                            <td>
                                                                <?php
                                                                $join_link = "student_session.php?room_id=" . $value->room_id . "&lesson_id=" . $value->lesson_id . "&schedule_id=" . $value->schedule_id . "&teacher_id=" . $value->teacher_id . "&student_id=" . $value->student_id;
                                                                ?>
                                                                <a href="<?= $join_link ?>" target="_blank">
                                                                    <button class="btn
                                                                <?php
                                                                if ($value->active) {
                                                                    echo " btn-warning";
                                                                }
                                                                ?>
                                                                " <?php
                                                                    if ($value->active) {
                                                                        echo "";
                                                                    } else {
                                                                        echo "disabled";
                                                                    }
                                                                    ?>>join
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
                                        <?php
                                        if ($a == 0) {
                                        ?>
                                            <br /><br />
                                            <h2 class="text-center">
                                                HEY! You Haven't Schedule Your Class Yet
                                            </h2>
                                            <br /><br />
                                            <div class="text-center">
                                                <div id="container1" class="btn-group btn-group-toggle btn-sm" data-toggle="buttons">
                                                    <button type="button" id="ScheduleYourNextClassButton" class="btn btn-sm btn-warning" data-toggle="tab" href="#ScheduleYourNextClassPane">
                                                        Schedule your Next <br />
                                                        Classs
                                                    </button>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div id="JoinClassNowPaneJoinButton" class="tab-pane fade">
                                <div class="BackgroungJoinClassNow">
                                    <br /><br />
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">
                                            <h1 class="text-center PartationLineJoinClassNow">
                                                Join Class Now
                                            </h1>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                    <br /><br />
                                    <div>
                                        <table rules="all" class="table table-sm PaneTableJoinClassNow table-borderless">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Lesson Name</th>
                                                    <th scope="col">Teacher's Name</th>
                                                    <th scope="col">Scheduled Date and Time</th>
                                                    <th scope="col">Joining Link</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <br /><br />
                                        <h2 class="text-center">
                                            HEY! You Haven't Schedule Your Class Yet
                                        </h2>
                                        <br /><br />
                                        <div class="text-center">
                                            <div id="container1" class="btn-group btn-group-toggle btn-sm" data-toggle="buttons">
                                                <button <?= $disabledButton ?> type="button" id="ScheduleYourNextClassButton" class="btn btn-sm btn-warning" data-toggle="tab" href="#ScheduleYourNextClassPane">
                                                    Schedule your Next <br />
                                                    Classs
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- _________________________Pane for Project Details _______________________________ -->
                            <div id="ProjectDetailsPane" class="tab-pane fade">
                                <ul class="nav project-nav-pills" id="myTab" role="tablist">
                                    <li class="nav-item border-right border-dark">
                                        <a class="nav-link project-nav-link active" id="all-project-tab" data-toggle="tab" href="#all-project" role="tab" aria-controls="home" aria-selected="true">
                                            All Projects
                                        </a>
                                    </li>
                                    <li class="nav-item border-right border-dark">
                                        <a class="nav-link project-nav-link" id="new-project-tab" data-toggle="tab" href="#new-project" role="tab" aria-controls="profile" aria-selected="false">New Projects</a>
                                    </li>
                                    <li class="nav-item border-right border-dark">
                                        <a class="nav-link project-nav-link" id="awating-review-tab" data-toggle="tab" href="#awating-review" role="tab" aria-controls="profile" aria-selected="false">Awaiting Review</a>
                                    </li>
                                    <li class="nav-item border-right border-dark">
                                        <a class="nav-link project-nav-link" id="project-changes-tab" data-toggle="tab" href="#project-changes" role="tab" aria-controls="contact" aria-selected="false">Project Changes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link project-nav-link" id="completed-project-tab" data-toggle="tab" href="#completed-project" role="tab" aria-controls="contact" aria-selected="false">Completed Projects</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <!-- all Project -->
                                    <div class="tab-pane fade show active m-3" id="all-project" role="tabpanel" aria-labelledby="home-tab">
                                        <?php
                                        foreach ($schedules as $v) {
                                        ?>
                                            <!-- new project -->
                                            <?php
                                            if ($v->status == "pending") {
                                            ?>
                                                <div class="card project-card-new mb-3">
                                                    <div class="project-card-new-label">NEW</div>
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <h6><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></h6>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->
                                                                <div class="mt-3">
                                                                    <a class="project-lab-link" href="<?= $v->project_link ?>" target="_blank">Go to project lab</a>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5><b><?= $v->lesson_name ?></b></h5>
                                                                <?php

                                                                $ext = explode(".", $v->project_desc);

                                                                if (end($ext) == "pdf") {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','other','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">
                                                                <form method="POST" class="saveLink">
                                                                    <input type="hidden" name="schedule_id" value="<?php echo $v->schedule_id ?>" />
                                                                    <input type="text" name="ProjectLink" class="form-control" placeholder="paste project link here" />
                                                                    <button value="submit" class="btn btn-project-submit mt-2">
                                                                        submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- new project end -->
                                            <!-- return project -->
                                            <?php
                                            if ($v->status == "changes_for_student") {
                                            ?>
                                                <div class="card project-card mb-3">
                                                    <div class="project-card-redo-label">REDO</div>
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->
                                                                <div class="mt-2">
                                                                    <a class="project-lab-link" href="<?= $v->project_submit_link ?>" target="_blank">Your Project</a>
                                                                </div>
                                                            </div>
                                                            <div class="col">

                                                                <h5><b><?= $v->lesson_name ?></b></h5>
                                                                <span>
                                                                    <b> Uh-oh looks like your project still needs some corrections!</b>
                                                                </span>
                                                                <br />
                                                                <span class="mt-2">
                                                                    Teacher' Remark - <?= $v->teacher_comments ?>
                                                                </span>
                                                                <?php

                                                                $ext = explode(".", $v->project_desc);

                                                                if (end($ext) == "pdf") {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','other','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">
                                                                <form method="POST" class="saveLink">
                                                                    <input type="hidden" name="schedule_id" value="<?php echo $v->schedule_id ?>" />
                                                                    <input type="text" name="ProjectLink" class="form-control" placeholder="paste project link here" />
                                                                    <button value="submit" class="btn btn-project-submit mt-2">
                                                                        submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <!-- return project end -->
                                            <!-- completed project -->
                                            <?php
                                            if ($v->status == "approved") {
                                            ?>
                                                <div class="card project-card mb-3">
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->
                                                            </div>
                                                            <div class="col">

                                                                <h5><b><?= $v->lesson_name ?> Comments and Review </b></h5>
                                                                <span>
                                                                    <b>Well done! your project is complete</b>
                                                                </span>
                                                                <br />
                                                                <span class="mt-2">
                                                                    Teacher's Comments - <?= $v->teacher_valuation ?>
                                                                </span>

                                                                <div class="mt-2">
                                                                    <a class=" btn-project-details" target="_blank" href="<?= $v->project_submit_link ?>"><b>View Project</b></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">

                                                                <button value="submit" class="btn btn-project-submit mt-2" disabled>
                                                                    Completed!
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php

                                            }
                                            ?>
                                            <!-- completed project end -->


                                            <!-- awaiting Project review -->
                                            <?php
                                            if ($v->status == "awating_review") {
                                            ?>
                                                <div class="card project-card mb-3">
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->

                                                            </div>
                                                            <div class="col">

                                                                <h5><b><?= $v->lesson_name ?> </b></h5>
                                                                <span>
                                                                    <b>Project is under review</b>
                                                                </span>
                                                                <br />
                                                                <div class="mt-2">
                                                                    <a class=" btn-project-details" target="_blank" href="<?= $v->project_submit_link ?>"><b>View Submitted Project</b></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">

                                                                <button value="submit" class="btn btn-project-submit mt-2" disabled>
                                                                    Under Review
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                            <!-- awaiting project review end -->
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- all project end -->
                                    <!-- ----------------------------------------- -->
                                    <!-- new project tab -->
                                    <div class="tab-pane fade m-3" id="new-project" role="tabpanel" aria-labelledby="profile-tab">
                                        <!-- new project -->
                                        <?php
                                        foreach ($schedules as $v) {
                                            if ($v->status == "pending") {
                                        ?>
                                                <div class="card project-card-new mb-3">
                                                    <div class="project-card-new-label">NEW</div>
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <h6><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></h6>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->
                                                                <div class="mt-3">
                                                                    <a class="project-lab-link" href="<?= $v->project_link ?>" target="_blank">Go to project lab</a>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5><b><?= $v->lesson_name ?></b></h5>
                                                                <?php

                                                                $ext = explode(".", $v->project_desc);

                                                                if (end($ext) == "pdf") {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','other','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">
                                                                <form method="POST" class="saveLink">
                                                                    <input type="hidden" name="schedule_id" value="<?php echo $v->schedule_id ?>" />
                                                                    <input type="text" name="ProjectLink" class="form-control" placeholder="paste project link here" />
                                                                    <button value="submit" class="btn btn-project-submit mt-2">
                                                                        submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- new project end -->
                                    </div>
                                    <div class="tab-pane fade m-3" id="project-changes" role="tabpanel" aria-labelledby="contact-tab">
                                        <!-- return project -->
                                        <?php
                                        foreach ($schedules as $v) {
                                            if ($v->status == "changes_for_student") {
                                        ?>
                                                <div class="card project-card mb-3">
                                                    <div class="project-card-redo-label">REDO</div>
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->
                                                                <div class="mt-2">
                                                                    <a class="project-lab-link" href="<?= $v->project_submit_link ?>" target="_blank">Your Project</a>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5><b><?= $v->lesson_name ?></b></h5>
                                                                <span>
                                                                    <b> Uh-oh looks like your project still needs some corrections!</b>
                                                                </span>
                                                                <br />
                                                                <span class="mt-2">
                                                                    Teacher's Remark - <?= $v->teacher_comments ?>
                                                                </span>
                                                                <?php

                                                                $ext = explode(".", $v->project_desc);

                                                                if (end($ext) == "pdf") {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','pdf','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="mt-1">
                                                                        <button type="button" class="btn btn-project-details" data-toggle="modal" data-target="#showProjectDocModal" onclick="showProjectDoc('<?= $file_path ?>','<?= $v->project_desc ?>','other','<?= $v->lesson_name ?>')">
                                                                            <b>Project Details</b>
                                                                        </button>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">
                                                                <form method="POST" class="saveLink">
                                                                    <input type="hidden" name="schedule_id" value="<?php echo $v->schedule_id ?>" />
                                                                    <input type="text" name="ProjectLink" class="form-control" placeholder="paste project link here" />
                                                                    <button value="submit" class="btn btn-project-submit mt-2">
                                                                        submit
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- return project end -->
                                    </div>
                                    <div class="tab-pane fade m-3" id="awating-review" role="tabpanel" aria-labelledby="contact-tab">
                                        <!-- awating_review project -->
                                        <?php
                                        foreach ($schedules as $v) {
                                            if ($v->status == "awating_review") {
                                        ?>
                                                <div class="card project-card mb-3">
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->

                                                            </div>
                                                            <div class="col">

                                                                <h5><b><?= $v->lesson_name ?> </b></h5>
                                                                <span>
                                                                    <b>Project is under review</b>
                                                                </span>
                                                                <br />
                                                                <div class="mt-2">
                                                                    <a class=" btn-project-details" target="_blank" href="<?= $v->project_submit_link ?>"><b>View Submitted Project</b></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">

                                                                <button value="submit" class="btn btn-project-submit mt-2" disabled>
                                                                    Under Review
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- completed project end -->
                                    </div>
                                    <div class="tab-pane fade m-3" id="completed-project" role="tabpanel" aria-labelledby="contact-tab">
                                        <!-- completed project -->
                                        <?php
                                        foreach ($schedules as $v) {
                                            if ($v->status == "approved") {
                                        ?>
                                                <div class="card project-card mb-3">
                                                    <div class="card-body">
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2">
                                                                <p><b><?= date_format(date_create($v->schedule_time), "Y/m/d") ?></b></p>
                                                                <!-- <img src="https://www.hdwallpapers.in/thumbs/2021/spiderman_night_mask_4k_5k_hd_superheroes-t1.jpg" class="img-fluid" alt="Responsive image" /> -->

                                                            </div>
                                                            <div class="col">

                                                                <h5><b><?= $v->lesson_name ?> Comments and Review </b></h5>
                                                                <span>
                                                                    <b>Well done! your project is complete</b>
                                                                </span>
                                                                <br />
                                                                <span class="mt-2">
                                                                    Teacher's Comments - <?= $v->teacher_valuation ?>
                                                                </span>
                                                                <div class="mt-2">
                                                                    <a class=" btn-project-details" target="_blank" href="<?= $v->project_submit_link ?>"><b>View Project</b></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3 text-center align-self-center">

                                                                <button value="submit" class="btn btn-project-submit mt-2" disabled>
                                                                    Completed!
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- completed project end -->
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="showProjectDocModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="projectNameModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="" id="projectDoc"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- _________________________Pane for Get More Classes ______________________________ -->
                            <div id="GetMoreClassesPane" class="tab-pane fade">
                                <div class="row">
                                    <div class="col">
                                        <div id="Module1" class="card">
                                            <nav class="navbar navbarModule bg-info">
                                                <span class="navbar-brand mx-auto">Module 1</span>
                                            </nav>
                                            <h6 class="text-center text-info">Total Classes</h6>
                                            <h3 class="text-center text-info"><u>9</u></h3>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Topic Being Cover
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Web Development, Interactive App Development And
                                                Interactive Game Development
                                            </p>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Payment Details
                                            </p>
                                            <p class="text-center text-info ModuleMessage">
                                                <u>Rs. 3,000/-</u>
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Paid as on 6th Nov 2020
                                            </p>

                                            <p class="PartationLine"></p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="Module2" class="card">
                                            <nav class="navbar navbarModule bg-info">
                                                <span class="navbar-brand mx-auto">Module 2</span>
                                            </nav>
                                            <h5 class="text-center text-info">Total Classes</h5>
                                            <h2 class="text-center text-info"><u>30</u></h2>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Topic Being Cover
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Web Development, Interactive App Development And
                                                Interactive Game Development
                                            </p>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Payment Details
                                            </p>
                                            <p class="text-center text-info ModuleMessage">
                                                <u>Rs. 10,000/-</u>
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Invest-<br />
                                                Ensure your child's continued <br />Journey in this
                                                world of Coding
                                            </p>

                                            <button id="BtnRedeem2" type="button" class="btn btn-outline">
                                                Use Redeem
                                            </button>

                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button id="BuyNow2" type="button" class="btn btn-sm btn-primary" data-toggle="tab" href="#PaySecurely2">
                                                    Buy Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div id="Module3" class="card">
                                            <nav class="navbar navbarModule bg-info">
                                                <span class="navbar-brand mx-auto">Module 3</span>
                                            </nav>
                                            <h6 class="text-center text-info">Total Classes</h6>
                                            <h3 class="text-center text-info"><u>50</u></h3>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Topic Being Cover
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Web Development, Interactive App Development And
                                                Interactive Game Development
                                            </p>

                                            <p class="PartationLine"></p>
                                            <p class="text-center text-info ModuleMessage">
                                                Payment Details
                                            </p>
                                            <p class="text-center text-info ModuleMessage">
                                                <u>Rs. 15,000/-</u>
                                            </p>
                                            <p class="text-center ModuleMessage">
                                                Invest-<br />
                                                Ensure your child's continued <br />Journey in this
                                                world of Coding
                                            </p>

                                            <button id="BtnRedeem3" type="button" class="btn btn-outline">
                                                Use Redeem
                                            </button>

                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <button id="BuyNow3" type="button" class="btn btn-sm btn-primary" data-toggle="tab" href="#PaySecurely3">
                                                    Buy Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ____________________________Pane for Payment On Payment 2________________________ -->
                            <div id="PaySecurely2" class="tab-pane fade">
                                <div class="bg-white shadow-lg col-md-8 md-form col-md-2 offset-md-2">
                                    &nbsp;
                                    <div id="payInfo" class="bg-white shadow-lg col-md-12">
                                        <label for="childName" class="text-secondary">Child Name</label>
                                        <input type="text" id="childName" name="ChildName" placeholder="(Name)" class="float-right" />
                                        <br />
                                        <label for="parentEmail" class="text-secondary">Parent Email</label>
                                        <input type="text" id="parentEmail" name="ParentEmail" placeholder="(Email)" class="float-right" />
                                        <br />
                                        <label for="paymentFor" class="text-secondary">Payment For</label>
                                        <input type="text" id="paymentFor" name="PaymentFor" placeholder="(Course name)" class="float-right" />
                                    </div>
                                    &nbsp;
                                    <label>PAYMENT DETAILS</label>
                                    <div id="payDetails" class="bg-white shadow-lg col-md-12">
                                        <label for="courseName ">Course Name</label>
                                        <span id="courseName" placeholder="Rs.00000" class="float-right text-secondary">Rs.00000</span>
                                        <br />
                                        <label for="redeemCode">Redeem Code(discount)</label>
                                        <span id="redeemCode" placeholder="00000" class="float-right text-secondary">00000</span>
                                        <br />
                                        <label for="orderTotal">Order Total</label>
                                        <span id="orderTotal" placeholder="Rs.00000" class="float-right text-secondary">Rs.00000</span>
                                    </div>
                                    &nbsp;
                                    <div class="bg-white shadow-lg col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="radio" name="abcd" id="emiDetail" value="No_CostEMICredit_Card" />
                                                <label for="emiDetail">No Cost EMI Credit Card</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <a id="knowmore" href="#KnowMore">Know More </a>
                                            </div>
                                        </div>
                                        <input type="radio" name="abcd" id="cardDetail" value="DebitCrad" checked="checked" />
                                        <label for="cardDetail">Debit Card / Credit Card / Net Banking / UPI / Wallets
                                            / Others</label>
                                    </div>
                                    &nbsp;
                                    <div id="totalAmountDiv" class="bg-white shadow-lg col-md-12">
                                        <div class="d-flex justify-content-center">
                                            <label id="totalAmount" class="text-info">Your Total:00000</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center" id="payButton">
                                        <button type="button" class="btn btn-md btn-primary" id="paySecurely">
                                            Pay Securely
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ____________________________Pane for Payment On Payment 3________________________ -->
                            <div id="PaySecurely3" class="tab-pane fade">
                                <div class="bg-white shadow-lg col-md-8 md-form col-md-2 offset-md-2">
                                    &nbsp;
                                    <div id="payInfo" class="bg-white shadow-lg col-md-12">
                                        <label for="childName" class="text-secondary">Child Name</label>
                                        <input type="text" id="childName" name="ChildName" placeholder="(Name)" class="float-right" />
                                        <br />
                                        <label for="parentEmail" class="text-secondary">Parent Email</label>
                                        <input type="text" id="parentEmail" name="ParentEmail" placeholder="(Email)" class="float-right" />
                                        <br />
                                        <label for="paymentFor" class="text-secondary">Payment For</label>
                                        <input type="text" id="paymentFor" name="PaymentFor" placeholder="(Course name)" class="float-right" />
                                    </div>
                                    &nbsp;
                                    <label>PAYMENT DETAILS</label>
                                    <div id="payDetails" class="bg-white shadow-lg col-md-12">
                                        <label for="courseName ">Course Name</label>
                                        <span id="courseName" placeholder="Rs.00000" class="float-right text-secondary">Rs.00000</span>
                                        <br />
                                        <label for="redeemCode">Redeem Code(discount)</label>
                                        <span id="redeemCode" placeholder="00000" class="float-right text-secondary">0000</span>
                                        <br />
                                        <label for="orderTotal">Order Total</label>
                                        <span id="orderTotal" placeholder="Rs.00000" class="float-right text-secondary">Rs.00000</span>
                                    </div>
                                    &nbsp;
                                    <div class="bg-white shadow-lg col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="radio" name="abcd" id="emiDetail" value="No_CostEMICredit_Card" />
                                                <label for="emiDetail">No Cost EMI Credit Card</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <a id="knowmore" href="#KnowMore">Know More </a>
                                            </div>
                                        </div>
                                        <input type="radio" name="abcd" id="cardDetail" value="DebitCrad" checked="checked" />
                                        <label for="cardDetail">Debit Card / Credit Card / Net Banking / UPI / Wallets
                                            / Others</label>
                                    </div>
                                    &nbsp;
                                    <div id="totalAmountDiv" class="bg-white shadow-lg col-md-12">
                                        <div class="d-flex justify-content-center">
                                            <label id="totalAmount" class="text-info">Your Total:00000</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center" id="payButton">
                                        <button type="button" class="btn btn-md btn-primary" id="paySecurely">
                                            Pay Securely
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ____________________Pane for Schedule Your Next Class ___________________________ -->
                            <div id="ScheduleYourNextClassPane" class="tab-pane fade">
                                <div class="BackgroungScheduleYourNextClass float-right">
                                    <input type="hidden" id="selectedLessonId" />
                                    <input type="hidden" id="selectedTeacherId" value="<?= $teacherId ?>" />
                                    <input type="hidden" id="selectedStudentId" value="<?= $_SESSION['user_id'] ?>" />
                                    <table class="table PaneTable table-borderless">
                                        <thead class="ColumnHeadingScheduleClass">
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">Teacher's Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($getUnScheduleLesson as $value) {
                                                $i = $i + 1;
                                            ?>
                                                <tr class="text-center">
                                                    <th scope="row"><?= $i ?></th>
                                                    <td>
                                                        <input type="hidden" name="l_id" value="<?= $value->lesson_id ?>">
                                                        <input type="text" value="<?= $value->lesson_name ?>" class="form-control shadow" disabled />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control shadow" name="t_id" <?php
                                                                                                                    $uData = getUserData($teacherId);
                                                                                                                    foreach ($uData as $u) {
                                                                                                                        echo "value='" . $u->first_name . " " . $u->last_name . "'";
                                                                                                                    }
                                                                                                                    ?> placeholder="Rekha" disabled />
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <button id="ScheduleThisClass1" type="button" class="ScheduleThisClass1 btn btn-block btn-sm btn-warning" onclick="store(this)" data-toggle="tab" href="#ScheduleThisClassButton">
                                                                Schedule this <br />
                                                                Class
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- __________________Pane for Scheduled Classes Teacher's Availability________________ -->
                            <div id="ScheduleThisClassButton" class="tab-pane fade">
                                <div class="row">
                                    <div class="col">
                                        <h6>Teacher: <?= $teacherName ?></h6>
                                    </div>
                                    <div class="col">
                                        <h6>Teacher's Availability</h6>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <button id="ButtonForWeek1" type="button" class="btn btn-warning" data-toggle="tab" href="#ButtonForWeek1Table">
                                                Week 1
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <button id="ButtonForWeek2" type="button" class="btn btn-warning" data-toggle="tab" href="#ButtonForWeek2Table">
                                                Week 2
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col"></div>
                                </div>
                                <div class="tab-content">
                                    <!-- __________________Pane for Schedulled Classes Teacher's Avilability Week 1st________________ -->
                                    <div id="ButtonForWeek1Table" class="tab-pane active">
                                        <?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        $this_week_sd = strtotime("last monday");
                                        $this_week_sd = date('w', $this_week_sd) == date('w') ? $this_week_sd + 7 * 86400 : $this_week_sd;
                                        $this_week_ed = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");
                                        //  echo date("Y:m:d H:i:s", $this_week_sd) . "<br>";
                                        ?>

                                        <table id="table1" class="table table-sm table-bordered PaneTableSchedulledClassesButtons">
                                            <thead class="ColumnHeadingScheduleClassesButtons">
                                                <tr>
                                                    <th scope="col" class="text-secondary">
                                                        <h2 class="text-center">Time</h2>
                                                    </th>
                                                    <?php
                                                    $temp_start_date = $this_week_sd;
                                                    $temp_end_date = $this_week_ed;
                                                    while ($this_week_sd < $this_week_ed) {
                                                    ?>
                                                        <th scope="col" class="text-secondary">
                                                            <h5>
                                                                <?= date("D", $this_week_sd) ?>
                                                            </h5>
                                                            <h2>
                                                                <?= date("d", $this_week_sd) ?>
                                                            </h2>
                                                        </th>
                                                    <?php
                                                        $this_week_sd = strtotime("+1 day", $this_week_sd);
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($x = 0; $x <= 23; $x++) {
                                                ?>
                                                    <tr>
                                                        <td class="hour"><span><?php if ($x < 10) {
                                                                                    echo "0";
                                                                                }
                                                                                echo $x . ".00" ?> </span></td>
                                                        <?php
                                                        $this_week_sd = $temp_start_date;
                                                        $this_week_ed = $temp_end_date;
                                                        while ($this_week_sd < $this_week_ed) {
                                                        ?>
                                                            <form method="POST" class="bookSlot">
                                                                <td>
                                                                    <input type="hidden" name="book_time" value="<?php echo date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . "+" . $x . " hours")) ?>">
                                                                    <button class="form-control text-white" <?php
                                                                                                            if (date("Y-m-d H:i:s", time()) > date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours"))) {
                                                                                                                echo "style='background-color:gray'";
                                                                                                                echo "disabled";
                                                                                                            } elseif (!in_array(date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . "+" . $x . " hours")), $getTeacherAvailabilitySlot, $strict = false)) {
                                                                                                                echo "style='background-color:gray'";
                                                                                                                echo "disabled";
                                                                                                            } else {
                                                                                                                foreach ($getTeachersAllSchedules as $v) {
                                                                                                                    if (strtotime($v->schedule_time) == strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")) {
                                                                                                                        echo "style='background-color:black'";
                                                                                                                        echo "disabled";
                                                                                                                        break;
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            ?>>
                                                                        <small><?php echo date("d H:i", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")) ?></small>
                                                                    </button>
                                                                </td>
                                                            </form>
                                                        <?php
                                                            $this_week_sd = strtotime("+1 day", $this_week_sd);
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- __________________Pane for Schedulled Classes Teacher's Avilability Week 2nd________________ -->
                                    <div id="ButtonForWeek2Table" class="tab-pane fade">
                                        <?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        $this_week_sd = strtotime("last monday");
                                        $this_week_sd = date('w', $this_week_sd) == date('w') ? $this_week_sd + 7 * 86400 : $this_week_sd;
                                        $this_week_sd = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");
                                        $this_week_ed = strtotime(date("Y-m-d", $this_week_sd) . " +7 days");
                                        //  echo date("Y:m:d H:i:s", $this_week_sd) . "<br>";
                                        ?>
                                        <table id="table2" class="table table-sm table-bordered PaneTableSchedulledClassesButtons">
                                            <thead class="ColumnHeadingScheduleClassesButtons">
                                                <tr>
                                                    <th scope="col" class="text-secondary">
                                                        <h2 class="text-center">Time</h2>
                                                    </th>
                                                    <?php
                                                    $temp_start_date = $this_week_sd;
                                                    $temp_end_date = $this_week_ed;
                                                    while ($this_week_sd < $this_week_ed) {
                                                    ?>
                                                        <th scope="col" class="text-secondary">
                                                            <h5>
                                                                <?= date("D", $this_week_sd) ?>
                                                            </h5>
                                                            <h2>
                                                                <?= date("d", $this_week_sd) ?>
                                                            </h2>
                                                        </th>
                                                    <?php
                                                        $this_week_sd = strtotime("+1 day", $this_week_sd);
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($x = 0; $x <= 23; $x++) {
                                                ?>
                                                    <tr>
                                                        <td class="hour"><span><?php if ($x < 10) {
                                                                                    echo "0";
                                                                                }
                                                                                echo $x . ".00" ?> </span></td>
                                                        <?php
                                                        $this_week_sd = $temp_start_date;
                                                        $this_week_ed = $temp_end_date;
                                                        while ($this_week_sd < $this_week_ed) {
                                                        ?>
                                                            <form method="POST" class="bookSlot">
                                                                <td>
                                                                    <input type="hidden" name="book_time" value="<?php echo date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")) ?>">
                                                                    <button class="form-control text-white" <?php
                                                                                                            if (date("Y-m-d H:i:s", time()) > date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours"))) {
                                                                                                                echo "style='background-color:gray'";
                                                                                                                echo "disabled";
                                                                                                            } elseif (!in_array(date("Y-m-d H:i:s", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")), $getTeacherAvailabilitySlot, $strict = false)) {
                                                                                                                echo "style='background-color:gray'";
                                                                                                                echo "disabled";
                                                                                                            } else {
                                                                                                                foreach ($getTeachersAllSchedules as $v) {
                                                                                                                    if (strtotime($v->schedule_time) == strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")) {
                                                                                                                        echo "style='background-color:black'";
                                                                                                                        echo "disabled";
                                                                                                                        break;
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                            ?>>
                                                                        <small><?php echo date("d H:i", strtotime(date("Y:m:d H:i:s", $this_week_sd) . " +" . $x . " hours")) ?></small>
                                                                    </button>
                                                                </td>
                                                            </form>
                                                        <?php
                                                            $this_week_sd = strtotime("+1 day", $this_week_sd);
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- _________________________Pane for Schedulled Classes_______________________________ -->
                            <div id="ScheduledClassesPane" class="tab-pane fade">
                                <div>
                                    <h5 id="ScheduleClassHeading" class="btn-info text-light">
                                        Student's Dashboard: Schedulled Classes
                                    </h5>
                                </div>
                                <div class="BackgroungSchedulledClasses">
                                    <table class="table table-sm PaneTable table-borderless">
                                        <thead class="ColumnHeadingSchedulledClasses">
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">Teacher's Name</th>
                                                <th scope="col">Session Date & Time</th>
                                                <th scope="col">View all Activites</th>
                                                <th scope="col">Booking Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $count = 0;
                                            foreach ($schedules as $s) {
                                                if ($s->over == 0) {
                                                    $count = $count + 1;

                                            ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?= $count ?></th>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" value="<?= $s->lesson_name ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" value="<?= $teacherName ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" value="<?= $s->schedule_time ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-block  border shadow bg-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Activity
                                                                </a>

                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <?php
                                                                    $links = getStudentsLinks($s->lesson_id);
                                                                    $linkCount = 0;
                                                                    foreach ($links as $link) {
                                                                        $linkCount = $linkCount + 1;
                                                                    ?>
                                                                        <a class="dropdown-item" target="_blank" href="<?= $link->link ?>">Activity <?= $linkCount ?></a>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" value="<?= $s->schedule_booking_date ?>" disabled />
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

                            <!-- ____________________________Pane for Cancelled Classes_______________________________ -->
                            <div id="CancelledClassesPane" class="tab-pane fade">
                                <div>
                                    <h5 id="CancelledClassHeading" class="btn-danger text-light">
                                        Student's Dashboard: Cancelled Classes
                                    </h5>
                                </div>
                                <div class="BackgroungCancelledClasses">
                                    <table class="table table-sm PaneTable table-borderless">
                                        <thead class="ColumnHeadingCancelledClasses">
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">Teacher's Name</th>
                                                <th scope="col">Session Date & Time</th>
                                                <th scope="col">Booking Date & Time</th>
                                                <th scope="col">Cancellation Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            foreach ($cancelClasses as $class) {

                                                $count = $count + 1;
                                            ?>
                                                <tr class="text-center">

                                                    <th scope="row"><?= $count ?></th>
                                                    <td>
                                                        <input type="text" class="form-control shadow bg-white" value="<?= $class->lesson_name ?>" disabled />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control shadow  bg-white" <?php
                                                                                                                    $uData = getUserData($class->schedule_teacher_id);
                                                                                                                    foreach ($uData as $u) {
                                                                                                                        echo "value='" . $u->first_name . " " . $u->last_name . "'";
                                                                                                                    } ?> disabled />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control shadow  bg-white" value="<?= $class->schedule_time ?>" disabled />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control shadow  bg-white" value="<?= $class->schedule_booking_date ?>" disabled />
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control shadow  bg-white" value="<?= $class->schedule_cancellation_date ?>" disabled />
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- _________________________Pane for Completed Classes______________________________ -->
                            <div id="CompletedClassesPane" class="tab-pane fade">
                                <div>
                                    <h5 id="CompletedClassHeading" class="btn-success text-light">
                                        Student's Dashboard: Completed Classes
                                    </h5>
                                </div>
                                <div class="BackgroungCompletedClasses">
                                    <table class="table table-sm PaneTable table-borderless">
                                        <thead class="ColumnHeadingCompletedClasses">
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">Teacher's Name</th>
                                                <th scope="col">Session Date & Time</th>
                                                <th scope="col">Booking Date & Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            foreach ($schedules as $value) {
                                                if ($value->over == 1) {
                                                    $i = $i + 1;
                                            ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?= $i ?></th>
                                                        <td>
                                                            <input type="text" value="<?= $value->lesson_name ?>" class="form-control shadow bg-light" disabled />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" name="t_id" value="<?= $teacherName ?>" disabled />

                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow  bg-light" value="<?= $value->schedule_time ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow bg-light" value="<?= $value->schedule_booking_date ?>" disabled />
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

                            <!-- ____________________Pane for Cancel Reschedule Class ____________________________ -->
                            <div id="CancelRescheduleClassPane" class="tab-pane fade">
                                <div class="BackgroungRecheduleYourNextClass float-right">
                                    <input type="hidden" id="reScheduleId">
                                    <input type="hidden" id="reSchedule">
                                    <table class="table PaneTable table-borderless">
                                        <thead class="ColumnHeadingRecheduleClass">
                                            <tr>
                                                <th scope="col">Sr No.</th>
                                                <th scope="col">Lesson Name</th>
                                                <th scope="col">Teacher's Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 0;
                                            foreach ($schedules as $value) {
                                                // print_r($value);
                                                if ($value->validToCancel == 1) {

                                                    $i = $i + 1;
                                            ?>
                                                    <tr class="text-center">
                                                        <th scope="row" id="temp123"><?= $i ?></th>
                                                        <td>
                                                            <input type="hidden" name="s_id" value="<?= $value->schedule_id ?>">
                                                            <input type="text" value="<?= $value->lesson_name ?>" class="form-control shadow" disabled />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control shadow" name="t_id" value="<?= $value->first_name. " " .$value->last_name ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <button id="ScheduleThisClass1" type="button" onclick="cancelSchedule(this)" class="btn btn-block btn-sm btn-danger">
                                                                &nbsp;&nbsp;&nbsp;Cancel this&nbsp;&nbsp; <br />
                                                                Class
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <button id="ScheduleThisClass1" type="button" class="ScheduleThisClass1 btn btn-block btn-sm btn-warning" onclick="storeReSchedule(this)" data-toggle="tab" href="#ScheduleThisClassButton">
                                                                    Schedule this <br />
                                                                    Class
                                                                </button>
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
                        </div>
                        <!-- ___________________________________Tab Close__________________________________________ -->
                    </div>

                    <!-- _________________________________2.2 Partition____________________________________________ -->
                    <div class="col-2">
                        <div class="btn-group btn-group-toggle btn-lg btn-block" data-toggle="buttons">
                            <table id="container2" class="table table-borderless">
                                <tr>
                                    <th>
                                        <button id="ScheduledClasses" type="button" class="btn btn-info btn-lg btn-block" data-toggle="tab" href="#ScheduledClassesPane">
                                            Scheduled Classes
                                        </button>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <button id="CancelledClasses" type="button" class="btn btn-danger btn-lg btn-block" data-toggle="tab" href="#CancelledClassesPane">
                                            Cancelled Classes
                                        </button>
                                    </th>
                                </tr>

                                <tr>
                                    <th>
                                        <button id="CompletedClasses" type="button" class="btn btn-success btn-lg btn-block" data-toggle="tab" href="#CompletedClassesPane">
                                            Completed Classes
                                        </button>
                                    </th>
                                </tr>
                            </table>
                        </div>
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
    <script src="javascript/Teacher.js"></script>
    <script src="javascript/Dashboard.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178925756-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-178925756-1');
    </script>
    <script>
        function cancelSchedule(e) {
            var r = confirm("You Really want Cancel schedule");
            if (r == true) {
                let row = $(e).closest("tr"); // Find the row
                let schedule_id = row.find('input[name="s_id"]').val(); // Find the text
                console.log(schedule_id);
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
                            alert("Successful");
                            location.reload();
                        } else {
                            alert("fail");
                        }
                    },
                });
            }
        }

        function storeReSchedule(e) {
            let row = $(e).closest("tr"); // Find the row
            let schedule_id = row.find('input[name="s_id"]').val(); // Find the text
            console.log(schedule_id);
            $('#reScheduleId').val(schedule_id);
            $('#reSchedule').val("1");
            console.log($('#reSchedule').val());
        }

        function store(e) {
            let row = $(e).closest("tr"); // Find the row
            let lesson_id = row.find('input[name="l_id"]').val(); // Find the text
            $('#selectedLessonId').val(lesson_id);
            $('#reSchedule').val("0");
        }

        function isValidHttpUrl(string) {
            let url;

            try {
                url = new URL(string);
            } catch (_) {
                return false;
            }

            return url.protocol === "http:" || url.protocol === "https:";
        }

        $('.saveLink').submit(function(e) {
            e.preventDefault();
            const x = $(this).serializeArray();
            const form_data = new FormData();
            $.each(x, function(i, field) {
                form_data.append(field.name, field.value);
            });

            if (isValidHttpUrl(form_data.get('ProjectLink'))) {
                form_data.append("saveLink", "saveLink");
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(data) {
                        if (data == 1) {
                            alert("Successful");
                            location.reload();
                        } else {
                            console.log(data);
                            alert("fail");
                        }
                    },
                });
            } else {
                alert("Enter Valid Project Link")
            }
        });

        $('.bookSlot').submit(function(e) {
            e.preventDefault();
            if ($('#reSchedule').val() == "1") {
                console.log("reschedule")
                const x = $(this).serializeArray();
                const reSchedule_data = new FormData();
                let scheduleTime = x[0].value;
                let reScheduleId = $('#reScheduleId').val();
                reSchedule_data.append("reScheduleStudentClass", "reScheduleStudentClass");
                reSchedule_data.append("scheduleTime", scheduleTime)
                reSchedule_data.append("reScheduleId", reScheduleId)
                // console.log(schedule_data.values());
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: reSchedule_data,
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            alert("Successful");
                            location.reload();
                        } else {
                            alert("fail");
                        }
                    },
                });
            } else {

                const x = $(this).serializeArray();
                const schedule_data = new FormData();
                let lessonId = $('#selectedLessonId').val();
                let teacherId = $('#selectedTeacherId').val();
                let studentId = $('#selectedStudentId').val();
                let scheduleTime = x[0].value;

                schedule_data.append("scheduleStudentClass", "scheduleStudentClass");
                schedule_data.append("lessonId", lessonId)
                schedule_data.append("teacherId", teacherId)
                schedule_data.append("studentId", studentId)
                schedule_data.append("scheduleTime", scheduleTime)
                // console.log(schedule_data.values());
                $.ajax({
                    url: "db.php", //Server api to receive the file
                    type: "POST",
                    dataType: "script",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: schedule_data,
                    success: function(data) {
                        console.log(data)
                        if (data == 1) {
                            alert("Successful");
                            location.reload();
                        } else {
                            alert("fail");
                        }
                    },
                });
            }


        });
        // show project doc

        function showProjectDoc(url, file_name, ext, project_name) {
            url = url + file_name;
            $("#projectDoc").empty();
            $("#projectNameModalLabel").empty()
            $("#projectNameModalLabel").html(`${project_name}`)
            if (ext == "pdf") {
                $("#projectDoc").html(
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
                $("#projectDoc").html(
                    `<iframe
                        style='height: 75vh; width: 100%;'
                        src="https://view.officeapps.live.com/op/embed.aspx?src=${url}"
                        >
                    </iframe>`
                );
                // $("#showProjectDocModal").modal("toggle");
            }
        }
    </script>
    <?php gtag() ?>
</body>

</html>