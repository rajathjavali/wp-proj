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
          
        echo "<h1>Syllabus data</h1>";
         $scode=$sname=$credit=$sem=$scode=$stype=$t=$result=null;
         $usn=$_SESSION['usn'];
         if($_SERVER["REQUEST_METHOD"] == "POST"){
        	 $acy=$_POST['acy'];
        	 $sem=$_POST['sem'];
        	 require_once __DIR__ . '/db_connect.php';
        	  
        	 //$ac='HSS';
        	    // connecting to db
        	    $db = new DB_CONNECT();
        	 	if($db){

        	 	$sql1 = "SELECT `Sem` FROM `approve_1` WHERE `USN`='".$usn."'";
        	 	$resusn=mysql_query($sql1);

        	 	if($resusn){
        	 		if(mysql_num_rows($resusn)){
        	 			$ti=array($numrows);
            		$ii=0;
        	 			while ($rows = mysql_fetch_assoc($resusn)) 
                {  	
                  $ti[$ii]=$rows[Sem];
             			 $ii=$ii+1;	
                }
        	 		}
        	 	}
         		$sql = "SELECT * FROM syllabus WHERE S_type='course' and acy = '".$acy."' and sem= '".$sem."'";
         		$result=mysql_query($sql);
         		$numrows=null;
        		
         	 if ($result && mysql_num_rows($result)) 
         	 {	

            	    $numrows = mysql_num_rows($result);
                    print "<h2>There are $numrows entries in core subject:<br ></h2>";
            		$t=array($numrows);
            		$i=0;
                
              }   else{
              	echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";
              }  

            $i=0;

        }
        			
        		else{
        			echo "Problem in connecting to database";
        		}	 
        	 
        }
         
        ?>

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
        <?php while($rows=mysql_fetch_assoc($result)){ 

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
         } ?>    
            
          </tbody>
        </table> 
        <br>

        <form method="post" action="excel_subjects_list.php">
          <div class="col-lg-50" align="right">
            <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>"><button type="submit" class="btn btn-primary">Download as Excel</button>
          </div>
        </form>
        <br/><br/>
        </center>
        </div>
  <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="admin_management.php">Home</a></li>
  <li><a href="asretrive_syllabus.php">Select semester</a></li>
  <li class="active">Core subject Details</li>
  </ul>
</div>
</div>
</body>
</html>
