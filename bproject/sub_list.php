<?php
	// Fetching Values From URL
	
	$connection = mysql_connect("localhost", "root", "root"); // Establishing Connection with Server..
	$db = mysql_select_db("bproject", $connection); // Selecting Database
	if (isset($_POST['sem1'])) {
		$sem = $_POST['sem1'];
		$dept = $_POST['dept1'];
		$course = $_POST['course1'];
		$acy = $_POST['acy1'];
		if($course == 'CORE')
			$course='core';
		else if($course == 'LOCAL ELECTIVE')
			$course='local';
		else
			$course='global';
		
		$query = mysql_query("select Name from syllabus where sem='".$sem."' and 
		(Host_Dpt='".$dept."' or Host_Dpt='HSS') and acy='".$acy."' and S_type='".$course."'"); 
		
		$rows = mysql_num_rows($query);
		$data="<label >Subjects:</label><select id='sub' required name='sub'>";
		if($query){
			$a=mysql_num_rows($query);
			if($a>0){
			while($res=mysql_fetch_array($query))
			{
				$res2 = "<option>".$res['Name']."</option>";
			    $data .=$res2; 
			}
			$data.="</select>";
			$data.="<br/><br/>Students Data: <br/><button type=submit>Download Excel</button>
			<br/><br/>";}
			else
				$data  = 'no subjects registered';
			echo $data;


		}
	}
mysql_close($connection); // Connection Closed
?>