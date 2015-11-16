 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?> 



 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

<html>
<body>

<div class="container">

<?php
echo "<h1>Student Data</h1>";
$usn = $name =$phno = $email = null ; 
{
  
  $usn = $_SESSION['usn'];
  if(!empty($usn))
  {
    require_once __DIR__ . '/db_connect.php';
   
      // connecting to db
      $db = new DB_CONNECT();
    if($db)
    {
       
        $sql="select Name,Phone_No,Email_ID from student where USN = '".$usn."'";
        $res = mysql_query($sql);
        $sql1="SELECT P_email,P_No from address where USN='".$usn."'" ;
        $res1=mysql_query($sql1);
    
        if ($res) 
        {
            
            $response = "Entry Found";
            $res2=mysql_fetch_array($res);
            $res3=mysql_fetch_array($res1);
        
           echo $res3;
           $name=$res2['Name'];
            $phno=$res2['Phone_No'];
            $email=$res2['Email_ID'];
            $pemail =$res3['P_email'];
            $pno=$res3=['P_No'];
          
             ?>

<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert"></button>
  <strong>           My Profile</strong>  
</div>

<div class="list-group">
   
  <a href="management.php" class="list-group-item">
    <h4 class="list-group-item-heading"> </h4>
    <p class="list-group-item-text"> </p>
 



             <?php
            //echo $response."<br>";
            echo "<h4 class=list-group-item-heading> Name : ".$res2['Name']."<br></br>Phone No. : ".$res2['Phone_No']."<br></br>Email ID : ".$res2['Email_ID']."</h4><br> Parent Email ID :".$res3['P_email']."<br>Parent Phono No :".$res3['P_No']."<br>";
         ?>
<form method=post action="my_profile.php"> 
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary" value="UPDATE" >Edit</button>
         <input type=hidden name=usn value= <?php echo  $usn ?>> 
      </div>
    </div>
</form>
 
<br></br>
<!--
   <form method=post action="stud_delete.php"> 
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2"> 
        <button type="submit" class=" btn btn-danger" value="DELETE" >DELETE</button>
         <input type=hidden name=usn value= <?php echo  $usn ?>> 
      </div>
    </div>

</form> -->

<br></br>
 <?php  

        } 
        } 
        else 
        { $response = "Problem in sql Query";
          echo $response;}
    }
  }
  

 
?>


 </a>
</div>

<br></br>
<ul class="breadcrumb">
  <li><a href="management.php">Home</a></li>
  <li><a href="retrieve.php">Student Information</a></li>
  <li class="active">Data</li>
</ul>



</div>
</body>
</html>