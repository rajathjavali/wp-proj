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

$fname=$staffid=$email=$phno=NULL;
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
          <form class="form-horizontal" id="demo-form" data-parsley-validate method="post">
            <fieldset>
              <legend>Registration</legend>
              

          	<div class="form-group">
                <label for="textArea" class="col-lg-2 control-label" >Full Name</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="name" placeholder="First name  Last name " name="name" required value="<?php echo $fname;?>" style="width: 210px;">
                </div>
              </div>


              <div class="form-group">
            <!-- USN:  <input type="text" name="usn" required value="<?php// echo $usn;?>"> -->
                <label for="textArea" class="col-lg-2 control-label" >Staff ID</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="staffid" placeholder="unique initials" name="staffid" required value="<?php echo $staffid;?>" style="width: 210px;">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="email" class="form-control"  id="email" placeholder="abcde @ domain .com" name="email"  data-parsley-trigger="change" required  value="<?php echo $email;?>" style="width:210px">
                </div>
              </div>

               <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label" >Phone number</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control"  id="phone"name="phno" maxlength="10" placeholder="10 digit"  required value="<?php echo $phno;?>" style="width: 130px;">
                </div>
              </div>



              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button id="submit" type="submit" class="btn btn-primary">Submit</button>
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
  <script>
    $(document).ready(function(){
      $("#submit").click(function(){
      var staffid = $("#staffid").val();
      var name = $("#name").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&staffid1=' + staffid + '&name1='+ name + '&email1='+ email + '&phone1='+ phone;
      if(staffid==''||name==''||email==''||phone=='')
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
      }
      });
      }
      return false;
      });
      });
  </script>
</body>
</html>
