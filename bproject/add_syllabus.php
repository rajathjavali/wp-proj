  <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>

<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
<?php 
$scode=$sname=$hdep=$credit=$acy=$stype=NULL;
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
          <?php $usn=$_SESSION['usn']; ?>
          <form class="form-horizontal" id="demo-form" data-parsley-validate method="post">
            <fieldset>
              <h1><center>Add new subject</center></h1><hr>
              <div class="form-group">
                <label for="textArea" style=" text-align:left;" style="padding-right:20px;" class="col-lg-3 control-label" >Subject code</label>
                <div class="col-lg-9" >
                  <input type="text" class="form-control" id="scode" placeholder="Subject Code" name="scode" required value="<?php echo $scode;?>" style="width: 210px;">
                </div>
              </div>
           
          <div class="form-group">
                <label for="textArea"style=" text-align:left;"  class="col-lg-3 control-label" >Subject Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sname" placeholder="DBMS,SE etc.." name="sname" required value="<?php echo $sname;?>" style="width: 210px;">
                </div>
              </div>
           

              <div class="form-group">
                <label for="textArea" style=" text-align:left;" class="col-lg-3 control-label" >Host Department</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="hdep" placeholder="IS,CS etc..." name="hdep" required value="<?php echo $hdep;?>" style="width: 210px;">
                </div>
              </div>
           
               <div class="form-group">
                <label for="select" style=" text-align:left;" class="col-lg-3 control-label">Credits</label>
                <div class="col-lg-9">
                  <select class="form-control" id="credit" required name="credits" value="<?php echo $credit;?>" style="width: 210px;">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                     
                  </select>
    
                </div>
              </div>

          <div class="form-group">
                <label for="select" style=" text-align:left;" class="col-lg-3 control-label">Subject Type</label>
                <div class="col-lg-9">
                  <select class="form-control"  id="stype" required name="stype" value="<?php echo $stype;?>" style="width: 210px;">
                    <option>core</option>
                    <option>local</option>
                    <option>global</option>
                  </select>
                  </div>

          </div>

          <div class="form-group">
                <label for="textArea" style=" text-align:left;" class="col-lg-3 control-label">Academic Year</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="acy" placeholder="2015" name="sname" required value="<?php echo $acy;?>" style="width: 210px;">
                </div>
              </div>

 
    <div class="form-group">
      <label for="select" style=" text-align:left;" class="col-lg-3 control-label">Semester</label>
      <div class="col-lg-9">
        <select class="form-control" id="sem" required name="sem" value="<?php echo $sem;?>" style="width: 210px;">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
           
        </select>
        <br>
        
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button id="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form> 
</center>
</div>
<hr>
  <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="admin_management.php">Home</a></li>
  <li class="active">Add Syllabus</li>
</ul> 
</div>
</div>
 <script>
    $(document).ready(function(){
      $("#submit").click(function(){
      var scode = $("#scode").val();
      var sname = $("#sname").val();
      var hdep = $("#hdep").val();
      var credit= $("#credit").val();
      var stype= $("#stype").val();
      var acy= $("#acy").val();
      var sem= $("#sem").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&scode1=' + scode + '&sname1='+ sname + '&hdep1='+ hdep + '&credit1='+ credit + '&stype1=' + stype + '&acy1=' + acy + '&sem1=' + sem;
      if(scode==''||sname==''||hdep==''||credit==''||stype==''||acy==''||sem=='')
      {
      alert("Please Fill All Fields");
      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "syllabus_register.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      }
      });
      }
      return false;
      });
      });
  </script>
</body>
</html>