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
$scode=$sname=$credit=$sem=$scode=$stype=$t=$numrows=null;
$usn=$_SESSION['usn'];
 
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        $usn=   $_SESSION['usn'];
 
$sql1 = "SELECT S_Code, Name,Credits,Host_Dpt FROM syllabus, register WHERE register.code = syllabus.S_Code and USN = '".$usn."'";
$result1=mysql_query($sql1);
if ($result1) {
   echo "<h3>Registered Subject Details of user $usn</h3>";
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