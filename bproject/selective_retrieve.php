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
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];

	  
	 require_once __DIR__ . '/db_connect.php';
	  
	  
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
        	{  	$ti[$ii]=$rows[Sem];
     			 $ii=$ii+1;	}
	 		}
	 	}

 
$type1=$type2=null;
//$ti[0] has got the semester values
switch ($sem) {
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
$sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."' ";
 
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result && mysql_num_rows($result)) 
 	 {	
 	 	 $numrows = mysql_num_rows($result);
            
    		$t=array($numrows);
    		$i=0; 
      }   else{
      	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  

$sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."'";
 
 		$result1=mysql_query($sql);
 		$numrows=null;
		
 	 if ($result1 && mysql_num_rows($result1)) 
 	 {	
 	 	 $numrows = mysql_num_rows($result1);
            
    		$t=array($numrows);
    		$i=0; 
      }   else{
      	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  
 

// switch ($sem) {
	 	
// 	 case '5':
// 		$abc = '5elective_register.php';
// 		break;
	
// 	 case '6':
// 	 	$abc = '6elective_register.php';
// 	 	break;

// 	 case '7':
// 		$abc = '7course_register.php';
// 		break;
// }

//$ti[0] has got semester this data is retrived from aprove_1 tabel
// if($ti[0]==$sem){

// echo "<form method=post action=$abc>";
// 				echo "<input type=hidden name=sem value=$sem>";
// 				echo "<br><br><input type=submit name=submit value=Register>";
// 				echo "</form>";}
// else{
// 	echo "<br><b>You cannot register for this semester now</b></br>";
// }

// //echo "<form method=post action=course_register.php><input type=submit name=submit2 value=Register></form>";		

// echo "<form method=post action=retrieve_elective.php><input type=submit name=submit2 value=Done></form>";		


}
			
		else{
			echo "Problem in connecting to database";
		}	 
	 
}
 
?>


<!DOCTYPE html>
<html>
 
<body>
<div class="container">

<h1>There are <?php echo $numrows; ?> entries in <i>Group <?php echo $type1."  "; ?></i> elective subject:<br /><br /></h1>

<table class="table table-striped table-hover ">
  <thead>
    <tr class="danger">
      <th>`</th>
      <th><h2>Subject Code</h2></th>
      <th><h2>Subject Name</h2></th>
      <th><h2>Credits</h2></th>
      <th><h2>Host Department</h2></th>
    </tr>
  </thead>

  

 
<?php $rr=1; ?>
<?php while($rows=mysql_fetch_assoc($result)){ 

  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?>]</h4> </td>
      <td><h4><?php echo $rows["S_Code"] ?></h4></td>
      <td><h4><?php echo $rows["Name"] ?></h4></td>
      <td><h4><?php echo $rows["Credits"] ?></h4></td>
      <td><h4><?php echo $rows["Host_Dpt"] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    


 <table class="table table-striped table-hover ">
  <thead><h1>There are <?php echo $numrows; ?> entries in <i>Group <?php echo $type2."  "; ?></i> elective subject:<br /><br /></h1>
    <tr class="danger">
      <th>`</th>
      <th><h2>Subject Code</h2></th>
      <th><h2>Subject Name</h2></th>
      <th><h2>Credits</h2></th>
      <th><h2>Host Department</h2></th>
    </tr>
  </thead>
  

 
<?php $rr=1; ?>
<?php while($rows=mysql_fetch_assoc($result1)){ 

  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?>]</h4> </td>
      <td><h4><?php echo $rows["S_Code"] ?></h4></td>
      <td><h4><?php echo $rows["Name"] ?></h4></td>
      <td><h4><?php echo $rows["Credits"] ?></h4></td>
      <td><h4><?php echo $rows["Host_Dpt"] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 

 <br></br>
 

 <br></br>
  
    <ul class="breadcrumb">
  <li><a href="staff_management.php">Home</a></li>
  <li class="active">Registration</li>
</ul>






  </fieldset>
</form>  
</div>

    <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
</body>
</html>