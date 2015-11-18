<?php 
require_once 'excel_reader2.php';
$file = $_POST['file'];
$data = new Spreadsheet_Excel_Reader($file);
$row = $data->rowcount($sheet_index=0);
$col = $data->colcount($sheet_index=0);
//echo $row." ".$col;

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
$db = mysql_select_db("bproject", $connection); // Selecting Database

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
echo "<script>alert('Successful')</script>";
else
echo "<script>alert('Successful')</script>";
?>