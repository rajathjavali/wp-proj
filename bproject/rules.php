<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="jumbotron">
  <h1>Student Registration Management</h1>
  <p>all assumptions will be displayed here</p>
  
</div>




</body>
</html>