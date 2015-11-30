<!DOCTYPE html>
<html>
  <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">
  </head>
  <style>
  #fd1 {
    position: fixed;
    top: 0.1em;
}
    .popupBox {
        display:none;
        position: absolute;
        width: 40%;
        height: 60%;
        left: 30%;
        top: 20%;
        background-color: white;
        color: black;
        border: 2px solid black;
        border-radius: 10px;
        z-index: 10;
    }
    #overLay {
        display:none;
        position: fixed;
        width: 100%;
        height: 100%;
        background-color: #707070;
        opacity: 0.7;
        z-index: 9;
        left: 0;
        top: 0;
    }
  </style>
 <body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="content/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
    <div class="navbar-wrapper" id="fd1">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#" id="x">Course Management System</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="staff_management.php">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registration <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="sapprove_stud.php">Approve Mentee Registration</a></li>
                     <li><a href="smonitor_ret.php">Monitor Registered Student</a></li>
                     <li><a href="sretrieve.php">Get Student Details</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="sretrive_syllabus.php">Get core subject list</a></li>
                     <li><a href="sretrieve_elective.php">Get elective subject list</a></li>                         
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Attendance <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="subject_students_attendance_staff.php">View attendance</a></li>
                    <li><a href="attendance_uploader_staff.php">Upload attendance</a></li>  
                    <li><a href="nsar_gen_staff.php">Generate NSAR list</a></li>                             
                  </ul>
                </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marks <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="subject_students_marks_staff.php">View marks</a></li>

                    <li><a href="marks_uploader_staff.php">Upload marks</a></li>                             

                  </ul>
                </li>
                <li><a href="form_teach.php">Edit Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div align="right">
          <div id="overLay"></div>
        <div class="popupBox" id="xPopup">
            <div style="background-color:#686868; color:#FFFFFF;padding-top:10px"><h1 align="center">Course Management System</h1><br/><br/></div>
        <hr>
        <p align='justify' style="padding-left:30px; padding-right:30px"><strong>RVCE Course Management System</strong> provides students and staff members a web based application to enable <strong>Course registration, Attendance and Marks Management. </strong>The portal has three separate view for students, staff and administrator. An interactive user interface, easy online storage of data for a long period of time, low maintainence and paper free eco friendly solution makes this an attractive alternative compared to conventional methods.</p>
        </div>
      </div>
    <script>
      var overlay = document.getElementById("overLay");
      var xpopup = document.getElementById("xPopup");
      //var ypopup = document.getElementById("yPopup");

      document.getElementById("x").onclick = function () {
          overlay.style.display = "block";
          xpopup.style.display = "block";
      };
      overlay.onclick = function () {
          overlay.style.display = "none";
          xpopup.style.display = "none";
      };
    </script> 
  </body>
</html>