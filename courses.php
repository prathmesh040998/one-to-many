<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="codegurukul.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="build/css/intlTelInput.css">
    <title>Courses</title>
</head>

<body>
    <div class="HomeFont">
        <nav class="navbar navbar-expand-lg navbar-light HomePageMainNavbar">
            <a class="navbar-brand" href="home.php">
                <img class="LogoForTeacherDashboard" src="images/logo.jpg" alt="" loading="lazy">
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="text-center">
                        <img class="CoursesLogo" src="images/online-course.png">
                    </div>
                    <a href="courses.php" id="CoursesHomeBtn" type="button" class="btn btn-light font-weight-bold">
                        COURSES
                    </a>
                </li>
                <li class="nav-item">
                    <div class="text-center">
                        <img class="LoginRemovebgLogo" src="images/login__1_-removebg-preview.png">
                    </div>
                    <a href="login.php" id="JoinYourClassLoginBtn" type="button" class="btn btn-light font-weight-bold">
                        JOIN YOUR CLASS/LOGIN
                    </a>
                </li>
                <br>
                <li class="nav-item">
                    <div class="text-center">
                        <img class="CalendarLogo" src="images/freecalendar1.png">
                    </div>
                    <a href="#" id="BookAFreeClassRegisterBtn" type="button"
                        class="btn btn-warning font-weight-bold">BOOK
                        A FREE CLASS/REGISTER
                    </a>
                </li>
            </ul>
        </nav>
        <br>
        <br>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="text-center">
                    <div class="row">
                        <div class="col">
                            <h5 id="first">AGE UP TO 9</h5>
                        </div>
                        <div class="col">
                            <h5 id="second">AGE 9-12</h5>
                        </div>
                        <div class="col">
                            <h5 id="third">AGE 13 ONWARDS</h5>
                        </div>
                    </div>
                </div>
                <div class="CoursesCategoryBackground">
                    <div class="text-center">
                        <div class="row">
                            <div class="col">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <button id="CategoryBtnBeginner" type="button" class="btn btn-warning btn-lg"
                                        data-toggle="tab" href="#BeginnerCoursePage">
                                        BEGINNER
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <button id="CategoryBtnIntermediate" type="button" class="btn btn-warning btn-lg"
                                        data-toggle="tab" href="#IntermadiateCoursePage">
                                        INTERMEDIATE
                                    </button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <button id="CategoryBtnAdvanced" type="button" class="btn btn-warning btn-lg"
                                        data-toggle="tab" href="#AdvancedCoursePage">
                                        ADVANCED
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <br>
        <br>

        <div class="tab-content">
            <!-- Pane Open -->
            <!-- _____________________Pane for Beginner______________________ -->
            <div id="BeginnerCoursePage" class="tab-pane active">
                <div class="row">
                    <div class="col">
                        <div id="CoursePageCardModule1" class="card text-center float-right">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 1</b></h5>
                                <br>
                                <span id="Module1Badge1" class="badge">Total Classes</span>
                                <h2>9</h2>
                                <span id="Module1Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <br>
                                <p class="CoursesModule1msg">
                                    Block based programming,
                                    sequences, loops, events.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 2,000/-</h2>
                                <br>
                                <img class="" src="images/Group 29.png">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="CoursePageCardModule2" class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 2</b></h5>
                                <br>
                                <span id="Module2Badge1" class="badge">Total Classes</span>
                                <h2>40</h2>
                                <span id="Module2Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <p class="CoursesModule2msg">
                                    Module 1, Alogorith, Debbuging, Variables,
                                    Conditionals, Extended loop, Functions
                                    Event driven programming,
                                    Basic of App devlopment and UI/UX.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 10,000/-</h2>
                                <br>
                                <img class="" src="images/Group 30.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ___________________Pane for Intermadiate____________________ -->
            <div id="IntermadiateCoursePage" class="tab-pane fade">
                <div class="row">
                    <div class="col">
                        <div id="CoursePageCardModule1" class="card text-center float-right">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 1</b></h5>
                                <br>
                                <span id="Module1Badge1" class="badge">Total Classes</span>
                                <h2>9</h2>
                                <span id="Module1Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <p class="CoursesModule1msg">
                                    Block based programming, sequences,
                                    loops, events, algorithms, debugging.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 2,000/-</h2>
                                <br>
                                <img class="" src="images/Group 29.png">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="CoursePageCardModule2" class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 2</b></h5>
                                <br>
                                <span id="Module2Badge1" class="badge">Total Classes</span>
                                <h2>40</h2>
                                <span id="Module2Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <p class="CoursesModule2msg">
                                    Module 1+ Advanced programming concept,
                                    Basic of Appdevelopments and UI/UX,
                                    Basic of game development.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 10,000/-</h2>
                                <br>
                                <img class="" src="images/Group 30.png">
                                <img class="" src="images/Group 48.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- _____________________Pane for Advanced______________________ -->
            <div id="AdvancedCoursePage" class="tab-pane fade">
                <div class="row">
                    <div class="col">
                        <div id="CoursePageCardModule1" class="card text-center float-right">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 1</b></h5>
                                <br>
                                <span id="Module1Badge1" class="badge">Total Classes</span>
                                <h2>9</h2>
                                <span id="Module1Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <p class="CoursesModule1msg">
                                    Block based programming, sequences,
                                    algorithms, debugging, loops, events,
                                    Variables.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 2,000/-</h2>
                                <br>
                                <img class="" src="images/Group 29.png">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="CoursePageCardModule2" class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title"><b>MODULE 2</b></h5>
                                <br>
                                <span id="Module2Badge1" class="badge">Total Classes</span>
                                <h2>40</h2>
                                <span id="Module2Badge2" class="badge">Topics Being Covered</span>
                                <br>
                                <br>
                                <p class="CoursesModule2msg">
                                    Module 1+ Advanced programming concept,
                                    Introduction to text based programming,
                                    Basics of Game development, App development,
                                    UI/UX, HTML and JavaScript.
                                </p>
                                <br>
                                <br>
                                <span id="Module1Badge3" class="badge">Payment Details</span>
                                <br>
                                <h2>Rs. 10,000/-</h2>
                                <br>
                                <img class="" src="images/Group 65.png">
                                <img class="" src="images/Group 48.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pane Close -->
        </div>

        <br>
        <br>
        <nav class="navbar navbar-light HomePageFooterNavbar1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <p class="HomeTextColorFooter">ABOUT US</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <p class="HomeTextColorFooter">CONTACT US</p>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <p class="HomeTextColorFooter">TERMS AND CONDITIONS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <p class="HomeTextColorFooter">PRIVACY POLICY</p>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
            <ul class="navbar-nav">
            </ul>
        </nav>

        <nav class="navbar navbar-light HomePageFooterNavbar2">
            <br>
        </nav>

        <br>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="build/js/intlTelInput.js"></script>
    <script src="javascript/register.js"> </script>
    <script src="javascript/Homepage.js"> </script>


</body>

</html>