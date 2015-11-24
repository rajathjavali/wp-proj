 <?php
session_start();
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?> 



 <?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

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
          echo "<h1>Student Data</h1>";
          $usn = $name =$phno = $email = $fname=$mname=$lname= null ; 
          if($_SERVER["REQUEST_METHOD"] == "POST")
          {
            
            $usn = $_POST['usnum'];
            if(!empty($usn))
            {
              require_once __DIR__ . '/db_connect.php';
             
                // connecting to db
                $db = new DB_CONNECT();
              if($db)
              {
                 
                  $sql="select FName,Mname,Lname,Phone_No,Email_ID from student where USN = '".$usn."'";
                  $res = mysql_query($sql);
                   
                  if ($res) 
                  {
                      
                      $response = "Entry Found";
                  $res2=mysql_fetch_array($res);
                  //echo count($res2);
                   
                     
                     { 
                      $fname=$res2['FName'];
                      $mname=$res2['Mname'];
                      $lname=$res2['Lname'];
                      $phno=$res2['Phone_No'];
                      $email=$res2['Email_ID'];
                       ?>

          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>Student Data found</strong>  
          </div>

          <div class="list-group">
             
            <a href="admin_management.php" class="list-group-item">
              <h4 class="list-group-item-heading"> </h4>
              <p class="list-group-item-text"> </p>
           



                       <?php
                      //echo $response."<br>";
                      echo "<h4 class=list-group-item-heading> First Name : ".$res2['FName']."<br></br>Middle Name : ".$res2['Mname']."<br></br> Last Name : ".$res2['Lname']."<br></br>Phone No. : ".$res2['Phone_No']."<br></br>Email ID : ".$res2['Email_ID']."</h4><br>";
                   ?>
              

          <form method=post action="edit_stud.php"> 
          <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success" value="Edit" >Edit</button>
                   <input type=hidden name=usn value= <?php echo  $usn ?>>
              </div>
          </form>
                  <div class="col-lg-10 col-lg-offset-2">
                    <form method=post> 
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-1"> 
                          <button type="submit" id="submit" class=" btn btn-danger" value="DELETE" >DELETE</button>
                          <input type=hidden id="usn" name=usn value= <?php echo  $usn ?>> 
                        </div>
                      </div>
                    </div>
                  </form> 
                </div>



          <br></br>

          <!--<form method=post action="stud_update.php"> 
          <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary" value="UPDATE" >UPDATE</button>
                   <input type=hidden name=usn value= <?php //echo  $usn ?>> 
                </div>
              </div>
          </form>
           
          <br></br>
          !-->

          <br></br>
           <?php  

                  } 
                  } 
                  else 
                  { $response = "Problem in sql Query";
                    echo $response;}
              }
            }
          }
           
          ?>


           </a>
           </center>
          </div>
          </div>
          </div>
<br></br>
<ul class="breadcrumb" id="footer" style="background-color:#202020">
  <li><a href="admin_management.php">Home</a></li>
  <li><a href="asretrieve.php">View Student Details</a></li>
  <li class="active">Data</li>
</ul>
</div>
</div>
<script>
    $(document).ready(function(){
      $("#submit").click(function(){
      var usn=$("#usn").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = '&usn=' + usn;
      if(usn=='')
      {
      alert("Please Fill All Fields");
      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
      url: "stud_delete.php",
      data: dataString,
      cache: false,
      success: function(result){
      alert(result);
      //document.getElementById("box").innerHTML="<input type=hidden name=usn value=<?php echo $usn;?>";
      //window.location='../bproject/asretrieve.php';
      }
      });
      }
      return false;
      });
      });
    </script>
</body>
</html>