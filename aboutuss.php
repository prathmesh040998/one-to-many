<?php
include_once("db.php");
include_once("fixed_contact_icon.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>About Us</title>
  <link rel="icon" type="image/png" href="images/code gurukul.svg" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta property="og:url" content="https://dev.code-gurukul.com/" />
  <meta property="og:image" content="https://dev.code-gurukul.com/images/whatsapp.png" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <link rel="stylesheet" href="css/HomepageV1.2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>

</style>			
</head>

<body>
  <div class="container-fluid">
  
      <nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg">
        <a class="navbar-brand" href="home.php">
          <img src="images/logo-borderless.png" alt="Code-Gurukul" title="Code-Gurukul Homepage" width="35" class="img-fluid " id="desktopView">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link font1 text-dark font-weight-bold" href="home.php#coursesAndPrices">Courses and Prices</a>
            </li>
            <li class="nav-item">
              <a class="nav-link font1 text-dark font-weight-bold" href="home.php#childSays">Testimonials</a>
            </li>
             <li class="nav-item">
              <a class="nav-link font1 text-dark font-weight-bold" href="login.php">Login </a>
            </li> 
          </ul>
          <div class="form-inline my-2 my-lg-0 mr-5">
            <a href="registration.php">
              <button class="btn btnNavbar rounded-pill my-2 my-sm-0 font font-weight-bold" type="submit" id="navButton">
                Book a free class
              </button></a>
          </div>
        </div>
      </nav>
    </div>
    
    
    
                    
       


        

       
 
         
    
      <div class="mt-5 pt-4 px-5 ml-2 mr-2 ">        
        <h1 class="font font-weight-bold" >About Us</h1>
		        
        <p> After graduating from college and working in various sectors of the industry, we 
           felt the need to introduce coding and analytical skills to young minds. With the 
           ever-growing pace of technology, we want every child to be equipped with the power 
           Computer science has to offer.  On our platform every child is given the freedom
           explore, imagine and use coding skills to come up with the most unique solutions.   </P>
        <p> Our platform is child centric. We understand that every child is unique and therefore
            all our sessions are personalized. Our teachers/mentors act as lead learners and instead 
           of spoon feeding the solutions to the child work towards nurturing the child’s creativity
           and logic to develop problem solving skills.  </p>	
        <p>  We believe with correct and personalized guidance; every child can code and be a 
         creator of technology. We have designed various courses to make coding interesting and 
         engaging for children. We want to preserve our value system and make way for the change 
         technology has to offer! 
        </P>		
    </div>
        <!-- Footer -->

        <div class="footer">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-1"></div>
                          
					
              <div class="col-sm-2">
              <input type="password" class="form-control dashboardWording  mt-4 py-4 font" id="exampleInputPassword1"
                placeholder="Enter Your mail">
                </div>
                <div class="col-sm-1 "></div>
                <div class="col-sm-1 mt-5 ">
                <a href="home.php " class="text-dark">home</a>
                </div>                
              
              <div class="col-sm-2 mt-5">
                <a href="#" class="text-dark">Courses And Pricing</a>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-3 mt-4">
                <p><a href="mailto:hr@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Mail to: hr@code-gurukul.com" height="22"> hr@code-gurukul.com</a></p>
                <p><a href="mailto:support@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Contact Support" height="22"> support@code-gurukul.com</a></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class=" row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1 mt-5">
                <a href="#" class="text-dark">About Us</a>
                </div>
                <div class="col-sm-2 mt-5">
                <a href="priyacypolicy.php" class="text-dark">Privacy Policy</a>
                </div>
                <div class="col-sm-2 mt-5">
                <a href="termacondition.php" class="text-dark">Terms and Conditions</a>
                </div>
                <div class="col-sm-2 mt-5">
                <a href="help_FAQS.php" class="text-dark">Help and FAQ'S</a>
                </div>
                <div class="col-sm-2 mt-5">
                <a href="cancellation_policy.php" class="text-dark">Cancellation Policy</a>
                </div>
               
            <div class="col-sm-1"></div>
            
          
          </div>
          </div>
          
        </div>
        <!-- container -->
      </div>
    </div>
    <!-- modal open -->
    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content modalContent">
          <div class="modal-header modalHeader">
            <div class="font-weight-blod w-100 text-center text-white">
              <h2 class="modal-title font font-weight-bold font">Contact Us to Enroll</h2>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <img src="images/close.png" alt="Code-Gurukul" title="Close" height="15">
            </button>
          </div>
          <div class="modal-body text-center font-weight-bold font1">
            <p>+91 9511841742 <br>+91 75062 62683<br> +971 50 217 0872</p>
            <p>hr@code-gurukul.com</p>
            <p>support@code-gurukul.com</p>
          </div>
          <div class="modal-footer modalFooter p-0">
            <div class="container">
              <table width="100%" class="text-center">
                <tr>
                  <td>
                    <a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=support@code-gurukul.com&tf=1">
                      <img class="img-contact" src="./images/gmail_icon.png" alt="Code-Gurukul" title="Contact Support" width="50px" srcset="" />
                    </a>
                  </td>
                  <td>
                    <a target="_blank" href="https://wa.me/919511841742">
                      <img class="img-contact" src="./images/whatsapp.png" alt="Code-Gurukul" title="Whatsapp" width="48px" srcset="" />
                    </a>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  
  <script>
    
    $(document).ready(function() {
      $("#contact_us").submit(function(event) {
        event.preventDefault();
        $("#contact_us_btn").prop("disabled", true);
        var data = $('#contact_us').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        $.post("db.php", {
            name: data.name,
            email: data.email,
            message: data.message,
            contact_us: "contact_us"
          })
          .done(function(data) {
            alert(data);
            $("#contact_us").trigger('reset');
            $("#contact_us_btn").prop("disabled", false);
          });


      });

    });

    $(document).ready(function() {
      $("#Mobile_contact_us").submit(function(event) {
        event.preventDefault();
        $("#Mobile_contact_us_btn").prop("disabled", true);
        var data = $('#Mobile_contact_us').serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.value;
          return obj;
        }, {});
        $.post("db.php", {
            name: data.name,
            email: data.email,
            message: data.message,
            contact_us: "Mobile_contact_us"
          })
          .done(function(data) {
            alert(data);
            $("#Mobile_contact_us").trigger('reset');
            $("#Mobile_contact_us_btn").prop("disabled", false);
          });


      });

    });


    $(document).ready(async function() {
      let width = screen.width,
        height = screen.height;
      console.log(width);
      console.log(height);
      if (screen.width <= 600) {
        console.log("onload call");
        await $(".deskchildSays").attr("id", "");
        await $(".deskcoursesAndPrices").attr("id", "");

        let div = $(location).attr('hash');

        console.log(div);

        if (div == "#childSays") {
          $('#testimonials')[0].click();
        }

        if (div == "#coursesAndPrices") {
          $('#moblieCoursePrice')[0].click();
        }


        // $('html, body').animate({
        //   scrollTop: $(`${div}`).offset().top
        // }, 100);
      } else {
        $(".deskcoursesAndPrices").attr("id", "coursesAndPrices");
        $(".deskchildSays").attr("id", "childSays");
      }
      $(window).resize(function() {
        let width = screen.width,
          height = screen.height;
        if (screen.width <= 600) {
          console.log("call")
          $(".deskcoursesAndPrices").attr("id", "");
          $(".deskchildSays").attr("id", "");
        } else {
          $(".deskcoursesAndPrices").attr("id", "coursesAndPrices");
          $(".deskchildSays").attr("id", "childSays");
        }
      });
    });
  </script>
  <script>
      $(function(){ 
     var navMain = $(".navbar-collapse");

     navMain.on("click", "a", null, function () {
         navMain.collapse('hide');
     });
     });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/HomepageV1.1.js"></script>
 
</body>

</html>