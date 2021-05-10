<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="forget.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
	<title>Reset Password</title>

</head>

<body>
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
        <div class="container-fluid ForgotPasswordContainer shadow-sm resetsuccessmessage" id="resetsuccessmessage">
					<h2 class="text-center" style="color:red;font-weight: bold;">
						Reset Link has expired.Please try again for reset link.
          </h2>
		  <br>
		  <br>
          <a href="forgotPassword.php">      
            <button id="Login" type="button" value="FORGOT PASSWORD"  class="btn btn-success btn-lg btn-block">
              FORGOT PASSWORD
            </button>
          </a>
			</div>
			</div>
		</div>
		<div class="col"></div>
	</div>

</body>
</html>
     