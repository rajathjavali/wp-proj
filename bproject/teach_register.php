<?php
 

 
    $fname = test_input($_POST['fname1']);
    $mname = test_input($_POST['mname1']);
    $lname = test_input($_POST['lname1']);
 	$phno = test_input($_POST['phone1']);
 	$email = test_input($_POST['email1']);
 	$staffid= $_POST['staffid1'];
 	$err="";

 	if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
 	  $err .= "Only letters and white space allowed in First Name"; 
	}

	if (!preg_match("/^[0-9]*$/",$phno) && strlen($phno!=10)) {
 	  $err.= "Invalid Phone Number"; 
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	  $err.= "Invalid Email"; 
	}

	/*if (!preg_match("/^[0-9a-zA-Z]*$/", $usn)) {
 	  $err.= "Invalid USN"; 
	}*/	



    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 	if($db)
 	{
	    // mysql inserting a new row
	    $sql ="UPDATE `staff` SET `FName`='".$fname."',`Mname`='".$mname."',`Lname`='".$lname."',`Phone_No`='".$phno."',`Email_ID`='".$email."' WHERE `Shortname`='".$staffid."'";
    	$res = mysql_query($sql);
	    // check if row inserted or not
	    if ($res) 
	    {
	        //successfully inserted into database
	        echo "Updated Successfully"; 
	        //echo "<form action=aform_teach.php><input type=submit value=DONE name=sub></form>";
	        //header("Location:../bproject/aform_teach.php");
	    } 
	    else 
	    {
	        echo "staff id not unique";
	    }
 	}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>
