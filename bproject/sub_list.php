<?php
	// Fetching Values From URL

 require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();
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
		$data="<label for='textArea' class='col-lg-3 control-label' style='text-align:left' >Subjects:</label>
		 <div class='col-lg-9'>
		 <select id='sub' required name='sub' style='width:210px'>";
		if($query){
			$a=mysql_num_rows($query);
			if($a>0){
			while($res=mysql_fetch_array($query))
			{
				$res2 = "<option>".$res['Name']."</option>";
			    $data .=$res2; 
			}
			$data.="</select></div>";
			$data.="<br/><br/>Students Data: <br/><button type=submit>Display</button>
			<br/><br/>";}
			else
				$data  = 'no subjects registered';
			echo $data;


		}
	}
mysql_close($connection); // Connection Closed
?>