$(document).ready(function () {
  $("#JoinClassNow").removeClass("hover1").addClass("hover2");
  $(
    "#ProjectDetails1,#GetMoreClasses,#ScheduleYourNextClass,#ScheduledClasses,#CancelledClasses,#CompletedClasses,#CancelRescheduleClass"
  )
    .removeClass("hover2")
    .addClass("hover1");
  $(
    "#JoinClassNow,#ProjectDetails1,#GetMoreClasses,#ScheduleYourNextClass,#ScheduledClasses,#CancelledClasses,#CompletedClasses,#CancelRescheduleClass"
  ).click(function () {
    $(
      "#JoinClassNow,#ProjectDetails1,#GetMoreClasses,#ScheduleYourNextClass,#ScheduledClasses,#CancelledClasses,#CompletedClasses,#CancelRescheduleClass"
    )
      .removeClass("hover2")
      .addClass("hover1");
    $(this).removeClass("hover1").addClass("hover2");
  });

  $(
    "#completedLink1,#completedLink2,#completedLink3,#completedLink4,#completedLink5,#completedLink6,#completedLink7"
  ).hide();

  $(
    "#completedLinkBtn1,#completedLinkBtn2,#completedLinkBtn3,#completedLinkBtn4,#completedLinkBtn5,#completedLinkBtn6,#completedLinkBtn7"
  ).click(function () {
    $(this).hide();
    $(this).siblings("div").show();
  });

  $(
    "#completedClose1,#completedClose2,#completedClose3,#completedClose4,#completedClose5,#completedClose6,#completedClose7"
  ).click(function () {
    let a = $(this).parent("div");
    a.hide();
    a.siblings("button").show();
  });

  $(
    "#updatedLink1,#updatedLink2,#updatedLink3,#updatedLink4,#updatedLink5,#updatedLink6,#updatedLink7"
  ).hide();

  $(
    "#updatedLinkBtn1,#updatedLinkBtn2,#updatedLinkBtn3,#updatedLinkBtn4,#updatedLinkBtn5,#updatedLinkBtn6,#updatedLinkBtn7"
  ).click(function () {
    $(this).hide();
    $(this).siblings("div").show();
    //$("#updatedLink1,#updatedLink2").show();
  });

  $(
    "#updatedClose1,#updatedClose2,#updatedClose3,#updatedClose4,#updatedClose5,#updatedClose6,#updatedClose7"
  ).click(function () {
    let a = $(this).parent("div");
    a.hide();
    a.siblings("button").show();
  });
});

//teacher parts
$("#teacherRemarks1,#teacherRemarks2,#teacherRemarks3,#teacherRemarks4").hide();

$("#Remarks1,#Remarks2,#Remarks3,#Remarks4").click(function () {
  $(this).hide();
  $(this).siblings("div").show();
});
$("#remarksClose1,#remarksClose2,#remarksClose3,#remarksClose4").click(
  function () {
    let a = $(this).parent("div");
    a.hide();
    a.siblings("button").show();
  }
);

//teacher Buttons
$(document).ready(function () {
  $("#JoinClassNowButton").removeClass("hover1").addClass("hover2");
  $(
    "#SchedulerButton,#ReviewProjectButton,#ResourcesButton,#studentDatabaseButton,#ScheduledClassesButton,#CompletedClassesButton,#CancelledClassesButton,#CancelAScheduledClassButton"
  )
    .removeClass("hover2")
    .addClass("hover1");
  $(
    "#JoinClassNowButton,#SchedulerButton,#ReviewProjectButton,#ResourcesButton,#studentDatabaseButton,#ScheduledClassesButton,#CompletedClassesButton,#CancelledClassesButton,#CancelAScheduledClassButton"
  ).click(function () {
    $(
      "#JoinClassNowButton,#SchedulerButton,#ReviewProjectButton,#ResourcesButton,#studentDatabaseButton,#ScheduledClassesButton,#CompletedClassesButton,#CancelledClassesButton,#CancelAScheduledClassButton"
    )
      .removeClass("hover2")
      .addClass("hover1");
    $(this).removeClass("hover1").addClass("hover2");
  });
});
