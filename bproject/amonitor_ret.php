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

 
<!DOCTYPE html>
<html>
<head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
      <style>
        #topbar
        {
          background-color: #686868;
          padding-top: 70px;
          padding-bottom: 20px;
          position: relative;

        }
  div.box{
    border-radius: 10px;
    position: relative;
    background-color: #686868;
    color:white;
    width: 600px;
    height: 270px;
    margin: auto;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
    padding-left: 20px;
  }  
  #footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
        <div style="position:relative;">
            <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
            </div>
            <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
            <p><h4><b>R V College of Engineering</b></h4></p>
            <p><h6>Mysore Road, RV Vidyaniketan Post, Bagalore - 560 059</h6></p>
          </center>
        </div>
        <hr>

<div class="container" style="background-color:#686868">
<center>
<?php 
$sfid=$_POST['sfid'];
 
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        
 
$sql1 = "SELECT `USN`,`registered` FROM `user` WHERE `Staff_ID`= '".$sfid."'";
$result1=mysql_query($sql1);
if ($result1) {
   echo "<h3>Councillor Id: ".$sfid."</h3>";
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
      <td><h4><?php echo $rows["USN"] ?></h4></td>
      <td><h4><?php if( $rows["registered"] == 1){echo "<p class=text-success>registered";} else {echo "<p class=text-warning>not registered</p>";} ?></h4></td>
     

      <td><h4><?php 
$sql23 = "SELECT `timeor` FROM `student` WHERE `USN`='".$rows["USN"]."'";
$result23=mysql_query($sql23);
 
 while($rows23=mysql_fetch_assoc($result23)){
 	echo "<p class=text-info >".$rows23["timeor"]."</p>";
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
 </div>
 <div id="footer">
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
</div>
</center>
</div>
</div>
</div>
</body>
</html>