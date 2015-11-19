 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location:../bproject/index.html');
}
?> 



 <?php include ('header.php'); ?>
<?php include ('navbar2.php'); ?>

<html>
<head>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/carousel.css" rel="stylesheet">
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
      <script src="jquery-1.9.1.min.js"></script>
      <style>
        #topbar
        {
          background-color: #686868;
          padding-top: 70px;
          padding-bottom: 20px;
          position: relative;

        }
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 600px;
          margin: auto;
          padding-top: 20px;
          padding-bottom: 20px;
          padding-right: 20px;
          padding-left: 20px;
        }  
        #footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }
 </style>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
          <div style="position:relative;">
          <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
          </div>
          <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
          <p><h4><b>R V College of Engineering</b></h4></p>
          <p><h6>Mysore Road, RV Vidyaniketan Post, Bagalore - 560 059</h6></p>
          </center>
        </div>
        <hr>

        <div class="box"><center>

<?php
$new="";
   require_once __DIR__ . '/db_connect.php';
    
      $db = new DB_CONNECT();
    if($db){
$usn = $name =$phno = $email = null ; 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
  $sem = $_POST['sem'];
  $staff=$_SESSION['usn'];
  $acy= date("Y");
  $qry="SELECT USN FROM approve_1 WHERE Sem='".$sem."' and staff_ID='".$staff."' and acy='".$acy."' and approve='0'";
  $res= mysql_query($qry);
  if($res)
  {
    echo"<h1>Student List for approval</h1>";
    ?>
    <table class="table table-striped table-hover ">
  <thead>
    <tr class="danger">
      <th><h2>USN</h2></th>
      <th><h2>Approve</h2></th>
    </tr>
  </thead>
  <?php  while($rows=mysql_fetch_assoc($res)){ $new .=$rows["USN"] ."\n";?>
      <td><h4><?php echo $rows["USN"] ?></h4></td>
      <td><h4><button id="submit" type="submit">Approve</button></h4></td>
<?php  }}
  else
  {
    echo "Error";
  }
}
}
?>

</table>
</div>
</center>
</div>

<br></br>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="staff_management.php">Home</a></li>
  <li><a href="sretrieve.php">Student Information</a></li>
  <li class="active">Data</li>
</ul>
</div>
</div>
  <script>
    $(document).ready(function(){
      $("#submit").click(function(){
      alert("hi");
      var usn = " <?php echo $new?> ";
      var sem= "<?php echo $sem?>";

      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&usn1=' + usn + '&sem1=' + sem;
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "approve.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      }
      });
      return false;
      });
      });
  </script>
</body>
</html>