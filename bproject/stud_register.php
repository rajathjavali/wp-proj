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
 

 
    $name = $_POST['name'];
    $usn = $_SESSION['usn'];
 	$phno = $_POST['phno'];
 	$email = $_POST['email'];
 	$sem=$_POST['sem'];
 	$sgpa=$_POST['sgpa'];

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



    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 	if($db)
 	{

 		
 			$one=1;

	    // mysql inserting a new row
 			//This is to update the profile
	    /*$sql = "insert into student(USN,Name,Phone_NO,Email_ID) values('".$usn."','".$name."' ,'".$phno."','".$email."')";
    	$res = mysql_query($sql); */
    	$sql1 = "INSERT INTO `project`.`approve_1` (`USN`, `Sem`,`sgpa`) VALUES ('".$usn."', '".$sem."','".$sgpa."')";
    	$res2 = mysql_query($sql1);
    	$sql2= "UPDATE `project`.`user` SET `registered`='".$one."' WHERE `USN`='".$usn."'";
	    $res3=mysql_query($sql2);
	    // check if row inserted or not

	    // if($res){echo "inserted<>";} else {echo "not inserted<>";}
	    // if($res2){echo "approve<>";} else {echo "not not approve<>";}
	    // if($res3){echo "registered<>";} else {echo "not registered<>";}



	    if ($res&&$res2 ) 
	    {
			if($res3){
	        // successfully inserted into database
	        $response = "Inserted Successfully<br>"; 
	        echo $response;
	        echo "<form action=form_stud.php><input type=submit value=DONE name=sub></form>";
	        //header("Location:http://localhost/project/form.php");
	    	}
	    } 
	    else 
	    {
	        // failed to insert row
	        $response = "<script type='text/javascript'>alert('Entry unSuccessful')</script>";
	 		echo $err;
	        echo "Insertion Problem";
	        if(!$res3){
	        	echo "update error";
	        }
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
