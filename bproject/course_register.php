<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
  
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>


 <?php
  
echo "<h1>Register For core subject</h1>";
 $scode=$sname=$credit=$sem=$scode=$stype=$t=null;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];
	 require_once __DIR__ . '/db_connect.php';
	  
	 //$ac='HSS';
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db){


 		$sql = "SELECT S_Code FROM syllabus WHERE S_type='course' and sem= '".$sem."'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
            print "There are $numrows entries in core subject:<br /><br />";
    		$t=array($numrows);
    		$i=0;
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	//$scode= $row[S_Code];
     			//echo $scode;
     		 	$t[$i]=$row[S_Code];
     			 $i=$i+1;

     			 echo "<br> <b>Subject Code </b>:".$row[S_Code];

      		}
      }     
    $abs=	  $_SESSION['usn'];
echo "<br></br>".$abs."<>";

print "<br />";print "<br />";
            
print "<br />";


// below while loop is for printing the array
$i=0;
while ($i<$numrows) {
	echo $t[$i]."<br>";
	$i=$i+1;
 
}

 echo "<form>";
 echo "<input type=text name=c1 value =$t[0] readonly>";
 echo "</form>";

echo "<form method=post action=course_register.php>";
				echo "<input type=hidden name=sem value=$sem>";
				echo "<br><br><input type=submit name=submit value=Register>";
				echo "</form>";
print_r($t);
echo "<b></b>";

echo "<b></b><>";
//echo "<form method=post action=course_register.php><input type=submit name=submit2 value=Register></form>";		

 echo "<b></b>";
 echo $t[0];
 echo "<br></br>";
 echo $t[1];echo "<br></br>";
 echo $t[2];echo "<br></br>";
 echo $t[3];

print_r($valuesArr);

 $sql1 = "INSERT INTO register(`USN`, `Code`) VALUES ('".$abs."' ,'".$t[3]."' )";
 $sql2="INSERT INTO register(`USN`, `Code`) VALUES ('".$abs."' ,'".$t[2]."' )";
 $result1=mysql_query($sql1);
  $result2=mysql_query($sql2);
 if($result1&&$result2){
 	echo "inserted";

 }
 else{
 	echo "not inserted";
 }



	$sql = "SELECT * FROM register WHERE USN='$abs'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
            print "There are $numrows entries in usn subject:<br /><br />";
    		$t=array($numrows);
    		$i=0;
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	//$scode= $row[S_Code];
     			//echo $scode;
     		 	$t[$i]=$row[Code];
     			 $i=$i+1;

     			 echo "<br> <b>Subject Code </b>:".$row[Code];

      		}
      }     










echo "<form method=post action=retrive_syllabus.php><input type=submit name=submit2 value=Done></form>";		


}
			
		else{
			echo "Problem in connecting to database";
		}
	 
	 
	 
	 
	 
}
 
?>
