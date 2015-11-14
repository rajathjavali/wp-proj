 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>
<html>
<head>
	<title>Retieve Student Info</title>
</head>
<body>
	<h1>Retrieve Student Info</h1>

	<form method="post" action="sstud_retrieve.php">
		<!-- USN: <input type="text" name="usn"  required value="<?php //echo $usn;?>"> -->


<!-- <select name="usn"> -->
 
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label"><h4>Select USN</h4></label>
      <div class="col-lg-10">
        <select class="form-control" id="usnum" name="usnum" style="width: 150px;">



			<?php
			require_once __DIR__ . '/db_connect.php';
			 $db = new DB_CONNECT();


			 if ($db) {
			 	# code...
			 
			$sql = "SELECT USN FROM student where 1";
						$result = mysql_query($sql);
			$a=mysql_fetch_row($result);

						if ( $a != 0) {
							// output data of each row
							while($row = mysql_fetch_array($result)) {
								$usnum = $row["USN"];
								echo "<option>$usnum</option>";
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


	<br><br>
		<!-- <input type="submit" name="submit" value="Find" > -->
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

</form><br/><br/>
<form method="post" action="excel_stud_retrieve.php">
 	<div class="form-group">
	    <label for="select" class="col-lg-2 control-label"><h4>All Students Details</h4></label>
	    <div class="col-lg-10">
	    <button type="submit" class="btn btn-primary">Download Excel</button>
  		</div>
 	</div>
</form>
	<!-- </form>
	<form action="management.php"><input type="submit" value="Home" name="sub"></form> -->

<br/><br/><br/>
<div>
<ul class="breadcrumb">
  <li><a href="staff_management.php">Home</a></li>
  <li class="active">Student information</li>
</ul>
</div>
</body>
</html>
