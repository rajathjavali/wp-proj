 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?> 
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	$ele1=$_POST["scode1"];
	$ele2=$_POST["scode2"];
	$usn=$_SESSION['usn'];
	$sem=$_POST['sem'];
	$acy=$_POST['acy'];
	$type=$_POST['e_type'];
	$dept=$_POST['dept'];

	 

require_once __DIR__ . '/db_connect.php';
	 $db = new DB_CONNECT();
	 if($db){
	 	 
	 	 //$sql= "insert into syllabus(S_Code,Name,Host_Dpt,Credits,S_type,sem) values('".$scode."','".$sname."','".$hdep."','".$credit."','".$stype."','".$sem."')";
	 	$sql = "INSERT INTO studcourse(`USN`, `ccode`,`acy`,`sem`) VALUES ('".$usn."','".$ele1."','".$acy."','".$sem."')";
		$res=mysql_query($sql);
		if($sem=='7' && $type!="local"){
		$sql1 = "INSERT INTO studcourse(`USN`, `ccode`,`acy`,`sem`) VALUES ('".$usn."','".$ele2."','".$acy."','".$sem."')";
		$res1=mysql_query($sql1);
		 }
	 if($res1)
	 {
			?>
			<script type="text/javascript">
			alert("Successfully Registered");
			window.location="../bproject/management.php"
			</script>
	        <?php
	        	 }
		 else{
			   
			?>
			<script type="text/javascript">
			alert("You have already registered for this sem");
			window.location="../bproject/management.php"
			</script>
			<?php
	 }
		 
	 	 
	 }
	 


}

?>


