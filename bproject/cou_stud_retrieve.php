<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

   <?php
echo "<h1>Student Data</h1>";
$usn = $name =$phno = $email = null ; 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$usn = $_POST['usnum'];
	//$usn='1RV12IS045';
	if(!empty($usn))
	{
		require_once __DIR__ . '/db_connect.php';
	 
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db)
	 	{
	 		 
	    	$sql="select Name,Phone_No,Email_ID,Staff_ID from student where USN = '".$usn."'";
	    	$res = mysql_query($sql);
		     
		    if ($res) 
		    {
		        
		        $response = "Entry Found";
		 		$res2=mysql_fetch_array($res);
		 		//echo count($res2);
		 		 
		       
		       { $name=$res2['Name'];
		        $phno=$res2['Phone_No'];
		        $email=$res2['Email_ID'];
		         
		        echo $response."<br>";
		        echo "Name : ".$res2['Name']."<br>Phone No. : ".$res2['Phone_No']."<br>Email ID : ".$res2['Email_ID']."<br>";
				
		        echo "<form method=post action=approve.php>";
				echo "<input type=hidden name=usn value=$usn>"; 
				echo "<br><br><input type=submit name=submit value=approve>";
				echo "</form>";


/*
				echo "<form method=post action=stud_update.php>";
				echo "<input type=hidden name=usn value=$usn>";
				echo "<br><br><input type=submit name=submit value=Update>";
				echo "</form>";

				
				echo "<form method=post action=stud_delete.php>";
				echo "<input type=hidden name=usn value=$usn>";
				echo "<input type=submit name=submit value=Delete>";
				echo "</form>";
				//echo "<form method=post action=stud_delete.php><input type=submit name=submit2 value=Delete></form>";
*/
				echo "<form method=post action=retrieve.php><input type=submit name=submit2 value=Done></form>";
			  }	
		    } 
		    else 
		    { $response = "Problem in sql Query";
		      echo $response;}
	 	}
	}
}
 
?>

