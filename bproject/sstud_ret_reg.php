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
        .banner { background-color: #686868; }
        #topbar
          {
            background-color: #686868;
            padding-top: 80px;
            padding-bottom: 40px;
          }
        .wrapper { 
          width: 30%;
          margin: 0 auto; 
        }
        .banner p {
          text-align: center;
          margin-top: -10px;
          display: block;
        }
        .banner img {
          float: left; 
          margin: 5px;
        }
        .banner span {
          padding-top: 50px;
          vertical-align:top;
        }
        .banner .ban2 span {
          padding-top: 50px;
        vertical-align:top;
        }
        div.box{
          border-radius: 10px;
          position: relative;
          background-color: #9DBCBC;
          width: 500px;
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
          <div class="banner" id="topbar" style="color:#FFFFFF;">
            <div class="banner">
                <div class="wrapper">
            <p style="color: #fff;"><img src="images/logo1.gif" style="width:80px; height:80px"><span style=""><h5>Rashtreeya Sikshana Samithi Trust</h5></span>
                     <span class="ban2"><h4><b>R V College of Engineering</b></h4></span>
                     <span class="ban2"><h6>Mysore Road,RV Vidyaniketan Post,Bangalore-560 059</h6></span></p>        
                </div>
            </div> 
          </div> 
        <hr>

        <div class="box"><center>

<?php
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
  if($res && mysql_num_rows($res))
  {
    echo"<h1>Student List for approval</h1>";
    ?>
    <table class="table table-striped table-hover ">
      <thead>
        <tr class="danger">
          <th style="text-align:center"><h2>USN</h2></th>
        </tr>
      </thead>
      
      <?php
      $data='';$i=1;  
      $data .= "num=".mysql_num_rows($res);
      while($rows=mysql_fetch_assoc($res)){?>

      <tr style="text-align:center; background-color:#FFFFFF">
      <td><h4><?php echo $rows["USN"]?></h4></td>
      </tr>
      <?php $data .='&usn'.$i."=".$rows['USN']."&sem".$i."=".$sem; 
      $i=$i+1; 
    }
  

?>
</table>
      <button id="submit" type="submit">Approve All</button>

<?php
}
else
  {
    echo "<h2>No unapproved student registration for this sem</h2>";
  }
  
}}

?>
<script>
    $(document).ready(function(){
      $("#submit").click(function(){
      // var usn = "<?php echo $rows["USN"]?>";
      // var sem= "<?php echo $sem?>";

      // Returns successful data submission message when the entered information is stored in database.
      var dataString ="<?php echo $data?>";//= '&usn1=' + usn + '&sem1=' + sem;
      // AJAX Code To Submit Form.
      //alert(dataString);
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
</div>
</center>
</div>

<br></br>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="staff_management.php">Home</a></li>
  <li><a href="sapprove_stud.php">Mentee Registration</a></li>
  <li class="active">Data</li>
</ul>
</div>
</div>
</body>
</html>