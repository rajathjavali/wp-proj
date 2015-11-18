<?php 
require_once 'excel_reader2.php';
$file = $_POST['file'];
$data = new Spreadsheet_Excel_Reader($file);
$row = $data->rowcount($sheet_index=0);
$col = $data->colcount($sheet_index=0);


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
echo $query."<br/><br/>";
$result=mysql_query($query);
echo $result;
if($result)
echo "<script>alert('Successful')</script>";
else
echo "<script>alert('Successful')</script>";
//header('Location: ../excel uploader/attendance_uploader.php');

?>