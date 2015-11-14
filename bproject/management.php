<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>

<?php 
     require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
      $db = new DB_CONNECT();
  if($db)
  {
?>


<html>


<head>
	<title>Registration Management</title>

	<style>.error {color: #FF0000;}</style>
</head>
<body>




	<script type="text/javascript">
      function change(){
       document.getElementById("reg").style.display = "none";
      // document.getElementById("reg").innerHTML="Deadline is crossed, You cannot register now";

  }
 
	</script>
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
<div >
	<h1>Registration Management</h1>
	<h3>Welcome User <?php echo $_SESSION['usn'];?></h3>
	

   <ul class="nav nav-pills nav-stacked">
   <?php 
 
    $today= Date("Y-m-d H:i:s");
    $qry="SELECT RegDeadline FROM admin where username='root'";
    $res=mysql_query($qry);
    $row = mysql_fetch_row($res);
    $Dealine= $row[0];
	
        
       if(strtotime($today)<strtotime($Dealine)) {?>
            <li><a id="reg" href="form_stud.php"><h4> <p class="text-primary"> Register Student  </p> </h4></a></li>
      <?php
 	}
 }
 	?>
  
   <li><a href="view_teachers.php"><h4> <p class="text-warning"> View teachers  </p> </h4></a></li>
   <li><a href="retrieve.php"><h4> <p class="text-info"> Get Student Details  </p> </h4></a></li>
   <li><a href="retrive_syllabus.php"><h4> <p class="text-primary"> Get core subject list  </p> </h4></a></li>
   <li><a id="ele" href="retrieve_elective.php"><h4> <p class="text-warning"> Get elective subject list  </p> </h4></a></li>
   <li><a href="registered_subject.php"><h4> <p class="text-info"> View Registered Subjects </p> </h4></a></li>
   <li><a href="registered_elective.php"><h4> <p class="text-primary"> View Registered Elective </p> </h4></a></li>

  
     
    </ul>
  </li>
</ul>





	<!-- <h4><a href="form_stud.php">Register Student</a><br><br>
	<a href="view_teachers.php">View teachers</a><br><br>
	<a href="retrieve.php">Get Student Details</a><br><br>
	<a href="retrive_syllabus.php">Get core subject list</a><br><br>
	<a href="retrieve_elective.php">Get elective subject list</a><br><br>
	<a href="registered_subject.php">View Registered Subjects</a><br><br>
	<a href="registered_elective.php">View Registered Elective</a><br><br></h4></h4>
	 -->




	</div>



</body>
</html>
