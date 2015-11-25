<?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location:../bproject/index.html');
}
?> 



 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<html>
<head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="excel_uploader_sublist.js"></script>
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
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 600px;
          margin: auto;
          padding-top: 20px;
          padding-bottom: 20px;
          padding-right: 20px;
          padding-left: 20px;
        }  
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }
 </style>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

        <div class="box"><center><!DOCTYPE html>
<h1>Upload Attendance</h1><hr>
	<form method="post" action="excel_attendance_uploader.php">
          	<div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Semester</label>
                <div class="col-lg-9">
			<select id="sem" required name="sem" style="width:210px">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
			</select>
		</div>
		</div>
		<br/><br/>

          	<div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Department</label>
                <div class="col-lg-9">
			<select id="dept" required name="dept" style="width:210px">
				<option>ECE</option>
				<option>CSE</option>
				<option>ISE</option>
				<option>IT</option>
				<option>BT</option>
				<option>ME</option>
			</select>
		</div>
		</div>
		<br/><br/>
          	<div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Course type</label>
                <div class="col-lg-9">
			<select id="course" required name="course" style="width:210px">
				<option>CORE</option>
				<option>LOCAL ELECTIVE</option>
				<option>GLOBAL ELECTIVE</option>
			</select>
		</div>
		</div>
		<br/><br/>
          	<div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Academic year</label>
                <div class="col-lg-9">
			<input type="number" name="acy" id="acy" min="2013" max="2025" value="2014" style="width:210px">
		</div>
		</div>
		<br/><br/>
		<div id="b">

		</div>
		<input id="submit" onclick="retrieveSub()" type="button" value="Submit">
	</form>
	</center>
	</div>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="staff_management.php">Home</a></li>
  <li class="active">Select sem and course</li>
</ul>	
</body>
</html>