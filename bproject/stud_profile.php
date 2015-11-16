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
 

 
    $name = $_POST['name'];
    $usn = $_SESSION['usn'];
 	$phno = $_POST['phno'];
 	$email = $_POST['email'];
 	$pphno=$_POST['pphno'];
 	$pemail=$_POST['pemail'];

 	$err="";

 	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 	  $err .= "Only letters and white space allowed in First Name"; 
	}

	if (!preg_match("/^[0-9]*$/",$phno)) {
 	  $err.= "Invalid Phone Number"; 
	}

	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	  $err.= "Invalid Email"; 
	 }

	if (!preg_match("/^[0-9a-zA-Z]*$/", $usn)) {
 	  $err.= "Invalid USN"; 
	}	
if (!preg_match("/^[0-9]*$/",$pphno)) {
 	  $err.= "Invalid Phone Number"; 
	}

	 if (!filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
 	  $err.= "Invalid Email"; 
	 }



    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 	if($db)
 	{

 		
 		
	    $sql = "INSERT into student(USN,Name,Phone_NO,Email_ID) values ('".$usn."','".$name."' ,'".$phno."','".$email."')";
    	$res = mysql_query($sql); 
    	
    	$sql2="INSERT into address(USN,P_email,P_No) values('".$usn."','".$pemail."','".$pphno."')";
    	$res2= mysql_query($sql2);

	    if ($res && $res2 ) 
	    {
	        // successfully inserted into database
	        $response = "Inserted Successfully<br>"; 
	        echo $response;
	        echo "<form action=my_profile.php><input type=submit value=DONE name=sub></form>";
	        //header("Location:http://localhost/project/form.php");
	    	}
	    
	    else 
	    {
	        // failed to insert row
	        $response = "<script type='text/javascript'>alert('Entry unSuccessful');</script>";
	 		echo $err;
	 		echo "failed";
	       }
	
?>
	         <ul class="breadcrumb">
  <li><a href="management.php">Home</a></li>
  <li class="active">Registration</li>
</ul>

<?php

	    }
 	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>
