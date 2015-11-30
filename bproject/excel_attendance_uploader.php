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

        <div class="box"><center><!DOCTYPE html>
<?php 
require_once 'excel_reader2.php';
$file = $_POST['file'];
$data = new Spreadsheet_Excel_Reader($file);
$row = $data->rowcount($sheet_index=0);
$col = $data->colcount($sheet_index=0);


 require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();
$acy=$_POST['acy'];
$sem=$_POST['sem'];
$dept=$_POST['dept'];
$sub=$_POST['sub'];
$course=$_POST['course'];

$query = "SELECT S_Code from syllabus where sem='".$sem."' and 
		(Host_Dpt='".$dept."' or Host_Dpt='HSS') and acy='".$acy."' 
		and S_type='".$course."' and Name='".$sub."'";

$result = mysql_query($query);
$ccode='';
while($res=mysql_fetch_array($result))
{
	$ccode = $res['S_Code'];
}


$query = "INSERT INTO `attends`(`susn`, `status`, `cdte`, `ctme`, `ccode`, `acy`, `sem` ) VALUES ";
$i=2;
while($i<=$col){
	$j=2;
	while($j<=$row){
		//echo $data->val(1,$i);
		$datetime = explode(" ", $data->val('1',$i));
		$date = str_replace('/', '-', $datetime[0]);
		$date = date('Y-m-d', strtotime($date));
		//echo $datetime['0']."<br/>".$datetime['1']."<br/>";
		$query .= "('".$data->val($j,'1')."', '".$data->val($j,$i)."', '".$date."',
		'".$datetime['1']."','".$ccode."', '".$acy."', '".$sem."')";
		if($j==$row && $i == $col)
			$query.=";";
		else if($j<=$row && $i<=$col)
			$query .= ", ";
		$j=$j+1;
	}
	$i=$i+1;
	
}
$result=mysql_query($query);
if($result)
echo '<h1>Attendance Successfully updated</h1>';
else
echo '<h1>Attendance successfully updated</h1>';
//header('Location: ../excel uploader/attendance_uploader.php');

?>
	</center>
	</div>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="staff_management.php">Home</a></li>
  <li><a href="attendance_uploader.php">Select sem and course</a></li>
  <li class="active">Status</li>
</ul>	
</body>
</html>