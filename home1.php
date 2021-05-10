<?php
include_once("db.php");
include_once("fixed_contact_icon.php");
include_once("course_module.php");
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

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/HomePage.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-default">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link font1 text-dark" href="course.php">Courses and Prices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font1 text-dark" href="#">Testimonials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font1 text-dark" href="login.php">Login
              </a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="registration.php"> <button class="btn btnNavbar rounded-pill my-2 my-sm-0 font font-weight-bold" type="button">&nbsp;&nbsp;&nbsp;&nbsp; Book a free class &nbsp;&nbsp;&nbsp;&nbsp;</button></a>
          </form>
        </div>
      </nav>
    </div>
    <!-- every child can code                          -->
    <div class="container everyChildCode">
      <div class="col-lg-12 col-xs-12">
        <div class="row">
          <div class="col-lg-1 col-xs-1">
            <img class="img-fluid" src="images/logo.svg" height="102">
          </div>
          <div class="col-lg-11 col-xs-11">
            <div class=" row">
              <div class="col-lg-12 col-xs-12">
                <div class="row no-gutters">
                  <div class="col-lg-4 col-xs-4">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <h2 class="text-warning font-weight-bold font">Every child can code!</h2>
                    <h4 class="text-white font-weight-bold font">Learn coding with our live <br>
                      digital school (6 to 16 years)</h4>
                    <p class=" text-white font1">
                      Our personalized lessons will help kids learn<br>
                      coding skills that help them shape their future
                    </p>
                    <br>
                    <div>
                      <a href="registration.php">
                        <button class="btn  font-weight-bold freeclass rounded-pill shadow-lg p-2 col-sm-8 font">Book a free class</button>
                      </a>
                    </div>
                    <br>
                  </div>
                  <div class="col-lg-8 col-xs-8">


                    <div class="container-fluid">
                      <img src="images/Group 127.svg" class="img-fluid" alt="" height="700" width="880">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- What your child will learn -->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <div class="row">
            <div class="text-center col-sm-12">
              <br>
              <h2 class="font-weight-bold font">What your child will learn</h2>

              <p class="text-center font1">Your child can unlock their potential for creative thinking and problem solving
                with our
                practical lessons..</p>
              <div class="container">

                <div class="card-deck">
                  <div class="card">
                    <img class="card-img-top" src="images/d.svg" alt="Card image" style="width:100%">
                    <div class="card-body1 text-center">
                      <p class="card-text font1">Building blocks of coding</p>
                    </div>
                  </div>
                  <div class="card ">
                    <img class="card-img-top" src="images/c.svg" alt="Card image" style="width:100%">
                    <div class="card-body1 text-center">
                      <p class="card-text font1">Website designing</p>
                    </div>
                  </div>
                  <div class="card ">
                    <img class="card-img-top" src="images/F.svg" alt="Card image" style="width:100%">
                    <div class="card-body1 text-center">
                      <p class="card-text font1">Game Development</p>
                    </div>
                  </div>
                  <div class="card ">
                    <img class="card-img-top" src="images/e.svg" alt="Card image" style="width:100%">
                    <div class="card-body1 text-center">
                      <p class="card-text font1">App Development</p>
                    </div>
                  </div>
                  <div class="card ">
                    <img class="card-img-top" src="images/b.svg" alt="Card image" style="width:100%">
                    <div class="card-body1 text-center">
                      <p class="card-text font1">Artificial intelligience,<br>Machine learning</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <br>
    <br>
    <br>

    <!-- Your kid’s journey with Code-Gurukul -->

    <div class="row backgroundImg1 ml-1">
      <div class="container">
        <div class="col-sm-12 ">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <br><br>
              <h5 class="text-center text-white font-weight-bold font">Your kid’s journey with Code-Gurukul</h5><br><br>
              <div class="row">
                <div class=" text-left col-sm-3">
                  <img src="images/a.svg" class="img-fluid" alt="59">
                  <div class=" text-left text-white font1">
                    <p>Attend your
                      first class
                      absolutely free
                      of charge</p>
                  </div>
                </div>
                <div class="text-left col-sm-3">
                  <img src="images/Mask Group-1.svg" class="img-fluid" alt="195">
                  <div class="text-left  text-white font1">
                    Building Blocks for
                    the Journey in the
                    Programing World
                  </div>
                </div>
                <div class="text-right col-sm-3">
                  <img src="images/Mask Group-2.svg" class="img-fluid" alt="333">
                  <div class=" text-left  text-white font1">
                    Basics of App Development
                    and Simple Game
                    Development
                  </div>
                </div>
                <div class=" text-right col-sm-3">
                  <img src="images/Mask Group-3.svg" class="img-fluid" alt="305">
                  <div class="text-left  text-white font1">
                    Website Development, App
                    Development and Interactive
                    Game Development
                  </div>
                </div>
                <div>
                  <img src="images/Group 136.svg" alt="" class="img-fluid progressLine">
                </div>
              </div>
              <br>
              <div class="text-center">
                <a href="registration.php">
                  <button class="btn btnNavbar font-weight-bold font rounded-pill shadow-lg p-2 col-sm-4">Book a free Class</button>
                </a>
              </div>
              <br>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- courses and prices -->
    <div class="coursesAndPrices">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-4">
            <br>
            <h4 class="font">Courses and pricing</h4>
          </div>
          <div class="col-sm-12 font1">
            This courses for each age group are divided into three modules with increasing complexity. Our packages
            offer
            1:1 live<br>
            interactive sessions between the student and teacher, we do not assume any knowledge of coding so any child
            can learn to<br>
            code. The packages are designed relative to ages of the children.
          </div>
          &nbsp;
          <div class="col-sm-12">
            <h5 class="d-flex justify-content-center font1">Select age group</h5>
          </div>
        </div>
      </div>
      &nbsp;
      <div class="col-sm-12">
        <div class="row no-gutters">
          <div class="col-sm-4">
            <button type="button" id="BegineerButton" class="btn  border-dark btn-lg col-sm-12 font1">upto 9 years <br>
              Beginner</button>
          </div>
          <div class="col-sm-4">
            <button type="button" id="IntermediateButton" class="btn   border-dark btn-lg col-sm-12 font1">9-12 years <br>
              Intermediate
            </button>
          </div>
          <div class="col-sm-4">
            <button type="button" id="AdvancedButton" class="btn  border-dark btn-lg col-sm-12 font1">13-14 years <br>
              Advanced</button>
          </div>
        </div>
      </div>


      &nbsp;
      <div class="col-sm-12">
        <div class="row no-gutters">
          <div class="col-sm-10">
            <div id="border">
              <div class="row">
                <div class=" col-sm-3 offset-sm-1">
                  <br><br>
                  <h3 class="font-weight-bold text-lg font1">Free Class!</h3><br><br>
                </div>
                <div class="col-sm-6 font1">
                  <br>
                  <h6><br>Your first class is on us! Attend a trial class completly
                    free of cost! All you need is a laptop/ computer and
                    an internet connection!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2 freeclass btn">
            <a href="registration.php">
              <h3 class="btn btnNavbar font-weight-bold font text-lg mt-2"><br>Book a free<br>class</h3>
            </a>
          </div>
        </div>
      </div>
      &nbsp;
      <div class="col-sm-12" id="BeginnerParts">
        <div class="row">
          <!-- card 1 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 1 <br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Block based programming</li>
                  <br>
                  <li>Sequences and loops</li>
                  <br>
                  <li>Events</li>
                  <br><br> &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br><br>Certification for Proficiency in basics
                  of coding
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(1, 1, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(1, 1, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 2 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 2<br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Algorithms, conditionals and variables</li><br>
                  <li>Extended loops, functions</li><br>
                  <li>Basics of app development,intro to UI/UX</li><br>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails"><u>more details</u></a>
                  <br> <br> Basic App Developer and Game Developer Certification
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(1, 2, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(1, 2, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 3 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 3<br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Algorithms, conditionals and variables</li><br>
                  <li>Extended loops, functions</li><br>
                  <li>Basics of app development, intro to UI/UX</li><br>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br> <br> Course certification, Interaction with Industry Experts
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(1, 3, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(1, 3, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Intermediate Modules -->
      <div class="col-sm-12" id="IntermediateParts">
        <div class="row">
          <!-- card 1 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 1 <br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Block based programming</li>
                  <br>
                  <li>Sequences and loops</li>
                  <br>
                  <li>Events</li><br>
                  <li>algorithms, debugging</li>
                  <br><br> &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br><br>Certification for Proficiency in basics
                  of coding
                  <br><br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(2, 1, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(2, 1, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 2 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 2<br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Module 1+ Advanced programming concepts</li><br>
                  <li>Algorithms, conditionals and variables</li><br>
                  <li>Extended loops, functions</li><br>
                  <li>Basics of app development,intro to UI/UX</li><br>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br> <br> Basic App Developer and Game Developer Certification
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(2, 2, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(2, 2, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 3 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 3<br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Advanced App Development</li><br>
                  <li>Interactive Game design</li><br>
                  <li>Web Design</li><br>
                  <li>Artificial intelligence</li><br><br>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br> <br> Course certification, Interaction with Industry Experts
                  <br><br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(2, 3, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(2, 3, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Advanced Modules -->
      <div class="col-sm-12" id="AdvancedParts">
        <div class="row">
          <!-- card 1 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 1 <br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Block based programming</li>
                  <br>
                  <li>Sequences and loops</li>
                  <br>
                  <li>Events</li><br>
                  <li>algorithm, debugging,Variables</li>
                  <br><br> &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br><br>Certification for Proficiency in basics
                  of coding
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(3, 1, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(3, 1, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 2 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 2<br><br></h4>
              <div class="card-body">
                <h5 class="card-title font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Module 1+ Advanced programming concepts</li><br>
                  <li>Algorithms, conditionals and variables</li><br>
                  <li>Basics of game development</li><br>
                  <li>Basics of app development,intro to UI/UX</li>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br> <br> Basic App Developer and Game Developer Certification
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(3, 2, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(3, 2, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
          <!-- card 3 -->
          <div class="col-sm-4">
            <div class="card">
              <h4 class="card-header font-weight-bold font1"><br>MODULE 3<br><br></h4>
              <div class="card-body">
                <h5 class="card-title  font1">CURRICULUM</h5>
                <p class="card-text font1">
                  <li>Interactive game design</li><br>
                  <li>Advanced App development</li><br>
                  <li>dvanced web development</li><br>
                  <li>Projects on Artificial intelligence</li><br><br>
                  &nbsp;&nbsp;&nbsp; <a href="#" class="moredetails font1"><u>more details</u></a>
                  <br> <br> Course certification, Interaction with Industry Experts
                  <br><br>
                <h3 class="text-center font-weight-bold font1">
                  <span class="india-price">
                    &#8377; <?= get_module_data(3, 3, 4) ?>
                  </span>
                  <span class="non-india-price" style="display: none;">
                    USD <?= get_module_data(3, 3, 5) ?>
                  </span>
                </h3>
                </p>
                <div class="text-center">
                  <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                    Buy now </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>

    <br>

    <!-- why coding -->
    <!-- phase1 -->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-12">
          <h4 class="text-center font-weight-bold font">Why coding?</h4><br>
          <div class="row">
            <div class="col-sm-3 text-center">
              <img src="images/Group 130.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Coding improves academic performance</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 129.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Coding fosters creativity</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 117.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Coding teaches you
                how to think</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 118.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Coding improves
                problem solving skills</p>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>

    <!-- phase2 -->
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-12">
          <h4 class="text-center font-weight-bold font">Why Code Gurukul?</h4><br>
          <h6 class="text-center font-weight-bold font1">We at Code Gurukul not only nurture your child's development but <br>
            also lifeskills such as good learning habits and confidence building</h6><br><br>
          <div class="row">
            <div class="col-sm-3 text-center">
              <img src="images/Group 119.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Attitude building</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 120.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Confidence building</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 121.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Learn by practice</p>
            </div>
            <div class="col-sm-3 text-center">
              <img src="images/Group 122.svg" class="img-fluid" height="228">
              <br>
              <p class="font-weight-bold text-center text-sm font1">Social and emotional
                learning</p>
            </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <!-- what child says -->

    <div class="row backgroundimg ml-1">
      <div class="container">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <br>
              <h3 class="text-center text-white font-weight-bold font"> What our students say </h3><br>
              <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="form-group" style="height: 100%;">
                    <div class="row">
                      <div class="col-sm-4">
                        <img src="images/image 92.svg" alt="" class="img-fluid rounded-pill img-thumbnail" height="150">
                      </div>
                      <div class="col-sm-8">
                        <h5 class="text-white pl-sm-2 font-weight-bold font">Ojas, 7 years</h5>
                        <div class=" text-white  wordsaying font1">

                          &#8220; I had a lot of fun learning
                          to code with Code Gurukul. I
                          had never thought coding
                          would be so much fun!!&#8221;
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="form-group" style="height: 100%;">
                    <div class="row">
                      <div class="col-sm-4">
                        <img src="images/image 94.svg" alt="" class="img-fluid rounded-pill img-thumbnail" height="150">
                      </div>
                      <div class="col-sm-8">
                        <h5 class="text-white pl-sm-2 font-weight-bold font">Om, 15 years</h5>
                        <div class=" text-white  wordsaying font1">

                          &#8220; I had an awesome time
                          learning coding with Code
                          Gurukul. Coding never felt so
                          easy. My teacher always helped
                          me solve my problems, online
                          as well as offline.&#8221;
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="form-group" style="height: 100%;">
                    <div class="row">
                      <div class="col-sm-4">
                        <img src="images/image 93.svg" alt="" class="rounded-pill img-fluid img-thumbnail">
                      </div>
                      <div class="col-sm-8">
                        <h5 class="text-white pl-sm-2 font-weight-bold font">Advika, 9 years</h5>
                        <div class=" text-white  wordsaying font1">

                          &#8220;I loved the way my mentor
                          inspired me to look at problems
                          as opportunities. I have already
                          started attempting to apply my
                          coding skills to my everyday
                          activities.&#8221;
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="form-group" style="height: 100%;">
                    <div class="row">
                      <div class="col-sm-4">
                        <img src="images/image 95.svg" alt="" class="img-fluid rounded-pill img-thumbnail">
                      </div>
                      <div class="col-sm-8">

                        <h5 class="text-white pl-sm-2 font-weight-bold font">Mahi, 10 years</h5>
                        <div class=" text-white  wordsaying font1">

                          &#8220; Code Gurukul has taught me
                          how to enjoy curricular and
                          co curricular activities. I had so
                          much fun learning new things
                          everyday. Super excited to join
                          the next class.&#8221;<br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
        <br>
      </div>
    </div>
    <!-- parents saying    -->
    <div class="ParentSaying">
      <div class="container">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <br>
              <h3 class="text-center font font-weight-bold" style="color: #BA2E5F;"> What parents are saying about Code Gurukul </h3><br>
              <div class="row">
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-5 text-center">
                      <br><img src="images/image 96.svg" alt="" class="img-fluid " height="152">

                      <p class="font1 font-weight-bold wording mt-2">Mrs Urmila Kabra</p>
                    </div>
                    <div class="col-sm-7 wording font1">
                      <br> As a parent an as a teacher I believe my
                      daughters found a really good
                      personalized fit with code gurukul. The
                      enjoyable learning, Focus on life essential
                      skills and encouragement to apply
                      practically what has been learnt has been
                      the highlight for me.
                    </div>
                    <br>
                    <div class="col-sm-5 text-center">
                      <br><img src="images/image 16.svg" alt="" class=" img-fluid" height="152">
                      <p class="font1 font-weight-bold wording mt-2">Mrs. Nupur Goel</p>
                    </div>
                    <div class="col-sm-7 wording font1">
                      <br> My child gets excited and it boosts his
                      confidence as the results can be seen
                      immediately after doing an activity. He
                      looks forward for his next challenge in this
                      journey of coding. I can feel his sense of
                      accomplishment and I believe this will
                      carry him a long way into his life and
                      career.
                    </div>
                    <div class="col-sm-5 text-center">
                      <br><img src="images/image 97.svg" alt="" class=" img-fluid" height="152">
                      <p class="font1 font-weight-bold wording mt-2">Mr. Amey Jog</p>
                    </div>
                    <div class="col-sm-7 wording font1">
                      <br> My son s enthusiasm at every activity and
                      every session has given me the confidence
                      to take him further in the journey of coding.
                      The rewards and accomplishments
                      coupled with importance of honesty,
                      integrity and such other values should be
                      the firm steps in the right direction for my
                      young son
                    </div>
                  </div>
                  <br>
                </div>
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-5 text-center">
                      <br><img src="images/image 18.svg" alt="" class="img-fluid" height="150">
                      <p class="font1 font-weight-bold wording mt-2">Mr. Abhijeet Thigle</p>
                    </div>
                    <div class="col-sm-7  wording font1">
                      <br> The continuous support and
                      encouragement from the teacher and the
                      complete team has helped my child overcome
                      the barriers in learning something new
                      especially with no family background in this
                      subject. The practical and real world
                      examples and applications have maintained
                      my son s interest in coding.
                    </div>
                    <br>
                    <div class="col-sm-5 text-center">
                      <br><img src="images/image 17.svg" alt="" class="img-fluid" height="152">
                      <p class="font1 font-weight-bold wording mt-2">Mr. Shailesh Laddha</p>
                    </div>
                    <div class="col-sm-7  wording font1">
                      <br> Keeping my daughter at the peak of her
                      interest towards every session has been the
                      most remarkable experience for me till now. I
                      think the teaching methodology as well as
                      the personal touch between two sessions
                      may have played a major role in creating this
                      fantastic experience for us.
                    </div>
                  </div>
                </div>
                <br>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
        <br>
      </div>
    </div>
    <br>
    <!-- our System -->

    <div class="col-sm-12">
      <h3 class="text-center ourSystem font-weight-bold gont"> Our system</h3>
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <div class="text-center">
            <img src="images/IMG_0843.svg" alt="" height="250">
          </div>
        </div>
        <div class="col-sm-5">
          <p class="text-center">
            <br>
          <h3 class="font font-weight-bold"><b>Choose from a range of
              courses</b></h3>
          <p class="font1"> Choose the most appropriate course for
            your child. Our courses are created
            considering the age of the child. You can
            <b>book a trial class</b> before you make the
            payment completly free of cost!
          </p>
          </p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <p class="text-center">
            <br>
          <h3 class="font "><b>Schedule a class at
              any time</b></h3>
          <p class="font1">You decide the time and date of the
            class, thus there are <b>no missed
              classes!</b> We recommend your child
            attend class atleast twice a week.
          </p>
          </p>
        </div>
        <div class="col-sm-5">
          <div class="text-center">
            <img src="images/IMG_0842.svg" alt="" height="250">
          </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <div class="text-center">
            <img src="images/IMG_0841.svg" alt="" height="250">
          </div>
        </div>
        <div class="col-sm-5">
          <p class="text-center">
          <h3 class="font "><b>
              Attend the class with a
              teacher from code-gurukul
            </b></h3>
          <p class="font1">Your child can have personalized
            attention from the 1:1 classes. Learn by
            doing and complete several mini projects
            that will help your child develop an online
            portfolio
          </p>
          </p>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
          <p class="text-center">
          <h3 class="font "><b>
              Get certificate and rewards
            </b></h3>
          <p class="font1">On completion of the course your
            child will recieve certification
            according to the course. opportunity
            to interact with industry experts for
            future guidance.
          </p>
          </p>
        </div>
        <div class="col-sm-5">
          <div class="text-center">
            <img src="images/IMG_0840.svg" alt="" height="250">
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <!-- meet Founders -->
    <div class="CoFounders">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12">
            <br>
            <h2 class="text-center text-white font font-weight-bold">Meet the founders</h2>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
            <div class="text-center text-white ">
              <img src="images/image 14.svg" alt="" height="255"><br><br>
              <h3 class="text-center font font-weight-bold">Meenakshi</h3>
              <h6 class="text-center font1"> Fun-loving Technocrat</h6>
            </div>
            <br>
            <p class="text-white text-left font1">A Computer Science Engineer, she joined KPIT & IBM
              to join the technical elites, believing to associate only
              with best! She handles the content development at
              Code Gurukul and makes sure the young minds will
              get the best in class learning deliverables!</p>
          </div>

          <div class="col-sm-5">
            <div class="text-center text-white">
              <img src="images/image 15.svg" alt="" height="255" class="text-center"><br><br>
              <h3 class="text-center font font-weight-bold">Rekha</h3>
              <h6 class="text-center font1"> Cool-headed Academician </h6>
            </div>
            <br>
            <p class="text-white  text-left font1">Always passionate about imparting education, she kept
              on taking efforts at personal levels after completing her
              Computer Science Engineering and then working with
              Infosys & TCS. She trains the Teachers and makes sure the
              gamified fun loving approach to imparting values and
              technical skills via coding to children is ensured in the
              right spirit!</p>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    </div>
    <!-- Footer -->

    <div class="footer">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
            <br>
            <p><a href="#" class="text-dark font1">Home</a></p>
            <p><a href="#" class="text-dark font1">Courses and pricing</a>
            <p><a href="#" class="text-dark font1">Testimonials</a></p>
            <p><a href="#" class="text-dark font1">About us </a></p>
            <p><a href="#" class="text-dark font1">Curriculum</a></p>
            <br>
            <br>
            <div class="row">
              <div class="col-sm-5">
                <p><a href="#" class="text-dark font1">Terms and Condition</a></p>
                <p><a href="#" class="text-dark font1">Privercy policy</a></p>
                <p><a href="#" class="text-dark font1">Help center</a></p>
              </div>
              <div class="col-sm-7 font1">
                <p>Emails</p>
                <p>hr@code-gurukul.com</p>
                <p>support@code-gurukul.com</p>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <form id="contact_us">
              <br>
              <h5 class="text-center font-weight-bold font">Contact us</h5> <br>
              <label>Name</label>
              <input type="text" name="name" class="form-control font1" required>
              <label>Email</label>
              <input type="email" name="email" class="form-control font1" required>
              <label>Message</label>
              <textarea name="message" id="Message" cols="30" rows="5" class="form-control" required></textarea><br>
              <div class="row">
                <div class="col-sm-5">
                  <button type="submit" id="contact_us_btn" class="btn freeclass font-weight-bold rounded-corner col-sm-12 font">send</button>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-xs-5">
                  <p class="col-xs-12 font1"> Or call us at <br>+91 7506262683<br>+971 50 217 0872</p>
                </div>
              </div>
            </form>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    </div>
    <!-- container -->
  </div>
  <!-- modal open -->
  <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modalContent">
        <div class="modal-header modalHeader">
          <div class="font-weight-blod w-100 text-center text-white">
            <h2 class="modal-title font font-weight-bold font">Contact Us to Enroll</h2>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <img src="images/close.png" alt="" height="15">
          </button>
        </div>
        <div class="modal-body text-center font-weight-bold font1">
          <p>+91 75062 62683<br> +971 50 217 0872</p>
          <p>hr@code-gurukul.com</p>
          <p>support@code-gurukul.com</p>
        </div>
        <div class="modal-footer modalFooter p-0">
          <div class="container text-center">
            <div class="row">
              <div class="col-sm p-0 text-center">
                <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=support@code-gurukul.com&tf=1">
                  <img class="img-contact" src="./images/gmail_icon.png" alt="" width="50px" srcset="" />
                </a>
              </div>
              <div class="col-sm p-0">
                <a target="_blank" href="https://wa.me/917506262683">
                  <img class="img-contact" src="./images/whatsapp.png" alt="" width="48px" srcset="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal close -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/HomePage.js"></script>

  <script>
    $.get("https://www.cloudflare.com/cdn-cgi/trace", function(data) {
      con = data.split("\n")[8];
      con = con.split("=")[1];
      console.log(con);
      if (con != "IN") {
        $(".india-price").hide();
        $(".non-india-price").show();
      }
    });
    $(document).ready(function() {
      $("#contact_us").submit(function(event) {
        event.preventDefault();
        $("#contact_us_btn").prop("disabled", true);
        var data = $('#contact_us').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});

        $.post("db.php", {
            name: data.name,
            email: data.email,
            message: data.message,
            contact_us: "contact_us"
          })
          .done(function(data) {
            alert(data);
            $("#contact_us").trigger('reset');
            $("#contact_us_btn").prop("disabled", false);
          });


      });

    });
  </script>
</body>

</html>