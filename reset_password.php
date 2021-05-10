<?php
// error_reporting(0);
require 'forgot_backend.php';

if (isset($_GET['email']) && isset($_GET['token'])) {

    $email = $mysqli->real_escape_string($_GET['email']);
    $token = $mysqli->real_escape_string($_GET['token']);

    $stmt = $mysqli->prepare("SELECT username FROM users WHERE email='$email' and token='$token' and token<>'' and tokenExpire>NOW()");
    $stmt->execute();
    $result = $stmt->get_result();
    $arr = [];
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    $username = $arr[0]["username"];

    if (!$arr) {
        header("Location: Invalid.php");
        exit;
    } else { ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" type="text/css" href="forgot.css" />
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <title>Reset Password</title>

        </head>

        <body>
            <style>
                .resetsuccessmessage {
                    visibility: hidden;
                    text-align: center;
                }

                .resetfailedmessage {
                    visibility: hidden;
                    text-align: center;
                }

                .passworderror {
                    visibility: hidden;
                    text-align: center;
                }
            </style>
            <div class="row">
                <div class="col"></div>
                <div class="col-5">
                    <div class="container-fluid shadow ResetPasswordContainer">
                        <div class="row">
                            <div class="col float-right">
                                <img class="LogoForgotPassword" src="images/logo.jpg">
                            </div>
                            <div class="col text-center">
                                <div class="vertical"></div>
                            </div>
                            <div class="col float-left">
                                <h4 class="ResetAccountHeading text-secondary">
                                    ACCOUNT
                                </h4>
                            </div>
                        </div>
                        <br>
                        <form id="resetPassword">
                            <h2 class="text-secondary text-center">
                                <b>RESET YOUR PASSWORD</b>
                            </h2>
                            <br>
                            <input id="ResetNewPassword" type="Password" name="Password" placeholder="New Password" class="form-control" onblur="TP()">
                            <br>
                            <span class='text-danger passworderror' id='passworderror'><small>✶Password must be Minimum 8 characters, at least 1 letter, 1 number and 1 special character.</small></span>
                            <input type="hidden" class="form-control" id="email" value="<?php echo $email; ?>" />
                            <input id="ResetReenterPassword" type="Password" name="Password" placeholder="Renter Password" class="form-control">
                            <br>
                            <button id="ResetCancelBtn" type="button" value="Cancel" class="btn btn-light btn-lg text-secondary" onclick="remove()">
                                CANCEL
                            </button>
                            <button id="ResetNextBtn" type="button" value="Next" class="btn btn-light btn-lg text-secondary float-right" onclick="send()">
                                Next
                            </button>
                        </form>
                        <div class="container-fluid ForgotPasswordContainer shadow-sm resetsuccessmessage" id="resetsuccessmessage">
                            <h2 class="text-center" style="color:#4CAF50;font-weight: bold;">
                                The Password for The Username ' <?php echo $username; ?> ' has been changed successfully.
                            </h2>
                            <br>
                            <a href="login.php">
                                <button id="Login" type="button" value="GOTO LOGIN PAGE" class="btn btn-success btn-lg btn-block">
                                    GOTO LOGIN PAGE
                                </button>
                            </a>
                        </div>

                        <div class="container-fluid ForgotPasswordContainer shadow-sm resetsuccessmessage" id="resetfailedmessage">
                            <h2 class="text-center" style="color:red;font-weight: bold;">
                                The Password for The Username ' <?php echo $username; ?> ' has not been changed .
                            </h2>
                            <a href="login.php">
                                <button id="Login" type="button" value="GOTO LOGIN PAGE" class="btn btn-success btn-lg btn-block">
                                    GOTO LOGIN PAGE
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>

        </body>
        <script>
            function remove() {
                var email = $("#email").val();
                var form_data = new FormData();
                form_data.append("remove_token", "remove_token")
                form_data.append("email", email);
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

                            document.getElementById("resetPassword").style.display = "none";
                            document.getElementById("resetsuccessmessage").style.display = "none";
                            document.getElementById("resetfailedmessage").style.visibility = "visible";
                        } else {
                            alert(data);
                        }
                    },
                });
            }

            function send() {
                var pass1 = $("#ResetNewPassword").val();
                var pass2 = $("#ResetReenterPassword").val();
                var email = $("#email").val();;
                console.log(TP());
                if ((pass1 == "" || pass2 == "")) {
                    alert("Enter Valid Password");
                } else if ((pass1 == pass2) && TP()) {
                    $("#ResetNextBtn").val("Reseting");
                    $("#ResetNextBtn").prop("disabled", true);

                    $("#ResetCancelBtn").prop("disabled", true);
                    var form_data = new FormData();
                    form_data.append("reset_password", "reset_password")
                    form_data.append("password", pass1);
                    form_data.append("email", email);
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

                                document.getElementById("resetPassword").style.display = "none";
                                document.getElementById("resetsuccessmessage").style.visibility = "visible";
                            } else {

                                alert(data);
                            }
                        },
                    });
                } else {
                    alert("Enter Same Passwords.")
                }
            }

            function TP() {
                var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/;
                var Password = $("#ResetNewPassword").val();

                if (!Password || !Password.match(pattern)) {

                    document.getElementById("passworderror").style.visibility = "visible";
                    return false;
                } else {

                    document.getElementById("passworderror").style.visibility = "hidden";
                    return true;
                }
            }
        </script>

        </html>

<?php

    }
} else {
    print_r("Get functionalities Unaccessible.");
    // redirect
    exit();
} ?>