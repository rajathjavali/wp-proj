<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>


<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location:../bproject/index.html');
}
?>

<?php
$usn=$_SESSION['usn'];
$fn=$_POST['fname'];
$ph=$_POST['phno'];
$em=$_POST['email'];
$sem=$_POST['sem'];
$sgpa=$_POST['sgpa']

if($_SERVER["REQUEST_METHOD"] == "POST")	
{
	 
		require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
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

?>
