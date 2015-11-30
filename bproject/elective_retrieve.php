 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
?>
<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>

<?php
  
 
 $scode=$sname=$credit=$sem=$scode=$stype=$t=$acy=null;
 $usn=$_SESSION['usn'];
 if($_SERVER["REQUEST_METHOD"] == "POST"){
   $acy=$_POST['acy'];
   $sem=$_POST['sem'];
   $dept=$_POST['host_dpt'];
   $type=$_POST['type'];
   $flag='1';
   //echo $type;
    
   require_once __DIR__ . '/db_connect.php';
    
    $numrows=NULL;
      $db = new DB_CONNECT();
    if($db){

    $qry1="SELECT MAX(Sem) FROM approve_1 where USN='".$usn."'";
        $res=mysql_query($qry1);
        $row = mysql_fetch_row($res);
        $res1 = $row[0];
      
 
$type1=$type2=null;
//$ti[0] has got the semester values
if($type=="local") {
switch ($sem) {
  case '5':
    $type1 ='A';
    $type2 ='B';    
    break;

  case '6':
    $type1='C';
    $type2='D';
    break;
  case '7':
    $type1='E';
    break;
}
}
else if($type="global")
{
  $type1="GG";
  $type2="GF";
}
if($type=="local"){
$sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."' and acy='".$acy."' and sem='".$sem."' and Host_dpt='".$dept."' and S_type='".$type."'";
 
    $result=mysql_query($sql);
    $numrows=null;
    
   if ($result && mysql_num_rows($result)) 
   {  
     $numrows = mysql_num_rows($result);
            
        $t=array($numrows);
        $i=0; 
      }   else{
        //echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  

if((($sem=='5' || $sem=='6' ) && $type=="local") || ($sem=='7' && $type=="global")){
$sql1 = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."' and acy='".$acy."' and sem='".$sem."' and Host_dpt='".$dept."'and S_type='".$type."'";
 
    $result1=mysql_query($sql1);
    $numrows=null;
    
   if ($result1 && mysql_num_rows($result1)) 
   {  
     $numrows = mysql_num_rows($result1);
            echo $numrows;
        $t1=array($numrows);
        //$i=0; 
      }   else{
        //echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  
 

}

}

if($type=="global" and $sem=='7'){
  $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."' and acy='".$acy."' and sem='".$sem."' and  S_type='".$type."'";
 
    $result=mysql_query($sql);
    $numrows=null;    
   if ($result && mysql_num_rows($result)) 
   {  
     $numrows = mysql_num_rows($result);
            
        $t=array($numrows);
       // $i=0; 
      }   else{
        //echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  
if((($sem=='5' || $sem=='6' ) && $type=="local") || ($sem=='7' && $type=="global")){
$sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."' and acy='".$acy."' and sem='".$sem."' and S_type='".$type."'";
 
    $result1=mysql_query($sql);
    $numrows=null;
    
   if ($result1 && mysql_num_rows($result1)) 
   {  
     $numrows = mysql_num_rows($result1);
            
        $t1=array($numrows);
        //$i=0; 
      }   else{
        //echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
      }  
 

}

}
      
    
}
 
?>


<!DOCTYPE html>
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
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="check_sem.js"></script>
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
          width: 1000px;
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
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="excel_uploader_sublist.js"></script>
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
<h1>Elective Subject Data</h1><hr>
<?php if(!($type=="global" and $sem!='7') ){ ?>
<h1>There are <?php echo $numrows; ?> entries in <i>Group <?php echo $type1."  "; ?></i> elective subject:<br /><br /></h1>

<table class="table table-striped table-hover ">
  <thead>
    <tr class="danger">
      <th>`</th>
      <th><h2>Subject Code</h2></th>
      <th><h2>Subject Name</h2></th>
      <th><h2>Credits</h2></th>
      <th><h2>Host Department</h2></th>
    </tr>
  </thead>

  

 
<?php $rr=1; ?>

<?php

while($rows=mysql_fetch_assoc($result)){ 

  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?>]</h4> </td>
      <td><h4><?php echo $rows["S_Code"] ?></h4></td>
      <td><h4><?php echo $rows["Name"] ?></h4></td>
      <td><h4><?php echo $rows["Credits"] ?></h4></td>
      <td><h4><?php echo $rows["Host_Dpt"] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } if((($sem=='5' || $sem=='6' ) && $type=="local") || ($sem=='7' && $type=="global")){ ?>    


 <table class="table table-striped table-hover ">
  <thead><h1>There are <?php echo $numrows; ?> entries in <i>Group <?php echo $type2."  "; ?></i> elective subject:<br /><br /></h1>
    <tr class="danger">
      <th>`</th>
      <th><h2>Subject Code</h2></th>
      <th><h2>Subject Name</h2></th>
      <th><h2>Credits</h2></th>
      <th><h2>Host Department</h2></th>
    </tr>
  </thead>
  

 
<?php $rr=1; ?>
<?php while($rows=mysql_fetch_assoc($result1)){ 

  ?>
  <tbody>
    <tr ><ol>
      <td><h4><?php echo $rr; ?></h4> </td>
      <td><h4><?php echo $rows["S_Code"] ?></h4></td>
      <td><h4><?php echo $rows["Name"] ?></h4></td>
      <td><h4><?php echo $rows["Credits"] ?></h4></td>
      <td><h4><?php echo $rows["Host_Dpt"] ?></h4></td>
   </ol> </tr>
 <?php 
$rr=$rr+1;
 } ?>    
    
  </tbody>
</table> 

 <br></br>



<?php } 
}
else
  echo "<b>No Global Elective for Semester ".$sem;
  $flag=0;
if( $res1==$sem ){ ?>






 <form method=post action= 'elective_course_register.php '> 
         <!-- <input type=hidden name=sem value= <?php //echo $sem ?>>  -->

<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
<?php
       $today= Date("Y-m-d H:i:s");
    $qry="SELECT eleDeadline FROM admin where username='root'";
    $res=mysql_query($qry);
    $row = mysql_fetch_row($res);
    $Dealine= $row[0];
if($res1==$sem && strtotime($today)<strtotime($Dealine)){ ?>
   
         <input type="hidden" name="sem" value = "<?php echo $sem; ?> ">
         <input type="hidden" name="acy" value ="<?php echo $acy; ?>">
         <input type="hidden" name="type" value="<?php echo $type;?>" >
         <input type="hidden" name="dept" value="<?php echo $dept?>" >
         <button type="reset" class="btn btn-default">Cancel</button>
         <button type="submit" class="btn btn-primary" value="Register" >Register</button>
        
      </div>
              </div>
     <?php       }

   else { echo "<script>alert('Registration is closed now');</script>";
        //header('Location:/bproject/management.php');
        echo "<script>window.location = '../bproject/management.php';</script>";
      }
       ?>


        <!--  <br><br><input type=submit name=submit value=Register>  -->
<?php } 
  
}
else{
      echo "Problem in connecting to database";
    }  
   ?>

 <br></br>
</fieldset>
</form>
</center> 
</div>
</div>

    <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="management.php">Home</a></li>
  <li class="active">Registration</li>
</ul>

</div>
</body>
</html>