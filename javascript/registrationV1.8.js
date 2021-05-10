var StelInput = $("#PhoneSReg");

// initialise plugin
StelInput.intlTelInput({
  initialCountry: "in",
  separateDialCode: true,
  preferredCountries: ["in", "us", "gb"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js",
});

function SN() {
  // reset();
  if (StelInput.intlTelInput("isValidNumber")) {
    /* get code here*/
    var getCode = StelInput.intlTelInput("getSelectedCountryData");
    // console.log(StelInput.intlTelInput("getNumber"));
    $("#PhoneSRegError").html("");
    return true;
  } else {
    $("#PhoneSRegError").html(
      "<span class='text-warning'><small>✶ Enter Valid Number</small></span>"
    );
    return false;
  }
}
StelInput.blur(function () {
  SN();
});
function PFN() {
  var parentFirstName = $(ParentFirstName).val();
  // console.log(parentFirstName);
  if (!parentFirstName) {
    $("#ParentFirstNameError").html(
      "<span class='text-warning'><small>✶ Please Enter Parent First Name.</small></span>"
    );
    return false;
  } else {
    $("#ParentFirstNameError").html("");
    return true;
  }
}

function PLN() {
  var parentLastName = $(ParentLastName).val();
  // console.log(parentLastName);
  if (!parentLastName) {
    $("#ParentLastNameError").html(
      "<span class='text-warning'><small>✶ Please Enter Parent Last Name.</small></span>"
    );
    return false;
  } else {
    $("#ParentLastNameError").html("");
    return true;
  }
}

function SFN() {
  var studentFirstName = $(StudentFirstName).val();
  // console.log(studentFirstName);

  if (!studentFirstName) {
    $("#StudentFirstNameError").html(
      "<span class='text-warning'><small>✶ Please Enter Student First Name.</small></span>"
    );
    return false;
  } else {
    // $("#UserNameSReg").val(studentFirstName);
    $("#StudentFirstNameError").html("");
    return true;
  }
}

function SLN() {
  var studentLastName = $(StudentLastName).val();
  if (!studentLastName) {
    $("#StudentLastNameError").html(
      "<span class='text-warning'><small>✶ Please Enter Student Last Name.</small></span>"
    );
    return false;
  } else {
    $("#StudentLastNameError").html("");
    return true;
  }
}

function SUN() {
  username = $("#UserNameSReg").val();
  console.log(username);
  // console.log("The text has been changed." + username.length);
  if (username.length >= 4) {
    var user = new FormData();
    user.append("username", username);
    user.append("checkUserName", "checkUserName");
    var status;

    $.ajax({
      async: false,
      url: "db.php",
      type: "POST",
      dataType: "script",
      cache: false,
      contentType: false,
      processData: false,
      data: user,
      success: function (data) {
        console.log(data);
        if (data == 1) {
          $("#UserNameSRegError").html(
            "<span class='text-success'><small>✶ Username Available</small></span>"
          );
          // console.log("available");
          status = true;
        } else {
          $("#UserNameSRegError").html(
            "<span class='text-warning'><small>✶ All ready taken</small></span>"
          );
          // console.log("all ready taken");
          status = false;
        }
      },
    });
    return status;
  } else {
    $("#UserNameSRegError").html(
      "<span class='text-warning'><small>✶ Username must 4 character</small></span>"
    );
    return false;
  }
}

function SE() {
  var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var parentemail = $(EmailIdSReg).val();
  if (parentemail == "" || !parentemail.match(pattern)) {
    $("#EmailIdSRegError").html(
      "<span class='text-warning'><small>✶ Enter Valid Email</small></span>"
    );
    return false;
  } else {
    // $("#EmailIdSRegError").html("");
    // return true;
    var user = new FormData();
    user.append("email", parentemail);
    user.append("checkUserEmail", "checkUserEmail");
    var status;
    $.ajax({
      async: false,
      url: "db.php",
      type: "POST",
      dataType: "script",
      cache: false,
      contentType: false,
      processData: false,
      data: user,
      success: function (data) {
        console.log(data);
        if (data == 1) {
          $("#EmailIdSRegError").html(
            "<span class='text-success'><small>✶ Email Available</small></span>"
          );
          // console.log("available");
          status = true;
        } else {
          $("#EmailIdSRegError").html(
            "<span class='text-warning'><small>✶ All ready taken</small></span>"
          );
          // console.log("all ready taken");
          status = false;
        }
      },
    });
    return status;
  }
}

function SP() {
  var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/;
  var studentPassword = $(PasswordSReg).val();

  if (!studentPassword || !studentPassword.match(pattern)) {
    $("#PasswordSRegError").html(
      "<span class='text-warning'><small>✶Password must be Minimum 8 characters, at least 1 letter, 1 number and 1 special character.</small></span>"
    );
    return false;
  } else {
    $("#PasswordSRegError").html("");
    return true;
  }
}

function SDOB() {
  var sdob = $(DOBSReg).val();
  pattern = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
  var myDate = new Date(sdob);
  var today = new Date();
  var last_date = new Date("1940-01-01");
  // console.log(myDate);
  // console.log(last_date);

  if (!sdob || pattern.test(sdob)) {
    $("#DOBSRegError").html(
      "<span class='text-warning'><small>✶ Enter Valid Date.</small></span>"
    );
    return false;
  } else {
    if (myDate > today || myDate < last_date) {
      $("#DOBSRegError").html(
        "<span class='text-warning'><small>✶ Enter Valid Date.</small></span>"
      );
      return false;
    } else {
      $("#DOBSRegError").html("");
      return true;
    }
  }
}

function SG() {
  sGender = $("#GenderSReg").val();
  // console.log(sGender);
  if (sGender == "") {
    $("#GenderSRegError").html(
      "<span class='text-warning'><small>✶ Please Enter Your Gender.</small></br></span>"
    );
    return false;
  } else {
    $("#GenderSRegError").html("");
    return true;
  }
}

function RE() {
  if ($(EmailIdRReg).val() != "") {
    var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var referemail = $(EmailIdRReg).val();
    if (referemail == "" || !referemail.match(pattern)) {
      $("#EmailIdRRegError").html(
        "<span class='text-warning'><small>✶ Enter Valid Email</small></span>"
      );
      return false;
    } else {
      $("#EmailIdRRegError").html("");
      return true;
    }
  } else {
    $("#EmailIdRRegError").html("");
    return true;
  }
}

var RtelInput = $("#PhoneRReg");

// initialise plugin
RtelInput.intlTelInput({
  initialCountry: "in",
  separateDialCode: true,
  preferredCountries: ["in", "us", "gb"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js",
});

function RN() {
  // reset();
  if (RtelInput.val() != "") {
    if (RtelInput.intlTelInput("isValidNumber")) {
      /* get code here*/
      var getCode = StelInput.intlTelInput("getSelectedCountryData");
      // console.log(StelInput.intlTelInput("getNumber"));
      $("#PhoneRRegError").html("");
      return true;
    } else {
      $("#PhoneRRegError").html(
        "<span class='text-warning'><small>✶ Enter Valid Number</small></span>"
      );
      return false;
    }
  } else {
    $("#PhoneRRegError").html("");
    return true;
  }
}
RtelInput.blur(function () {
  RN();
});

$("#EmailIdRReg").blur(function () {
  RE();
});
$("#ParentFirstName").blur(function () {
  PFN();
});

$("#ParentLastName").blur(function () {
  PLN();
});
$("#StudentFirstName").blur(function () {
  SFN();
});

$("#StudentLastName").blur(function () {
  SLN();
});
$("#EmailIdSReg").blur(function () {
  SE();
});
$("#PasswordSReg").blur(function () {
  SP();
});

$("#DOBSReg").blur(function () {
  SDOB();
});

$("#UserNameSReg").blur(function () {
  SUN();
});

StelInput.blur(function () {
  SN();
});

$("#GenderSReg").blur(function () {
  SG();
});

$("#RegStudent").click(function () {
  if (
    PFN() &&
    // PLN() &&
    SFN() &&
    // SLN() &&
    SE() &&
    // SP() &&
    SDOB() &&
    // SUN() &&
    // SG() &&
    SN()
    //  &&
    // RN() &&
    // RE()
  ) {
    console.log("all function ok");
    studentRegister();
  } else {
    alert("Please fill in required fields");
  }
});

function studentRegister() {
  $(".submit").prop("disabled", true);
  $(".submit").html("Please Wait");
  var ParentFirstName = $("#ParentFirstName").val();
  var ParentLastName = $("#ParentLastName").val();
  var StudentFirstName = $("#StudentFirstName").val();
  var StudentLastName = $("#StudentLastName").val();
  var UserNameSReg = $("#UserNameSReg").val();
  // var StudentGender = $("#GenderSReg").val();

  var EmailIdSReg = $("#EmailIdSReg").val();
  var PasswordSReg = $("#PasswordSReg").val();
  var DOBSReg = $("#DOBSReg").val();
  var PhoneStudent = StelInput.intlTelInput("getNumber");

  // refer
  var refered_by_user_id = $("#refered_by_user_id").val();
  var ReferFirstName = $("#ReferFirstName").val();
  var ReferLastName = $("#ReferLastName").val();
  var EmailIdRReg = $("#EmailIdRReg").val();
  var PhoneRefer = RtelInput.intlTelInput("getNumber");
  //var refered_by_user_id = $("#refered_by_user_id").val();

  //console.log('refered by : '+refered_by_user_id);

  // console.log(PhoneStudentCode);
  // console.log(
  //   ParentFirstName +
  //     "\n" +
  //     ParentLastName +
  //     "\n" +
  //     StudentFirstName +
  //     "\n" +
  //     StudentLastName +
  //     "\n" +
  //     UserNameSReg +
  //     "\n" +
  //     EmailIdSReg +
  //     "\n" +
  //     PasswordSReg +
  //     "\n" +
  //     DOBSReg
  // );
  var studentData = new FormData();
  studentData.append("ParentFirstName", ParentFirstName);
  studentData.append("ParentLastName", "");
  studentData.append("StudentFirstName", StudentFirstName);
  studentData.append("StudentLastName", "");
  studentData.append("UserNameSReg", "");
  studentData.append("StudentGender", "");
  studentData.append("EmailIdSReg", EmailIdSReg);
  studentData.append("PasswordSReg", "");
  studentData.append("DOBSReg", DOBSReg);
  studentData.append("PhoneStudent", PhoneStudent);
  studentData.append("studentRegister", "studentRegister");
  //refer append
  studentData.append("ReferFirstName", ReferFirstName);
  studentData.append("ReferLastName", "");
  studentData.append("EmailIdRReg", EmailIdRReg);
  studentData.append("PhoneRefer", PhoneRefer);
  studentData.append("Referedby", refered_by_user_id);
  console.log("refered by ::: " + refered_by_user_id);
  $.ajax({
    url: "db.php",
    type: "POST",
    dataType: "script",
    cache: false,
    contentType: false,
    processData: false,
    data: studentData,
    success: function (data) {
      console.log(data);
      if (data == 1) {
        console.log(data);
        alert("Successful");
        // deleting cookie
        delete_cookie("refered_by");
        window.location.replace("login.php");
        $("#loginButton").prop("disabled", false);
        $(".submit").html("Submit");
        // window.location.reload();
      } else {
        console.log(data);
        alert(data);
        
        alert("Ragistration Fail");
        $(".submit").prop("disabled", false);
        $(".submit").html("Submit");
      }
    },
  });
}

// delete cookie used by referal reward
function delete_cookie(name) {
  document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 2000 00:00:01 GMT;";
  //alert('deleted');
}

// /*******************  teacher javascript ******************    */
//teacher registration
var TtelInput = $("#PhoneTReg");

// // initialise plugin
// TtelInput.intlTelInput({
//   initialCountry: "in",
//   separateDialCode: true,
//   preferredCountries: ["in", "us", "gb"],
//   utilsScript:
//     "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js",
// });

// function TN() {
//   // reset();
//   if (TtelInput.intlTelInput("isValidNumber")) {
//     /* get code here*/
//     var getCode = TtelInput.intlTelInput("getSelectedCountryData");
//     console.log(TtelInput.intlTelInput("getNumber"));
//     $("#PhoneTRegError").html("");
//     return true;
//   } else {
//     $("#PhoneTRegError").html(
//       "<span class='text-warning'><small>✶ Enter Valid Number</small></span>"
//     );
//     return false;
//   }
// }

// function TFN() {
//   var teacherFirstName = $(TeacherFirstName).val();
//   console.log(teacherFirstName);
//   if (!teacherFirstName) {
//     $("#TeacherFirstNameError").html(
//       "<span class='text-warning'><small>✶ Please Enter Teacher First Name.</small></span>"
//     );
//     return false;
//   } else {
//     $("#TeacherFirstNameError").html("");
//     return true;
//   }
// }

// function TLN() {
//   var teacherLastName = $(TeacherLastName).val();
//   console.log(teacherLastName);
//   if (!teacherLastName) {
//     $("#TeacherLastNameError").html(
//       "<span class='text-warning'><small>✶ Please Enter Teacher Last Name.</small></span>"
//     );
//     return false;
//   } else {
//     $("#TeacherLastNameError").html("");
//     return true;
//   }
// }

// function TQ() {
//   var teacherQualifications = $(TeacherQualifications).val();
//   console.log(teacherQualifications);
//   if (!teacherQualifications) {
//     $("#TeacherQualificationsError").html(
//       "<span class='text-warning'><small>✶ Please Enter Teacher Qualifications.</small></span>"
//     );
//     return false;
//   } else {
//     $("#TeacherQualificationsError").html("");
//     return true;
//   }
// }

// function TE() {
//   var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
//   var teacheremail = $(EmailIdTReg).val();
//   if (teacheremail == "" || !teacheremail.match(pattern)) {
//     $("#EmailIdTRegError").html(
//       "<span class='text-warning'><small>✶ Enter Valid Email</small></span>"
//     );
//     return false;
//   } else {
//     $("#EmailIdTRegError").html("");
//     return true;
//   }
// }

// function TP() {
//   var pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,15}$/;
//   var teacherPassword = $(PasswordTReg).val();

//   if (!teacherPassword || !teacherPassword.match(pattern)) {
//     $("#PasswordTRegError").html(
//       "<span class='text-warning'><small>✶Password must be Minimum 8 characters, at least 1 letter, 1 number and 1 special character.</small></span>"
//     );
//     return false;
//   } else {
//     $("#PasswordTRegError").html("");
//     return true;
//   }
// }

// function TDOB() {
//   var tdob = $(DOBTReg).val();
//   pattern = /^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
//   var myDate = new Date(tdob);
//   var today = new Date();
//   var last_date = new Date("1940-01-01");

//   if (!tdob || pattern.test(tdob)) {
//     return false;
//   } else {
//     if (myDate > today || myDate < last_date) {
//       $("#DOBTRegError").html(
//         "<span class='text-warning'><small>✶ Enter Valid Date.</small></span>"
//       );
//       return false;
//     } else {
//       $("#DOBTRegError").html("");
//       return true;
//     }
//   }
// }
// function TUN() {
//   tusername = $("#UserNameTReg").val();
//   console.log("The text has been changed." + tusername.length);
//   if (tusername.length >= 4) {
//     var tuser = new FormData();
//     tuser.append("username", tusername);
//     tuser.append("checkUserName", "checkUserName");
//     var status;
//     $.ajax({
//       async: false,
//       url: "db.php",
//       type: "POST",
//       dataType: "script",
//       cache: false,
//       contentType: false,
//       processData: false,
//       data: tuser,
//       success: function (data) {
//         console.log(data);
//         if (data == 1) {
//           $("#UserNameTRegError").html(
//             "<span class='text-success'><small>✶ Username Available</small></span>"
//           );
//           // console.log("Available");
//           status = true;
//         } else {
//           $("#UserNameTRegError").html(
//             "<span class='text-warning'><small>✶ all ready taken</small></span>"
//           );
//           // console.log("not");
//           status = false;
//         }
//       },
//     });
//     return status;
//   } else {
//     $("#UserNameTRegError").html(
//       "<span class='text-warning'><small>✶ Username must 4 character</small></span>"
//     );
//     return false;
//   }
// }

// function TG() {
//   tGender = $("#GenderTReg").val();
//   console.log(tGender);
//   if (tGender == "") {
//     $("#GenderTRegError").html(
//       "<span class='text-warning'><small>✶ Please Enter Your Gender.</small></br></span>"
//     );
//     return false;
//   } else {
//     $("#GenderTRegError").html("");
//     return true;
//   }
// }
// TtelInput.blur(function () {
//   TN();
// });

// $("#TeacherFirstName").blur(function () {
//   TFN();
// });

// $("#TeacherLastName").blur(function () {
//   TLN();
// });

// $("#TeacherQualifications").blur(function () {
//   TQ();
// });

// $("#EmailIdTReg").blur(function () {
//   TE();
// });
// $("#DOBTReg").blur(function () {
//   TDOB();
// });
// $("#PasswordTReg").blur(function () {
//   TP();
// });
// $("#UserNameTReg").blur(function () {
//   TUN();
// });
// $("#GenderTReg").blur(function () {
//   TG();
// });

// $("#RegTeacher").click(function () {
//   if (
//     TFN() &&
//     TLN() &&
//     TQ() &&
//     TE() &&
//     TDOB() &&
//     TP() &&
//     TUN() &&
//     TG() &&
//     TN()
//   ) {
//     $(".submit").prop("disabled", true);
//     $(".submit").html("Please Wait");
//     // alert("ok");
//     var TeacherFirstName = $("#TeacherFirstName").val();
//     var TeacherLastName = $("#TeacherLastName").val();
//     var TeacherQualifications = $("#TeacherQualifications").val();
//     var UserNameTReg = $("#UserNameTReg").val();
//     var TeacherGender = $("#GenderTReg").val();

//     var EmailIdTReg = $("#EmailIdTReg").val();
//     var PasswordTReg = $("#PasswordTReg").val();
//     var DOBTReg = $("#DOBTReg").val();
//     var PhoneTReg = TtelInput.intlTelInput("getNumber");
//     console.log(
//       TeacherFirstName +
//         "\n" +
//         TeacherLastName +
//         "\n" +
//         TeacherQualifications +
//         "\n" +
//         UserNameTReg +
//         "\n" +
//         EmailIdTReg +
//         "\n" +
//         PasswordTReg +
//         "\n" +
//         DOBTReg +
//         "\n" +
//         PhoneTReg
//     );

//     var teacherData = new FormData();
//     teacherData.append("TeacherFirstName", TeacherFirstName);
//     teacherData.append("TeacherLastName", TeacherLastName);
//     teacherData.append("TeacherQualifications", TeacherQualifications);
//     teacherData.append("UserNameTReg", UserNameTReg);
//     teacherData.append("TeacherGender", TeacherGender);

//     teacherData.append("EmailIdTReg", EmailIdTReg);
//     teacherData.append("PasswordTReg", PasswordTReg);
//     teacherData.append("DOBTReg", DOBTReg);
//     teacherData.append("PhoneTReg", PhoneTReg);
//     teacherData.append("TeacherRegister", "TeacherRegister");
//     $.ajax({
//       url: "db.php",
//       type: "POST",
//       dataType: "script",
//       cache: false,
//       contentType: false,
//       processData: false,
//       data: teacherData,
//       success: function (data) {
//         console.log(data);
//         if (data == 1) {
//           alert("Successful");
//           window.location.replace("login.php");
//           // window.location.reload();
//           $(".submit").prop("disabled", false);
//           $(".submit").html("Submit");
//         } else {
//           alert("Unable to Register");
//           $(".submit").prop("disabled", false);
//           $(".submit").html("Submit");
//         }
//       },
//     });
//   } else {
//     alert("Enter Valid Input");
//   }
// });
