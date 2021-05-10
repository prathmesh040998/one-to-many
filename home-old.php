<?php
include_once("db.php");
include_once("fixed_contact_icon.php");
$non_india_price = "contact to xyz@gmail.com";
//session_destroy();
if (isset($_GET['id'])) {
    //session_start();
    $refered_by = $_GET['id'];
    //echo is_string($refered_by);
    $get_full_user_details = get_full_user_details($refered_by);
} else {
    $refered_by = NULL;
}
//echo 'refered by : '.$refered_by;
?>
<script>
    var refered_by = '<?php echo $refered_by; ?>';
    document.cookie = "refered_by = " + refered_by;
</script>

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
                <img class=" border border-dark mt-2 ms-2" src="images/logo.jpg" alt="logo" height="150">
            </div>
            <div class="col col-lg-8 col-md-8">
                <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light ShadowMade mt-3 NewHomeNavbar">
                    <div class="container-fluid">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="#course_price" id="CoursesPricingHomePageBtn" type="button" class="btn btn-light border-dark ShadowMade fw-bold mx-4 my-1 px-3">
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



        <br>
        <div class="row mx-auto">
            <div class="col">
                <div class="text-center">
                    <br>
                    <h3 class="px-5 mb-5 fw-bold">
                        1:1 personalized LIVE Coding Sessions for your Child (Age 6 to 16)
                    </h3>
                    <br>
                    <h6 class="px-3 fw-bold">
                        <a1 class="text-danger">Code Gurukul</a1> is an online tutoring platform that enables <a1 class="text-danger">LIVE</a1> interactive Coding lessons between a
                        teacher and a student.
                    </h6>
                    <br>
                    <a href="registration.php">
                        <button type="button" id="BookAFreeClassPersonalizedLIVEHomePageBtn" class="btn text-light ShadowMade fw-bold px-4 py-2">
                            Book A Free Class
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container-fluidMade text-center mb-5 pe-lg-5">
                    <img class="img-fluid pe-lg-5" src="images/Component 5 – 1.png" alt="">
                </div>
            </div>
        </div>



        <div class="text-center my-5 pb-5 ">
            <p class="fs-4 mb-5">What your Child Will Learn with Code Gurukul</p>
        </div>
        <div class="container container-fluidMade mt-5 pt-5 text-center">
            <img class="img-fluid ChildLearnLogo mx-auto" src="images/Component 28 – 1.png" alt="">
        </div>
    </div>


    <br>
    <div class="container container-fluidMade">
        <img class="img-fluid Component25" src="images/Component 25 – 1 (1).png" alt="">
    </div>

    <div class="container container-fluidMade mt-5">
        <div class="text-center RoadMapTextMsg mb-5 pb-5">
            <p class="fw-bold my-5 px-1 fs-lg-4">Road Map of your Child's Journey into the World of Coding</p>
        </div>
        <img class="img-fluid mt-5 pt-5" src="images/Component 9 – 1.png" alt="logo">
        <a href="registration.php">
            <button type="button" id="BookAFreeClassHomePageBtnRoadMap" class="btn text-light border-light border-3 ShadowMade fw-bold px-4 py-2">
                Book A Free Class
            </button>
        </a>
    </div>



    <br>
    <div class="text-center my-5">
        <div class="container container-fluidMade">
            <img class="img-fluid" src="images/Curriculum.png" alt="">
        </div>
    </div>
    <div data-spy="scroll" data-target="#main-navbar" data-offset="0">
        <div id="course_price" class="container-fluid mx-auto">
            <div class="row mx-auto">

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
    </div>

    <br>
    <div class="row mx-auto">
        <div class="col-lg-7">
            <p class="text-center fs-4 my-5 pb-3 ps-lg-5">
                <p1 class="fs-2 fw-bold text-center">Why coding:</p1>
                <br>
                Helps with communication, critical thinking and confidence, Fast becoming a life essential skills,
                <br>
                Teaches the ability to treat problems as learning opportunities, Teaches how to think and not just what
                to think
                <br>
            </p>
            <div class="container container-fluidMade my-5 px">
                <img class="img-fluid ps-lg-5 mb-5" src="images/Component 11 – 1@2x.png" alt="logo">
                <div class="text-center">
                    <a href="registration.php">
                        <button href="registration.php" type="button" id="BookAFreeClassHomePageBtnComp13" class="btn text-light border-light border-3 ShadowMade fw-bold px-4 py-2 me-lg-5">
                            Book A Free Class
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <P class="text-center fs-4 p-2">
                We nurture the Leader in your child with a Strong Foundation for life.
            </P>
            <div class="container container-fluidMade">
                <img class="img-fluid pe-5" src="images/Component 12 – 1.png" alt="logo">
            </div>
        </div>
    </div>


    <br>
    <div class="text-center my-5">
        <h2>What our young champs have to say about us</h2>
    </div>
    <div class="container container-fluidMade my-5 mx-auto">
        <img class="img-fluid" src="images/Component 22 – 1.png" alt="logo">
    </div>
    <div class="text-center mx-auto my-5">
        <a href="registration.php">
            <button type="button" id="BookAFreeClassChampsHomePageBtn" class="btn text-light border-light border-3 ShadowMade fw-bold px-4 py-2">
                Book A Free Class
            </button>
        </a>
    </div>


    <div class="text-center my-5">
        <h2>What Parents are Saying About Code Gurukul</h2>
    </div>
    <div class="row mb-5 mx-2">
        <div class="col mx-2">
            <div class="card my-5 mx-3 ParentsMsgCards">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="images/Urmila kabra.png" class="ParentsPhotoCircle">
                        </div>
                        <div class="col-9">
                            <p class="card-title text-center float-end"><b>Mrs. Urimla Kabra</b><br>Teacher</p>
                        </div>
                    </div>
                    <p class="card-text">
                        <br>
                        <img src="images/quotation-marks-6.png" height="20"><br>
                        As a parent and a teacher, I believe my daughters found a great code trainer at code gurukul. The enjoyable learning, focus on life-essential skills and encouragement to relate coding with day to day life has been the highlight for me.
                        <br><img class="float-end" src="images/quotation-marks.png" height="20">
                    </p>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card my-5 mx-3 ParentsMsgCards">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="images/Amey Jog.png" class="ParentsPhotoCircle">
                        </div>
                        <div class="col-9">
                            <p class="card-title text-center float-end"><b> Mr. Amey Jog </b><br>Engineer</p>
                        </div>
                    </div>
                    <p class="card-text">
                        <br>
                        <img src="images/quotation-marks-6.png" height="20"><br>
                        My son's enthusiasm at every activity and every session has given me the confidence to take him further in the journey of coding. The rewards and accomplishments coupled with the importance of honesty, integrity and such other values should be the firm steps in the right direction for my young son.
                        <br><img class="float-end" src="images/quotation-marks.png" height="20">
                    </p>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card my-5 mx-3 ParentsMsgCards">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="images/Nupur goel.png" class="ParentsPhotoCircle">
                        </div>
                        <div class="col-9">
                            <p class="card-title text-center float-end"><b>Mrs. Nupur Goel</b><br>Homemaker</p>
                        </div>
                    </div>
                    <p class="card-text">
                        <br>
                        <img src="images/quotation-marks-6.png" height="20"><br>
                        My child feels enthusiastic and confident immediately after doing a coding activity at Code gurukul. He looks forward to his next challenge in his journey of coding. I can feel his sense of accomplishment and believe this will carry him a long way into his life and career.
                        <br><img class="float-end" src="images/quotation-marks.png" height="20">
                    </p>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card my-5 mx-3 ParentsMsgCards">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="images/Shailesh Laddha 1.png" class="ParentsPhotoCircle">
                        </div>
                        <div class="col-9">
                            <p class="card-title text-center float-end"><b>Mr. Shailesh Laddha</b><br>Chartered Accountant
                            </p>
                        </div>
                    </div>
                    <p class="card-text">
                        <img src="images/quotation-marks-6.png" height="20"><br>
                        Keeping my daughter at the peak of the interest towards every session has been the most remarkable experience for me till now. I think the teaching methodology, as well as the personal touch between two Sessions, may have played a major role in creating this fantastic experience for us.
                        <br><img class="float-end" src="images/quotation-marks.png" height="20">
                    </p>
                </div>
            </div>
        </div>
        <div class="col mx-2">
            <div class="card my-5 mx-3 ParentsMsgCards">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="images/Abjeet Thigale.png" class="ParentsPhotoCircle">
                        </div>
                        <div class="col-9">
                            <p class="card-title text-center float-end"><b>Mr.Abhijeet Thigle</b><br>Businessman</p>
                        </div>
                    </div>
                    <p class="card-text">
                        <br>
                        <img class="" src="images/quotation-marks-6.png" height="20"><br>
                        The continuous support and encouragement from the teacher and support team have helped my child overcome the barriers in learning something new especially with no family background in coding . The practical and real-world examples and it's applications have increased my son's interest in coding.
                        <br><img class="float-end" src="images/quotation-marks.png" height="20">
                    </p>
                </div>
            </div>
        </div>
    </div>




    <div class="text-center mb-5">
        <h2>Pillars Of</h2>
        <h2 class="text-warning">CODE GURUKUL</h2>
    </div>
    <div class="row mx-5">
        <div class="col my-5 mx-3">
            <div class="card my-5 PillaesCards1 ShadowMade">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="card-title text-center mt-2 float-start ps-0"><b> Meenakshi Agrawal </b><br>
                                Co-founder
                            </p>
                        </div>
                        <div class="col">
                            <img src="images/Meenakshi.svg" class="img-fluid PillarsPhotoCircle">
                        </div>
                    </div>
                    <p class="card-text text-center">
                        <br>
                        Meenakshi is a fun-loving Techno-Savvy Content
                        Creator and technological entrepreneur. A Computer Science Engineer, she joined <b>KPIT &
                            IBM</b> to join the
                        technical elites, believing to associate only with best! She handles
                        the content development at Code Gurukul and makes sure the young minds will<br>
                        get the best in class learning deliverables!
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="col my-5 mx-3">
            <div class="card my-5 PillaesCards2 ShadowMade">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="card-title text-center mt-2 float-start ps-0"><b> Pinak Khot </b><br> Co-founder
                            </p>
                        </div>
                        <div class="col">
                            <img src="images/Pinak.png" class="img-fluid PillarsPhotoCircle">
                        </div>
                    </div>
                    <p class="card-text text-center">
                        <br>
                        Pinak is a tech geek in the truest sense. After his Electronics & Telecom Engg, he worked with
                        <b>Avaya Insurance</b> before pursuing his Masters in Electrical
                        Engg from the <b>University of Southern California</b>. He then joined
                        his like-minded people at <b>Apple!</b> He ensures that every member
                        at Code Gurukul maintains the standards suitable for simplicity
                        & elegance for the young minds.

                    </p>
                </div>
            </div>
        </div> -->
        <div class="col my-5 mx-3">
            <div class="card my-5 PillaesCards3 ShadowMade">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p class="card-title text-center mt-2 float-start ps-0"><b> Rekha Kabra </b><br> Co-founder
                            </p>
                        </div>
                        <div class="col">
                            <img src="images/Rekha Kabra.png" class="img-fluid PillarsPhotoCircle">
                        </div>
                    </div>
                    <p class="card-text text-center">
                        <br>
                        Rekha is the cool-headed Academician.
                        Always
                        passionate about imparting eduaction,she kept on taking efforts at personal
                        levels after
                        completing her Computer Science Engineering and then working with <b>Infosys
                            & TCS.</b> She
                        trains the Teachers and makes sure the gamified fun loving approach to imparting
                        values and
                        technical skills via coding to children is ensured in the right spirit!
                    </p>
                </div>
            </div>
        </div>
    </div>


    <br>
    <a href="registration.php">
        <button type="button" id="BookAFreeClassPillarsHomePageBtn" class="btn text-light border-light border-3 ShadowMade fw-bold px-4 py-2 float-end me-5">
            Book A Free Class
        </button>
    </a>
    <br>
    <div class="ms-5">
        <nav class="navbar navbar-light ShadowMade mt-5 ms-5 ps-5 NewHomeFooterbar">
            <ul class="navbar-nav me-auto ps-5">
                <li class="nav-item">
                    <a1 class="nav-link">
                        <p class="text-light fw-bold fs-4">Contact Us</p>
                        <p class="text-light">
                            +91 75062 62683<br>+971 50 217 0872
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
    <br>
    <a type="button" id="BackToTop" class="btn text-primary float-end fw-bold" role="button">
        Back to Top<img src="images/Footer 10.png">
    </a>
    <br>
    <br>
    <br>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
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