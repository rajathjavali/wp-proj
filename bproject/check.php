<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>


<html>
	<body>


<?php

$sname=$_POST['sname'];
 	$hdep=$_POST['hdep'];
 	$credit=$_POST['credit'];
 	$sem=$_POST['sem'];
 	$scode=$_POST['scode'];
 	$stype=$_POST['stype'];
 	
 	echo $sname;
 	echo $hdep;
 	echo $credit;
 	echo $sem;
 	echo $scode;
 	// echo "      "
 	echo $stype;



?>
</body>
</html>

