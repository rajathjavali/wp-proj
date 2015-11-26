<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>

<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>
 
<!DOCTYPE html>
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
	  <script src="sublist.js"></script>
      <style>
        #topbar
        {
          background-color: #686868;
          padding-top: 70px;
          padding-bottom: 20px;
          position: relative;

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
    </head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
        <div style="position:relative;">
            <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
            </div>
            <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
            <p><h4><b>R V College of Engineering</b></h4></p>
            <p><h6>Mysore Road, RV Vidyaniketan Post, Bagalore - 560 059</h6></p>
          </center>
        </div>
        <hr>
        <div class="box"><center>
			<h1>Retreive Marks</h1><br>
				<form method="post" action="display_marks_stud.php">
				    <label for="select" class="col-lg-3 control-label" align="left">Semester</label>
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
					<br/><br/>
				    <label for="select" class="col-lg-3 control-label" align="left">Department</label>
				    <div class="col-lg-9">
						<select id="dept" required name="dept" style="width:210px">>
							<option>ECE</option>
							<option>CSE</option>
							<option>ISE</option>
							<option>IT</option>
							<option>BT</option>
							<option>ME</option>
						</select>
					</div>
					<br/><br/>
				    <label for="select" class="col-lg-3 control-label" align="left">Course type</label>
				    <div class="col-lg-9">
						<select id="course" required name="course" style="width:210px">
							<option>CORE</option>
							<option>LOCAL ELECTIVE</option>
							<option>GLOBAL ELECTIVE</option>
						</select>
					</div>
					<br/><br/>
				    <label for="select" class="col-lg-3 control-label" align="left">Academic year</label>
				    <div class="col-lg-9">
						<input type="number" name="acy" id="acy" min="2013" max="2025" value="2014" style="width:210px">
					</div>
					<br/><br/>
					<div id="b">

					</div>
					<input id="submit" onclick="retrieveSub()" type="button" value="Submit">
				</form>
			</center>
		</div>
				<hr>
			  <ul class="breadcrumb" id="footer" style="background-color:#202020">
			  <li><a href="management.php">Home</a></li>
			  <li class="active">Select Semester</li>
			</ul>
		</div>
	</div>
	
</body>
</html>