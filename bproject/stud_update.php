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
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
	$usn = $_POST['usn'];
	if(!empty($usn))
	{
		require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
	 	{
	 		//$sql = "insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$usn."','".$Fname."','".$Mname."','".$Lname."','".$phno."','".$email."')";
	    	$sql="select Name, Phone_No,Email_ID from student where USN = '".$usn."'";
	    	$res = mysql_query($sql);
		    // check if row inserted or not
		    if ($res) 
		    {
		        // successfully inserted into database
		        //$response = "Entry Found";
		 		$res2=mysql_fetch_array($res);
		        $name=$res2['Name'];
		        $phno=$res2['Phone_No'];
		        $email=$res2['Email_ID'];
		        $nameErr = $phnoErr = $usnErr = $emailErr = null;
				echo "<b>Update Details of USN ".$usn;
				echo "</b> <br></br>
				<form method=post action=stud_update2.php>
				Name: <input type=text name=name value=$name >
				 <br></br>
				 
				E-mail: <input type=text name=email value=$email>
				 <br></br>
				Ph No.: <input type=text name=phno value=$phno>
				<br></br> 
				<input type = hidden name= usn value=$usn><br>
				<input type=submit name=submit value=Submit ></form>";		 		
		 	}
		}
	}
}

?>
