<?php
session_start();
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
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body class="text-center">
  <!-- form start -->
  <main class="form-login">
    <form id="loginForm">
      <!-- brand logo -->
      <a href="home.php">
        <img class="mb-4" src="./images/logo.jpg" alt="" width="95" height="150" />
      </a>
      <!-- regoster link -->
      <p class="mb-3 small">
        Not a member yet?
        <a href="registration.php" class="register-link text-success">Register!</a>
      </p>
      <!-- username -->
      <label for="inputEmail" class="visually-hidden">Username</label>
      <input type="name" id="username" class="form-control input-box" placeholder="Username" />
      <!-- username error -->
      <span id="usernameError"> </span>
      <!-- password -->
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input type="password" id="password" class="form-control input-box mt-3" placeholder="Password" />
      <!-- password error -->
      <span id="passwordError"></span>
      <!-- checkbox and forget password -->
      <div class="checkbox mb-3 mt-3 row">
        <ul class="nav nav-pills nav-fill">
          <!-- checkbox -->
          <li class="nav-item col-sm">
            <label class="small">
              <input type="checkbox" id="rememberMe" value="remember-me" />
              Remember me
            </label>
          </li>
          <!-- forget password link -->
          <li class="nav-item col-sm">
            <label class="small">
              <b>
                <a href="#" class="text-blue">Forget Password?</a>
              </b>
            </label>
          </li>
        </ul>
      </div>
      <!-- login button -->
      <button class="w-100 btn btn-lg btn-success btn-login" id="loginButton" type="submit">
        Login
      </button>
      <!-- footer text -->
      <p class="mt-4 mb-3 text-dark footer-text">
        <b>
          &copy; 2020, Code Gurukul Tech Pvt. Ltd.,<br />
          All Rights Reserved
        </b>
      </p>
    </form>
  </main>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/login@betaV1.2.js"></script>
</body>

</html>