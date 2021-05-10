<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" type="text/css" href="forgot.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Forgot Password</title>
</head>

<body>
  <style>
    .successmessage {
      visibility: hidden;
    }

    .loaderbody {
      visibility: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    .loadr {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
  <div class="HomeFont">
    <nav class="navbar navbar-expand-lg navbar-light HomePageMainNavbar">
      <a class="navbar-brand" href="home.php">
        <img class="LogoForTeacherDashboard" src="images/logo.jpg" alt="" loading="lazy" />
      </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-primary" href="courses.php">
            <h6><b>COURSES &nbsp;&nbsp;</b></h6>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="#">
            <h6><b>&nbsp;&nbsp; BUY A COURSE &nbsp;&nbsp;</b></h6>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary" href="#">
            <h6><b>&nbsp;&nbsp; REFER A FRIEND</b></h6>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="login.php" id="JoinYourClassLoginBtnForgotPass" type="button" class="btn text-primary">
            JOIN YOUR CLASS<br />
            LOG IN
          </a>
        </li>
        <br />
        <li class="nav-item">
          <a href="registration.php" id="BookAFreeClassRegisterBtn" type="button" class="btn btn-warning">
            BOOK A FREE CLASS
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col"></div>
    <div class="col-5">
      <div class="container-fluid ForgotPasswordContainer shadow-sm" id="displaytext">
        <h2 class="text-secondary text-center">
          <b>FORGOT YOUR PASSWORD?</b>
        </h2>

        <br />
        <p class="text-secondary ForgotPageMsg text-center">
          Enter Your Username. We'll send instructions on registered email
          address
        </p>
        <input id="ForgotPassword" type="text" name="Username" placeholder="Username" class="form-control shadow-lg" />
        <br />
        <div class="text-center">
          <button onclick="send()" id="ForgotPasswordContinue" onclick="send()" type="button" class="btn btn-light text-secondary shadow-lg">
            CONTINUE
          </button>
        </div>
        <br /><br />
        <p class="text-center" data-toggle="tab">
          <a href="forgot_username.php"> Forgot Username? </a>
        </p>
      </div>

      <div class="loaderbody" id="loader">
        <br>
        <div class="loadr"></div>
        <br>
      </div>
      <div class="container-fluid ForgotPasswordContainer shadow-sm successmessage" id="successmessage">
        <h2 class="text-center" style="color: #4caf50; font-weight: bold">
          Kindly Check Your Email For Resetting Password of The Username.
        </h2>
      </div>
    </div>
    <div class="col"></div>
  </div>
</body>
<script>
  function send() {
    var username = $("#ForgotPassword").val();
    console.log(username);
    if (username == "") {
      alert("Enter Valid Username!");
    } else {

      document.getElementById("displaytext").style.display = "none";
      document.getElementById("loader").style.visibility = "visible";
      var form_data = new FormData();
      form_data.append("forgot_password", "forgot_password");
      form_data.append("username", username);
      $.ajax({
        url: "forgot_backend.php", //Server api to receive the file
        type: "POST",
        dataType: "script",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(data) {
          if (data == 1) {
            document.getElementById("loader").style.display = "none";
            document.getElementById("displaytext").style.display = "none";
            document.getElementById("successmessage").style.visibility = "visible";
          } else if (data == 3) {
            $("#ForgotPassword").val("");
            document.getElementById("loader").style.display = "none";
            $("#ForgotPasswordContinue").val("Send Mail");
            $("#ForgotPasswordContinue").prop("disabled", false);
            alert("User not registered");
          } else {
            document.getElementById("loader").style.display = "none";
            $("#ForgotPasswordContinue").prop("disabled", false);
            alert(data);
          }
        },
      });
    }
  }
</script>

</html>