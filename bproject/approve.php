<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>


<?php 

 


if($_SERVER["REQUEST_METHOD"] == "POST"){
	 $usni=$_POST['usn'];
	 $ssid=$_SESSION['usn'];

	// echo $usn."<>".$ssid;

	 require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
	 	{
	 		$sql = "INSERT INTO `approve_2` (`Staff_ID`, `approved`) VALUES ('".$ssid."','".$usni."')";
	 		$res = mysql_query($sql);
	 		if($res){
	 			echo "<script>alert('successfully approved');</script></br>";
	 			echo "<script>
						window.location = '/bproject/sretrieve.php'; </script>";
	 		}
	 		else{
	 			echo "<script>alert('Failed');</script></br>";
	 			echo "<script>
						window.location = '/bproject/sretrieve.php'; </script>";
	 		}
	 	}







}
else{
	echo "problem";
}


echo "<form method=post action=sretrieve.php><input type=submit name=submit2 value=Done></form>";


 ?>