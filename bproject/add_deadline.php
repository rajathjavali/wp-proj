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
 require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();
 if($db){
 	
 			$ddline = $_POST['deadline'];
			$ex=explode('T', $ddline);
			$date="$ex[0] $ex[1]";
			$regdeadline=date("Y-m-d H:i:s",strtotime($date));
			//echo $regdeadline."<br>";
			$qry1="UPDATE admin SET RegDeadline='$regdeadline' where username='root'";
			mysql_query($qry1);
			/*if(mysql_affected_rows()>=0)
				echo "Success";
			else
				echo "Unsuccesull";
		*/
	
 			$ddline = $_POST['deadline'];
			$ex=explode('T', $ddline);
			$date="$ex[0] $ex[1]";
			$regdeadline=date("Y-m-d H:i:s",strtotime($date));
			//echo $regdeadline."<br>";
			$qry1="UPDATE admin SET eleDeadline='$regdeadline' where username='root'";
			mysql_query($qry1);
			/*if(mysql_affected_rows()>=0)
				echo "Success";
			else
				echo "Unsuccesull";
		*/
		 header("Location: ../bproject/admin_management.php");
	}
	
?>

   

