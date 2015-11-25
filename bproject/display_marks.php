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
</body>
</html>