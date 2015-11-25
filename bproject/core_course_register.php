<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
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
          width: 1100px;
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
<body><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
  

 $scode=$sname=$credit=$scode=$stype=$t=$numrows=null;
 if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	 $sem=$_POST['sem'];
   $acy=$_POST['acy'];
   $host_dpt=$_POST['host_dpt'];
    //echo $sem;
    //echo $acy;
   //$section=$_POST['section'];
  
	 require_once __DIR__ . '/db_connect.php';
	  
	    $db = new DB_CONNECT();
	 	if($db){


 		$sql = "SELECT S_Code FROM syllabus WHERE S_type='core' and sem= '".$sem."' and Host_Dpt='".$host_dpt."'";
   // echo $sql;
    $result=mysql_query($sql);
		    $usn=   $_SESSION['usn'];
        $query="INSERT INTO studcourse(`USN`, `ccode`,`acy`,`sem`) VALUES " ;
 	 if ($result && mysql_num_rows($result)) 
 	 {
    	

    	    $numrows = mysql_num_rows($result);
           	$t=array($numrows);
    		$i=0;
        	while ($row = mysql_fetch_assoc($result)) 
        	{    $query .="(";
            	$t[$i]=$row['S_Code'];
     			    $i=$i+1;
              $query .= "'".$usn."','".$row['S_Code']."','".$acy."','".$sem."' )";
              if($i< $numrows)
                 $query.=",";
      		}
         
      }     

echo "<br></br>";
 //echo $query;

      //echo $numrows;
     //to check wether there are actual number of subject entered in syllabus table
       $result1=mysql_query($query);

                if($result1){ ?>

                    <script type="text/javascript">
                    alert("Successfully Registered");
                    window.location="../bproject/management.php";
                    </script>
                <?php    
                }

                else {
                    echo "<h1>You have already registered for following subject</h1>";
                }


   
}
//echo "<form method=post action=management.php><input type=submit name=submit value=Home></form>";
 }
?>
</center>
</div>
</div>
   <ul class="breadcrumb" id="footer" style="background-color:#202020">
    <li><a href="management.php">Home</a></li>
    <li><a href="retrive_syllabus.php">Core subject list</a></li>    
    <li class="active">Core Subject Registration</li>
  </ul>
</div>
</body>
</html>
