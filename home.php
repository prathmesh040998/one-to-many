<?php
// include_once("db.php");
include_once("fixed_contact_icon.php");
include_once("course_module.php");
include_once("gtag.php");
$non_india_price = "contact to xyz@gmail.com";
//session_destroy();
// if (isset($_GET['id'])) {
//   //session_start();
//   $refered_by = $_GET['id'];
//   //echo is_string($refered_by);
//   $get_full_user_details = get_full_user_details($refered_by);
// } else {
//   $refered_by = NULL;
// }
// echo 'refered by : ' . $refered_by;
?>
<script>
  var refered_by = '<?php echo $refered_by; ?>';
  document.cookie = "refered_by = " + refered_by;
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Coding Lessons for Kids | Live Coding Classes - Code-Gurukul</title>
  <link rel="icon" type="image/png" href="images/code gurukul.svg" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Code-Gurukul-Admin">
  <meta name="description" content="Best Online Live Coding Platform for Kids, Enjoyment and Personal Learning Ensured for Your Child, Social Emotional Learning Theme for Every Session.">
  <meta name="keywords" content="computer coding classes for kids, online coding lessons for kids, online computer programming for kids, best way to start coding, best coding classes for kids online, online coding programs for kids, computer science for kids, live coding classes for kids, personal coding classes for kids">
  <meta name="robots" content="index, follow">
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Online Coding Lessons for Kids | Live Coding Classes - Code-Gurukul" />
  <meta property="og:description" content="Best Online Live Coding Platform for Kids, Enjoyment and Personal Learning Ensured for Your Child, Social Emotional Learning Theme for Every Session." />
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

</head>

