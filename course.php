<?php
include_once("fixed_contact_icon.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/CodeGuru.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Home</title>
</head>

<body class="BackgroundColor">
    <div class="BackgroundColor2">
        <div class="row mx-auto">
            <div class="col">
                <a href="home.php"><img class="mt-2 ms-2" src="images/logo.jpg" alt="logo" height="150"></a>
            </div>
            <div class="col col-lg-8 col-md-8">
                <nav class="navbar navbar-expand-lg navbar-light ShadowMade mt-3 NewHomeNavbar">
                    <div class="container-fluid">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="#" id="CoursesPricingHomePageBtn" type="button" class="btn btn-light border-dark ShadowMade fw-bold mx-4 my-1 px-3">
                                        Courses & Pricing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="login.php" id="LoginHomePageBtn" type="button" class="btn btn-light border-dark ShadowMade fw-bold mx-4 my-1 px-5 py-1">
                                        Login
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="registration.php" type="button" id="BookAFreeClassHomeNavbarPageBtn" class="btn text-light ShadowMade fw-bold mx-3 px-4 py-2">
                                        Book A Free Class
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        &nbsp;
        &nbsp;
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3">
                    <ul>
                        <div class="text-center mb-5">
                            <h5 class="mt-2" id="first">AGE UP TO 9</h5>
                            <button type="button" id="CoursePageBtnBeginner" class="btn btn-lg btn-warning fw-bold rounded-pill shadow-lg" data-toggle="tab" href="#BeginnerCoursePage">
                                BEGINNER
                            </button>
                        </div>
                        <div class="text-center my-5">
                            <h5 class="mt-2" id="second">AGE 9-12</h5>
                            <button type="button" id="CoursePageBtnIntermediate" class="btn btn-lg btn-warning fw-bold rounded-pill shadow-lg" data-toggle="tab" href="#IntermadiateCoursePage">
                                INTERMEDIATE
                            </button>
                        </div>
                        <div class="text-center my-5">
                            <h5 class="mt-2" id="third">AGE 13 ONWARDS</h5>
                            <button type="button" id="CoursePageBtnAdvanced" class="btn btn-lg btn-warning fw-bold rounded-pill shadow-lg" data-toggle="tab" href="#AdvancedCoursePage">
                                ADVANCED
                            </button>
                        </div>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content">
                        <!-- Pane Open -->
                        <!-- _____________________Pane for Beginner______________________ -->
                        <div id="BeginnerCoursePage" class="tab-pane active">
                            <div class="row">
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule1" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 1</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>9</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <br>
                                            <p>
                                                Block based programming, sequences, loops, events.
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>

                                            <div class="price">
                                                <h4>Rs. 3,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 70
                                                </h4>
                                            </div>

                                            <img src="images/Group 29.png " class="img-fluid mt-4">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div id="NewHomePageCardModule2" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 2</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>40</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <p>
                                                Module 1+ Algorithms, Debugging, Variables, Conditionals, Extended loop,
                                                Functions, Event driven programming, Basics of App development and UI/UX.
                                            </p>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 14,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 275
                                                </h4>
                                            </div>
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div id="NewHomePageCardModule3" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 3</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>100</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p class="pt-3 pb-4">
                                                Module 2+ Game design, AI and Advanced App Development
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 30,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 625
                                                </h4>
                                            </div>
                                            <img src="images/Group 65.png" class="img-fluid mt-5">
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ___________________Pane for Intermadiate____________________ -->
                        <div id="IntermadiateCoursePage" class="tab-pane">
                            <div class="row">
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule1" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 1</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>9</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p>
                                                Block based programming, sequences, loops, events, algorithms, debugging
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 3,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 70
                                                </h4>
                                            </div>
                                            <img src="images/Group 29.png " class="img-fluid mt-4">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule2" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 2</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>40</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p>
                                                Module 1+ Advanced programming concepts, Basics of App development and UI/UX,
                                                Basics of game development
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 14,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 275
                                                </h4>
                                            </div>
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule3" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 3</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>100</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <br>
                                            <p>
                                                Advanced App Development, Interactive Game design, Web Design , AI
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 30,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 625
                                                </h4>
                                            </div>
                                            <img src="images/Group 65.png" class="img-fluid mt-5">
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- _____________________Pane for Advanced______________________ -->
                        <div id="AdvancedCoursePage" class="tab-pane">
                            <div class="row">
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule1" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 1</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>9</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics
                                                Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p>
                                                Block based programming, sequences, algorithm, debugging, loops,
                                                events,variables
                                            </p>
                                            <br>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 3,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 70
                                                </h4>
                                            </div>
                                            <img src="images/Group 29.png " class="img-fluid mt-4">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule2" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 2</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>40</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics
                                                Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p>
                                                Module 1+ Advanced programming concepts, Introduction Basics of App
                                                development and UI/UX, Basics of game development
                                            </p>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 14,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 275
                                                </h4>
                                            </div>
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div id="NewHomePageCardModule3" class="card text-center my-2">
                                        <div class="card-body">
                                            <h6 class="card-title"><b>MODULE 3</b></h6>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Total
                                                Classes</span>
                                            <h4>100</h4>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Topics
                                                Being
                                                Covered</span>
                                            <br>
                                            <br>
                                            <p class="pt-3 pb-4">
                                                Interactive game design, Advanced App development, Advanced web development, Projects on AI
                                            </p>
                                            <span class="badge bg-light text-dark shadow-lg px-2 py-2 border">Payment
                                                Details</span>
                                            <br>
                                            <div class="price">
                                                <h4>Rs. 30,000/-</h4>
                                            </div>
                                            <div class="non-india-price" style="display: none">
                                                <h4>
                                                    US$ 625
                                                </h4>
                                            </div>

                                            <img src="images/Group 65.png" class="img-fluid mt-5">
                                            <img src="images/Group 48.png" class="img-fluid">
                                            <img src="images/Group 30.png" class="img-fluid mt-5">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm border-white border-5 btn-warning fw-bold rounded-pill shadow-lg px-5" data-toggle="tab" href="#">
                                            BUY NOW
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pane Close -->
                    </div>

                </div>

            </div>
        </div>
        <div class="ms-5">
            <nav class="navbar navbar-light ShadowMade mt-5 ms-5 ps-5 NewHomeFooterbar">
                <ul class="navbar-nav me-auto ps-5">
                    <li class="nav-item">
                        <a1 class="nav-link">
                            <p class="text-light fw-bold fs-4">Contact Us</p>
                            <p class="text-light">
                                +971 50 217 0872 +91 75062 62683
                            </p>
                            <p class="text-light">
                                hr@code-gurukul.com
                            </p>
                            <p class="text-light">
                                support@code-gurukul.com
                            </p>
                        </a1>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto ps-5"></ul>

                <ul style="display: none;" class="navbar-nav ms-auto pe-5">
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold fs-6" href="#">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold fs-6" href="#">
                            Terms & Conditions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold fs-6" href="#">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold fs-6" href="#">
                            Help Center
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto"></ul>
            </nav>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="javascript/Course.js"></script>
        <script>
            $.get("https://www.cloudflare.com/cdn-cgi/trace", function(data) {
                con = data.split("\n")[8];
                con = con.split("=")[1];
                console.log(con);
                if (con != "IN") {
                    $(".price").hide();
                    $(".non-india-price").show();
                }
            });
        </script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>