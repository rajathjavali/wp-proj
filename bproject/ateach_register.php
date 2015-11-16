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
 

 
    $name = test_input($_POST['name']);
    $staffid = test_input($_POST['staffid']);
 	$phno = test_input($_POST['phno']);
 	$email = test_input($_POST['email']);
 	$flag;

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
			$flag=1;
	        //successfully inserted into database
	        $response = "Inserted Successfully<br>"; 
	        echo "<script>confirm('".$response."');</script>";
	        //echo "<form action=aform_teach.php><input type=submit value=DONE name=sub></form>";
	        //header("Location:../bproject/aform_teach.php");
	    } 
	    else 
	    {
	    	$flag=0;
	        // failed to insert row
	        //$response = "<script type='text/javascript'>alert('Entry unSuccessful')</script>";
	 
	        echo "<script>confirm('staff id not unique');</script>";
	        //echo "<form action=aform_teach.php><input type=submit value=DONE name=sub></form>";
	    }
 	}
 	header('Location: aform_teach.php');
	//exit;


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}
?>
