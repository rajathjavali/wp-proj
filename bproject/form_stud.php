 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}

require_once __DIR__ . '/db_connect.php';
 $db = new DB_CONNECT();

 if ($db) {
  
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
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<?php $flag=$usn=$fname=$sem=$sgpa=$email=$phno=$i=NULL ?>
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
          <?php $usn=$_SESSION['usn']; ?>
          <form class="form-horizontal" id="demo-form" data-parsley-validate method="post">
            <fieldset>
              <legend>Registration</legend>
              <script type="text/javascript">
                function change(){
                document.getElementById("reg").style.display = "none";}
              </script>

                         <?php 
                       
                         $today= Date("Y-m-d H:i:s");
                         $qry="SELECT RegDeadline FROM admin where username='root'";
                         $res=mysql_query($qry);
                          $row = mysql_fetch_row($res);
                          $Dealine= $row[0];
                        
                              
                            if(strtotime($today)<strtotime($Dealine)){?>

    <div class="form-group">
       <label for="textArea" class="col-lg-3 control-label" align="left" >USN</label>
      <div class="col-lg-9">
        <input type="text" class="form-control" id="usn" placeholder="<?php echo $usn; ?>" name="usn"  disabled required value="<?php echo $usn;?>" style="width: 210px;">
      </div>
    </div>
<?php
        $qry1="SELECT MAX(Sem) FROM approve_1 where USN='".$usn."'";
        $res=mysql_query($qry1);
        $row = mysql_fetch_row($res);
        $res1 = $row[0];
      
       ?>

     <div class="form-group">
      <label for="select" class="col-lg-3 control-label" align="left" >Semester</label>
      <div class="col-lg-9">
        <select class="form-control" id="sem" required name="sem" value="<?php echo $sem;?>" style="width: 210px;">

          <?php
        //This code will give the options for only higher semesters. So registering again for the same semester is discarded.
          for($i=$res1+1;$i<=8;$i++){
            echo 
                  '<option>'.$i.'</option>
                  ';
           }
          

        ?>
          
        </select>
        <br>
        
      </div>
    </div>
     <div class="form-group">
      <label for="select" class="col-lg-3 control-label" align="left" >Staff </label>
      <div class="col-lg-9">
        <select class="form-control" id="staff_ID" required name="staff_ID" value="<?php echo $staff_ID;?>" style="width: 210px;">
        <?php
          $qry2="SELECT Shortname from staff WHERE 1";
          $res2=mysql_query($qry2);

          $num=mysql_num_rows($res2);
          while($row3=mysql_fetch_row($res2))
            echo '<option>'.$row3[0].'</option>';
           
        ?>
    </select>
    <br>
    </div>
    </div>

     <div class="form-group">
      <label for="textArea" class="col-lg-3 control-label" align="left"  >SGPA</label>
      <div class="col-lg-9">
        <input type="float" class="form-control" id="sgpa" name="sgpa" placeholder="x.yy" required value="<?php echo $sgpa;?>" style="width: 210px;">
      </div>
    </div>

    <div class="form-group">
      <div id = "deadline" class="col-lg-8 col-lg-offset-2" 
      
        >
        <button type="reset" class="btn btn-default">Cancel</button>
        <button  id="submit" type="submit" class="btn btn-primary">Submit</button>
        </center>
      </div>
    </div>
  <?php } else echo "<h2>Sorry! Registration is currently closed</h2>";?>
  </fieldset>
  </form>
  </center>
  </div>
  <?php }?>
  <ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="management.php">Home</a></li>
  <li class="active">Registration</li>
  </ul>
</div>
</div>
  <script>
    $(document).ready(function(){
      $("#submit").click(function(){
      var usn = $("#usn").val();
      var sem = $("#sem").val();
      var sgpa = $("#sgpa").val();
      var acy = new Date().getFullYear();
      var staff_ID= $("#staff_ID").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&usn1=' + usn + '&sem1='+ sem + '&sgpa1='+ sgpa + '&acy1=' + acy + '&staff_ID1=' + staff_ID ;
      if(usn==''||sem==''||sgpa==''||staff_ID=='')
      {
      alert("Please Fill All Fields");
      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "stud_register.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      }
      });
      }
      return false;
      });
      });
  </script>

</body>
</html>