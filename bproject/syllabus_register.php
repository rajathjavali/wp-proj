 <?php

	$sname=$_POST['sname1'];
 	$hdep=$_POST['hdep1'];
 	$credit=$_POST['credit1'];
 	$sem=$_POST['sem1'];
 	$scode=$_POST['scode1'];
 	$stype=$_POST['stype1'];
 	$acy=$_POST['acy1'];
 	$elective='elective';	
 	require_once __DIR__ . '/db_connect.php';
	 $db = new DB_CONNECT();
	 if($db){
		$sql= "insert into syllabus(S_Code,Name,Host_Dpt,Credits,S_type,sem,acy) values('".$scode."','".$sname."','".$hdep."','".$credit."','".$stype."','".$sem."','".$acy."')";
		$res=mysql_query($sql);
		 
	 if($res)
	 {
	        echo "Inserted Successfully";
	       
	        	 }
		 else{
			   // failed to insert row
	        echo "Subject already exists";
	 }	 
	 }
	 else{
		 echo"connection denined";
	 }



?> 

