<?php include ('header.php'); ?>
<?php include ('navbar1.php'); ?>
 
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
<body><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <div id="page">
      <div id="maincontent">
        <div id="topbar" style="color:#FFFFFF;">
          <center>
          <div style="position:relative;">
          <p style="float: left; "><img src="images/logo1.gif" style="position:absolute; left:340px" height="70px" width="70px" border="1px"></p>
          </div>
          <p><h5>Rashtreeya Sikshana Samithi Trust</h5></p>
          <p><h4><b>R V College of Engineering</b></h4></p>
          <p><h6>Mysore Road, RV Vidyaniketan Post, Bangalore - 560 059</h6></p>
          </center>
        </div>
        <hr>

        <div class="box"><center>
         <?php
          
        echo "<h1>Syllabus data</h1>";
         $scode=$sname=$credit=$sem=$scode=$stype=$t=$result=null;
         $usn=$_SESSION['usn'];
         if($_SERVER["REQUEST_METHOD"] == "POST"){
        	 
        	  $sem=$_POST['sem'];
            $acy=$_POST['acy'];
        	  require_once __DIR__ . '/db_connect.php';
        	  $numrows=NULL;
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
                	{  	$ti[$ii]=$rows["Sem"];
             			 $ii=$ii+1;	}
           		}
           	}
         		$sql = "SELECT * FROM syllabus WHERE S_type='core' and sem= '".$sem."' and acy ='".$acy."'";
         		$result=mysql_query($sql);
         		$numrows=null;
        		
         	  if ($result && mysql_num_rows($result)){

         	    $numrows = mysql_num_rows($result);
              print "<h2>There are $numrows entries in core subject:<br ></h2>";
            	$t=array($numrows);
            	$i=0;        
            } 
            else
              echo "<br><b> Request admin to update syllabus of <i>semester '$sem'</i> ...!!</b></br>";

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
         
        <?php if( $ti[0]==$sem ){ ?>


        <?php 

        switch ($sem) {
        	case '3':
        		$abc = '3course_register.php';
        		break;
        	case '4':
        		$abc = '4course_register.php';
        		break;
        	case '5':
        		$abc = '5course_register.php';
        		break;
        	
        	 case '6':
        	 	$abc = '6course_register.php';
        	 	break;
        }

         ?>






        <form method="post" action="<?php echo $abc ?>"> 
        				 <!-- <input type=hidden name=sem value= <?php //echo $sem ?>>  -->
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <?php
                $today= Date("Y-m-d H:i:s");
                $qry="SELECT RegDeadline FROM admin where username='root'";
                $res=mysql_query($qry);
                $row = mysql_fetch_row($res);
                $Deadline= $row[0];
                if($ti[0]==$sem && strtotime($today)<strtotime($Deadline)){
                  echo '
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary" value="Register" >Register</button>
                     <input type=hidden name=sem value= <?php echo $sem ?> 
                     <input type=hidden name=acy value =<?php echo $acy ?>';
              
            
               echo '</div>
                      </div>';
                    }

           else { echo "<script>alert('Registration is closed now');</script>";
                //header('Location:/bproject/management.php');
                echo "<script>window.location = '../bproject/management.php';</script>";
              }
               ?>


          				<!--  <br><br><input type=submit name=submit value=Register>  -->
          <?php }else{ ?>
          	 <br><b>You cannot register for this semester now</b></br> 
          <?php } ?>

           <br></br>
          </fieldset>
        </form>  
      </div>
      </center>
    </div> 

   <ul class="breadcrumb">
    <li><a href="management.php">Home</a></li>
    <li class="active">Core Subject list</li>
  </ul>
</div>
</body>
</html>
