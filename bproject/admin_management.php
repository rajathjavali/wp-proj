<?php include ('navbar.php'); ?>
<?php include ('header.php'); ?>
<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>



  <html>
    <head>
    <title>Department of ISE</title>
    
  <!-- Bootstrap -->
      <link href="css/bootstrap.css" rel="stylesheet" media="screen"> 
      <style type="text/css">
   body { background: #CCCCCC !important; } 
</style>
       <link href="css/docs.css" rel="stylesheet" media="screen"> 
      
       <link rel="stylesheet" type="text/css" href="css/style.css" /> 
      <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css" />
  <!-- js -->     
    <script src="js/jquery-1.7.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
  <script src="js/jquery.hoverdir.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <style>.error {color: #FF0000;}
            html,body {
    font: small sans-serif;
    margin: 0;
    padding: 0;
    border: 0;
    height: 100%;
}
#page {
    margin-left: 200px;
    height:100%;
    background-color: #CCCCCC;
}
#maincontent {
    float: right;
    width: 100%;
    height:100%;
    background-color: #CCCCCC;
}
#menuleftcontent {
    float: left;
    position: absolute;
    width: 250px;
    margin-left: -200px;
    background-color: #2B3E50;
    height: 95%;
    top:40px;
    bottom:0;
    overflow: scroll;
}
#topbar{
  background-color: white;
  position: relative;

}
#date {
      background: #badc55;
      color: white;
      float:right;
    }
</style>

    </head>
    <body bgcolor="#fof8ff">
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#336699;">
        <center>
          <div style="position:relative;">
          <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p></div>
          <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
          <p><h4><b>R V College of Engineering</b></h4></p>
          <p><h6>Mysore Road, RV Vidyaniketan Post, Bagalore - 560 059</h6></p>
        </div>    
          <div id="date">
         <center>
          <p> <h3>Add deadline for semister registration</h3></p>
          <form method="POST" action="add_deadline.php">
            <input type="datetime-local" name="deadline" step="1"><br>
           <p> <h3>Add deadline for elective Registration</h3></p>
            <input type="datetime-local" name="deadline_ele" step="1"><br> 
            <input type="submit" value="Add deadline date" name="Add deadline date" id="dead_line">
          </form>
        </center>
        </div>
          <!--p> <h3>Add deadline for semister registration</h3></p>
          <form method="POST" action="add_deadline.php">
            <input type="datetime-local" name="deadline" step="1"><br>
           <p> <h3>Add deadline for elective Registration</h3></p>
            <input type="datetime-local" name="deadline_ele" step="1"><br> 
            <input type="submit" value="Add deadline date" name="Add deadline date" id="dead_line">
          </form>
        </center>
      </div-->
            </div>

      <div id="menuleftcontent" class="leftSidebar">
        <ul id="menu" class="nav nav-pills nav-stacked">
         <li><h3>Welcome <?php echo $_SESSION['usn']; ?></h3></li><hr>
         <li><a href="aform_teach.php"><h5> <p class="text-info">Add Staff Details</p> </h5></a></li><hr>
         <li><a href="asretrieve.php"><h5> <p class="text-info"> Get Student Details </p> </h5></a></li><hr>
         <li><a href="amonitor.php"><h5> <p class="text-info"> Monitor Registered Student </p> </h5></a></li><hr>
         <li><a href="asretrive_syllabus.php"><h5> <p class="text-info"> Get core subject list  </p> </h5></a></li><hr>
         <li><a href="sretrieve_elective.php"><h5> <p class="text-info"> Get elective subject list  </p> </h5></a></li><hr>
         <li><a href="add_syllabus.php"><h5> <p class="text-info"> Add syllabus  </p> </h5></a></li><hr>
         <li><a href="send_NSAR.php"><h5><p class="text-info">Send NSAR list </p></h5></a></li><hr>
         <li><a href="send_NSSR.php"><h5><p class="text-info">Send NSSR list </p></h5></a></li>
        </ul>
        </div>
      
</div>
 
    </body>
  </html>
