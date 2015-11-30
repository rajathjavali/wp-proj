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
$acy=$type=$sem=NULL;
?>
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
      <script src="semcheck.js">
</script>
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
<form class="form-horizontal" id="demo-form" data-parsley-validate method="post" action="elective_retrieve.php"> 

    <h1>Retrieve Syllabus Information</h1><hr>
     <div class="form-group">
      <label for="select" class="col-lg-3 control-label" align="left">Semester</label>
      <div class="col-lg-9">
        <select class="form-control" id="sem" required name="sem" value="<?php echo $sem;?>" style="width: 210px;">
          <option>5</option>
           <option>6</option>
            <option>7</option>
           
        </select>
        </div>
        <br>
        <br>
        <br>
       <label for="textArea" class="col-lg-3 control-label" align="left">Academic Year</label>
        <div class="col-lg-9">
          <input type="text" class="form-control" id="acy" placeholder="2015" name="acy" required value="<?php echo $acy;?>" style="width: 210px;">
        </div>
        <br>
        <br>
        <br>
      <label for="select" class="col-lg-3 control-label" align="left">Host Dept</label>
      <div class="col-lg-9">
        <select class="form-control" id="host_dpt" required name="host_dpt" value="<?php echo $host_dpt;?>" style="width: 210px;">
          <!-- <option>1</option>
          <option>2</option> -->
          <option>BT</option>
          <option>CSE</option>
          <option>EEE</option>
          <option>ECE</option>
           <option>ISE</option>
            <option>IT</option>
             <option>ME</option>
             <option>TC</option>
             <option>HSS</option>
             <option>Sc</option>
        </select>
        </div>
        <br>
        <br>
        <br>
        <label for="select" class="col-lg-3 control-label" align="left">Host Dept</label>
      <div class="col-lg-9">
        <select class="form-control" id="type" required name="type" value="<?php echo $type;?>" style="width: 210px;">
        <option>local</option>
        <option>global</option>
        </select>
        </div>
     <br>
     <br>
     <br>
    </div>
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div> 
 

    </form>
    </center>
    </div>
    </div>
    <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="management.php">Home</a></li>
  <li class="active">Elective subject details</li>
</ul>
</div>

</body>
</html>

