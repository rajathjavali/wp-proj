<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<h1>Elective Subject Data data</h1>
<?php
  
 
 $scode=$sname=$credit=$sem=$scode=$stype=$t=null;
 $usn=$_SESSION['usn'];
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 
	 $sem=$_POST['sem'];
	 require_once __DIR__ . '/db_connect.php';
	  
	 //$ac='HSS';
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db){

	 	$sql1 = "SELECT `Sem` FROM `approve_1` WHERE `USN`='".$usn."'";
	 	$resusn=mysql_query($sql1);
//below code is used to get user's semester based on session's usn number, i.e on who login...
	 	if($resusn){
	 		if(mysql_num_rows($resusn)){
	 			$ti=array($numrows);
    		$ii=0;
	 			while ($rows = mysql_fetch_assoc($resusn)) 
        	{  	$ti[$ii]=$rows["Sem"];
     			 $ii=$ii+1;	}
	 		}
	 	}

// $sql = "SELECT S_Code,E_Type, Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type=\'A\'";
// sql query to print those subject which have in group A

//if the above query works then use below logic and display the subject as content of tabel A and content of tabel B

$type1=$type2=null;
//$ti[0] has got the semester values
switch ($ti[0]) {
	case '5':
		$type1 ='A';
		$type2 ='B';		
		break;

	case '6':
		$type1='C';
		$type2='D';
		break;
}
//echo $ti[0];
//$type1='C';
$sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."'";
//$sql="SELECT S_Code,E_Type, Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and sem='".$sem."'";

 	//	$sql = "SELECT * FROM syllabus WHERE S_type='elective' and sem= '".$sem."'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {	
 	 	// $numdat= mysql_fetch_row($resusn);
 	 	// echo $numdata;
 	 	// $x=array();
 	 	// $y=0;
 	 	//  while ($seme=mysql_fetch_assoc($resusn)) {
 	 	//  	echo "<>".$seme[Sem]."<>";
 	 	//  	$x[$y]=$seme[Sem];
 	 	//  	$y=$y+1;
 	 	//  }
 

    	    $numrows = mysql_num_rows($result);
            print "There are $numrows entries in <i>Group $type1</i> elective subject:<br /><br />";
    		$ta=array($numrows);
    		$na=array($numrows);
    		$i=0;echo"<ol>";
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	//$scode= $row[S_Code];
     			//echo $scode;
     		 	$ta[$i]=$row["S_Code"];
     		 	$na[$i]=$row["Name"];
     			 $i=$i+1;

     			 //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";

      		}echo "</ol>";
      }   else{
      	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  

$ta1=$ta[0];
$ta2=$ta[1];
$ta3=$ta[2];
$ta4=$ta[3];
$ta5=$ta[4];
$ta6=$ta[5];


?>

<br><h4>Select one of subject from <i>Group <?php echo $type1;?></i>  </h4> <br></br> 
<form method="post" action="final_elective_register.php">
<fieldset  style="width:350px"><ol>
       <li><?php echo $na[0]; ?><input type="radio" name="scode1" required value="<?php echo $ta1 ;?>"/><br></br></li>
       <li> <?php echo $na[1];?><input type="radio" name="scode1" required value="<?php echo $ta2; ?>"/><br></br></li>
      <li> <?php echo $na[2]; ?><input type="radio" name="scode1" required value="<?php echo $ta3; ?>"/><br></br></li>
     <li>  <?php echo $na[3];?><input type="radio" name="scode1" required value="<?php echo $ta4; ?>"/><br></br></li>
       <li> <?php echo $na[4]; ?><input type="radio" name="scode1" required value="<?php echo $ta5; ?>"/><br></br></li>
        
        </ol>
</fieldset>
 
<?php











$sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."'";
//$sql="SELECT S_Code,E_Type, Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and sem='".$sem."'";

 	//	$sql = "SELECT * FROM syllabus WHERE S_type='elective' and sem= '".$sem."'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {	
 	 	// $numdat= mysql_fetch_row($resusn);
 	 	// echo $numdata;
 	 	// $x=array();
 	 	// $y=0;
 	 	//  while ($seme=mysql_fetch_assoc($resusn)) {
 	 	//  	echo "<>".$seme[Sem]."<>";
 	 	//  	$x[$y]=$seme[Sem];
 	 	//  	$y=$y+1;
 	 	//  }
 

    	    $numrows = mysql_num_rows($result);
            print "<br></br>There are $numrows entries in <i>Group $type1</i> elective subject:<br /><br />";
    		$tb=array($numrows);
    		$nb=array($numrows);
    		$i=0;echo"<ol>";
        	while ($row = mysql_fetch_assoc($result)) 
        	{ 
            	//$scode= $row[S_Code];
     			//echo $scode;
     		 	$tb[$i]=$row["S_Code"];
     		 	$nb[$i]=$row["Name"];
     			 $i=$i+1;

     			// echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";

      		}echo "</ol>";
      }   else{
      	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  

$tb1=$tb[0];
$tb2=$tb[1];
$tb3=$tb[2];
$tb4=$tb[3];
$tb5=$tb[4];
$tb6=$tb[5];

?>
<br><h4>Select one of subject from <i>Group <?php echo $type1;?></i>  </h4> <br></br> 
 
<fieldset style="width:350px" ><ol>
       <li><?php echo $nb[0]; ?><input type="radio" name="scode2" required value="<?php echo $tb1; ?>"/><br></br></li>
       <li> <?php echo $nb[1];?><input type="radio" name="scode2" required value="<?php echo $tb2; ?>"/><br></br></li>
      <li> <?php echo $nb[2]; ?><input type="radio" name="scode2" required value="<?php echo $tb3; ?>"/><br></br></li>
     <li>  <?php echo $nb[3];?><input type="radio" name="scode2" required value="<?php echo $tb4; ?>"/><br></br></li>
       <li> <?php echo $nb[4]; ?><input type="radio" name="scode2" required value="<?php echo $tb5; ?>"/><br></br></li>
        
        </ol>
</fieldset>
 

<?php
print "<br />";print "<br />";
            
print "<br />";


// below while loop is for printing the array
$i=0;

  
        
if($ti[0]==$sem){

echo " ";
				echo "<input type=hidden name=sem value=$sem>";
				echo "<br><br><input type=submit name=submit value=Register>";
				echo "</form>";}
else{
	echo "<br><b>You cannot register for this semester now</b></br>";
}

//echo "<form method=post action=course_register.php><input type=submit name=submit2 value=Register></form>";		

echo "<form method=post action=retrieve_elective.php><input type=submit name=submit2 value=Done></form>";		


}
			
		else{
			echo "Problem in connecting to database";
		}	 
	 
}
 
?>