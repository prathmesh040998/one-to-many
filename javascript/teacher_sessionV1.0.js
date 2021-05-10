//  assign project
function assignProject(sid) {
  //   alert("assign project" + sid);
  $("#assign_project").prop("disabled", true);
  $("#assign_project").addClass("btn-secondary");
  // $("#assign_project").addClass("not-allowed");
  const assignProject = new FormData();
  assignProject.append("assignProject", "assignProject");
  assignProject.append("session_id", sid);
  $.ajax({
    url: "db.php", //Server api to receive the file
    type: "POST",
    dataType: "script",
    cache: false,
    contentType: false,
    processData: false,
    data: assignProject,
    success: function (data) {
      console.log(data);
      if (data == 1) {
        alert("Project Assign Done");
        // location.reload(); 
      } else {
        alert("fail");
      }
    },
  });
}
//--------------------------------------------
// confetti
function confetti(event, sid) {
  var room_id = $("#room_id").val();
  //alert(event);
  //alert('Sid : '+sid);
  var choice = confirm(`Reward Student with '`+event+`' ?`);
  if(choice)
  {
    $("#acp_before").hide();
    $.ajax({
          url: "db.php",
          type: "GET",
          data: {sid: sid, event: event, session_rewards: 'session_rewards'},
          success: function(result){
          if(result == 1)
          {
            //alert('Updated');
            $.post("vc-tool-pusher.php",
              {
                event: event,
                room_id: room_id,
              },
              function (data) {
                if (data == 1) {
                  $("#acp_after").show();
                  alert("You rewarded the student with "+event);
                  // updating acp reward in db
                } else {
                  alert("Error while ");
                }
              }
            );
          }
          else{
            alert('Error! Please try again.');
          }
        }});
  }
}


// -----------------------------------
// toggle screen

$(document).ready(function () {

$("#student_activity").toggle();
      $("#teacher_activity").toggle();
      $("#student_activity_btn").click(function() {
        $("#student_activity").toggle();
      });
      $("#teacher_activity_btn").click(function() {
        $("#teacher_activity").toggle();
      });

  $("#right-side").toggle(); //by default hide student Activity
  $("#project-info").toggle(); //by default hide project info
  // student Activity
  $(".toggleStudent").click(function () {
    $("#lesson").toggle();
    $("#showStudentActivity").toggle();
    $("#right-side").toggle();
  });
  //project-info
  $(".toggleProject").click(function () {
    $("#project-info").toggle();
  });
  
});
// ---------------------------------------------
// jit si api call
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
