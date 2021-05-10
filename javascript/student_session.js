// <!-- toggle screen -->
$(document).ready(function () {
  $("#right-side").toggle(); //by default hide student Activity
  $("#project-info").toggle(); //by default hide project info
  // student Activity section
  $(".toggleStudent").click(function () {
    $("#lesson").toggle();
    $("#showStudentActivity").toggle();
    $("#right-side").toggle();
  });
  //project-info
  $(".toggleProject").click(function () {
    $("#project-info").toggle();
  });
  //student activity
  $("#student_activity").toggle();
  $("#student_activity_btn").click(function () {
    $("#student_activity").toggle();
  });
});
// ---------------------------------------------
// <!-- jit si screen -->
let room_id = $("#room_id").val();
let name = $("#username").val();
//alert (room_id);
let h = 460;

function resizeJitsi(h, room_id, name) {
  var domain = "meet.jit.si";
  var options = {
    roomName: room_id,
    height: h,
    parentNode: meet,
    disableInviteFunctions: true,
    userInfo: {
      displayName: name,
    },
    configOverwrite: {},
    // interfaceConfigOverwrite: {
    //     filmStripOnly: true
    // }
  };
  var api = new JitsiMeetExternalAPI(domain, options);
}
resizeJitsi(h, room_id, name);
//---------------------------------------------
// <!-- confetti -->
Pusher.logToConsole = true;

var pusher = new Pusher("c125c8a392c32c4b12cd", {
  cluster: "ap2",
});

var channel = pusher.subscribe("vc-tool");
room_id = $("#room_id").val();
channel.bind("confetti" + room_id, function (data) {
  if (data["event"] == "Accuracy") {
    // console.log("Accuracy");
    $("#confettiModalImg").attr("src", "images/acc3.jpeg");
  }
  if (data["event"] == "Perseverance") {
    console.log("Perseverance");
    $("#confettiModalImg").attr("src", "images/per.jpeg");
  }
  if (data["event"] == "Creativity") {
    console.log("Creativity");
    $("#confettiModalImg").attr("src", "images/cre.jpeg");
  }
  setTimeout(function () {
    confetti.start();
    confetti.maxCount = 330;
    //confetti.alpha = 1.0;
    //confetti.particleSpeed = 1;
    console.log("started");
    $("#confettiModalTitle").text(data["event"]);
    $("#confettiModal").modal("show");
    // alert(data["event"]);
  }, 100);

  setTimeout(function () {
    console.log("stopped");
    $("#confettiModal").modal("hide");
    confetti.stop();
  }, 7000);
});

//stop confetti on modal close
function stopconfetti() {
  confetti.stop();
}
