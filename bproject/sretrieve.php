<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>
 <?php include ('header.php'); ?>
<?php include ('navbar2.php'); ?>

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
        <div class="box"><center>
  <h1>Retrieve Student Info</h1>
  <form method="post" action="sstud_retrieve1.php">

    <div class="form-group">
      <label for="select" class="col-lg-3 control-label" align="left"><h4>Select USN</h4></label>
      <div class="col-lg-9">
        <select class="form-control" id="usnum" name="usnum" style="width: 210px;">



<?php
require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();

 if ($db) {
  # code...
 
$sql = "SELECT USN FROM student where 1";
      $result = mysql_query($sql);
$a=mysql_fetch_row($result);

      if ( $a != 0) {
        // output data of each row
        while($row = mysql_fetch_array($result)) {
          $usnum = $row["USN"];
          echo "<option>$usnum</option>";
        }
      
      } else {
        echo "0 results";
      }

}

else{
  echo "no connection";
}
?>

 </select>
        <br>
        
      </div>
    </div>




</select>
  <br><br>
    <!-- <input type="submit" name="submit" value="Find" > -->
  <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</form>
<br/><br/>
<form method="post" action="excel_stud_retrieve.php">
  <div class="form-group">
      <label for="select" class="col-lg-4 control-label"><h4>All Students Details</h4></label>
      <div class="col-lg-8">
      <button type="submit" class="btn btn-primary">Download Excel</button>
      </div>
  </div>
</form>
<br/><br/><br/>
  <!-- </form>
  <form action="management.php"><input type="submit" value="Home" name="sub"></form> -->
</center>
</div>
</div>
<ul class="breadcrumb" id="footer" style="background-color: #202020">
  <li><a href="admin_management.php">Home</a></li>
  <li class="active">View student information</li>
</ul>
</div>
</body>
</html>
