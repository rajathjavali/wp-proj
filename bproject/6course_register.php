<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>
 
<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
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
        #topbar
        {
          background-color: #686868;
          padding-top: 70px;
          padding-bottom: 20px;
          position: relative;

        }
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 1100px;
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
<body><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
          <div style="position:relative;">
          <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
          </div>
          <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
          <p><h4><b>R V College of Engineering</b></h4></p>
          <p><h6>Mysore Road, RV Vidyaniketan Post, Bangalore - 560 059</h6></p>
          </center>
        </div>
        <hr>

        <div class="box"><center>


 <?php
  
echo "<h1>Details Regarding Course registration</h1>";
 $scode=$sname=$credit=$sem=$scode=$stype=$t=$numrows=null;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];
   $acy=$_POST['acy'];
   //$section=$_POST['section'];
  
	 require_once __DIR__ . '/db_connect.php';
	  
	    $db = new DB_CONNECT();
	 	if($db){


 		$sql = "SELECT S_Code FROM syllabus WHERE S_type='core' and sem= '".$sem."'";
    $result=mysql_query($sql);
		
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
           	$t=array($numrows);
    		$i=0;
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	$t[$i]=$row['S_Code'];
     			$i=$i+1;
      		}
      }     
    $usn=	  $_SESSION['usn'];
echo "<br></br>";
 

      echo $numrows;
     //to check wether there are actual number of subject entered in syllabus table

        $sql1 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[0]."','".$sem."','".$acy."' )";
        $result1=mysql_query($sql1);

        $sql2 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[1]."','".$sem."','".$acy."' )";
        $result2=mysql_query($sql2);

        $sql3 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[2]."','".$sem."','".$acy."' )";
        $result3=mysql_query($sql3);

        $sql4 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[3]."','".$sem."','".$acy."' )";
        $result4=mysql_query($sql4);

        $sql5 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[4]."','".$sem."','".$acy."' )";
        $result5=mysql_query($sql5);
         



                if($result1&&$result2&&$result3&&$result4&&$result5){

                    echo "you have registered in following $numrows subject";
                }

                else {
                    echo "you have already registered for following subject";
                }


   /* }
    else{
        echo  "Ask Administrator to update all core subject of <i>$sem rd Semester</i> ...!";
    }
  */
  
	$sql = "SELECT * FROM register WHERE USN='".$usn."'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
           	$t=array($numrows);
    		$i=0;

            echo "<ol>";
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	//$scode= $row[S_Code];
     			//echo $scode;
     		 	$t[$i]=$row['ccode'];
     			 $i=$i+1;

     			 echo "<br><li> <b>Subject Code :</b>".$row['ccode']."</li>";

      		}
            echo "</ol>";
      }     
  }
			
		else{
			echo "Problem in connecting to database";
		}
}
//echo "<form method=post action=management.php><input type=submit name=submit value=Home></form>";
 
?>
</center>
</div>
</div>
   <ul class="breadcrumb">
    <li><a href="management.php">Home</a></li>
    <li><a href="syllabus_retrieve.php">Core subject list</a></li>    
    <li class="active">Core Subject Registration</li>
  </ul>
</div>
</body>
</html>
