 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
$usn=NULL;
?>



<?php 
$sfid=$_POST['sfid'];
 
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        
 
$sql1 = "SELECT `USN`,`registered` FROM `user` WHERE `Staff_ID`= '".$sfid."'";
$result1=mysql_query($sql1);
if ($result1) {
   echo "<h3>Students under SF2</h3>";
  echo "<br>";
  

}
else{
  echo "try other way";
}
 
  }


    else{
      echo "no connection";
    }
 
 ?>

 
<!DOCTYPE html>
<html>
 
<body>


<div class="container">

<table class="table table-striped table-hover ">
  <thead>
    <tr class="danger">
      <th>`</th>
      <th><h2>Student usn</h2></th>
      <th><h2>status</h2></th>
      <th><h2>Registered at</h2></th>
     <!--  <th><h2>Host Department</h2></th> -->
    </tr>
  </thead>
  

 
<?php $rr=1; ?>
<?php while($rows=mysql_fetch_assoc($result1)){ 

  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?>]</h4> </td>
      <td><h4><?php echo $rows[USN] ?></h4></td>
      <td><h4><?php if( $rows[registered] == 1){echo "<p class=text-success>registered";} else {echo "<p class=text-warning>not registered</p>";} ?></h4></td>
     

      <td><h4><?php 
$sql23 = "SELECT `timeor` FROM `student` WHERE `USN`='".$rows[USN]."'";
$result23=mysql_query($sql23);
 
 while($rows23=mysql_fetch_assoc($result23)){
 	echo "<p class=text-info >".$rows23[timeor]."</p>";
}
if($rows23==" "){
	echo "string";
}
// if(count($rows23)>0){
// 	echo "N/A";
// }


 ?></h4></td>
   

      <!-- <td><h4><?php //echo $rows[Host_Dpt] ?></h4></td> -->
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 

 <br></br>
   
    
 <br></br>
 <br></br>
 <br></br>

    <ul class="breadcrumb">
  <li><a href="admin_management.php">Home</a></li>
   <li><a href="amonitor.php">Select Staff</a></li>
  <li class="active">Registration</li>
</ul>
  </fieldset>
</form>  
</div>

    <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
</body>
</html>