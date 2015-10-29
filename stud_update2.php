<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>


<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>

<?php

$fn=$_POST['name'];
$ph=$_POST['phno'];
$em=$_POST['email'];

if($_SERVER["REQUEST_METHOD"] == "POST")	
{
	$usn = $_POST['usn'];
	if(!empty($usn))
	{
		require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
	 	{
	 		 
	    	$sql="select Name,Phone_No,Email_ID from student where USN = '".$usn."'";
	    	$res = mysql_query($sql);
		    $res2=mysql_fetch_array($res);
		 	$name=$res2['Name'];
		    $phno=$res2['Phone_No'];
		    $email=$res2['Email_ID'];
		    $disp = null ;

		    if($fn!=$name&&!empty($fn))
			{
				$sql = "update student set Name='".$fn."' where USN='".$usn."'";
				$result=mysql_query($sql);
				$disp .= "Name ";
			}
			 
			if($em!=$email)
			{
				$sql = "update student set Email_ID='".$em."' where USN='".$usn."'";
				$result=mysql_query($sql);
				$disp .= "Email ID ";

			}
			if($ph!=$phno)
			{
				$sql = "update student set Phone_No='".$ph."' where USN='".$usn."'";
				$result=mysql_query($sql);
				$disp .= "Phone Number ";

			}
			if($disp!=null)
				$disp.="Has been changed";

			if($disp==null)
				$disp="No Changes";
			echo $disp."<br>";
			echo "<form method=post action=stud_retrieve.php><input type=hidden name=usn value=$usn><input type=submit name=submit value=Done>";
			//header("Location:http://localhost/project/stud_update.php");
		}
	}
}

?>
