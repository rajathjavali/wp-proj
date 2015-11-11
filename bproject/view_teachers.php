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
$scode=$sname=$credit=$sem=$scode=$stype=$t=$numrows=null;
$usn=$_SESSION['usn'];
 

 
   
   //$sem=$_POST['sem'];
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        $usn=   $_SESSION['usn'];
         
 $sql = "SELECT `Staff_ID`, `Name`, `Phone_No`, `Email_ID` FROM `staff` WHERE 1 and  `Name` IS NOT NULL  ";
$result1=mysql_query($sql);
if ($result1) {
    
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
      <th><h2>STaff ID</h2></th>
      <th><h2>Name</h2></th>
      <th><h2>Phone Number</h2></th>
      <th><h2>Email ID</h2></th>
    </tr>
  </thead>
  

 
<?php $rr=1; ?>
<?php while($rows=mysql_fetch_assoc($result1)){ 
 // echo "<li><b>Staff id :</b> ".$rows[Staff_ID]."<br>"."<b>  Name  : </b>".$rows[Name]."<br>"."<b>phone number  :</b>".$rows[Phone_No]."<br>"."<b>email id   :</b>".$rows[Email_ID]."</li><br></br>";
  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?>]</h4> </td>
      <td><h4><?php echo $rows[Staff_ID] ?></h4></td>
      <td><h4><?php echo $rows[Name] ?></h4></td>
      <td><h4><?php echo $rows[Phone_No] ?></h4></td>
      <td><h4><?php echo $rows[Email_ID] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 



 <br></br><br></br><br></br> 
   
<ul class="breadcrumb">
  <li><a href="management.php">Home</a></li>
  <li class="active">view teachers</li>
</ul>
   </div>
 


 
</div>

    <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" style="width: 100%"></div>
    <ul class="breadcrumb">
  <li><a href="test.php">Home</a></li>
  <li class="active">Registration</li>
</ul>

 

  </fieldset>
</form>  

</body>
</html>