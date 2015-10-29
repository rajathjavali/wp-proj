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
    	<title>Registration Management</title>
    	<style>.error {color: #FF0000;}</style>
    </head>
    <body>
      <div class="container">
      	<h1>Registration Management</h1>
      	<h3>welcome user  <?php echo $_SESSION['usn']; ?></h3>
      	 
      	<ul class="nav nav-pills nav-stacked">
         <li><a href="aform_teach.php"><h4> <p class="text-primary">  ADD Staff Details </p> </h4></a></li>
         <li><a href="asretrieve.php"><h4> <p class="text-warning"> Get Student Details </p> </h4></a></li>
         <li><a href="amonitor.php"><h4> <p class="text-info"> Monitor Registered Student </p> </h4></a></li>
         <li><a href="asretrive_syllabus.php"><h4> <p class="text-primary"> Get core subject list  </p> </h4></a></li>
         <li><a href="sretrieve_elective.php"><h4> <p class="text-warning"> Get elective subject list  </p> </h4></a></li>
         <li><a href="add_syllabus.php"><h4> <p class="text-warning"> add syllabus  </p> </h4></a></li> 
        </ul>
      <!-- Newly added -->
        <center>
          <p> <h3>Add deadline for semister registration</h3></p>
          <form method="POST" action="add_deadline.php">
            <input type="datetime-local" name="deadline" step="1"><br>
           <p> <h3>Add deadline for elective Registration</h3></p>
            <input type="datetime-local" name="deadline_ele" step="1"><br> 
            <input type="submit" value="Add deadline date" name="Add deadline date" id="dead_line">
          </form>
        </center>
      </div>
  
 
    </body>
  </html>
