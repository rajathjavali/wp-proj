  <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>


 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>


<?php 
$scode=$sname=$hdep=$credit=NULL;

?>

 
<!DOCTYPE html>
<html>
 
<body>
<?php $usn=$_SESSION['usn']; ?>
 

<form class="form-horizontal" id="demo-form" data-parsley-validate method="post" action="syllabus_register.php">
  <fieldset>
    <legend>ADD SYLLABUS</legend>
    

     
  

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Subject code</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="scode" placeholder="Subject Code" name="scode" required value="<?php echo $scode;?>" style="width: 210px;">
      </div>
    </div>
 
<div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Subject Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="sname" placeholder="DBMS,SE etc.." name="sname" required value="<?php echo $sname;?>" style="width: 210px;">
      </div>
    </div>
 

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Host Department</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="hdep" placeholder="IS,CS etc..." name="hdep" required value="<?php echo $hdep;?>" style="width: 210px;">
      </div>
    </div>
 
     <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Credits</label>
      <div class="col-lg-10">
        <select class="form-control" id="usn" required name="credits" value="<?php echo $credit;?>" style="width: 75px;">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
           
        </select>
        <br>
        
      </div>
    </div>

<div class="form-group">
      <label for="select" class="col-lg-2 control-label">Subject Type</label>
      <div class="col-lg-10">
  
        course <?php echo " :"; ?><input type="radio" name="stype" required value="<?php echo "course"; ?>"/><br></br>
        elective <?php echo " :"; ?><input type="radio" name="stype" required value="<?php echo "elective"; ?>"/>
 
 <br></br>
</div>
<br></br>

 
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Semester</label>
      <div class="col-lg-10">
        <select class="form-control" id="sem" required name="sem" value="<?php echo $sem;?>" style="width: 75px;">
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