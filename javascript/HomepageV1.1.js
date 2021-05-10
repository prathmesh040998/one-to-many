$(document).ready(function () {
  $("#BegineerButton").removeClass("hover2").addClass("hover1");
  $("#IntermediateButton,#AdvancedButton")
    .removeClass("hover1")
    .addClass("hover2");
  $("#BegineerButton,#IntermediateButton,#AdvancedButton").click(function () {
    $("#BegineerButton,#IntermediateButton,#AdvancedButton")
      .removeClass("hover1")
      .addClass("hover2");
    $(this).removeClass("hover2").addClass("hover1");
  });

  $("#IntermediateParts,#AdvancedParts").hide();

  $("#BegineerButton").click(function () {
    $("#IntermediateParts,#AdvancedParts").hide();
    $("#BeginnerParts").show();
  });
  $("#IntermediateButton").click(function () {
    $("#BeginnerParts,#AdvancedParts").hide();
    $("#IntermediateParts").show();
  });
  $("#AdvancedButton").click(function () {
    $("#BeginnerParts,#IntermediateParts").hide();
    $("#AdvancedParts").show();
  });
});
//BeginnerParts
//IntermediateParts
//AdvancedParts

// mobileView
$(document).ready(function () {
  $("#MobileBegineerButton").removeClass("hover2").addClass("hover1");
  $("#MobileIntermediateButton,#MobileAdvancedButton")
    .removeClass("hover1")
    .addClass("hover2");
  $(
    "#MobileBegineerButton,#MobileIntermediateButton,#MobileAdvancedButton"
  ).click(function () {
    $("#MobileBegineerButton,#MobileIntermediateButton,#MobileAdvancedButton")
      .removeClass("hover1")
      .addClass("hover2");
    $(this).removeClass("hover2").addClass("hover1");
  });

  $("#MobileIntermediateParts,#MobileAdvancedParts").hide();

  $("#MobileBegineerButton").click(function () {
    $("#MobileIntermediateParts,#MobileAdvancedParts").hide();
    $("#MobileBeginnerParts").show();
  });
  $("#MobileIntermediateButton").click(function () {
    $("#MobileBeginnerParts,#MobileAdvancedParts").hide();
    $("#MobileIntermediateParts").show();
  });
  $("#MobileAdvancedButton").click(function () {
    $("#MobileBeginnerParts,#MobileIntermediateParts").hide();
    $("#MobileAdvancedParts").show();
  });
});

function buyNow() {
  console.log("call");
  $("#buyModal").modal("toggle");
}

var btn = $("#button");

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "100");
});
