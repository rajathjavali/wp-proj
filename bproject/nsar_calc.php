<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>
<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>



<?php 

$sem=$acy=$startdate=$enddate=$subid=NULL;
?>
 
 <!DOCTYPE html>
<html>
 <head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
      <style>
        .banner { background-color: #686868; }
        #topbar
          {
            background-color: #686868;
            padding-top: 80px;
            padding-bottom: 40px;
          }
        .wrapper { 
          width: 30%;
          margin: 0 auto; 
        }
        .banner p {
          text-align: center;
          margin-top: -10px;
          display: block;
        }
        .banner img {
          float: left; 
          margin: 5px;
        }
        .banner span {
          padding-top: 50px;
          vertical-align:top;
        }
        .banner .ban2 span {
          padding-top: 50px;
        vertical-align:top;
        }
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 600px;
          margin: auto;
          padding-top: 20px;
          padding-bottom: 20px;
          padding-right: 20px;
          padding-left: 20px;
        }  
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }
 </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
          <div class="banner" id="topbar" style="color:#FFFFFF;">
            <div class="banner">
                <div class="wrapper">
            <p style="color: #fff;"><img src="images/logo1.gif" style="width:80px; height:80px"><span style=""><h5>Rashtreeya Sikshana Samithi Trust</h5></span>
                     <span class="ban2"><h4><b>R V College of Engineering</b></h4></span>
                     <span class="ban2"><h6>Mysore Road,RV Vidyaniketan Post,Bangalore-560 059</h6></span></p>        
                </div>
            </div> 
          </div> 
        <hr>
        <div class="box"><center>
	<form method="post" action ="emailer.php">
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$acad = $_POST['acy'];
	    $sem = $_POST['sem'];
	    $subid = $_POST['subid'];
	    $startdate = $_POST['startdate'];
	    $enddate = $_POST['enddate'];

	 require_once __DIR__ . '/db_connect.php';
	 require_once 'phpmailer/PHPMailerAutoload.php';
	 $db = new DB_CONNECT();
	 if($db)
	 {
		//$con = mysqli_connect("localhost","root","root","bproject");
		//$array = [];
		
		$q1 = 'SELECT DISTINCT susn from attends where ccode like "'.$subid.'" AND acy = "'.$acad.'" AND sem = "'.$sem.'"';
		$r = mysql_query($q1);
		if(mysql_num_rows($r)==0)
		{
			echo'<h2><center>Invalid Subject ID<center></h2>';

		}
		else
		{
			$name = "12HSM61";//$_POST['subid'];
			$sq1 = 'SELECT DISTINCT Name from syllabus where S_Code like "'.$name.'" ';
			$sr = mysql_query($sq1);

			while($row = mysql_fetch_array($sr)){ 
				//$array['name'] = $row['Name']; 
				echo ' '.$row['Name']; 
			}
			echo '<br><br><br>';
			echo '<table id="sample_1" class="table table-striped table-hover " style="width: 100%;height: 100%;background-color: white">';

			echo '<thead>';
				echo '<tr class="danger">';
					echo '<th><center>USN</center></th>';
					echo '<th><center>Classes Held</center></th>';
					echo '<th><center>Attended</center></th>';
					echo '<th><center>Percentage</center></th>';
					echo '<th><center>Email id</center></th>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';											
			$i = 1;
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
				$p=sprintf("%2.2f",$per);
				if($per <=85)
				{
					//$array['email'.$i] = $row1['Email_ID'];
					echo "<tr>";
		  			echo '<td align=center>' . $res['susn'] . "</td>";
		  			echo '<td align=center>' . $held . "</td>";
		  			echo '<td align=center>' . $att . "</td>";
		  			echo '<td align=center>' . $p . "</td>";
		  			echo '<td align=center>' . $row1['Email_ID'] . "</td>";
		  			echo '</tr>';
				}
				$i = $i+1;
			}
			$i = $i-1;
			$array['num'] = $i;
			echo '</tbody></table>';
			echo '<br/><input type="submit" value="Email All" name="button"><br/>
			<input type="hidden" name="acy" value="'.$acad.'">
			<input type="hidden" name="sem" value="'.$sem.'">
			<input type="hidden" name="subid" value="'.$subid.'">
			<input type="hidden" name="startdate" value="'.$startdate.'">
			<input type="hidden" name="enddate" value="'.$enddate.'">';
			}
		}
		die();
	}
	?>
</form>
        </center>
        </div>
        <hr>
        <hr>
        <ul class="breadcrumb" id="footer" style="background-color: #202020 ">
        <li><a href="admin_management.php">Home</a></li>
        <li class="active">Add Teacher</li>
        </ul>
      </div>
  </div>
</body>
</html>