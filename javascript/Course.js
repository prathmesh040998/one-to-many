$(document).ready(function(){
  $("#CoursePageBtnBeginner").click(function(){
      $("#BeginnerCoursePage").show();
    $("#IntermadiateCoursePage,#AdvancedCoursePage").hide();
  });
});
$(document).ready(function(){
  $("#CoursePageBtnIntermediate").click(function(){
    $("#BeginnerCoursePage,#AdvancedCoursePage").hide();
      $("#IntermadiateCoursePage").show();
  });
});
$(document).ready(function(){
  $("#CoursePageBtnAdvanced").click(function(){
      $("#BeginnerCoursePage,#IntermadiateCoursePage").hide();
      $("#AdvancedCoursePage").show();
  });
});

$(document).ready(function(){
  $("#CoursePageBtnBeginner").removeClass('hover3').addClass('hover4');
  $("#CoursePageBtnIntermediate,#CoursePageBtnAdvanced").removeClass('hover4').addClass('hover3');
  $("#CoursePageBtnBeginner,#CoursePageBtnIntermediate,#CoursePageBtnAdvanced").click(function(){
    $("#CoursePageBtnBeginner,#CoursePageBtnIntermediate,#CoursePageBtnAdvanced").removeClass('hover4').addClass('hover3');
     $(this).removeClass('hover3').addClass('hover4');
  });
});

$(document).ready(function(){
  $("#first").addClass('font');
  $("#CoursePageBtnBeginner").click(function(){
    $("#first").addClass('font');
    });
  $("#CoursePageBtnIntermediate,#CoursePageBtnAdvanced").click(function(){
    $("#first").removeClass('font');  
}); 
  });

$(document).ready(function(){
  $("#CoursePageBtnIntermediate").click(function(){
    $("#second").addClass('font');
    });
  $("#CoursePageBtnBeginner,#CoursePageBtnAdvanced").click(function(){
    $("#second").removeClass('font'); 
}); 
  });

$(document).ready(function(){
  $("#CoursePageBtnAdvanced").click(function(){
    $("#third").addClass('font');
    });
  $("#CoursePageBtnBeginner,#CoursePageBtnIntermediate").click(function(){
    $("#third").removeClass('font');  
}); 
  });

  $("#BackToTop").click(function () {
    $("html, body").animate({scrollTop: 0},100);
  });