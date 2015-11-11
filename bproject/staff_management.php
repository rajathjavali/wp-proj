<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>


<?php


session_start();



// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>




<html>


<head>
	<title>Registration Management</title>

	<style>.error {color: #FF0000;}</style>
</head>
<body>
<div class="container">

	<h1>Registration Management</h1>
	<h3>Welcome User <?php echo $_SESSION['usn'];?></h3>
	<!-- <a href="form_stud.php">Register Student</a><br><br> -->


	<ul class="nav nav-pills nav-stacked">
   <li><a href="form_teach.php"><h4> <p class="text-primary"> Update Personal Profile  </p> </h4></a></li>
   <li><a href="sretrieve.php"><h4> <p class="text-warning"> Get Student Details </p> </h4></a></li>
   <li><a href="smonitor_ret.php"><h4> <p class="text-info"> Monitor Registered Student </p> </h4></a></li>
   <li><a href="sretrive_syllabus.php"><h4> <p class="text-primary"> Get core subject list  </p> </h4></a></li>
   <li><a href="sretrieve_elective.php"><h4> <p class="text-warning"> Get elective subject list  </p> </h4></a></li>
   
  
     
    </ul>
  </li>
</ul>
</div>
</body>
</html>
