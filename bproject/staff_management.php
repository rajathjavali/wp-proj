<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<?php include ('navbar2.php'); ?>

<!DOCTYPE html>
  <head>
  <title>Department of ISE</title>
  
  <!-- Bootstrap -->
      <!--link href="css/bootstrap.css" rel="stylesheet" media="screen"> 
      <style type="text/css">
        body { background: #CCCCCC !important; color: #FF6600 !important } 
        ul { padding:0 !important; margin:0 !important; white-space:nowrap !important; }
        li { width: 100% !important; list-style-type:none !important; display:inline-block!important; line-height: 1em !important;}
      </style>
      <link href="css/docs.css" rel="stylesheet" media="screen"> 
      <link rel="stylesheet" type="text/css" href="css/style.css" /> 
      <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" /-->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <link rel="stylesheet" href="css/owlcarousel/owl.carousel.css">
      <link rel="stylesheet" href="css/owlcarousel/owl.theme.css">
      <link rel="stylesheet" href="css/owlcarousel/owl.transitions.css">
  <!-- js -->     
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>

      <style>
        .banner { background-color: #686868; }
        #topbar
          {
            background-color: #686868;
            padding-top: 80px;
            padding-bottom: 40px;
          }
        .wrapper { 
          width: 30%;
          margin: 0 auto; 
        }
        .banner p {
          text-align: center;
          margin-top: -10px;
          display: block;
        }
        .banner img {
          float: left; 
          margin: 5px;
        }
        .banner span {
          padding-top: 50px;
          vertical-align:top;
        }
        .banner .ban2 span {
          padding-top: 50px;
        vertical-align:top;
        }
        #slider .item img
        {
            display: block;
            width: 100%;
            height: auto;
        }

        #owl-demo
        {
          background-color: #686868;
          color: #FFFFFF;
        }
        #owl-demo .owl-item
        {
          margin: 3px;
        }
        #owl-demo .owl-item img
        {
          display: block;
          width: 100%;
          height: auto;
        }

      </style>
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <div id="page">
      <div id="maincontent">
          <div class="banner" id="topbar" style="color:#FFFFFF;">
            <div class="banner">
                <div class="wrapper">
            <p style="color: #fff;"><img src="images/logo1.gif" style="width:80px; height:80px"><span style=""><h5>Rashtreeya Sikshana Samithi Trust</h5></span>
                     <span class="ban2"><h4><b>R V College of Engineering</b></h4></span>
                     <span class="ban2"><h6>Mysore Road,RV Vidyaniketan Post,Bangalore-560 059</h6></span></p>        
                </div>
            </div> 
          </div> 
        <hr>  

        <div id="owl-demo" style="padding-left: 30px; padding-right: 30px; background-color:#FFFFFF; color:#000000">

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/reg.png" alt="Owl Image">
          <p><center><strong>Automated Online Registration</strong></center></p>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/attendance.jpg" alt="Owl Image">
          <p><center><strong>Easy Attendance Management</strong></center></p>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/test.jpg" alt="Owl Image">
          <p><center><strong>Easy Marks Management</strong></center></p>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/report.jpg" alt="Owl Image">
          <p><center><strong>Report Generation</strong></center></p>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/nsarnssr.jpg" alt="Owl Image">
          <p><center><strong>NSAR List</strong></center>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/notif.png" alt="Owl Image">
          <p><center><strong>Alerts and Notifications</strong></center></p>
          </div>

          <div class="owl-item grayscale" style="width: 293px;">
          <img src="images/User.png" alt="Owl Image">
          <p><center><strong>Profile Management</strong></center></p>
          </div>

        </div>


        <script>
          $(document).ready(function() {

            $("#owl-demo").owlCarousel({

              autoPlay: 3000, //Set AutoPlay to 3 seconds

              items: 4,
              itemsDesktop: [1199, 3],
              itemsDesktopSmall: [979, 3]

            });
          }); 
        </script>

      </div>
    </div>
    <script>
      $("#owl-example").owlCarousel();
    </script>

   <div class="container marketing" style="padding-top:80px;">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="images/r.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Registration</h2>
          <p>Provides a hassle-free, fully automated, online registration process with efficient information storage for future use</p>
          <p><a class="btn btn-default" href="smonitor_ret.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/a.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Attendance Management</h2>
          <p>Paper-free solution to maintaining attendance with a provision of updation and downloading data through excel spreadsheets</p>
          <p><a class="btn btn-default" href="attendance_uploader_staff.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="images/m.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Marks Management</h2>
          <p>Aggregation of marks of students for the complete semester in one place to enable easy access when needed</p>
          <p><a class="btn btn-default" href="marks_uploader_staff.php" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div>
    </div>

    <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7" style="padding-left:50px; padding-right:50px; background-color:#66CCFF">
          <h2 class="featurette-heading">Notifications and alerts <span class="text-muted"><br>Easy commnunication between students and staff</span></h2>
          <p class="lead">Email based communication about registration dates,attendance and marks status so you never miss a deadline</p>
        </div>
        <div class="col-md-5" style="padding-top:110px">
          <img class="featurette-image img-responsive center-block" src="images/email.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5" style="padding-left:50px; padding-right:50px; background-color:#66CC99">
          <h2 class="featurette-heading">Mobile App  <span class="text-muted"><br>For students and teachers</span></h2>
          <p class="lead">Mobile Application for attendance and marks management to enable easy access from any mobile device at any time</p>
        </div>
        <div class="col-md-5 col-md-pull-7" style="padding-top:110px">
          <img class="featurette-image img-responsive center-block" src="images/android.jpg" alt="Generic placeholder image">
        </div>
      </div>
  </body>
  </html>
