 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}

require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();

 if ($db) {
  }
?>






 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
<!DOCTYPE html>
<html>
 
<body>

<?php $usn=$fname=$sem=$sgpa=$email=$phno=$pphno=$pemail=NULL; ?>



<?php $usn=$_SESSION['usn']; ?>
<form class="form-horizontal" id="demo-form" data-parsley-validate method="post" action="stud_profile.php">
  <fieldset>
    <legend>My Profile</legend>


    <div class="form-group">
       <label for="textArea" class="col-lg-2 control-label" >USN</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="usn" placeholder="<?php echo $usn; ?>" name="usn"  disabled required value="<?php echo $usn;?>" style="width: 210px;">
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Full Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="name" placeholder="First name  Last name " name="name" required value="<?php echo $fname;?>" style="width: 210px;">
      </div>
    </div>

   

    

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputEmail" placeholder="abcde @ domain .com" name="email"  data-parsley-trigger="change" required  value="<?php echo $email;?>" style="width:210px">
      </div>
    </div>

     <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Phone number</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="phno" maxlength="10" minlength="10" placeholder="10 digit" required value="<?php echo $phno;?>" style="width: 130px;">
      </div>
    </div>


 <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Parent Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputEmail2" placeholder="abcde @ domain .com" name="pemail"  data-parsley-trigger="change" required  value="<?php echo $pemail;?>" style="width:210px">
      </div>
    </div>

     <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Parent Phone number</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="pphno" maxlength="10" minlength="10" placeholder="10 digit" required value="<?php echo $pphno;?>" style="width: 130px;">
      </div>
    </div>

    <div class="form-group">
      <div id = "deadline" class="col-lg-10 col-lg-offset-2" 
      
        >
        <button type="reset" class="btn btn-default">Cancel</button>
        <button  type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
    <ul class="breadcrumb">
  <li><a href="management.php">Home</a></li>
  <li class="active">My Profile</li>
</ul>
  </fieldset>
</form>  


</body>
</html>