<body>
  <div class="container-fluid">
    <div class="container-fluid px-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <div class="Images">
          <a class="navbar-brand ml-5 logoImages " href="#">

            <img src="images/logo2.jpg" alt="" class="img-fluid">

          </a>
        </div>

        <!-- <a class="navbar-brand logoImages prices" href="#">
  <img src="images/group 268 (1).jpg" alt="" class="img-fluid mobileView">
  </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link font1 text-dark font-weight-bold" id="moblieCoursePrice" href="#coursesAndPrices">Curriculum and Pricing &nbsp;&nbsp;&nbsp;</a>
            </li>

          </ul>
          <div class=" mr-5">
            <a href="registration.php"> <button class="btn btnNavbar rounded  shadow font font-weight-bold py-2" type="submit" id="navButton"> Book a free class/Register</button></a>
            <a href="login.php"> <button class="btn btnNavbar rounded  font   shadow font-weight-bold ml-1 py-2 margin" type="submit">Login</button></a>
          </div>
        </div>
      </nav>
    </div>
    <div class="desktopView">
      <div class="container-fluid px-5 mt-5">
        <!-- every child can code                          -->

        <div class="container-fluid everyChildCode">
          <div class="col-lg-12 col-xs-12">
            <div class="row">
              <div class="col-lg-1 col-xs-1">

              </div>
              <div class="col-lg-11 col-xs-11">
                <div class=" row">
                  <div class="col-lg-12 col-xs-12">
                    <div class="row no-gutters">
                      <div class="col-lg-4 col-xs-4">
                        <br>
                        <br>
                        <br>
                        <h3 class="text-warning font-weight-bold font mt-5">PLAY . LEARN . CREATE</h3>
                        <h4 class="text-white font-weight-bold font mt-4"> Our digital school (6 - 16 years of age) builds logic and develops creativity through coding.
                        </h4>
                        <h5 class=" text-white font1 font-weight-normal mt-5">Live personalized sessions (1 teacher : 1 student)
                          Experience customized to your child’s needs.</h5>
                        <br>
                        <div>
                          <a href="registration.php"><button class="btn  font-weight-bold freeclass rounded  shadow-lg p-2 col-sm-8 font">Book a free Class/Register</button></a>
                        </div>
                        <br>
                      </div>
                      <div class="col-lg-8 col-xs-8">


                        <div class="container-fluid d-flex align-items-end flex-column">
                          <img src="images/Group 127.png" alt="personal coding classes for kids" title="Best Way To Start Coding" class="img-fluid">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- every child can code close desktopView -->
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div class="row">
                <div class="text-center col-sm-12">
                  <br>
                  <h3 class="font-weight-bold font mt-4">What your child will learn</h3>
                  <h6 class="">Your child can unlock their potential for creative thinking and problem solving with our practical lessons.</h6>
                  <div class="container-fluid">
                    <div class="card-deck mt-5">
                      <div class="card border-light">
                        <img class="card-img-top" src="images/d.svg" alt="Code-Gurukul" title="Building Blocks of Coding">
                        <div class="card-body1 text-center">
                          <p class="card-text font1 mb-3">Building Blocks <br> of Coding</p>
                        </div>
                      </div>
                      <div class="card border-light ">
                        <img class="card-img-top" src="images/c.svg" alt="Code-Gurukul" title="Website Designing">
                        <div class="card-body1 text-center">
                          <p class="card-text font1">Website Designing</p>
                        </div>
                      </div>
                      <div class="card border-light ">
                        <img class="card-img-top" src="images/F.svg" alt="Code-Gurukul" title="Game Development">
                        <div class="card-body1 text-center">
                          <p class="card-text font1">Game Development</p>
                        </div>
                      </div>
                      <div class="card border-light ">
                        <img class="card-img-top" src="images/e.svg" alt="Code-Gurukul" title="App Development">
                        <div class="card-body1 text-center">
                          <p class="card-text font1">App Development</p>
                        </div>
                      </div>
                      <div class="card border-light ">
                        <img class="card-img-top" src="images/b.svg" alt="Code-Gurukul" title="Artificial Intelligence, Machine Learning">
                        <div class="card-body1 text-center">
                          <p class="card-text font1 mb-2">Artificial Intelligence,<br>Machine Learning</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>

        <br>
        <br>
        <br>

        <!-- Your kid’s journey with Code-Gurukul -->

        <div>
          <div class=" container-fluid backgroundImg1">
            <div class="col-sm-12 ">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <br><br>
                  <h3 class="text-center text-white font-weight-bold font"> Your kid’s journey with Code-Gurukul</h3>
                  <div class="row">
                    <div class=" text-left col-sm-3">
                      <img src="images/a.svg" class="img-fluid" alt="Code-Gurukul" title="Kid's Journey - Free First Class">
                      <div class=" text-left text-white font1">
                        <p>Attend your
                          first class
                          completely FREE
                          of charge</p>
                      </div>
                    </div>
                    <div class="text-left col-sm-3">
                      <img src="images/Mask Group-1.svg" class="img-fluid" alt="Code-Gurukul" title="Kid's Journey - Building Blocks">
                      <div class="text-left  text-white font1">
                        Building Blocks for
                        the Journey in the
                        Programming World
                      </div>
                    </div>
                    <div class="text-right col-sm-3">
                      <img src="images/Mask Group-2.svg" class="img-fluid" alt="Code-Gurukul" title="Kid's Journey - App Development | Game Development">
                      <div class=" text-left  text-white font1">
                        Basics of App Development
                        and Simple Game
                        Development
                      </div>
                    </div>
                    <div class=" text-right col-sm-3">
                      <img src="images/Mask Group-3.svg" class="img-fluid" alt="Code-Gurukul" title="Kid's Journey - Website Development | App Development | Interactive Game Development">
                      <div class="text-left  text-white font1">
                        Website Development, App
                        Development and Interactive
                        Game Development
                      </div>
                    </div>
                    <div class="container-fluid d-flex flex-column">
                      <img src="images/Group 136 (1).svg " alt="Code-Gurukul" title="Kid's Journey Progess Line" class="img-fluid progressLine">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="registration.php"> <button class="btn btnNavbar font-weight-bold font rounded shadow-lg p-2" id="navButton">&nbsp;&nbsp;Book a free Class/Register&nbsp;&nbsp;&nbsp;</button></a>
                  </div>
                  <br>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
        </div>



        <!-- why coding -->
        <!-- phase1 -->
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div class="col-sm-12">
                <br>
                <h3 class="text-center font-weight-bold font mt-3">Why coding?</h3>
                <div class="row mt-5">
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 130.svg" alt="Code-Gurukul" title="Academic Performance" class="img-fluid" height="228">
                    <br>
                    <p class="font-weight-bold text-center text-sm font1">Coding Improves Academic Performance</p>
                  </div>
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 129.svg" alt="Code-Gurukul" title="Creativity" class="img-fluid" height="228">
                    <br>
                    <p class="font-weight-bold text-center text-sm font1">Coding Fosters Creativity</p>
                  </div>
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 117.svg" alt="Code-Gurukul" title="How to Think" class="img-fluid" height="228">
                    <br>
                    <p class="font-weight-bold text-center text-sm font1">Coding Teaches You How to Think</p>
                  </div>
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 118.svg" alt="Code-Gurukul" title="Problem Solving Skills" class="img-fluid" height="228">
                    <br>
                    <p class="font-weight-bold text-center text-sm font1">Coding Improves Problem Solving Skills</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>

        <!-- phase2 -->
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div class="col-sm-12"><br><br>
                <h3 class="text-center font-weight-bold font">Why Code-Gurukul?</h3><br>
                <h6 class="text-center font-weight-bold font1">We at Code-Gurukul nurture your child's development.</h6>
                <div class="row mt-5">
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 119.svg" alt="Code-Gurukul" title="Build Attitude" class="img-fluid">

                    <p class="font-weight-bold text-center text-sm font1">Positive Attitude Building</p>
                  </div>
                  <div class="col-sm-3 text-center">
                    <img src="images/Group 120.svg" alt="Code-Gurukul" title="Build Confidence" class="img-fluid">
                    <br>
                    <p class="font-weight-bold text-center text-sm font1 ">Confidence Personality Development</p>
                  </div>
                  <div class="col-sm-3 text-center mt-2">
                    <img src="images/Group 121.svg" alt="Code-Gurukul" title="Practice Makes Perfect" class="img-fluid">

                    <p class="font-weight-bold text-center text-sm font1 ">Learn by Practice</p>
                  </div>
                  <div class="col-sm-3 text-center mt-3">
                    <img src="images/Group 122.svg" alt="Code-Gurukul" title="All-round Learning" class="img-fluid">

                    <p class="font-weight-bold text-center text-sm font1">Social and Emotional Learning</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>
        <br>
        <br>
        <!-- what child says -->

        <div class=" deskchildSays" id="childSays">
          <div class="container-fluid backgroundimg">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">

                  <h3 class="text-center text-white font-weight-bold font pt-5 mt-5">What our students say</h3>
                  <div class="row mt-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                      <div class="form-group" style="height: 100%;">
                        <div class="row">
                          <div class="col-sm-4 text-center">
                            <img src="images/image 92.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Ojas, 7 years" class="img-fluid rounded-pill img-thumbnail" height="150">
                          </div>
                          <div class="col-sm-8">
                            <h5 class="text-white pl-sm-2 font-weight-bold font">Ojas, 7 years</h5>
                            <div class=" text-white  wordsaying font1 mt-3">

                              &#8220; I had a lot of fun learning
                              to code with Code-Gurukul. I
                              had never thought coding
                              would be so much fun!!&#8221;
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 mb-4 mb-lg-0">
                      <div class="form-group" style="height: 100%;">
                        <div class="row">
                          <div class="col-sm-4 text-center">
                            <img src="images/image 94.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Om, 15 years" class="img-fluid rounded-pill img-thumbnail" height="150">
                          </div>
                          <div class="col-sm-8">
                            <h5 class="text-white pl-sm-2 font-weight-bold font">Om, 15 years</h5>
                            <div class=" text-white  wordsaying font1 mt-3">
                              &#8220; I had an awesome time
                              learning coding with Code-
                              Gurukul. Coding never felt so
                              easy. My teacher always helped
                              me to solve my problems, online
                              as well as offline.&#8221;
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-4 mb-lg-0">
                      <div class="form-group" style="height: 100%;">
                        <div class="row">
                          <div class="col-sm-4 text-center mt-3">
                            <img src="images/image 93.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Advika, 9 years" class="rounded-pill img-fluid img-thumbnail">
                          </div>
                          <div class="col-sm-8 mt-4">
                            <h5 class="text-white pl-sm-2 font-weight-bold font ">Advika, 9 years</h5>
                            <div class=" text-white  wordsaying font1 mt-3">

                              &#8220;I loved the way my mentor
                              inspired me to look at problems
                              as opportunities. I have already
                              started attempting to apply my
                              coding skills to my everyday
                              activities.&#8221;
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-4 mb-lg-0">
                      <div class="form-group" style="height: 100%;">
                        <div class="row">
                          <div class="col-sm-4 text-center mt-3">
                            <img src="images/image 95.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Mahi, 10 years" class="img-fluid rounded-pill img-thumbnail">
                          </div>
                          <div class="col-sm-8 mt-4">
                            <h5 class="text-white pl-sm-2 font-weight-bold font">Mahi, 10 years</h5>
                            <div class=" text-white  wordsaying font1 mt-3">

                              &#8220; Code-Gurukul has taught me
                              how to enjoy curricular and
                              co curricular activities. I had so
                              much fun learning new things
                              everyday. Super excited to join
                              the next class.&#8221;<br>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>
            <br>
          </div>
        </div>
        <!-- parents saying    -->
        <div class="ParentSaying">
          <div class="container-fluid">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <br>
                  <h3 class="text-center font font-weight-bold" style="color: #BA2E5F;">What parents are saying about Code-Gurukul</h3>
                  <div class="row mt-4">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-5 text-center">
                          <br> <img src="images/image 96.svg" alt="Code-Gurukul" title="Parent - Mrs. Urmila Kabra" class="img-fluid " height="152">

                          <p class="font1 font-weight-bold wording mt-2">Mrs. Urmila Kabra</p>
                        </div>
                        <div class="col-sm-7 wording font1">
                          <br> As a parent and as a teacher I believe my
                          daughters found a really good
                          personalized fit with Code-Gurukul. The
                          enjoyable learning, Focus on life essential
                          skills and encouragement to apply
                          practically what has been learnt has been
                          the highlight for me.
                        </div>
                        <br>
                        <div class="col-sm-5 text-center">
                          <br><br><img src="images/image 16.svg" alt="Code-Gurukul" title="Parent - Mrs. Nupur Goel" class=" img-fluid" height="152">
                          <p class="font1 font-weight-bold wording mt-2">Mrs. Nupur Goel</p>
                        </div>
                        <div class="col-sm-7 wording font1">
                          <br><br>My child gets excited and it boosts his
                          confidence as the results can be seen
                          immediately after doing an activity. He
                          looks forward for his next challenge in this
                          journey of coding. I can feel his sense of
                          accomplishment and I believe this will
                          carry him a long way into his life and
                          career.
                        </div>
                        <div class="col-sm-5 text-center">
                          <br><br><img src="images/image 97.svg" alt="Code-Gurukul" title="Parent - Mr. Amey Jog" class=" img-fluid" height="152">
                          <p class="font1 font-weight-bold wording mt-2">Mr. Amey Jog</p>
                        </div>
                        <div class="col-sm-7 wording font1">
                          <br><br>My son's enthusiasm at every activity and
                          every session has given me the confidence
                          to take him further in the journey of coding.
                          The rewards and accomplishments
                          coupled with importance of honesty,
                          integrity and such other values should be
                          the firm steps in the right direction for my
                          young son.
                        </div>
                      </div>
                      <br>
                    </div>
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-5 text-center">
                          <br><img src="images/image 18.svg" alt="Code-Gurukul" title="Parent - Mr. Abhijeet Thigle" class="img-fluid" height="150">
                          <p class="font1 font-weight-bold wording mt-2">Mr. Abhijeet Thigle</p>
                        </div>
                        <div class="col-sm-7  wording font1">
                          <br> The continuous support and
                          encouragement from the teacher and the
                          complete team has helped my child overcome
                          the barriers in learning something new
                          especially with no family background in this
                          subject. The practical and real world
                          examples and applications have maintained
                          my son's interest in coding.
                        </div>
                        <br>
                        <div class="col-sm-5 text-center">
                          <br><br><img src="images/image 17.svg" alt="Code-Gurukul" title="Parent - Mr. Shailesh Laddha" class="img-fluid" height="152">
                          <p class="font1 font-weight-bold wording mt-2">Mr. Shailesh Laddha</p>
                        </div>
                        <div class="col-sm-7  wording font1">
                          <br><br> Keeping my daughter at the peak of her
                          interest towards every session has been the
                          most remarkable experience for me till now. I
                          think the teaching methodology as well as
                          the personal touch between two sessions
                          may have played a major role in creating this
                          fantastic experience for us.
                        </div>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>
            <br>
          </div>
        </div>
        <br>
        <!-- our System -->
        <div class="container-fluid" id="ourSystem">
          <div class="col-sm-12">
            <h3 class="text-center ourSystem font-weight-bold font">Our system</h3>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="text-center">
                  <img src="images/IMG_0843 (5).svg" alt="Code-Gurukul" title="Best Way to Learn Coding | Book a Free Trial Class" height="312" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-5">
                <span class="text-center">
                  <br>
                  <h3 class="font font-weight-bold text-left mt-5"><b>Choose from a range of courses </b></h3>
                  <p class="font1 text-left"> Choose the most appropriate course for
                    your child. Our courses are created
                    considering the age of the child. You can
                    <b>book a trial class</b> before you make the
                    payment completly free of cost!
                  </p>
                </span>
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <span class="text-center">
                  <br><br>
                  <h3 class="font text-left"><b>Schedule a class at any time</b></h3>
                  <p class="font1 text-left">You decide the date and time of the
                    class, thus there are <b>no missed
                      classes!</b> We recommend your child
                    attend class atleast twice a week.
                  </p>
                </span>
              </div>
              <div class="col-sm-5">
                <div class="text-center">
                  <img src="images/IMG_0842 (1).svg " alt="Code-Gurukul" title="Schedule Your Classes" height="304" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="text-center">
                  <img src="images/IMG_0841 (1).svg " alt="Code-Gurukul" title="Personalized Attention from Code Gurukul" height="338" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-5">
                <span class="text-center">
                  <h3 class="font text-left mt-5"><b><br>
                      Attend the class with a teacher from Code-Gurukul
                    </b></h3>
                  <p class="font1 text-left">Your child can have personalized
                    attention from the 1:1 classes. Learn by
                    doing and complete several mini projects
                    that will help your child develop an online
                    portfolio.
                  </p>
                </span>
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <span class="text-center">
                  <h3 class="font text-left"><b><br>
                      Get Certificates and Rewards
                    </b></h3>
                  <p class="font1 text-left">On completion of the course your
                    child will recieve certification
                    according to the course. opportunity
                    to interact with industry experts for
                    future guidance.
                  </p>
                </span>
              </div>
              <div class="col-sm-5">
                <div class="text-center">
                  <img src="images/IMG_0840 (1).svg" alt="Code-Gurukul" title="Earn Certificate and Exciting Rewards" height="287" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
        </div>
        <!-- Our System close -->
        <!-- courses and prices -->
        <div class="coursesAndPrices deskcoursesAndPrices" id="coursesAndPrices">

          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <br>
                <h3 class="font font-weight-bold pt-5 mt-3 px-2">Curriculum and Pricing</h3>
              </div>
              <div class="col-sm-12 font1">
                <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 px-4">
                    The course appropriate to your child's age is divided into three modules. Subsequent modules have
                    increasing complexity. We deliver personalized 1:1 live interactive sessions between your child and
                    the teacher. We do not assume any prior knowledge of coding so that any child can learn to code.
                  </div>
                  <div class="col-sm-1"></div>
                </div>
              </div>
              &nbsp;
              <!-- <div class="col-sm-12">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="col-sm-12">
        <div class="row no-gutters">
          <div class="col-sm-10 Prices">
            <div id="border">
              <div class="row">
                <div class=" col-sm-4">
                  <br><br>
                  <h3 class="font-weight-bold text-lg font1 ml-3">Free Class!</h3><br><br>
                </div>
                <div class="col-sm-8 font1 font-weight-bold">
                  <br>
                  <h6><br>Your first class is on us! Attend a trial class completely
                    free of cost! All you need is a laptop/ computer and
                    an internet connection!</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2 freeclass btn">
            <a href="registration.php">
              <h3 class="btn btnNavbar font-weight-bold font text-lg mt-2"><br>Book a free<br>class/Register</h3>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-1"></div>
  </div>
