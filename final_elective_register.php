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

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$ele1=$_POST["scode1"];
	$ele2=$_POST["scode2"];
	$usn=$_SESSION['usn'];

	 

require_once __DIR__ . '/db_connect.php';
	 $db = new DB_CONNECT();
	 if($db){
	 	 
	 	 //$sql= "insert into syllabus(S_Code,Name,Host_Dpt,Credits,S_type,sem) values('".$scode."','".$sname."','".$hdep."','".$credit."','".$stype."','".$sem."')";
	 	$sql = "INSERT INTO `selects`(`USN`, `Code`) VALUES ('".$usn."','".$ele1."')";
		$res=mysql_query($sql);
		$sql1 = "INSERT INTO `selects`(`USN`, `Code`) VALUES ('".$usn."','".$ele2."')";
		$res1=mysql_query($sql1);
		 
	 if($res&&$res1)
	 {
			$response = "<br>You have Successfully Registered<br>"; 
	        echo $response;
	        echo "<form action=retrieve_elective.php><input type=submit value=DONE name=sub></form>";
	        	 }
		 else{
			   // failed to insert row
	        //$response = "<script type='text/javascript'>alert('Entry unSuccessful . The combination of elective You have already registered Try other combination...!')</script>";
	  //echo $response;
	      // header("location: /project/retrieve_elective.php"); 
			
			$response = "<br><b>Entry unSuccessful.</b> The combination of elective You have already registered Try other combination...!<br>"; 
	        echo $response;
	        echo "<form action=retrieve_elective.php><input type=submit value=DONE name=sub></form>";
	 }
		 
	 	 
	 }
	 else
	 {
	 	 echo "string1";
	 }


}

?>
