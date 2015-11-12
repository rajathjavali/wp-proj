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
	 		$sql="DELETE FROM student Where USN = '".$usn."'" ;
	    	$res = mysql_query($sql);
		    // check if row inserted or not
		    if ($res) 
		    {
				 echo "<br><br>deleted";
				 echo "<br><br>";
		    echo "<form method=post action=retrieve.php><input type=submit name=submit2 value=Done></form>";
		    
		    }
		}
	}
}

?>
