<?php
	require_once __DIR__ . '/db_connect.php';
	if (isset($_POST['sem1'])) {
		$sem = $_POST['sem1'];
		$dept = $_POST['dept1'];
		$acy = $_POST['acy1'];
		$query="SELECT DISTINCT S_type from syllabus where sem='".$sem."' amd Host_dpt='".$dept."' and acy='".$acy."'";
		$res=mysql_query($query);
		$a=mysql_num_rows($res);
		if($a>0){
			$data="<label>Subject list:</label><select id='sub' required name='sub'>";
			while($res=mysql_fetch_array($res))
			{
				$res2 = "<option>".$res['Name']."</option>";
			    $data .=$res2; 
			}
			$data.="</select>";
			$data.="<button type=submit>Submit</button>
			<br/><br/>";
			}
		else
			$date = "No Subjects Registered";
		echo $data;
		}
	