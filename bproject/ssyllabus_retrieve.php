 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<!DOCTYPE html>
<html>
 
<body>
<div class="container">

 <?php
  
echo "<h1>Syllabus data</h1>";
 $scode=$sname=$credit=$sem=$scode=$stype=$t=$result=null;
 $usn=$_SESSION['usn'];
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];
	 require_once __DIR__ . '/db_connect.php';
	  
	 //$ac='HSS';
	    // connecting to db
	    $db = new DB_CONNECT();
	 	if($db){

	 	$sql1 = "SELECT `Sem` FROM `approve_1` WHERE `USN`='".$usn."'";
	 	$resusn=mysql_query($sql1);

	 	if($resusn){
	 		if(mysql_num_rows($resusn)){
	 			$ti=array($numrows);
    		$ii=0;
	 			while ($rows = mysql_fetch_assoc($resusn)) 
        	{  	$ti[$ii]=$rows[Sem];
     			 $ii=$ii+1;	}
	 		}
	 	}
 		$sql = "SELECT * FROM syllabus WHERE S_type='course' and sem= '".$sem."'";
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
            print "<h2>There are $numrows entries in core subject:<br ></h2>";
    		$t=array($numrows);
    		$i=0;
        
      }   else{
      	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  


 


// below while loop is for printing the array
$i=0;
// while ($i<$numrows) {
// 	echo $t[$i]."<br>";
// 	$i=$i+1;
 
// }

// echo "!".$t[0]." !";

// switch ($sem) {
// 	case '3':
// 		$abc = '3course_register.php';
// 		break;
// 	case '4':
// 		$abc = '4course_register.php';
// 		break;
// 	case '5':
// 		$abc = '5course_register.php';
// 		break;
	
// 	 case '6':
// 	 	$abc = '6course_register.php';
// 	 	break;
// }




//echo "<form method=post action=course_register.php><input type=submit name=submit2 value=Register></form>";		

//echo "<form method=post action=retrive_syllabus.php><input type=submit name=submit2 value=Done></form>";		


}
			
		else{
			echo "Problem in connecting to database";
		}	 
	 
}
 
?>






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
    
  </tbody>
</table> 
<br>

<form method="post" action="excel_subjects_list.php">
  <div class="col-lg-50" align="right">
    <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>"><button type="submit" class="btn btn-primary">Download Table</button>
  </div>
</form>
 <br/><br/>
<div>
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
