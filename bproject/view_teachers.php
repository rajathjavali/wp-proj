<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>



<?php 
$scode=$sname=$credit=$sem=$scode=$stype=$t=$numrows=null;
$usn=$_SESSION['usn'];
 

 
   
   //$sem=$_POST['sem'];
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        $usn=   $_SESSION['usn'];
         
 $sql = "SELECT `Staff_ID`, `FName`, `Phone_No`, `Email_ID` FROM `staff` WHERE 1 and  `FName` IS NOT NULL  ";
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
          background-color: #9DBCBC;
          width: 1200px;
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

        <div class="box"><center>

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
      <td><h4><?php echo $rows["Staff_ID"] ?></h4></td>
      <td><h4><?php echo $rows["FName"] ?></h4></td>
      <td><h4><?php echo $rows["Phone_No"] ?></h4></td>
      <td><h4><?php echo $rows["Email_ID"] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 



 <br> 
 
</div>
</center>
</div>
    <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="management.php">Home</a></li>
  <li class="active">Staff Details</li>
</ul>
</div>
</div>
 

  </fieldset>
</form>  

</body>
</html>