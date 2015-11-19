<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	 $usn=$_POST['usn1'];
	 $sem=$_POST['sem1'];
	 $acy= date("Y");
	echo $usn;
	echo $sem;
	echo $acy;
	 require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
	 	{
	 		$sql = "UPDATE `approve_1` SET `approve`='1' WHERE USN='".$usn."' and Sem='".$sem."' and acy='".$acy."'";
	 		$res = mysql_query($sql);
	 		if($res){
	 			echo "successfully approved";
	 		}
	 		else{
	 			echo "error in approving";
	 		}
	 	}
		}
		else{
	echo "problem";
		}


 ?>