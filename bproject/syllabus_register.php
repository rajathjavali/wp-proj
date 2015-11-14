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

$sname=$_POST['sname'];
 	$hdep=$_POST['hdep'];
 	$credit=$_POST['credit'];
 	$sem=$_POST['sem'];
 	$scode=$_POST['scode'];
 	$stype=$_POST['stype'];
 	$elective='elective';	
 	    require_once __DIR__ . '/db_connect.php';
	 $db = new DB_CONNECT();
	 if($db){
		 
		 
		$sql= "insert into syllabus(S_Code,Name,Host_Dpt,Credits,S_type,sem) values('".$scode."','".$sname."','".$hdep."','".$credit."','".$stype."','".$sem."')";
		$res=mysql_query($sql);
		 
	 if($res)
	 {
			$response = "Inserted Successfully<br>"; 
	        echo $response;
	        echo "<form action=add_syllabus.php><input type=submit value=DONE name=sub></form>";
	        	 }
		 else{
			   // failed to insert row
	        $response = "<script type='text/javascript'>alert('Entry unSuccessful')</script>";
	 
	        echo $response;
	 }
		 
	 }
	 else{
		 echo"connection denined";
	 }



?> 

