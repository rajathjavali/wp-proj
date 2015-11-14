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
	 require_once __DIR__ . '/db_connect.php';
	  
	    $db = new DB_CONNECT();
	 	if($db){


 		$sql = "SELECT S_Code FROM syllabus WHERE S_type='course' and sem= '".$sem."'";
 		$result=mysql_query($sql);
		
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
           	$t=array($numrows);
    		$i=0;
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	$t[$i]=$row["S_Code"];
     			$i=$i+1;
      		}
      }     
    $usn=	  $_SESSION['usn'];
echo "<br></br>".$usn."<>";
 


     if($numrows==4){//to check wether there are actual number of subject entered in syllabus table

        $sql1 = "INSERT INTO register(`USN`, `Code`) VALUES ('".$usn."' ,'".$t[0]."' )";
        $result1=mysql_query($sql1);

        $sql2 = "INSERT INTO register(`USN`, `Code`) VALUES ('".$usn."' ,'".$t[1]."' )";
        $result2=mysql_query($sql2);

        $sql3 = "INSERT INTO register(`USN`, `Code`) VALUES ('".$usn."' ,'".$t[2]."' )";
        $result3=mysql_query($sql3);

        $sql4 = "INSERT INTO register(`USN`, `Code`) VALUES ('".$usn."' ,'".$t[3]."' )";
        $result4=mysql_query($sql4);

         



                if($result1&&$result2&&$result3&&$result4 ){

                    echo "you have registered in following $numrows subject";
                }

                else {
                    echo "you have already registered for following subject ";
                }


    }
    else{
        echo  "Ask Administrator to update all core subject of <i>$sem rd Semester</i> ...!";
    }
  
  
	$sql = "SELECT * FROM register WHERE USN='$usn'";
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
     		 	$t[$i]=$row["Code"];
     			 $i=$i+1;

     			 echo "<br><li> <b>Subject Code :</b>".$row["Code"]."</li>";

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
