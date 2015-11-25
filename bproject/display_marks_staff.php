<?php

$con=mysqli_connect('localhost','root','root','bproject');

if (mysqli_connect_errno()) { 
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$sem = $_POST['sem'];
$dept = $_POST['dept'];
$course = $_POST['course'];
$acy = $_POST['acy'];
$sub = $_POST['sub'];

?>
<?php include ('header.php'); ?>
<?php include ('navbar2.php'); ?>
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
<h1>Marks Retrieval</h1>
<form method="post" action="excel_students_sub_marks.php">
<?php
$query = "SELECT susn,ccode,t1,q1,t2,q2,t3,q3,lab,assign FROM marks,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' and 
        syllabus.S_type='".$course."' and marks.ccode=syllabus.S_code 
        and syllabus.Name='".$sub."'";

$htmldata="<tr>";

$export = mysqli_query($con,$query ) or die(mysqli_error($con));



while ($fieldinfo=mysqli_fetch_field($export))
{
    $htmldata .= "<th align='center'>".$fieldinfo->name."</th>";
}
$htmldata.="</tr>";

while( $row = mysqli_fetch_row( $export ) )
{
    $htmldata .= "<tr>";
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $htmldata .= "<td></td>";
        }
        else
        {
            $htmldata .= "<td align='center'>".$value."</td>";
        }
    }
    $htmldata .= "</tr>";
}

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
<button type="submit" name="submit">Download Excel</button>
</form>
</center>
</div>
</div>
    <ul class="breadcrumb" id="footer" style="background-color: #202020">
        <li><a href="staff_management.php">Home</a></li>
        <li><a href="subject_students_marks_staff.php">Semester and Course</a></li>
        <li class="active">Marks details</li>
    </ul>
</div>
</body>
</html>
</body>
</html>