</div> -->
              &nbsp;
              <div class="col-sm-12">
                <h3 class="d-flex justify-content-center font1 font-weight-bold">Select age group</h3>
              </div>
            </div>
          </div>
          &nbsp;
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="col-sm-12">
                  <div class="row no-gutters">
                    <div class="col-sm-4">
                      <button type="button" id="BegineerButton" class="btn rounded-0 border-dark btn-lg col-sm-12 font1">Upto 9 years <br>
                        (Beginner)</button>
                    </div>
                    <div class="col-sm-4">
                      <button type="button" id="IntermediateButton" class="btn rounded-0  border-dark btn-lg col-sm-12 font1">9-12 years <br>
                        (Intermediate)
                      </button>
                    </div>
                    <div class="col-sm-4">
                      <button type="button" id="AdvancedButton" class="btn rounded-0 border-dark btn-lg col-sm-12 font1">13-14 years <br>
                        (Advanced)</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </div>


          &nbsp;

          <div class="col-sm-12 container-fluid" id="BeginnerParts">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="card-group">
                      <!-- card 1 -->
                      <div class="col-sm-4 d-flex pb-3">
                        <div class="card w-100">
                          <div class="card-header">
                            <h5 class=" font-weight-bold font1"><br>MODULE 1
                              <span class=" float-right">8 Classes</span>
                            </h5>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                            <span class="card-text font1">
                              Block based programming, Sequences and loops,Events.
                            </span>
                          </div>
                          <div class="card-footer bg-white border-white">
                            Certification for Proficiency in basics
                            of coding.
                            <br><br>
                            <h3 class="text-center font-weight-bold font1">
                              <span class="india-price">
                                &#8377; <?= get_module_data(1, 1, 4) ?>
                              </span>
                              <span class="non-india-price" style="display: none;">
                                US$ <?= get_module_data(1, 1, 5) ?>
                              </span>
                            </h3>
                            </span>
                            <div class="text-center">

                              <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                                Buy Now </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- card 2 -->
                      <div class="col-sm-4 d-flex pb-3">
                        <div class="card w-100">
                          <div class="card-header">
                            <h5 class=" font-weight-bold font1"><br>MODULE 2
                              <span class=" float-right">40 Classes</span>
                            </h5>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title font1 font-weight-bold">CURRICULUM
                              <span class="float-right font-weight-normal text-dark wording">MODULE 1 +</span>
                            </h5>

                            <span class="card-text font1 ">

                              Algorithms, Conditionals and Variables, Extended loops, Functions, Basics of app development, Introduction
                              to User Interface/User Experience.
                            </span>
                          </div>
                          <div class="card-footer bg-white border-white">
                            Basic App Developer and Game Developer Certification
                            <br><br>
                            <h3 class="text-center font-weight-bold font1">
                              <span class="india-price">
                                &#8377; <?= get_module_data(1, 2, 4) ?>
                              </span>
                              <span class="non-india-price" style="display: none;">
                                US$ <?= get_module_data(1, 2, 5) ?>
                              </span>
                            </h3>
                            </span>
                            <div class="text-center">
                              <button class="btn buynow btn-lg col-sm-8 rounded mt-2 shado" onclick="buyNow()">
                                Buy Now </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- card 3 -->
                      <div class="col-sm-4 d-flex pb-3 ">
                        <div class="card w-100">
                          <div class="card-header">
                            <h5 class=" font-weight-bold font1"><br>MODULE 3
                              <span class="float-right">100 Classes</span>
                            </h5>
                          </div>
                          <div class="card-body">
                            <h5 class="card-title font1 font-weight-bold">CURRICULUM
                              <span class="float-right font-weight-normal text-dark wording">MODULE 2 +</span>
                            </h5>
                            <span class="card-text font1">

                              Functions, Basics of User Interface/User Experience, Interactive gaming apps, Utility apps, Introduction to Artificial Intelligence.
                          </div>
                          <div class="card-footer bg-white border-white">
                            Course certification, Interaction with Industry Experts
                            <br><br>
                            <h3 class="text-center font-weight-bold font1">
                              <span class="india-price">
                                &#8377; <?= get_module_data(1, 3, 4) ?>
                              </span>
                              <span class="non-india-price" style="display: none;">
                                US$ <?= get_module_data(1, 3, 5) ?>
                              </span>
                            </h3>
                            </span>
                            <div class="text-center">
                              <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                                Buy Now </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>


          <!-- Intermediate Modules -->
          <div class="col-sm-12" id="IntermediateParts">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <div class="col-sm-12">
                  <div class="row">
                    <!-- card 1 -->
                    <div class="col-sm-4 d-flex pb-3">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 1
                            <span class=" float-right">8 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                          <span class="card-text font1">

                            Block based programming,Sequences and loops,Events and Algorithms, Debugging.
                          </span>
                        </div>
                        <div class="card-footer bg-white border-white">
                          <br><br>Certification for Proficiency in basics
                          of coding
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(2, 1, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(2, 1, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card 2 -->
                    <div class="col-sm-4 d-flex pb-3 ">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 2
                            <span class=" float-right">40 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM
                            <span class="float-right font-weight-normal text-dark wording">MODULE 1 +</span>
                          </h5>
                          <span class="card-text font1">

                            Advanced programming concepts,Algorithms, Conditionals and Variables,Extended loops, Functions and
                            Basics of application development,Introduction to User Interface/User Experience.
                        </div>
                        <div class="card-footer bg-white border-white">
                          Basic Application Developer and Game Developer Certification
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(2, 2, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(2, 2, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card 3 -->
                    <div class="col-sm-4 d-flex pb-3">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 3
                            <span class="float-right">100 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM
                            <span class="float-right font-weight-normal text-dark wording">MODULE 2 +</span>
                          </h5>
                          <span class="card-text font1">

                            Advanced Application Development,Interactive Game design,Web Design and Artificial intelligence.
                        </div>
                        <div class="card-footer bg-white border-white">
                          Course certification, Interaction with Industry Experts
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(2, 3, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(2, 3, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded-corner mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          <!-- Advanced Modules -->
          <div class="col-sm-12" id="AdvancedParts">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <div class="col-sm-12">
                  <div class="row">
                    <!-- card 1 -->
                    <div class="col-sm-4 d-flex pb-3">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 1
                            <span class=" float-right">8 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                          <span class="card-text font1">
                            Block based programming,Sequences and Loops,Events and Algorithm,Debugging, Variables.
                        </div>
                        <div class="card-footer bg-white border-white">
                          Certification for Proficiency in basics
                          of coding
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(3, 1, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(3, 1, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card 2 -->
                    <div class="col-sm-4 d-flex pb-3">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 2
                            <span class=" float-right">40 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM
                            <span class="float-right font-weight-normal text-dark wording">MODULE 1 +</span>
                          </h5>
                          <span class="card-text font1">
                            Advanced programming concepts,Algorithms,Conditionals and Variables,Basics of game development and
                            Basics of application development,Introduction to User Interface/User Experience.
                        </div>
                        <div class="card-footer bg-white border-white">
                          Basic App Developer and Game Developer Certification
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(3, 2, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(3, 2, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- card 3 -->
                    <div class="col-sm-4 d-flex pb-3">
                      <div class="card w-100">
                        <div class="card-header">
                          <h5 class=" font-weight-bold font1"><br>MODULE 3
                            <span class=" float-right">100 Classes</span>
                          </h5>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title font1 font-weight-bold">CURRICULUM
                            <span class="float-right font-weight-normal text-dark wording">MODULE 2 +</span>
                          </h5>
                          <span class="card-text font1">
                            Interactive game design,Advanced Application Development,Avanced Web Development,Projects on Artificial Intelligence.
                        </div>
                        <div class="card-footer bg-white border-white">
                          Course certification, Interaction with Industry Experts.
                          <br><br>
                          <h3 class="text-center font-weight-bold font1">
                            <span class="india-price">
                              &#8377; <?= get_module_data(3, 3, 4) ?>
                            </span>
                            <span class="non-india-price" style="display: none;">
                              US$ <?= get_module_data(3, 3, 5) ?>
                            </span>
                          </h3>
                          </span>
                          <div class="text-center">
                            <button class="btn buynow btn-lg col-sm-8 rounded mt-2" onclick="buyNow()">
                              Buy Now </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          <br>



        </div>




        <!-- meet Founders -->

        <div class="CoFounders container-fluid">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-12">
                <br>
                <h3 class="text-center text-white font font-weight-bold">Meet the Founders</h3>
                &nbsp;
              </div>
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <div class="text-center text-white ">
                  <img src="images/Meenakshi.svg" alt="Code-Gurukul" title="Meenakshi, Co-Founder | Code-Gurukul" height="255" class="img-fluid rounded-pill"><br><br>
                  <h3 class="text-center font font-weight-bold">Meenakshi</h3>
                  <h6 class="text-center font1">Fun-loving Technocrat</h6>
                </div>
                <br>
                <p class="text-white text-left font1"> A Computer Science Engineer, she joined <b>KPIT & IBM </b>to join the technical elites,
                  believing to associate only with best! She handles the content development at Code-Gurukul and makes sure the young
                  minds will get the best in class learning deliverables!</p>
              </div>

              <div class="col-sm-5">
                <div class="text-center text-white ">
                  <img src="images/image 15.svg" alt="Code-Gurukul" title="Rekha, Co-Founder | Code-Gurukul" height="255" class="text-center img-fluid"><br><br>
                  <h3 class="text-center font font-weight-bold">Rekha</h3>
                  <h6 class="text-center font1">Cool-headed Academician</h6>
                </div>
                <br>
                <p class="text-white  text-left font1">Always passionate about imparting education, she kept
                  on taking efforts at personal levels after completing her
                  Computer Science Engineering and then working with
                  <b>Infosys & TCS</b>. She trains the Teachers and makes sure the
                  gamified fun loving approach to imparting values and
                  technical skills via coding to children is ensured in the
                  right spirit!
                </p>
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
        </div>

        <!-- Footer -->

        <div class="footer">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
                <br><br>
                <!-- <p><a href="#" class="text-dark font1">Home</a></p> -->
                <p><a href="#coursesAndPrices" class="text-dark font1">Curriculum and Pricing</a>
                <p><a href="#childSays" class="text-dark font1">Testimonials</a></p>
                <p><a href="aboutuss.php" class="text-dark font1">About Us</a></p>
                <p><a href="priyacypolicy.php" class="text-dark font1">Privacy Policy</a></p>
                <p><a href="termacondition.php" class="text-dark font1">Terms And Conditions</a></p>
                <p><a href="help_FAQS.php" class="text-dark font1">Help And FAQ'S</a></p>
                <p><a href="cancellation_policy.php" class="text-dark font1">Cancellation Policy</a></p>


                <p class="col-xs-12 font1  mt-5"> Or call us at<br>+91 9511841742 <br>+91 7506262683<br>+971 50 217 0872</p>

                <p class="mt-4">Emails</p>
                <p><a href="mailto:hr@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Mail to: hr@code-gurukul.com" height="22"> hr@code-gurukul.com</a></p>
                <p><a href="mailto:support@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Contact Support" height="22"> support@code-gurukul.com</a></p>
                <!-- <p><a href="#" class="text-dark font1">About us </a></p>
            <p><a href="#" class="text-dark font1">Curriculum</a></p> -->

                <!-- <div class="row">
              <div class="col-sm-5">
                <p><a href="#" class="text-dark font1">Terms and Condition</a></p>
                <p><a href="#" class="text-dark font1">Privacy policy</a></p>
                <p><a href="#" class="text-dark font1">Help center</a></p>
              </div>  
            </div> -->
              </div>
              <div class="col-sm-5">
                <br>
                <form id="contact_us">
                  <br>
                  <h3 class="text-center font-weight-bold font">Contact Us</h3>
                  <label>Name</label>
                  <input type="text" name="name" class="form-control font1" required>
                  <label>Email</label>
                  <input type="email" name="email" class="form-control font1" required>
                  <label>Message</label>
                  <textarea name="message" id="Message" cols="30" rows="5" class="form-control" required></textarea><br>
                  <div class="row">
                    <div class="col-sm-5">
                      <button type="submit" id="contact_us_btn" class="btn freeclass font-weight-bold rounded-corner col-sm-12 font">Send</button>
                    </div>
                    <div class="col-sm-3"></div>

                  </div>
                </form>
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
  </div>
  </div>

  <!-- modal close -->
  <!-- Back to top -->

  <a id="button" href="#" onclick='history.pushState("", document.title, window.location.pathname);'></a>
  <!-- Back to top close -->
  <div class="mobileView mt-4">
    <!-- Mobile view Every child ca code -->
    <div class="container everyChildCode mt-5">
      <div class="row">
        <div class="col align-self-start mt-5">
          <h2 class="text-warning font font-weight-bold wording ">PLAY . LEARN . CREATE</h2>
          <h2 class="text-white  font font-weight-bold wording"> Our digital school (6 - 16 years of age) builds logic and develops creativity
            through coding.</h2>
          <p class=" text-white font1 font-weight-normal wording"> Live personalized sessions (1 teacher : 1 student)
            Experience customized to your child’s needs</p>
          <a href="registration.php"> <span class="btn btn-warning font-weight-bold rounded font1 btn-sm wording">
              Book a free class
            </span></a>
        </div>
        <div class="col align-self-center container-fluid">
          <img src="images/Group 127.png" alt="Code-Gurukul" title="Best way to learn coding" class="img-fluid" height="200" width="250">
        </div>
      </div>
      &nbsp;
    </div>
    <!-- Mobile view Every child can code end -->
    <div class="container">
      &nbsp;<h4 class="font-weight-bold font text-center">What your child will learn</h4>
      <p class="text-center font1">Your child can unlock their potential for creative thinking and problem solving
        with our practical lessons.</p>
      <div class="row">
        <div class="col align-self-start ml-5">
          <div class="card border-light">
            <img class="card-img-top" src="images/d.svg" alt="Code-Gurukul" title="Building blocks of coding" class="img-fluid" width="114">
            <div class="card-body1 text-center">
              <p class="card-text font1 mb-3 wording">Building Blocks <br> of Coding</p>
            </div>
          </div>
          <br>
        </div>
        <div class="col align-self-center mr-5">
          <div class="card border-light ">
            <img class="card-img-top" src="images/c.svg" alt="Code-Gurukul" title="Website Designing">
            <div class="card-body1 text-center">
              <p class="card-text font1 wording mb-3">Website <br>Designing</p>
            </div>
          </div>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start ml-5">
          <div class="card border-light ">
            <img class="card-img-top" src="images/F.svg" alt="Code-Gurukul" title="Game Development">
            <div class="card-body1 text-center">
              <p class="card-text font1 wording mb-3">Game <br> Development</p>
            </div>
          </div>
          <br>
        </div>
        <div class="col align-self-center mr-5">
          <div class="card border-light">
            <img class="card-img-top" src="images/e.svg" alt="Code-Gurukul" title="App Development">
            <div class="card-body1 text-center">
              <p class="card-text font1 wording mb-3">App <br>Development</p>
            </div>
          </div>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start"></div>
        <div class="col align-self-center">
          <div class="card border-light">
            <img class="card-img-top" src="images/b.svg" alt="Code-Gurukul" title="Artificial Intelligence, Machine Learning">
            <div class="card-body1 text-center">
              <p class="card-text font1 mb-2 wording">Artificial Intelligence,<br>Machine Learning</p>
            </div>
          </div>
        </div>
        <div class="col align-self-end"></div>
      </div>
      <br>
    </div>
    <div class="container-fluid px-5 py-3 backgroundImg1">
      <h5 class="text-center text-white font-weight-bold font">Your kid’s journey with <br>Code-Gurukul</h5>
      <div class="row">
        <div class="col mx-1">
          <img src="images/a.svg" alt="Code-Gurukul" title="Kid's Journey - Free First Class" class="img-fluid">
          <div class=" text-left text-white font1 wording2">
            <p>Attend your
              first class
              completely FREE
              of charge</p>
          </div>
        </div>
        <div class="col mx-1">
          <img src="images/Mask Group-1.svg" alt="Code-Gurukul" title="Kid's Journey - Building Blocks" class="img-fluid">
          <div class="text-left  text-white font1 wording2">
            Building Blocks for
            the Journey in the
            Programming World
          </div>
        </div>
        <div class="col mx-1">
          <img src="images/Mask Group-2.svg" alt="Code-Gurukul" title="Kid's Journey - App Development | Game Development" class="img-fluid">
          <div class=" text-left  text-white font1 wording2">
            Basics of App Development
            and Simple Game
            Development
          </div>
        </div>
        <div class="col mx-1">
          <img src="images/Mask Group-3.svg" alt="Code-Gurukul" title="Kid's Journey - Website Development | App Development | Interactive Game Development" class="img-fluid">
          <div class="text-left  text-white font1 wording2">
            Website Development, App
            Development and Interactive
            Game Development
          </div>
        </div>
      </div>
      <div class="row">
        <img src="images/Group 136 (1).svg" alt="Code-Gurukul" title="Kid's Journey Progess Line" class="img-fluid">
      </div>
    </div>

    <!-- why coding -->
    <div class="container-fluid">
      <h4 class="text-center font-weight-bold font py-3">Why coding?</h4>
      <div class="row">
        <div class="col align-self-start ml-5 mt-3">
          <img src="images/Group 130.svg" alt="Code-Gurukul" title="Academic Performance" class="img-fluid">
          <p class="font-weight-bold text-center  font1 mt-1 wording">Coding Improves Academic Performance</p>
        </div>
        <div class="col align-self-start mr-5 mt-3">
          <img src="images/Group 129.svg" alt="Code-Gurukul" title="Creativity" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Coding Fosters Creativity</p>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start ml-5 mt-3">
          <img src="images/Group 117.svg" alt="Code-Gurukul" title="How to Think" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Coding Teaches You How to Think</p>
        </div>
        <div class="col align-self-start mr-5 mt-3">
          <img src="images/Group 118.svg" alt="Code-Gurukul" title="Problem Solving Skills" class="img-fluid" height="228">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Coding Improves Problem Solving Skills</p>
        </div>
      </div>
    </div>

    <!-- Mobile view why coding end -->
    <!-- Mobile view Why Codegurukul start -->
    <div class="container-fluid">
      <h4 class="text-center font-weight-bold font mt-4">Why Code-Gurukul?</h4>
      <h6 class="text-center font-weight-bold font1 wording ml-5 mr-5">We at Code-Gurukul nurture your child's development.</h6>
      <div class="row">
        <div class="col align-self-start ml-5 mt-3">
          <img src="images/Group 119.svg" alt="Code-Gurukul" title="Build Attitude" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Positive Attitude Building</p>
        </div>
        <div class="col align-self-start mr-5 mt-3">
          <img src="images/Group 120.svg" alt="Code-Gurukul" title="Build Confidence" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Confidence Personality Development</p>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start ml-5 mt-3">
          <img src="images/Group 121.svg" alt="Code-Gurukul" title="Practice Makes Perfect" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Learn by Practice</p>
        </div>
        <div class="col align-self-start mr-5 mt-3">
          <img src="images/Group 122.svg" alt="Code-Gurukul" title="All-round Learning" class="img-fluid">
          <p class="font-weight-bold text-center text-sm font1 mt-1 wording">Social and Emotional Learning</p>
        </div>
      </div>
    </div>

    <!-- Mobile view why codegurukul end-->

    <div class="container backgroundimg childSays" id="childSays">
      <br>
      <h3 class="text-center text-white font-weight-bold font pt-5">What our students say</h3>
      <div class="row">
        <div class="col align-self-start">
          <div class="col-sm-4 text-center">
            <img src="images/childimage1.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Ojas, 7 years" class="img-fluid rounded-pill img-thumbnail" height="100">
          </div>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <h2 class="text-white pl-sm-2 font-weight-bold font wording">Ojas, 7 years</h2>
            <div class="text-left text-white  font1 wording">

              &#8220; I had a lot of fun learning
              to code with Code-Gurukul. I
              had never thought coding
              would be so much fun!!&#8221;
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class="col-sm-4 text-center">
            <img src="images/childimage3.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Om, 15 years" class="rounded-pill img-fluid img-thumbnail">
          </div>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <h2 class="text-white pl-sm-2 font-weight-bold font wording">Om, 15 years</h2>
            <div class="text-left text-white  wording font1">

              &#8220; I had an awesome time
              learning coding with Code-Gurukul.
              Coding never felt so
              easy. My teacher always helped
              me to solve my problems, online
              as well as offline.&#8221;
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class="col-sm-4 text-center">
            <img src="images/childimage2.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Advika, 9 years" class="img-fluid rounded-pill img-thumbnail" height="150">

          </div>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <h2 class="text-white pl-sm-2 font-weight-bold font wording">Advika, 9 years</h2>
            <div class="text-left text-white  wording font1">

              &#8220;I loved the way my mentor
              inspired me to look at problems
              as opportunities. I have already
              started attempting to apply my
              coding skills to my everyday
              activities.&#8221;
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start">
          <div class="col-sm-4 text-center">
            <br> <img src="images/childimage4.svg" alt="Code-Gurukul" title="Code-Gurukul Student - Mahi, 10 years" class="img-fluid rounded-pill img-thumbnail">
          </div>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <br>
            <h2 class="text-white pl-sm-2 font-weight-bold font wording">Mahi, 10 years</h2>
            <div class="text-left text-white  wording font1">

              &#8220; Code-Gurukul has taught me
              how to enjoy curricular and
              co curricular activities. I had so
              much fun learning new things
              everyday. Super excited to join
              the next class.&#8221;<br><br>
            </div>
          </div>
        </div>
      </div>
      <br><br>
    </div>
    <!-- parents saying -->
    <div class="container ParentSaying">
      <br>
      <h5 class="text-center font font-weight-bold" style="color: #BA2E5F;">What parents are saying about Code-Gurukul</h5>
      <div class="row">
        <div class="col align-self-start">
          <div class=" text-center">
            &nbsp;&nbsp;<img src="images/mobileparentimage1.svg" alt="Code-Gurukul" title="Parent - Mrs. Urmila Kabra" class="img-fluid ">
            <p class="font1 font-weight-bold wording mt-2">Mrs. Urmila Kabra</p>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" wording font1">
            As a parent and as a teacher I believe my
            daughters found a really good
            personalized fit with Code-Gurukul. The
            enjoyable learning, Focus on life essential
            skills and encouragement to apply
            practically what has been learnt has been
            the highlight for me.
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class=" text-center">
            &nbsp;&nbsp;<img src="images/mobileparentimage2.svg" alt="Code-Gurukul" title="Parent - Mrs. Nupur Goel" class=" img-fluid">
            <p class="font1 font-weight-bold wording mt-2">Mrs. Nupur Goel</p>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" wording font1">
            My child gets excited and it boosts his
            confidence as the results can be seen
            immediately after doing an activity. He
            looks forward for his next challenge in this
            journey of coding. I can feel his sense of
            accomplishment and I believe this will
            carry him a long way into his life and
            career.
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class="text-center">
            &nbsp;&nbsp;<img src="images/mobileparentimage3.svg" alt="Code-Gurukul" title="Parent - Mr. Amey Jog" class=" img-fluid">
            <p class="font1 font-weight-bold wording mt-2">Mr. Amey Jog</p>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" wording font1">
            My son's enthusiasm at every activity and
            every session has given me the confidence
            to take him further in the journey of coding.
            The rewards and accomplishments
            coupled with importance of honesty,
            integrity and such other values should be
            the firm steps in the right direction for my
            young son.
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class=" text-center">
            &nbsp;&nbsp;<img src="images/mobileparentimage4.svg" alt="Code-Gurukul" title="Parent - Mr. Abhijeet Thigle" class="img-fluid">
            <p class="font1 font-weight-bold wording mt-2">Mr. Abhijeet Thigle</p>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" wording font1">
            The continuous support and
            encouragement from the teacher and the
            complete team has helped my child overcome
            the barriers in learning something new
            especially with no family background in this
            subject. The practical and real world
            examples and applications have maintained
            my son's interest in coding.
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col align-self-start">
          <div class=" text-center">
            &nbsp;&nbsp;<img src="images/mobileparentimage5.svg" alt="Code-Gurukul" title="Parent - Mr. Shailesh Laddha" class="img-fluid ">
            <p class="font1 font-weight-bold wording mt-2">Mr. Shailesh Laddha</p>
          </div>
        </div>
        <div class="col align-self-center">
          <div class=" wording font1">
            Keeping my daughter at the peak of her
            interest towards every session has been the
            most remarkable experience for me till now. I
            think the teaching methodology as well as
            the personal touch between two sessions
            may have played a major role in creating this
            fantastic experience for us.
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <h3 class="text-center ourSystem font-weight-bold font mt-3">Our system</h3>
      <div class="row mt-3">
        <div class="col align-self-start">
          <div class="text-center">
            <img src="images/IMG_0843 (m).svg" alt="Code-Gurukul" title="Best Way to Learn Coding | Book a Free Trial Class" class="img-fluid">
          </div>
        </div>
        <div class="col align-self-center">
          <span class="text-center">
            <h2 class="font font-weight-bold wording text-left"><b>Choose from a Range of Courses</b></h2>
            <p class="font1 wording text-left">Choose the most appropriate course for
              your child. Our courses are created
              considering the age of the child. You can
              <b>book a trial class</b> before you make the
              payment completly free of cost!
            </p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start">
          <span class="text-center">
            <h2 class="font wording text-left"><b>Schedule a Class at Any Time</b></h2>
            <p class="font1 wording text-left">You decide the date and time of the
              class, thus there are <b>no missed
                classes!</b> We recommend your child
              attend class atleast twice a week.
            </p>
          </span>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <img src="images/IMG_0842 (m).svg" alt="Code-Gurukul" title="Schedule Your Classes" height="304" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start">
          <div class="text-center">
            <img src="images/IMG_0841 (m).svg" alt="Code-Gurukul" title="Personalized Attention from Code Gurukul" height="338" class="img-fluid">
          </div>
        </div>
        <div class="col align-self-center">
          <span class="text-center">
            <h2 class="font wording text-left"><b>
                Attend the Class with a
                Teacher from Code-Gurukul</b>
            </h2>
            <p class="font1 wording text-left">Your child can have personalized
              attention from the 1:1 classes. Learn by
              doing and complete several mini projects
              that will help your child develop an online
              portfolio.
            </p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start">
          <span class="text-center">
            <h2 class="font wording text-left"><b>
                Get Certificates and Rewards
              </b></h2>
            <p class="font1 wording text-left">On completion of the course your
              child will recieve certification
              according to the course. Opportunity
              to interact with industry experts for
              future guidance.
            </p>
          </span>
        </div>
        <div class="col align-self-center">
          <div class="text-center">
            <img src="images/IMG_0840 (m).svg" alt="Code-Gurukul" title="Earn Certificate and Exciting Rewards" height="287" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    <!-- Our system ends -->
    <!-- Courses and pricing -->
    <div class="coursesAndPrices" id="coursesAndPrices">

      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <br>
            <h3 class="font font-weight-bold pt-5 mt-3">Curriculum and Pricing</h3>
          </div>
          <div class="col-sm-12 font1">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10 mt-2">
                The courses for each age group are divided into three modules with increasing complexity. Our packages
                offer
                1:1 live
                interactive sessions between the student and teacher, we do not assume any knowledge of coding so any child
                can learn to
                code. The packages are designed relative to ages of the children.
              </div>
              <div class="col-sm-1"></div>
            </div>
          </div>
          &nbsp;
        </div>
      </div>
      &nbsp;
      <!-- <div class="col-sm-12">
  <div class="row no-gutters">
    <div class="col-sm-1"></div>
    <div class="col-sm-8 Prices">
      <div id="border">
        <div class="row">
          <div class=" col-sm-3">
            <br>
            <h3 class="font-weight-bold text-lg font1 ml-3">Free Class!</h3><br>
          </div>
          <div class="col-sm-8 font1 font-weight-bold ml-2">
            <h6>Your first class is on us! Attend a trial class completely
              free of cost! All you need is a laptop/ computer and
              an internet connection!</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-2 freeclass btn">
      <a href="registration.php">
        <h3 class="btn btnNavbar font-weight-bold font text-lg mt-2">Book a free<br>class</h3>
      </a>
    </div>
    <div class="col-sm-1"></div>
  </div>
</div> -->
      &nbsp;
      <div class="col-sm-12">
        <h5 class="d-flex justify-content-center font1 font-weight-bold">Select age group</h5>
      </div>
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <div class="col-sm-12">
              <div class="row no-gutters">
                <div class="col-sm-4">
                  <button type="button" id="MobileBegineerButton" class="btn rounded-0 text-center  border-dark btn-lg col-sm-12 font1">Upto 9 years(Beginner)
                  </button>
                </div>
                <div class="col-sm-4">
                  <button type="button" id="MobileIntermediateButton" class="btn rounded-0  border-dark btn-lg col-sm-12 font1">9-12 years(Intermediate)
                  </button>
                </div>
                <div class="col-sm-4">
                  <button type="button" id="MobileAdvancedButton" class="btn rounded-0  border-dark btn-lg col-sm-12 font1">13-14 years(Advanced)</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2"></div>
        </div>
      </div>
      &nbsp;
      <div class="col-sm-12 container-fluid" id="MobileBeginnerParts">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="col-sm-12">
              <div class="row">
                <div class="card-group">
                  <!-- card 1 -->
                  <div class="col-sm-4 d-flex pb-3">
                    <div class="card w-100">
                      <div class="card-header">
                        <h4 class=" font-weight-bold font1"><br>MODULE 1
                          <span class="float-right">8 Classes</span>
                        </h4>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                        <span class="card-text font1">
                          Block based programming,Sequences and loops,Events.</span>
                      </div>
                      <div class="card-footer bg-white border-white">
                        Certification for Proficiency in basics
                        of coding.
                        <br><br>
                        <h3 class="text-center font-weight-bold font1">
                          <span class="india-price">
                            &#8377; <?= get_module_data(1, 1, 4) ?>
                          </span>
                          <span class="non-india-price" style="display: none;">
                            US$ <?= get_module_data(1, 1, 5) ?>
                          </span>
                        </h3>
                        </span>
                        <div class="text-center">

                          <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                            Buy Now </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card 2 -->
                  <div class="col-sm-4 d-flex pb-3">
                    <div class="card w-100">
                      <div class="card-header">
                        <h4 class=" font-weight-bold font1"><br>MODULE 2
                          <span class="float-right">40 Classes</span>
                        </h4>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title font1 font-weight-bold">CURRICULUM
                          <span class="float-right font-weight-normal text-dark">MODULE 1 +</span>
                        </h5>
                        <span class="card-text font1 ">
                          Algorithms, conditionals and variables,Extended loops, functions,Basics of app development,Introduction
                          to User Interface/User Experience.</span>
                      </div>
                      <div class="card-footer bg-white border-white">
                        Basic App Developer and Game Developer Certification
                        <br><br>
                        <h3 class="text-center font-weight-bold font1">
                          <span class="india-price">
                            &#8377; <?= get_module_data(1, 2, 4) ?>
                          </span>
                          <span class="non-india-price" style="display: none;">
                            US$ <?= get_module_data(1, 2, 5) ?>
                          </span>
                        </h3>
                        </span>
                        <div class="text-center">
                          <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                            Buy Now </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- card 3 -->
                  <div class="col-sm-4 d-flex pb-3 ">
                    <div class="card w-100">
                      <div class="card-header">
                        <h4 class=" font-weight-bold font1"><br>MODULE 3
                          <span class="float-right">100 Classes</span>
                        </h4>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title font1 font-weight-bold">CURRICULUM
                          <span class="float-right font-weight-normal text-dark">MODULE 2 +</span>
                        </h5>
                        <span class="card-text font1">
                          Functions, Basics of User Interface/User Experience, Interactive gaming apps, utility apps and
                          Introduction to Artificial Intelligence.</span>
                      </div>
                      <div class="card-footer bg-white border-white">
                        Course certification, Interaction with Industry Experts
                        <br><br>
                        <h3 class="text-center font-weight-bold font1">
                          <span class="india-price">
                            &#8377; <?= get_module_data(1, 3, 4) ?>
                          </span>
                          <span class="non-india-price" style="display: none;">
                            US$ <?= get_module_data(1, 3, 5) ?>
                          </span>
                        </h3>
                        </span>
                        <div class="text-center">
                          <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                            Buy Now </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>


      <!-- Intermediate Modules -->
      <div class="col-sm-12" id="MobileIntermediateParts">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="col-sm-12">
              <div class="row">
                <!-- card 1 -->
                <div class="col-sm-4 d-flex pb-3">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 1
                        <span class="float-right">8 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                      <span class="card-text font1">

                        Block based programming,Sequences and loops,Events and Algorithms, debugging.</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      <br><br>Certification for Proficiency in basics
                      of coding
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(2, 1, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(2, 1, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- card 2 -->
                <div class="col-sm-4 d-flex pb-3 ">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 2
                        <span class="float-right">40 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM
                        <span class="float-right font-weight-normal text-dark">MODULE 1 +</span>
                      </h5>
                      <span class="card-text font1">
                        Advanced programming concepts,Algorithms, conditionals and variables,Extended loops, functions
                        and Basics of application development,introduction to User Interface/User Experience.</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      Basic Application Developer and Game Developer Certification
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(2, 2, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(2, 2, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- card 3 -->
                <div class="col-sm-4 d-flex pb-3">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 3
                        <span class="float-right">100 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM
                        <span class="float-right font-weight-normal text-dark">MODULE 2 +</span>
                      </h5>
                      <span class="card-text font1">

                        Advanced Application Development,Interactive Game design,Web Design
                        and Artificial intelligence</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      Course certification, Interaction with Industry Experts
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(2, 3, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(2, 3, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
      <!-- Advanced Modules -->
      <div class="col-sm-12" id="MobileAdvancedParts">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10">
            <div class="col-sm-12">
              <div class="row">
                <!-- card 1 -->
                <div class="col-sm-4 d-flex pb-3">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 1
                        <span class="float-right">8 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM</h5>
                      <span class="card-text font1">
                        Block based programming,Sequences and loops,Events and Algorithm,Debugging,Variables</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      Certification for Proficiency in basics
                      of coding
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(3, 1, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(3, 1, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- card 2 -->
                <div class="col-sm-4 d-flex pb-3">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 2
                        <span class="float-right">40 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM
                        <span class="float-right font-weight-normal text-dark">MODULE 1 +</span>
                      </h5>
                      <span class="card-text font1">
                        Module 1+ Advanced programming concepts,Algorithms,Conditionals and Variables,Basics of game development and
                        Basics of application development , introduction to User Interface/User Experience</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      Basic App Developer and Game Developer Certification
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(3, 2, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(3, 2, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- card 3 -->
                <div class="col-sm-4 d-flex pb-3">
                  <div class="card w-100">
                    <div class="card-header">
                      <h4 class=" font-weight-bold font1"><br>MODULE 3
                        <span class="float-right">100 Classes</span>
                      </h4>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title font1 font-weight-bold">CURRICULUM
                        <span class="float-right font-weight-normal text-dark">MODULE 2 +</span>
                      </h5>
                      <span class="card-text font1">
                        Interactive game design,Advanced Application Development,Avanced Web Development
                        and Projects on Artificial intelligence</span>
                    </div>
                    <div class="card-footer bg-white border-white">
                      Course certification, Interaction with Industry Experts
                      <br><br>
                      <h3 class="text-center font-weight-bold font1">
                        <span class="india-price">
                          &#8377; <?= get_module_data(3, 3, 4) ?>
                        </span>
                        <span class="non-india-price" style="display: none;">
                          US$ <?= get_module_data(3, 3, 5) ?>
                        </span>
                      </h3>
                      </span>
                      <div class="text-center">
                        <button class="btn buynow btn-lg col-sm-8 rounded-corner" onclick="buyNow()">
                          Buy Now </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
      <br>
    </div>
    <!-- Courses and pricing end -->
    <!-- meet Founders -->

    <div class="CoFounders container-fluid">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12">
            <br>
            <h3 class="text-center text-white font font-weight-bold">Meet the Founders</h3>&nbsp;
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
            <div class="text-center text-white ">
              <img src="images/Meenakshi.svg" alt="Code-Gurukul" title="Meenakshi, Co-Founder | Code-Gurukul" height="255" class="img-fluid rounded-pill"><br><br>
              <h3 class="text-center font font-weight-bold">Meenakshi</h3>
              <h6 class="text-center font1"> Fun-loving Technocrat</h6>
            </div>
            <br>
            <p class="text-white text-left font1">A Computer Science Engineer, she joined <b>KPIT & IBM</b>
              to join the technical elites, believing to associate only
              with best! She handles the content development at
              Code-Gurukul and makes sure the young minds will
              get the best in class learning deliverables!</p>
          </div>

          <div class="col-sm-5">
            <div class="text-center text-white ">
              <img src="images/image 15.svg" alt="Code-Gurukul" title="Rekha, Co-Founder | Code-Gurukul" height="255" class="text-center img-fluid"><br><br>
              <h3 class="text-center font font-weight-bold">Rekha</h3>
              <h6 class="text-center font1"> Cool-headed Academician </h6>
            </div>
            <br>
            <p class="text-white  text-left font1">Always passionate about imparting education, she kept
              on taking efforts at personal levels after completing her
              Computer Science Engineering and then working with
              <b>Infosys & TCS</b>. She trains the Teachers and makes sure the
              gamified fun loving approach to imparting values and
              technical skills via coding to children is ensured in the
              right spirit!
            </p>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    </div>
    <div class="container footer">
      <div class="row">
        <div class="col-sm-5">
          <br>
          <form id="Mobile_contact_us">
            <br>
            <h1 class="text-center font-weight-bold font">Contact us</h1> <br>
            <label>Name</label>
            <input type="text" name="name" class="form-control font1" required>
            <label>Email</label>
            <input type="email" name="email" class="form-control font1" required>
            <label>Message</label>
            <textarea name="message" id="Message" cols="30" rows="5" class="form-control" required></textarea><br>
            <div class="row">
              <div class="col align-self-start">
                <button type="submit" id="Mobile_contact_us_btn" class="btn freeclass font-weight-bold rounded-corner col-sm-12 font">Send</button>
              </div>
              <!-- <div class="col  align-self-center ml-5">
                <p class="font1 mt-1 wording">Or call us at<br>+91 9511841742 <br> +91 7506262683<br>+971 50 217 0872</p>
              </div> -->
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col align-self-start ml-4">
          <!-- <p><a href="#" class="text-dark font1 mt-5">Home</a></p> -->
          <p><a href="#coursesAndPrices" class="text-dark font1">Curriculum and Pricing</a>
          <p><a href="#childSays" class="text-dark font1">Testimonials</a></p>
          <p><a href="aboutuss.php" class="text-dark font1">About Us</a></p>
          <p><a href="priyacypolicy.php" class="text-dark font1">Privacy Policy</a></p>
          <p><a href="termacondition.php" class="text-dark font1">Terms And Conditions</a></p>
          <p><a href="help_FAQS.php" class="text-dark font1">Help And FAQ'S</a></p>
          <p><a href="cancellation_policy.php" class="text-dark font1">Cancellation Policy</a></p>
          <p class="font1 mt-3">Or call us at<br>+91 9511841742 <br> +91 7506262683<br>+971 50 217 0872</p>
          <p class="mt-3">Emails</p>
          <p><a href="mailto:hr@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Mail to: hr@code-gurukul.com" height="22"> hr@code-gurukul.com</a></p>
          <p><a href="mailto:support@code-gurukul.com" class="text-dark"><img src="images/email.png" alt="Code-Gurukul" title="Contact Support" height="22"> support@code-gurukul.com</a></p>
          <!-- <p><a href="#" class="text-dark font1">About us </a></p>
              <p><a href="#" class="text-dark font1">Curriculum</a></p>
              <p><a href="#" class="text-dark font1">Terms and Condition</a></p>
              <p><a href="#" class="text-dark font1">Privacy policy</a></p>
              <p><a href="#" class="text-dark font1">Help center</a></p> -->
        </div>
      </div>
    </div>
  </div>

  <script>
    $.get("https://www.cloudflare.com/cdn-cgi/trace", function(data) {
      con = data.split("\n")[8];
      con = con.split("=")[1];
      console.log(con);
      if (con != "IN") {
        $(".india-price").hide();
        $(".non-india-price").show();
      }
    });
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
    $(function() {
      var navMain = $(".navbar-collapse");

      navMain.on("click", "a", null, function() {
        navMain.collapse('hide');
      });
    });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="javascript/HomepageV1.1.js"></script>
  <?php gtag(); ?>
</body>

</html>