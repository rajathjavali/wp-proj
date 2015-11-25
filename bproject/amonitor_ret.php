<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
$usn=NULL;
?>
 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
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
        .banner { background-color: #686868; }
        #topbar
          {
            background-color: #686868;
            padding-top: 80px;
            padding-bottom: 40px;
          }
        .wrapper { 
          width: 30%;
          margin: 0 auto; 
        }
        .banner p {
          text-align: center;
          margin-top: -10px;
          display: block;
        }
        .banner img {
          float: left; 
          margin: 5px;
        }
        .banner span {
          padding-top: 50px;
          vertical-align:top;
        }
        .banner .ban2 span {
          padding-top: 50px;
        vertical-align:top;
        }
  div.box{
    border-radius: 10px;
    position: relative;
    background-color: #9DBCBC;
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
          <div class="banner" id="topbar" style="color:#FFFFFF;">
            <div class="banner">
                <div class="wrapper">
            <p style="color: #fff;"><img src="images/logo1.gif" style="width:80px; height:80px"><span style=""><h5>Rashtreeya Sikshana Samithi Trust</h5></span>
                     <span class="ban2"><h4><b>R V College of Engineering</b></h4></span>
                     <span class="ban2"><h6>Mysore Road,RV Vidyaniketan Post,Bangalore-560 059</h6></span></p>        
                </div>
            </div> 
          </div> 
        <hr>

<div class="container" style="background-color:#9DBCBC">
<center>
<?php 
$sem=$_POST['sem'];
 
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
        
 
$sql1 = "SELECT `USN`,`registered` FROM `approve_1` WHERE `Sem`= '".$sem."'";
$result1=mysql_query($sql1);
if ($result1) {
   echo "<h1>Semester: ".$sem."</h1>";
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
      <th><h2>Status</h2></th>
      <th><h2>Registration date</h2></th>
      <th><h2>Registered Courses</h2></th>
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
      if( $rows["registered"] == 1){
        $sql23 = "SELECT `timeor` FROM `student` WHERE `USN`='".$rows["USN"]."'";
        $result23=mysql_query($sql23);
         
         while($rows23=mysql_fetch_assoc($result23)){
          echo "<p class=text-info >".$rows23["timeor"]."</p>";}
        }
        else {echo "<p class=text-warning>NULL</p>";}

        //if($rows23==" "){
        	//echo "string";
        //}
        // if(count($rows23)>0){
        // 	echo "N/A";
        // }
      ?></h4></td>
      <td><h4><?php if( $rows["registered"] == 1)
        {
          $sql2="SELECT `ccode` FROM `studcourse` WHERE  `USN`='".$rows["USN"]."'";
          $result2=mysql_query($sql2);
          while($rows2=mysql_fetch_assoc($result2)){
            echo "<p class=text-info >".$rows2["ccode"]."</p>";}
        }
        else {echo "<p class=text-warning>NULL</p>";}
      ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 

 <br></br>
 </div>
 <hr>
 <hr>
 <div id="footer">
    <ul class="breadcrumb" style="background-color: #202020;">
  <li><a href="admin_management.php">Home</a></li>
   <li><a href="amonitor.php">Select semester</a></li>
  <li class="active">Registration</li>
</ul>
  </fieldset>
</form>  
</center>
</div>
</div>
</div>
</body>
</html>