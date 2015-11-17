<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
  
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>


 <?php
   
echo "<h1>Details Regarding Course registration</h1>";
 $scode=$sname=$credit=$sem=$scode=$stype=$t=$numrows=null;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];
   $acy=$_POST['acy'];
   $section=$_POST['section'];
	 require_once __DIR__ . '/db_connect.php';
	  
	    $db = new DB_CONNECT();
	 	if($db){


 		$sql = "SELECT S_Code FROM syllabus WHERE S_type='core' and sem= '".$sem."' ";
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
echo "<br></br>".$usn."<>";
 


    //to check wether there are actual number of subject entered in syllabus table

        $sql1 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[0]."','".$sem"','".$acy"' )";
        $result1=mysql_query($sql1);

        $sql2 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[1]."','".$sem"','".$acy"' )";
        $result2=mysql_query($sql2);

        $sql3 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[2]."','".$sem"','".$acy"' )";
        $result3=mysql_query($sql3);

        $sql4 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[3]."','".$sem"','".$acy"' )";
        $result4=mysql_query($sql4);

        $sql5 = "INSERT INTO studcourse(`USN`, `ccode`'sem','acy') VALUES ('".$usn."' ,'".$t[4]."','".$sem"','".$acy"' )";
        $result5=mysql_query($sql5);

        $sql6 = "INSERT INTO studcourse(`USN`, `ccode`,'sem','acy') VALUES ('".$usn."' ,'".$t[5]."','".$sem"','".$acy"' )";
        $result6=mysql_query($sql6);

        if($result1&&$result2&&$result3&&$result4&&$result5&&$result6){

          echo "<script>alert('Successfully Registered')</script>";
           echo "<script>window.location = '../bproject/management.php';</script>";
        }

        else {
          echo "<script>window.location = '../bproject/management.php';</script>";
        }


    
  
	$sql = "SELECT * FROM studcourse WHERE USN='".$usn."'";
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

     			 echo "<br><li> <b>Subject Code :".$row['ccode']."</li></b>";

      		}
            echo "</ol>";
      }     
  }
			
		else{
			echo "Problem in connecting to database";
		}
}
echo "<form method=post action=management.php><input type=submit name=submit value=Home></form>";
 
?>
