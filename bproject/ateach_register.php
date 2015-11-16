<?php
 

 
    $name = test_input($_POST['name1']);
    $staffid = test_input($_POST['staffid1']);
 	$phno = test_input($_POST['phone1']);
 	$email = test_input($_POST['email1']);
 	$err="";

 	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
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
	    $sql = "insert into staff(Staff_ID,FName,Phone_No,Email_ID) values('".$staffid."','".$name."' ,'".$phno."','".$email."')";
    	$res = mysql_query($sql);
	    // check if row inserted or not
	    if ($res) 
	    {
	        //successfully inserted into database
	        echo "Inserted Successfully"; 
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
