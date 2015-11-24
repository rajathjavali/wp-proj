<?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location:../bproject/index.html');
}
?> 



 <?php include ('../header.php'); ?>
<?php include ('../navbar2.php'); ?>

<html>
<head>

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
<h1>Retrieve Attendance</h1>

	<form method="post" action="excel_attendance_uploader.php">
		<div>
			Semester:
			<select id="sem" required name="sem">
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
		<div>
			Department:
			<select id="dept" required name="dept">
				<option>ECE</option>
				<option>CSE</option>
				<option>ISE</option>
				<option>IT</option>
				<option>BT</option>
				<option>ME</option>
			</select>
		</div>
		<br/><br/>
		<div>
			Course Type:
			<select id="course" required name="course">
				<option>CORE</option>
				<option>LOCAL ELECTIVE</option>
				<option>GLOBAL ELECTIVE</option>
			</select>
		</div>
		<br/><br/>
		<div>
			Academic Year:
			<input type="number" name="acy" id="acy" min="2013" max="2025" value="2014">
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