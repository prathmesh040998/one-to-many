// check username
function loginUsername() {
  var user = $("#username").val();

  if (!user) {
    $("#usernameError").html(
      "<span class='text-danger'><small>✶Please Enter Your UserName.</small></span>"
    );
    return false;
  } else {
    $("#usernameError").html("");
    return true;
  }
}

// check password
function loginPassword() {
  var password = $("#password").val();
  if (!password) {
    $("#passwordError").html(
      "<span class='text-danger'><small>✶Please Enter Your Password.</small></br></span>"
    );
    return false;
  } else {
    $("#passwordError").html("");
    return true;
  }
}
// on username change
$("#username").blur(function () {
  loginUsername();
});

// on password change
$("#password").blur(function () {
  loginPassword();
});

// check username and pasword
function checkLogin() {
  $("#loginButton").prop("disabled", true);
  var username = $("#username").val();
  var password = $("#password").val();
  var loginData = new FormData();
  loginData.append("username", username);
  loginData.append("password", password);
  loginData.append("login", "login");
  $.ajax({
    url: "db.php",
    type: "POST",
    dataType: "script",
    cache: false,
    contentType: false,
    processData: false,
    data: loginData,
    success: function (data) {
      console.log(data);
      if (data == 1) {
        window.location.replace("student_dashboard.php");
        // window.location.reload();
      } else {
        alert("InValid Username or Password");
        $("#loginButton").prop("disabled", false);
      }
    },
  });
}

loginForm.onsubmit = async (e) => {
  // stop reload
  e.preventDefault();
  // check username and password
  if (loginUsername() && loginPassword()) {
    if ($("#rememberMe").is(":checked")) {
      // save username and password
      localStorage.usrname = $("#username").val();
      localStorage.pass = $("#password").val();
      localStorage.chkbx = $("#rememberMe").val();
      alert("save");
    } else {
      localStorage.usrname = "";
      localStorage.pass = "";
      localStorage.chkbx = "";
    }
    checkLogin();
  } else {
    // alert("Please fill in all required fields");
  }
};

$(function () {
  if (localStorage.chkbx && localStorage.chkbx != "") {
    $("rememberMe").attr("checked", "checked");
    $("#username").val(localStorage.usrname);
    $("#password").val(localStorage.pass);
  } else {
    $("#rememberMe").removeAttr("checked");
    $("#username").val("");
    $("#password").val("");
  }

  $("#rememberMe").click(function () {
    if ($("#rememberMe").is(":checked")) {
      // save username and password
      localStorage.usrname = $("#username").val();
      localStorage.pass = $("#password").val();
      localStorage.chkbx = $("#rememberMe").val();
    } else {
      localStorage.usrname = "";
      localStorage.pass = "";
      localStorage.chkbx = "";
    }
  });
});
