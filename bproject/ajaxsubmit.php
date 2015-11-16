<?php
//$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server..
//$db = mysql_select_db("project", $connection); // Selecting Database
//Fetching Values from URL
if($_SERVER["REQUEST_METHOD"] == "POST")	
{
	$usn = $_POST['usn'];
	$name2=$_POST['name1'];
	$email2=$_POST['email1'];
	$phone2=$_POST['phone1'];
	if(!empty($usn))
	{
		require_once __DIR__ . '/db_connect.php';
		// connecting to db
		$db = new DB_CONNECT();
		if($db)
		{		
			$query = mysql_query("UPDATE `student` SET `Name`='$name2',`Phone_No`='$phone2',`Email_ID`='$email2' Where USN = '".$usn."'");
			if($query)
			echo "Student details edited succesfully";
			else
			echo "Student detail editing unsucessful";
		}
	}
}
?>