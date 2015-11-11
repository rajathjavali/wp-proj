<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
$fname = $staffid = $email = $phno = NULL;
}
?>

 
 <!DOCTYPE html>
<html>
 
<body>

 

<form class="form-horizontal" id="demo-form" data-parsley-validate method="post" action="ateach_register.php">
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
        <input type="email" class="form-control"   placeholder="abcde @ domain .com" name="email"  data-parsley-trigger="change" required  value="<?php echo $email;?>" style="width:210px">
      </div>
    </div>

     <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Phone number</label>
      <div class="col-lg-10">
        <input type="text" class="form-control"  name="phno" maxlength="10" placeholder="10 digit"  required value="<?php echo $phno;?>" style="width: 130px;">
      </div>
    </div>



    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

      <ul class="breadcrumb">
  <li><a href="admin_management.php">Home</a></li>
  <li class="active">Registration</li>
</ul>
  </fieldset>
</form>  

</body>
</html>
