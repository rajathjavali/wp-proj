<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<html>
<head>
	<title>Syllabus Information</title>
</head>
<body>
	<h1>Retrieve Syllabus Information </h1>

	
<form class="form-horizontal" id="demo-form" data-parsley-validate method="post"  action="ssyllabus_retrieve.php">
  <fieldset>
    <legend>Retrieve Syllabus Information</legend>
    

     


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
    </div>

     

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

    <ul class="breadcrumb">
  <li><a href="staff_management.php">Home</a></li>
  <li class="active">Registration</li>
</ul>
  </fieldset>
</form>  


	 
</body>
</html>

