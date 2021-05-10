<?php
session_start();
include_once("gtag.php");
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  $role = $_SESSION["role"];
  // echo $role;
  if ($role == "teacher") {
    header("Location: teacher_dashboard.php");
  } else {
    header("Location: student_dashboard.php");
  }
}
include_once("fixed_contact_icon.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="icon" type="image/png" href="images/code gurukul.svg" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/loginV1.3.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
        <a class="navbar-brand" href="home.php">
          <img src="images/logo-borderless.png" alt="Code-Gurukul" title="Code-Gurukul Homepage" width="35" class="img-fluid " id="desktopView">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link font1 text-dark font-weight-bold" href="home.php#coursesAndPrices">Courses and Prices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font1 text-dark font-weight-bold" href="home.php#childSays">Testimonials</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link font1 text-dark" href="#">Login </a>
            </li> -->
          </ul>
          <div class="form-inline my-2 my-lg-0 mr-5">
            <a href="registration.php">
              <button class="btn btnNavbar rounded-pill my-2 my-sm-0 font font-weight-bold" type="submit" id="navButton">
                Book a free class
              </button></a>
          </div>
        </div>
      </nav>
    </div>
    <!-- Navbar Close -->
    <!-- Login Start -->
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-sm-7 login1">
          <div class="col-sm-12">
            <div class="col-sm-2" id="mobileView">
              <a href="home.php">
                <img src="images/logo-borderless.png" alt="Code-Gurukul" title="Code-Gurukul Homepage" width="70" class="img-fluid" />
              </a>
            </div>
          </div>
          <div class="col-lg-12 col-xs-12">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-xl-8 col-xs-8">
                <div class="col-xl-12 col-xs-12">
                  <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-lg-8 col-xs-8 text-center">
                      <h4 class="text-white font font-weight-bold mt-5">
                        Login
                      </h4>
                      <!-- <div class="mt-5">
                                                <button class="btn  font1  login2 rounded-0 text-right col-sm-12 ">
                                                    <img src="images/Group 138.svg" alt="Code-Gurukul" title="Login with Google" class="img-fluid float-left">
                                                    Log in with google
                                                </button>
                                            </div> -->
                      <br />
                      <!-- <img src="images/Group 139.svg" alt="Code-Gurukul" title="Login with Username" class="img-fluid" /> -->
                      <form id="loginForm">
                        <div class="form-row">
                          <div class="col-sm-12 text-left">
                            <label class="text-white font1 ml-2" height="15px" width="110px">Username</label>
                            <input type="text" class="form-control inp text-left" id="username" placeholder="Enter Username" required />
                          </div>
                          <!-- <div class="col-sm-12 text-right">
                            <a href="#" class="text-white font1">Forgot Username</a>
                          </div> -->
                          <div class="col-sm-12 text-left">
                            <label class="text-white font1 mt-4 ml-2">Password</label>
                            <input type="password" class="form-control inp" id="password" placeholder="Enter Password" required />
                          </div>
                          <!-- <div class="col-sm-12 text-right">
                            <a href="#" class="text-white font1">Forgot Password</a>
                          </div> -->
                          <div class="col-sm-12 text-left">
                            <label class="text-white font1 mt-4">
                              <input type="checkbox" id="rememberMe" value="remember-me" />&nbsp;Keep me signed in
                            </label>
                          </div>
                          <div class="text-center col-sm-12" id="desktopView">
                            <img src="images/Untitled_Artwork 1.svg" alt="Code-Gurukul" title="Welcome Back!" class="img-fluid" />
                          </div>
                        </div>

                        <div class="mt-4">
                          <button id="loginButton" class="btn font1 col-sm-10 rounded-corner nextButton font-weight-bold">
                            NEXT
                          </button>
                        </div>
                        <div>
                          <p class="font1 text-white">
                            Haven't signed up?
                            <a href="registration.php" class="Loginhere text-warning">
                              SIGN UP HERE
                            </a>
                          </p>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-5 login2 text-center" id="mobileView">
          <div class="mt-5">
            <br />
            <h4 class="font1 font-weight-bold first-txt">Welcome Back!</h4>
          </div>
          <div class="text-center mt-2">
            <img src="images/Untitled_Artwork 1.svg" alt="Code-Gurukul" title="Welcome Back!" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>

    <!-- Login end             -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/login@betaV1.2.js"></script>
  <?php gtag();  ?>
</body>

</html>

