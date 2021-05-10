<?php
include_once("db.php");
include_once("fixed_contact_icon.php");
//session_start();
//header("Refresh:0");
if (isset($_COOKIE['refered_by'])) {
  $refered_by = $_COOKIE['refered_by'];
} else {
  $refered_by = null;
}

if ($refered_by == NULL) {
  //echo "Refered is NULL";
} else {
  //echo 'Refered has Value';
}

//echo $refered_by;
//echo 'new';

$get_full_user_details = get_full_user_details((int)$refered_by);
//print_r($get_full_user_details);

/*
if($_SESSION['refered_by'] != NULL){
  $refered_by = $_SESSION['refered_by'];
  echo '<br>Has Value';
  $get_full_user_details = get_full_user_details($_SESSION['refered_by']);
  print_r($get_full_user_details);
  //echo $get_full_user_details[''] 
}
else{
  $refered_by = $_SESSION['refered_by'];
  echo '<br>It is Null';
}
*/
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
  $role = $_SESSION["role"];
  if ($role == "teacher") {
    header("Location: teacher_dashboard.php");
  } else {
    header("Location: student_dashboard.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/registration@betaV1.2.css" />

  <title>Registration</title>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <style>
    .submit {
      border-radius: 30px;
      padding: 3px 20%;
    }

    .intl-tel-input {
      width: 100%;
    }
  </style>
</head>

<body>
  <!-- nav bar start -->
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="home.php">
      <img src="images/logo.jpg" width="55" height="90" alt="" loading="lazy" />
    </a>
    <button class="navbar-toggler pt-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="mr-auto"></ul>
      <div>
        <ul class="top-nav navbar-nav custom-navbar br mb-5 p-2">
          <li class="nav-item pr-5 pl-5 pt-1">
            <a href="home.php#coursesAndPrices">Course Details & pricing</a>
          </li>
          <!-- <li class="nav-item pr-5 pl-5 pt-1 pb-1">
          demo
            <a href="#"><small>FAQ's</small></a>
          </li> -->

          <li class="nav-item pr-5 pl-5 pt-1">
            <a href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- nav bar end -->
  <!-- title -->
  <h1></h1>
  <!-- form start -->
  <div class="container mb-5">
    <div class="row">
      <div class="col mb-4">
        <div class="card card-form bg-white">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="student-registration" role="tabpanel" aria-labelledby="student-registration-tab">
              <div class="text-center">
                <h5>Registration Form for Student</h5>
              </div>

              <!-- parent name -->
              <!-- <div class="row">
                                <div class="col-sm"><small>Parent Details</small></div>
                            </div> -->
              <div class="row">
                <div class="col-sm mb-1">
                  <small>Parent Name</small>
                  <input type="text" id="ParentFirstName" class="form-control input-field" placeholder="Enter Parent name" required />
                  <span id="ParentFirstNameError"></span>
                </div>
                <div class="col-sm mb-1">
                  <small>Child Name</small>
                  <input type="text" id="StudentFirstName" class="form-control input-field" placeholder="Enter Child name" required />
                  <span id="StudentFirstNameError"></span>
                </div>
              </div>
              <!-- username and gender -->
              <div class="row">
                <div class="col-sm mb-1">
                  <small>Parent Email</small>
                  <input type="email" id="EmailIdSReg" class="form-control input-field" placeholder="Enter Parent Email" required />
                  <span id="EmailIdSRegError"></span>
                </div>
                <div class="col-sm mb-1">
                  <small>Gender</small>
                  <select class="form-control input-field" id="GenderSReg">
                    <option selected value="">Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="transgender">Transgender</option>
                    <option value="Prefer Not To Say">
                      Prefer Not To Say
                    </option>
                  </select>
                  <span id="GenderSRegError"></span>
                </div>
              </div>

              <!-- parent no & student dob -->
              <div class="row">
                <div class="col-sm mb-1">
                  <small>Mobile Number of Parent</small>
                  <input id="PhoneSReg" class="form-control input-field" type="tel" />
                  <span id="PhoneSRegError"></span>
                </div>
                <div class="col-sm mb-1">
                  <small>Date of birth of Child</small>
                  <input type="date" id="DOBSReg" class="form-control input-field" required />
                  <span id="DOBSRegError"></span>
                </div>
              </div>
              <!-- refer details -->

              <div class="text-center" style="margin: 15px 0px;">
                <h5>Referred by</h5>
              </div>

              <div class="row">
                <div class="col-sm">
                  <small></small>
                </div>
              </div>
              <?php
              if ($refered_by != NULL) {
              ?>


                <div class="row">
                  <div class="col-sm mb-1">
                    <small>Name</small>
                    <input type="text" id="ReferFirstName" class="form-control input-field" value="<?php echo $get_full_user_details['first_name'] . " " . $get_full_user_details['last_name'] ?>" disabled />
                  </div>

                  <!-- <div class="col-sm mb-1">
                    <small>Last Name</small>
                    <input type="text" id="ReferLastName" class="form-control input-field" value="<?php echo $get_full_user_details['last_name'] ?>" disabled />
                  </div> -->
                </div>

                <!-- refer no & email -->
                <div class="row">
                  <div class="col-sm mb-1">
                    <small>Mobile Number</small>
                    <input id="PhoneRReg" class="form-control input-field" type="tel" value="<?php echo $get_full_user_details['mobile'] ?>" disabled />
                    <!-- <span id="PhoneRRegError"></span> -->
                  </div>
                  <div class="col-sm mb-1">
                    <small>Email</small>
                    <input type="email" id="EmailIdRReg" class="form-control input-field" value="<?php echo $get_full_user_details['email'] ?>" disabled />
                    <!-- <span id="EmailIdRRegError"></span> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm mb-2">
                    <small>Reference Number</small>
                    <input type="text" id="refered_by_user_id" class="form-control input-field" value="<?php echo $get_full_user_details['user_id'] ?>" disabled />
                  </div>
                </div>

              <?php
              } else {
              ?>



                <!-- refer name no & email -->
                <div class="row">
                  <div class="col-sm mb-1">
                    <small>Name</small>
                    <input type="text" id="ReferFirstName" placeholder="Name" class="form-control input-field" />
                  </div>
                  <div class="col-sm mb-1">
                    <small>Mobile Number</small>
                    <input id="PhoneRReg" class="form-control input-field" type="tel" />
                    <!-- <span id="PhoneRRegError"></span> -->
                  </div>
                  <div class="col-sm mb-1">
                    <small>Email</small>
                    <input type="email" id="EmailIdRReg" placeholder="Email" class="form-control input-field" />
                    <!-- <span id="EmailIdRRegError"></span> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm mb-2">
                    <input type="hidden" id="refered_by_user_id" class="form-control input-field" value='#cg-admin' disabled />
                  </div>
                </div>


              <?php
              }
              ?>
              <div class="row text text-center mt-1">
                <div class="col-sm mb-1">
                  <button type="submit" id="RegStudent" class="submit btn btn-primary" value="submit">
                    Submit
                  </button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- form end -->
  <!--  jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!-- <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-2.1.3.js"
    ></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
  <script src="javascript/registration@betaV1.6.js"></script>
</body>

</html>
<?php
include_once("fixed_contact_icon.php");
?>