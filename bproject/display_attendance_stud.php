<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<?php

$con=mysqli_connect('localhost','root','root','bproject');

if (mysqli_connect_errno()) { 
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$usn=$_SESSION['usn'];
if($_SERVER["REQUEST_METHOD"] == "POST"){

$sem = $_POST['sem'];
$dept = $_POST['dept'];
$course = $_POST['course'];
$acy = $_POST['acy'];
$sub = $_POST['sub'];

?>
<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>
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
          width: 100%;
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
        <div class="box"><center>
<h1>Attendance Retrieval</h1>
<!-- <form method="post" action="excel_students_sub_attendance.php">
 -->
<?php
$query = "SELECT distinct cdte,ctme FROM attends,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' 
        and syllabus.S_type='".$course."' and attends.ccode=syllabus.S_code and syllabus.Name='".$sub."' 
        and attends.susn='".$usn."'";
$export = mysqli_query($con,$query ) or die(mysqli_error($con));

$tablerows = '<tr><th align="center">USN</th>';
$totalclass = 0;
while( $row = mysqli_fetch_row( $export ) )
{
    $tablerows .= "<th align='center'>";
    $i = 0;
    foreach( $row as $value )
    {   
        if($i==1){
            $tablerows .="/";
            $tablerows .= substr($value,0,5);
        }
        else{
            $i=($i+1)%2;
            $tablerows .= $value;         
        }
        
    }
    $tablerows .= "</th>";
    $totalclass = $totalclass + 1;
}
$tablerows .= '</tr>';
echo "<script>alert('".$tablerows."')</script>";

$query = "SELECT susn,cdte,ctme,status FROM attends,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' 
        and syllabus.S_type='".$course."' and attends.ccode=syllabus.S_code 
        and syllabus.Name='".$sub."'";
$export = mysqli_query($con,$query ) or die(mysqli_error($con));

$count=1;
$tablerows .= "<tr>";
while( $row = mysqli_fetch_row( $export ) )
{
   
    $j=1;
    foreach( $row as $value )
    {    
        
        if($count == 1 && $j == 1){
            $tablerows .= "<td align='center'>".$value."</td>";
        }

        if($j == 4){
            $tablerows .= "<td align='center'>".$value."</td>";
        }
        
        $j=$j+1;
    }
    if($count == $totalclass){
        $tablerows .= "</tr><tr>";
        $count = 1;
    }
    else{
        $count=$count+1;
    }
    
    
}

$htmldata = $tablerows;
if ( $htmldata == "" )
{
    $htmldata = "\nNo Record(s) Found!\n";                     
}


echo "<table align='center' border='1' style='width: 100%;height=100%;'>".$htmldata."</table>
<input type=hidden name=sem required value='$sem'><input type=hidden name=course required value='$course'>
<input type=hidden name=dept required value='$dept'><input type=hidden name=acy required value='$acy'>
<input type=hidden name=sub required value='$sub'>";

}
?>
<br>
<button type="submit" name="submit">Download Excel</button>
<!-- </form> -->
</center>
</div>
</div>
    <ul class="breadcrumb" id="footer" style="background-color: #202020">
        <li><a href="admin_management.php">Home</a></li>
        <li><a href="subject_students_attendance.php">Semester and Course</a></li>
        <li class="active">Attendance details</li>
    </ul>
</div>
</body>
</html>
</body>
</html>