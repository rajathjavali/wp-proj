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

$fname=$staffid=$email=$phno=$sname=$lname=$mname=$pass=NULL;
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
          <form class="form-horizontal" id="demo-form" data-parsley-validate method="post">
            <fieldset>
              <h1>Staff Registration</h1><hr>
              

          	<div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">First Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="fname" placeholder="First name" name="fname" required value="<?php echo $fname;?>" style="width: 210px;">
                </div>
              </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Middle Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="mname" placeholder="Middle name " name="mname" required value="<?php echo $mname;?>" style="width: 210px;">
                </div>
              </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Last Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="lname" placeholder="Last name " name="lname" required value="<?php echo $lname;?>" style="width: 210px;">
                </div>
              </div>

              <div class="form-group">
            <!-- USN:  <input type="text" name="usn" required value="<?php// echo $usn;?>"> -->
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Staff ID</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="staffid" placeholder="Unique Staff ID" name="staffid" required value="<?php echo $staffid;?>" style="width: 210px;">
                </div>
              </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Short Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="sname" placeholder="Short name " name="sname" required value="<?php echo $sname;?>" style="width: 210px;">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label" style="text-align:left">Email</label>
                <div class="col-lg-9">
                  <input type="email" class="form-control"  id="email" placeholder="abcde @ domain .com" name="email"  data-parsley-trigger="change" required  value="<?php echo $email;?>" style="width:210px">
                </div>
              </div>

               <div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Phone number</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control"  id="phone"name="phno" maxlength="10" placeholder="10 digit"  required value="<?php echo $phno;?>" style="width: 210px;">
                </div>
              </div>

            <div class="form-group">
                <label for="textArea" class="col-lg-3 control-label" style="text-align:left">Password for account</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="pass" placeholder="Password" name="pass" required value="<?php echo $pass;?>" style="width: 210px;">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-8 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button id="submit" type="submit" class="btn btn-primary">Submit</button>
  <script>
    $(document).ready(function(){
      $("#submit").click(function(){
        alert("hi");
      /*var staffid = $("#staffid").val();
      var fname = $("#fname").val();
      var mname = $("#mname").val();
      var lname = $("#lname").val();
      var sname = $("#sname").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var pass = $("#pass").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&staffid1=' + staffid + '&fname1='+ fname +'&mname1='+ mname + '&lname1='+ lname +'&sname1='+ sname +'&email1='+ email + '&phone1='+ phone+ '&pass1='+ pass+;
      alert(dataString);
      /*if(staffid==''||fname==''||email==''||phone==''||pass==''||sname=='')
      {
      alert("Please Fill All Fields");
      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "ateach_register.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      }*/
      });
      }
      return false;
      });
      });
  </script>
                </div>
              </div>
            </fieldset>
          </form>  
        </center>
        </div>
        <hr>
        <hr>
        <ul class="breadcrumb" id="footer" style="background-color: #202020 ">
        <li><a href="admin_management.php">Home</a></li>
        <li class="active">Add Teacher</li>
        </ul>
      </div>
  </div>
</body>
</html>

