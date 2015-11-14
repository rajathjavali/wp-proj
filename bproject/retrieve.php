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
	<title>Retieve Student Info</title>
</head>
<body>
	<h1>Retrieve Student Info</h1>

	<form method="POST" action="stud_retrieve.php">
		<!-- USN: <input type="text" name="usn"  required value="<?php //echo $usn;?>"> -->


<!-- <select name="usn"> -->
 
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label"><h4>Select USN</h4></label>
      <div class="col-lg-10">
        <select class="form-control" id="usn" name="usn" style="width: 150px;">



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
					$usn = $row["USN"];
					echo "<option>$usn</option>";
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
		<!-- <input type="submit" name="submit" value="Find" > -->
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button onClick="goAjax()" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

<div id="stud_detail">
</div>
<script type="text/javascript">
function goAjax(){
	var xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function(){
		
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				document.getElementById('stud_detail').innerHTML = xmlhttp.responseText;
			
		}
		xmlhttp.open('POST','stud_retrieve.php',true);
		xmlhttp.send();
}
</script>
	<!-- </form>
	<form action="management.php"><input type="submit" value="Home" name="sub"></form> -->

<br></br>
<ul class="breadcrumb">
  <li><a href="management.php">Home</a></li>
  <li class="active">Student information</li>
</ul>

</body>
</html>
