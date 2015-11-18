<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>


<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head><body>
 <p> <h3>Add deadline for semister registration</h3></p>
          <form method="POST" action="add_deadline.php">
            <input type="datetime-local" name="deadline" step="1"><br>
           <p> <h3>Add deadline for elective Registration</h3></p>
            <input type="datetime-local" name="deadline_ele" step="1"><br> 
            <input type="submit" value="Add deadline date" name="Add deadline date" id="dead_line">
          </form>
</body>
</html>