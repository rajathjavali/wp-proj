 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>
<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>
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
          width: 800px;
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

        <div class="box" style="font-size:20px;"><center>
<h1>Elective Subject Data</h1>
<?php
  
 
 $scode=$sname=$credit=$sem=$scode=$stype=$t=null;
  $usn=$_SESSION['usn'];
  $acy=$_POST['acy'];
  $type=$_POST['type'];
  $dept=$_POST['dept'];
  //$section=$_POST['section'];
   
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 
	 $sem=$_POST['sem'];
	 require_once __DIR__ . '/db_connect.php';
	  
	 
$db = new DB_CONNECT();
if($db){


//echo $sem;
$sem=intval($sem);

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

$sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."' and S_type='".$type."' and Host_Dpt='".$dept."'";
//echo $sql;
 		$result=mysql_query($sql);
 		$numrows=null; ?>
    <h2>Select one of subject from <i>Group <?php echo $type1;?></i>  </h2> <br>
<form method="post" action="final_elective_register.php">
<fieldset  style="width:700px" align="justify"><ol>
		<?php
 	 if ($result && mysql_num_rows($result)) 
 	 {	
    	    $numrows = mysql_num_rows($result);
    		/*$ta=array($numrows);
    		$na=array($numrows);*/
    		$i=0;
        while ($row = mysql_fetch_assoc($result)) 
        	{ 
            
     		 	$ta[$i]=$row['S_Code'];
     		 	$na[$i]=$row['Name'];
          //echo $na[$i];
     			 
          echo '<input type="radio" name="scode1" required value="'.($ta[$i]).'"/><label style="padding-left: 10px;">'.($na[$i]).'</label><br>
       '; 
 $i=$i+1;
     			 //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }  }?>

</ol>
 </fieldset>


<?php
if((($sem=='5' || $sem=='6' ) && $type=="local") || ($sem=='7' && $type=="global")){

  $sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."' and Host_Dpt='".$dept."'";
 $result=mysql_query($sql);
    $numrows=null; ?>
    <h2>Select one of subject from <i>Group <?php echo $type2;?></i>  </h2> <br> 

<fieldset  style="width:700px" align="justify"><ol>
    <?php
   if ($result && mysql_num_rows($result)) 
   {  
          $numrows = mysql_num_rows($result);
        /*$ta=array($numrows);
        $na=array($numrows);*/
        $i=0;
        while ($row = mysql_fetch_assoc($result)) 
          { 
            
          $ta[$i]=$row['S_Code'];
          $na[$i]=$row['Name'];
          //echo $na[$i];
           
          echo '<input type="radio" name="scode2" required value="'.($ta[$i]).'" /><label style="padding-left: 10px;">'.($na[$i]). '</label><br>
       '; 
 $i=$i+1;
           //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }} } } ?>

</ol>
<?php 
if($type=="global"){
  $sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."' and S_type='".$type."' and Host_Dpt='".$dept."'";
//echo $sql;
    $result=mysql_query($sql);
    $numrows=null; ?>
    <h2>Select one of subject from <i>Group <?php echo $type1;?></i>  </h2> <br>
<form method="post" action="final_elective_register.php">
<fieldset  style="width:700px" align="justify"><ol>
    <?php
   if ($result && mysql_num_rows($result)) 
   {  
          $numrows = mysql_num_rows($result);
        /*$ta=array($numrows);
        $na=array($numrows);*/
        $i=0;
        while ($row = mysql_fetch_assoc($result)) 
          { 
            
          $ta[$i]=$row['S_Code'];
          $na[$i]=$row['Name'];
          //echo $na[$i];
           
          echo '<input type="radio" name="scode1" required value="'.($ta[$i]).'"/><label style="padding-left: 10px;">'.($na[$i]).'</label><br>
       '; 
 $i=$i+1;
           //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }  }?>

</ol>
 </fieldset>


<?php
if((($sem=='5' || $sem=='6' ) && $type=="local") || ($sem=='7' && $type=="global")){

  $sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."' and Host_Dpt='".$dept."'";
 $result=mysql_query($sql);
    $numrows=null; ?>
    <h2>Select one of subject from <i>Group <?php echo $type2;?></i>  </h2> <br> 

<fieldset  style="width:700px" align="justify"><ol>
    <?php
   if ($result && mysql_num_rows($result)) 
   {  
          $numrows = mysql_num_rows($result);
        /*$ta=array($numrows);
        $na=array($numrows);*/
        $i=0;
        while ($row = mysql_fetch_assoc($result)) 
          { 
            
          $ta[$i]=$row['S_Code'];
          $na[$i]=$row['Name'];
          //echo $na[$i];
           
          echo '<input type="radio" name="scode2" required value="'.($ta[$i]).'" /><label style="padding-left: 10px;">'.($na[$i]). '</label><br>
       '; 
 $i=$i+1;
           //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }} } } ?>

</ol>
       <?php
}

}
      
    else{
      echo "Problem in connecting to database";
    }  
   ?>

 </fieldset>

				<input type="hidden" name="sem" value="<?php echo $sem; ?> ">
       <input type="hidden" name="acy" value="<?php echo $acy; ?>" >
       <input type="hidden" name="type" value="<?php echo $type;?>">
       <input type="hidden" name="dept" value="<?php echo $dept?>">
				<br><br><input type="submit" name="submit" value="Register" >
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