 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?> 

<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<html>
<body>
<forn action="submit" id="Edit_form" title="Edit">
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
	 		$sql="SELECT * FROM student Where USN = '".$usn."'" ;
	    	$res = mysql_query($sql);
		    // check if row inserted or not
	    	while($row=mysql_fetch_array($res))
	    	{
	 		?>
	 		<input type="text" id="Name" value="<?php echo $row['Name']; ?>">
	 		<input type="text" id="Phone Number" value="<?php echo $row['Phone_No'];?>">
	    	<input type="text" id="Email ID" value="<?php echo $row['Email_ID'];?>">
	    	<?php
	    	}
		}
	}
}

?>
</forn>
</body>
</html>
