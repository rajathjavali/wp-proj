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
<html>
<head>
    <title></title>
 
</head>
<body>
<h1>Attendance Retrieval</h1>
<form method="post" action="excel_students_sub_attendance.php">
<?php
$query = "SELECT distinct cdte,ctme FROM attends,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' 
        and syllabus.S_type='".$course."' and attends.ccode=syllabus.S_code and syllabus.Name='".$sub."'";
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
//echo "<script>alert('".$datetimeheader."')</script>";

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
<button type="submit" name="submit">Download Excel</button>
</form>
</body>
</html>