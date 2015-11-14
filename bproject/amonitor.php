  <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>






 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
<!DOCTYPE html>
<html>
 
<body>
<?php $usn=$_SESSION['usn']; ?>
 

<form class="form-horizontal" id="demo-form" data-parsley-validate method="post" action="amonitor_ret.php">
  <fieldset>
    <legend>Student present under particular Staff Id</legend>
    

     
  
 <div class="form-group">
      <label for="select" class="col-lg-2 control-label"><h4>Select Staff ID</h4></label>
      <div class="col-lg-10">
        <select class="form-control" id="sfid" name="sfid" style="width: 150px;">



<?php
require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();

 if ($db) {
 	# code...
 
$sql = "SELECT `Staff_ID` FROM `staff` WHERE 1 ";
			$result = mysql_query($sql);
$a=mysql_fetch_row($result);

			if ( $a != 0) {
				// output data of each row
				while($row = mysql_fetch_array($result)) {
					$sfid = $row["Staff_ID"];
					echo "<option>$sfid</option>";
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