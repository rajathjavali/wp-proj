 <html>
<head>
	
<?php
$flag=0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$usn = test_input($_POST['usn']);
	$password =test_input($_POST['password']);




	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	// Define $username and $password
	        
	        
	      //  $password=md5($password);
			//$_SESSION['usn'] = $usn;
	require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	 $db = new DB_CONNECT();
		if($db)
	{


		$result = mysql_query("SELECT * from suser WHERE username='$usn' and password='$password'");
		$count = mysql_num_rows($result);
		if ($count == 1) 
		{
		    $_SESSION['usn']=$usn; // Initializing Session
		   	$_SESSION['password']=$password;
		    header("location:../bproject/staff_management.php");
		    $flag=1;
		     // Redirecting To Other Page
		}
		$result = mysql_query("SELECT * from user WHERE USN='$usn' and password='$password'");
		$count = mysql_num_rows($result);
		if ($count == 1) 
		{
			$_SESSION['usn']=$usn; // Initializing Session
			$_SESSION['password']=$password;
			header("location: ../bproject/management.php"); // Redirecting To Other Page
			$flag=1;
		}
		$result = mysql_query("SELECT * from admin WHERE username='$usn' and password='$password'");
		$count = mysql_num_rows($result);
		if ($count == 1) 
		{
			$_SESSION['usn']=$usn; // Initializing Session
			$_SESSION['password']=$password;
			$flag=1;
			header("location: ../bproject/admin_management.php"); // Redirecting To Other Page
		}
		if($flag==0) 
		{
			$_SESSION['err']="login";
			header('Location: ../bproject/index.html');

		} 
	
	}
}

	
function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
	
?>
</body>
</html>