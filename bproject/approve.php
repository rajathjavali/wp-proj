<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	 require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	$num = $_POST['num'];
	$i=1;
	$count=0;
	while($i<=$num){
	 $usn=$_POST['usn'.$i];
	 $sem=$_POST['sem'.$i];
	 $acy= date("Y");
	
	 	if($db)
	 	{
	 		$sql = "UPDATE `approve_1` SET `approve`='1' WHERE USN='".$usn."' and Sem='".$sem."' and acy='".$acy."'";
	 		$res = mysql_query($sql);
	 		if($res){
	 			$count=$count+1;
	 		}
	 		else
	 		{
	 			
	 		}
	 	}
	 	$i=$i+1;
	}
	if($count==$num)
		echo "Successful approval";
		else{
	echo "problem";
		}
}

 ?>