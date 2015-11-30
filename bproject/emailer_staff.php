<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
	header('Location: ../bproject/index.html');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$acad = "2014";//$_POST['acy'];
    $sem = "6";//$_POST['sem'];
    $subid = "12HSM61";//$_POST['subid'];
    $startdate = "2015-06-05";//$_POST['startdate'];
    $enddate = "2015-06-07";//$_POST['enddate'];

	require_once __DIR__ . '/db_connect.php';
	require_once 'phpmailer/PHPMailerAutoload.php';
	$db = new DB_CONNECT();
	if($db)
	{
		//$con = mysqli_connect("localhost","root","root","bproject");
		$name = '';
		
		$q1 = 'SELECT DISTINCT susn from attends where ccode like "'.$subid.'" AND acy = "'.$acad.'" AND sem = "'.$sem.'"';
		$r = mysql_query($q1);
		if(mysql_num_rows($r)==0)
		{
			echo'<h2><center>Invalid Subject ID<center></h2>';

		}
		else
		{
			$mail = new PHPMailer; // create a new object
			$mail->IsSMTP(); // enable SMTP
			//$mail->SMTPDebug = 2; 
			//$mail->Debugoutput = 'html';// debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.mail.yahoo.com";
			$mail->Port = 25; 
			$mail->IsHTML(true);
			$mail->Username = "rvceise@yahoo.com";
			$mail->Password = "mysoreroad";
			$mail->SetFrom('rvceise@yahoo.com','counsellor');
			$mail->Subject = "Attendance Shortage";
			$mail->Body = "You have attendance Shortage in the Subject ".$name.".
			 Please submit your medical certificates as soon as possible.";

			$sq1 = 'SELECT DISTINCT Name from syllabus where S_Code like "'.$subid.'" ';
			$sr = mysql_query($sq1);

			while($row = mysql_fetch_array($sr)){ $name = $row['Name'];  }
			$count = 0; 								
			$i = 0;
			while($res = mysql_fetch_array($r))
			{
				
				$held = 0;
				$att = 0;
				$usn = $res[0];
				//for($i = 0; $i < $x; $i++)
				//{

					$q2 = 'SELECT COUNT(status) as Held, SUM(status) as Attended FROM attends where susn = "'.$usn.'" AND ccode="'.$subid.'" AND acy = "'.$acad.'" AND sem = "'.$sem.'" AND cdte >= "'.$startdate.'" AND cdte <= "'.$enddate.'"';
					$q3='SELECT Email_ID from student where USN="'.$usn.'"';
					$res3= mysql_query($q3);
					$row1=mysql_fetch_array($res3);
					if($s = mysql_query($q2))
					{
						while($row = mysql_fetch_array($s))
						{
							$att += $row['Attended'];
							$held += $row['Held'];
						}
					}
				//}

				if($held == 0)
					$per = 0;
				else
					$per = (($att * 100)/($held));
				
				if($per <=85)
				{
					$i = $i+1;
					$email = $row1['Email_ID'];
					$mail->AddAddress($email,'student');


					 if($mail->Send()) {
					    $count = $count+1;
		 			}
					
				}
				
			}
			//echo $i." ".$count;
			if($count == $i){
				echo "<script>alert('successful');
				window.location = '../bproject/staff_management.php';</script>";
			}
			else
				echo "<script>alert('unsuccessful');
			window.location = '../bproject/staff_management.php';</script>";
		}
					
	}
	die();
	
}
?>
