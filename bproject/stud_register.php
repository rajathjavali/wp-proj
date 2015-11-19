<?php
 

 
    //$name = $_POST['name'];
    $usn = $_POST['usn1'];
 	//$phno = $_POST['phno'];
 	//$email = $_POST['email'];
 	$sem=$_POST['sem1'];
 	$sgpa=$_POST['sgpa1'];
 	$acy=$_POST['acy1'];
 	$staff_ID=$_POST['staff_ID1'];
 	$err="";

 	/*if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 	  $err .= "Only letters and white space allowed in First Name"; 
	}

	if (!preg_match("/^[0-9]*$/",$phno)) {
 	  $err.= "Invalid Phone Number"; 
	}

	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	  $err.= "Invalid Email"; 
	 }
*/
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
    	$sql1 = "INSERT INTO `approve_1` (`USN`, `Sem`,`sgpa`,`acy`,`staff_ID`) VALUES ('".$usn."', '".$sem."','".$sgpa."','".$acy."','".$staff_ID."')";
    	$res2 = mysql_query($sql1);
    	$sql2= "UPDATE `approve_1` SET `registered`='".$one."' WHERE `USN`='".$usn."'";
	    $res3=mysql_query($sql2);
	    // check if row inserted or not

	    // if($res){echo "inserted<>";} else {echo "not inserted<>";}
	    // if($res2){echo "approve<>";} else {echo "not not approve<>";}
	    // if($res3){echo "registered<>";} else {echo "not registered<>";}



	    if ($res2 ) 
	    {
			if($res3){
	        // successfully inserted into database
	        echo "Inserted Successfully"; 
	        //header("Location:http://localhost/project/form.php");
	    	}
	    } 
	    else 
	    {
	        // failed to insert row
	        echo "You have already registered for this sem";
	        if(!$res3){
	        	echo "You have already registered for this sem";
	        }
	     }
	    }
 	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>
