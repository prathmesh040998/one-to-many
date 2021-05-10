<?php
include_once("db.php");
include_once("gtag.php");
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
    $role = $_SESSION["role"];
    if ($role == "teacher") {
        header("Location: teacher_dashboard.php");
    } else {
        header("Location: student_dashboard.php");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/loginV1.3.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Registration</title>
    <link rel="icon" type="image/png" href="images/code gurukul.svg" />
    <style>
        .intl-tel-input {
            width: 100%;
        }

        .selected-dial-code {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-1">
        <!-- Nabvar Start -->
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg px-4">
                <a class="navbar-brand" href="home.php">
                    <img src="images/logo-borderless.png" alt="Code-Gurukul" title="Code-Gurukul Homepage" width="35" class="img-fluid" id="desktopView">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link text-dark font-weight-bold" href="home.php#coursesAndPrices">Courses and Prices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="home.php#childSays">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="login.php">Login
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
        <!-- Navbar Close -->
        <!-- Registration -->
        <div class="container-fluid mt-5">
            <div class="col-sm-12">
                <div class="row ">
                    <!-- desktop View form start -->
                    <div class="col-sm-7  login1">
                        <div class="col-sm-12">
                            <div class="col-sm-2 logoRegister">
                                <a href="home.php">
                                    <img src="images/logo-borderless.png" alt="Code-Gurukul" title="Code-Gurukul Homepage" width="70" class="img-fluid ">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-9">
                                    <div class="text-center">
                                        <h4 class="text-center text-white mt-5 font font-weight-bold">Register</h4>
                                    </div>
                                    <div class="col-sm-12">

                                        <div class="form-row">
                                            <div class="form-group col-sm-12">
                                                <label for="inputName" class="text-white ml-2 mt-4 font1">Parent's full name</label>
                                                <input type="text" class="form-control inp" id="ParentFirstName" placeholder="Full Name">
                                                <span id="&nbsp;ParentFirstNameError&nbsp;"></span>
                                            </div>
                                            <div class="form-group col-sm-7">
                                                <label for="studentsName" class="text-white ml-2 font1">Student's first name</label>
                                                <input type="text" class="form-control inp" id="StudentFirstName" placeholder="First name">
                                                <span id="&nbsp;StudentFirstNameError&nbsp;"></span>
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="StudentsAge" class="text-white ml-2 font1">Date of birth</label>
                                                <input type="date" class="form-control inp" id="DOBSReg" placeholder="in Year">
                                                <span id="&nbsp;DOBSRegError&nbsp;"></span>
                                            </div>
                                            <div class="form-group col-sm-12 ml-2">
                                                <label for="inputEmail" class="text-white font1">Parents email id</label>
                                                <input type="email" class="form-control inp" id="EmailIdSReg" placeholder="example@gmail.com">
                                                <span id="&nbsp;EmailIdSRegError&nbsp;"></span>
                                            </div>

                                            <div class="form-group col-sm-12 ml-2">
                                                <label for="inputEmail" class="text-white font1">Mobile number</label>
                                                <input type="tel" class="form-control inp" id="PhoneSReg">
                                                <span id="&nbsp;PhoneSRegError&nbsp;"></span>
                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <button type="submit" id="RegStudent" class="submit btn signupbtn col-sm-6 rounded-corner font font-weight-bold nextButton mt-5" value="Sign Up">Sign up</button>
                                        </div>
                                        <div class="text-center font-weight-blod mt-2 font1">
                                            <p class="text-white">
                                                Already Signed Up?
                                                <a href="login.php" class="Loginhere text-warning font1"> LOGIN HERE </a>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="RegisterInfoImages">
                                    <img src="images/Group 243.svg" alt="Code-Gurukul" title="Book Free Class Procedure" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- desktop View form Close -->
                    <div class="col-sm-5 Firstlesson RegisterDesktopImages ">
                        <div class="mt-5">
                            <br><br><br>
                            <h4 class="text-center font font-weight-bold">Register for Your <br> First lessons!</h4>
                        </div>
                        <div class="text-center mt-5">
                            <img src="images/Group 236.svg" alt="Code-Gurukul" title="Book Free Class Procedure" height="515" width="430" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>

<script src="javascript/registrationV1.8.js"></script>
<?php 
gtag();
include_once("fixed_contact_icon.php");
?>
</html>

