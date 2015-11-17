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
    $acy=$_POST['acy'];
	  require_once __DIR__ . '/db_connect.php';
	  $numrows=NULL;
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
        	{  	$ti[$ii]=$rows["Sem"];
     			 $ii=$ii+1;	}
   		}
   	}
 		$sql = "SELECT * FROM syllabus WHERE S_type='core' and sem= '".$sem."' and acy ='".$acy."'";
 		$result=mysql_query($sql);
 		$numrows=null;
		
 	  if ($result && mysql_num_rows($result)){

 	    $numrows = mysql_num_rows($result);
      print "<h2>There are $numrows entries in core subject:<br ></h2>";
    	$t=array($numrows);
    	$i=0;        
    } 
    else
      echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";

$i=0;

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
 
<?php if( $ti[0]==$sem ){ ?>


<?php 

switch ($sem) {
	case '3':
		$abc = '3course_register.php';
		break;
	case '4':
		$abc = '4course_register.php';
		break;
	case '5':
		$abc = '5course_register.php';
		break;
	
	 case '6':
	 	$abc = '6course_register.php';
	 	break;
}

 ?>






<form method="post" action="<?php echo $abc ?>"> 
				 <!-- <input type=hidden name=sem value= <?php //echo $sem ?>>  -->
  <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
      <?php
        $today= Date("Y-m-d H:i:s");
        $qry="SELECT RegDeadline FROM admin where username='root'";
        $res=mysql_query($qry);
        $row = mysql_fetch_row($res);
        $Deadline= $row[0];
        if($ti[0]==$sem && strtotime($today)<strtotime($Deadline)){
          echo '
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary" value="Register" >Register</button>
             <input type=hidden name=sem value= <?php echo $sem ?>> ';
        } 
      ?>
    </div>
  </div>

  <?php echo "<script>alert('Registration is closed now');</script>";
        //header('Location:/bproject/management.php');
        //echo "<script>window.location = '../bproject/management.php';</script>"
       ?>


  				<!--  <br><br><input type=submit name=submit value=Register>  -->
  <?php }else{ ?>
  	 <br><b>You cannot register for this semester now</b></br> 
  <?php } ?>

   <br></br>
    

   <ul class="breadcrumb">
    <li><a href="management.php">Home</a></li>
    <li class="active">Registration</li>
  </ul>
    </fieldset>
</form>  
</div>

    <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
</body>
</html>
