 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location:../bproject/index.html');
}
?> 



 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
<!DOCTYPE html>
<html>
<head>     <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="excel_uploader_sublist.js"></script>
</head>
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

        <div class="box"><center><?php 
require_once 'excel_reader2.php';
$file = $_POST['file'];
$data = new Spreadsheet_Excel_Reader($file);
$row = $data->rowcount($sheet_index=0);
$col = $data->colcount($sheet_index=0);
//echo $row." ".$col;
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
//echo $query;
$result = mysql_query($query);
$ccode='';
while($res=mysql_fetch_array($result))
{
	$ccode = $res['S_Code'];
}


$query = "INSERT INTO `marks`(`susn`, `t1`, `q1`, `t2`, `q2`, `t3`, `q3`, `lab`, `assign` ,`ccode`, 
	`acy`, `sem`) VALUES ";
$i=2;
while($i<=$row){
	$query .= "(";
	$j=1;
	while($j<=$col){
		$query .= "'".$data->val($i,$j)."', ";
		$j=$j+1;
	}
	$query .= "'".$ccode."', '".$acy."', '".$sem."')";
	$i=$i+1;
	if($i<=$row)
		$query .= ",";
}
$result=mysql_query($query);
if($result)
echo "<h1>Marks successfully uploaded</h1>";
else
echo "<h1>Marks successfully uploaded</h1>";
?>
</center>
</div>
</div>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="staff_management.php">Home</a></li>
  <li><a href="sretrieve.php">Student Information</a></li>
  <li class="active">Data</li>
</ul>
</div>	
</body>
</html>
