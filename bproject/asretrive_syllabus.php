<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
$acy=null;
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
          <h1>Retrieve Syllabus Information </h1>
          <hr>
          	
          <form class="form-horizontal" id="demo-form" data-parsley-validate method="post"  action="assyllabus_retrieve.php">
            <fieldset>

               <div class="form-group">
                <label for="select" class="col-lg-2 control-label">Semester</label>
                <div class="col-lg-10">
                  <select class="form-control" id="usn" required name="sem" value="<?php echo $sem;?>" style="width: 75px;">
                   <!--  <option>1</option>
                    <option>2</option> -->
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                     <option>6</option>
                      <option>7</option>
                       <option>8</option>
                  </select>
                  <br>
                </div>
                <label for="textArea" class="col-lg-2 control-label" >Academic Year</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="acy" placeholder="2015" name="acy" required value="<?php echo $acy;?>" style="width: 210px;">
                </div>
              </div>

               

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </fieldset>
          </form>
        </center>
        </div>

    <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="admin_management.php">Home</a></li>
  <li class="active">Core Subject details</li>
</ul> 
</div>
</div> 
</body>
</html>

