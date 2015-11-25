<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: ../bproject/index.html');
}
$numrows=$type1=null;
?>
<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>

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
    height: 270px;
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

<div class="container" style="background-color:#9DBCBC">
<center>
<?php 
 $scode=$sname=$credit=$sem=$scode=$stype=$t=$acy=null;
 $usn=$_SESSION['usn'];
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
    $acy=$_POST['acy'];
    $stype=$_POST['stype'];
    $sem=$_POST['sem']; 
    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    if($db)
    {
      $type1=$type2=$type3=null;
      switch ($sem) 
      {
        case '5':
          $type1 ='A';
          $type2 ='B';    
          break;

        case '6':
          $type1='C';
          $type2='D';
          break;

        case '7';
          $type1='E';
          $type2='F';
          $type3='G';
      }
      if(($sem=='5'||$sem=='6')&&$stype=='local')
      {
        $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."'and syllabus.acy='".$acy."'";
        $result=mysql_query($sql);
        $numrows=null;
        if ($result && mysql_num_rows($result)) 
        {  
          $numrows = mysql_num_rows($result);    
          $t=array($numrows);
          $i=0;
          echo"<h1><i>Group ".$type1."</i> elective subject:<br /><br /></h1>";
        }
        else
        {
          echo "<br><b><h1>Request admin to update syllabus of <i>semester '$sem'</i> ...!!</h1></b></br>";
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
        <?php while($rows=mysql_fetch_assoc($result))
        { 
          ?>
            <tbody>
              <tr ><ol>
                <td><h4><?php echo $rr; ?>]</h4> </td>
                <td><h4><?php echo $rows['S_Code'] ?></h4></td>
                <td><h4><?php echo $rows['Name'] ?></h4></td>
                <td><h4><?php echo $rows['Credits'] ?></h4></td>
                <td><h4><?php echo $rows['Host_Dpt'] ?></h4></td>
              </ol> </tr>
          <?php 
            $rr=$rr+1;
        } 
        ?>    
        <br>
         <table class="table table-striped table-hover ">
          <form method="post" action="excel_elective_list.php">
            <div class="col-lg-50" align="right">
              <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>">
              <input type="hidden" id="etype" required name="etype" value="<?php echo $type1;?>">
              <button type="submit" class="btn btn-primary">Download as Excel</button>
            </div>
          </form>
          <br/><br/>
        <?php
        $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."' and syllabus.acy='".$acy."'";         
        $result1=mysql_query($sql);
        $numrows=null;    
        if ($result1 && mysql_num_rows($result1)) 
        {  
          $numrows = mysql_num_rows($result1);          
          $t=array($numrows);
          $i=0;
          echo"<thead><h1><i>Group".$type2."</i> elective subject:<br /><br /></h1>";
        }
        else
        {
          echo "<br><br><b><h1> Request admin to update syllabus of <i>semester '$sem'</i> ...!! </h1></b></br></br>";
        }?>
        <tr class="danger">
          <th>`</th>
          <th><h2>Subject Code</h2></th>
          <th><h2>Subject Name</h2></th>
          <th><h2>Credits</h2></th>
          <th><h2>Host Department</h2></th>
        </tr>
        </thead>
        <?php $rr=1; ?>
        <?php while($rows=mysql_fetch_assoc($result1))
        { 
          ?>
          <tbody>
            <tr ><ol>
              <td><h4><?php echo $rr; ?>]</h4> </td>
              <td><h4><?php echo $rows['S_Code'] ?></h4></td>
              <td><h4><?php echo $rows['Name'] ?></h4></td>
              <td><h4><?php echo $rows['Credits'] ?></h4></td>
              <td><h4><?php echo $rows['Host_Dpt'] ?></h4></td>
          </ol> </tr>
          <?php 
          $rr=$rr+1;
        }
        ?>     
        </tbody>
        </table> 
        <br></br>
        <form method="post" action="excel_elective_list.php">
          <div class="col-lg-50" align="right">
            <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>">
            <input type="hidden" id="etype" required name="etype" value="<?php echo $type2;?>">
            <button type="submit" class="btn btn-primary">Download as Excel</button>
          </div>
        </form>
        <br/><br/>
      <?php 
      }
      else if(($sem==5||$sem==6)&&$stype=='global')
        echo "<h2>Global electives are not offered in ".$sem." semester</h2>";
      else if($sem=='7'&& $stype=='local')
      {
        $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."'and syllabus.acy='".$acy."'";
        $result=mysql_query($sql);
        $numrows=null;
        if ($result && mysql_num_rows($result)) 
        {  
          $numrows = mysql_num_rows($result);    
          $t=array($numrows);
          $i=0;
          echo"<h1><i>Group ".$type1."</i> elective subject:<br /><br /></h1>";
        }
        else
        {
          echo "<br><b><h1>Request admin to update syllabus of <i>semester '$sem'</i> ...!!</h1></b></br>";
          goto a;
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
        <?php while($rows=mysql_fetch_assoc($result))
        { 
          ?>
          <tbody>
            <tr ><ol>
              <td><h4><?php echo $rr; ?>]</h4> </td>
              <td><h4><?php echo $rows['S_Code'] ?></h4></td>
              <td><h4><?php echo $rows['Name'] ?></h4></td>
              <td><h4><?php echo $rows['Credits'] ?></h4></td>
              <td><h4><?php echo $rows['Host_Dpt'] ?></h4></td>
            </ol> </tr>
          </tbody>
          </table>
          <br></br>
          <form method="post" action="excel_elective_list.php">
            <div class="col-lg-50" align="right">
              <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>">
              <input type="hidden" id="etype" required name="etype" value="<?php echo $type2;?>">
              <button type="submit" class="btn btn-primary">Download as Excel</button>
            </div>
          </form>
          <?php 
          $rr=$rr+1;
        }
      }
      else if($sem=='7'&& $stype=='global')
      {
        $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."'and syllabus.acy='".$acy."'";
        $result=mysql_query($sql);
        $numrows=null;
        if ($result && mysql_num_rows($result)) 
        {  
          $numrows = mysql_num_rows($result);    
          $t=array($numrows);
          $i=0;
          echo"<h1><i>Group ".$type2."</i> elective subject:<br /><br /></h1>";
        }
        else
        {
          echo "<br><b><h1>Request admin to update syllabus of <i>semester '$sem'</i> ...!!</h1></b></br>";
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
        <?php while($rows=mysql_fetch_assoc($result))
        { 
          ?>
            <tbody>
              <tr ><ol>
                <td><h4><?php echo $rr; ?>]</h4> </td>
                <td><h4><?php echo $rows['S_Code'] ?></h4></td>
                <td><h4><?php echo $rows['Name'] ?></h4></td>
                <td><h4><?php echo $rows['Credits'] ?></h4></td>
                <td><h4><?php echo $rows['Host_Dpt'] ?></h4></td>
              </ol> </tr>
          <?php 
            $rr=$rr+1;
        } 
        ?>    
        <br>
         <table class="table table-striped table-hover ">
          <form method="post" action="excel_elective_list.php">
            <div class="col-lg-50" align="right">
              <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>">
              <input type="hidden" id="etype" required name="etype" value="<?php echo $type1;?>">
              <button type="submit" class="btn btn-primary">Download as Excel</button>
            </div>
          </form>
          <br/><br/>
        <?php
        $sql = "SELECT S_Code,Name,Credits,Host_Dpt FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type3."' and syllabus.acy='".$acy."'";         
        $result1=mysql_query($sql);
        $numrows=null;    
        if ($result1 && mysql_num_rows($result1)) 
        {  
          $numrows = mysql_num_rows($result1);          
          $t=array($numrows);
          $i=0;
          echo"<thead><h1><i>Group".$type3."</i> elective subject:<br /><br /></h1>";
        }
        else
        {
          echo "<br><br><b><h1> Request admin to update syllabus of <i>semester '$sem'</i> ...!! </h1></b></br></br>";
        }?>
        <tr class="danger">
          <th>`</th>
          <th><h2>Subject Code</h2></th>
          <th><h2>Subject Name</h2></th>
          <th><h2>Credits</h2></th>
          <th><h2>Host Department</h2></th>
        </tr>
        </thead>
        <?php $rr=1; ?>
        <?php while($rows=mysql_fetch_assoc($result1))
        { 
          ?>
          <tbody>
            <tr ><ol>
              <td><h4><?php echo $rr; ?>]</h4> </td>
              <td><h4><?php echo $rows['S_Code'] ?></h4></td>
              <td><h4><?php echo $rows['Name'] ?></h4></td>
              <td><h4><?php echo $rows['Credits'] ?></h4></td>
              <td><h4><?php echo $rows['Host_Dpt'] ?></h4></td>
          </ol> </tr>
          <?php 
          $rr=$rr+1;
        }
        ?>     
        </tbody>
        </table> 
        <br></br>
        <form method="post" action="excel_elective_list.php">
          <div class="col-lg-50" align="right">
            <input type="hidden" id="sem" required name="sem" value="<?php echo $sem;?>">
            <input type="hidden" id="etype" required name="etype" value="<?php echo $type2;?>">
            <button type="submit" class="btn btn-primary">Download as Excel</button>
          </div>
        </form>
        <br/><br/>
      <?php 
      }  
      else
      {
        echo "Problem in connecting to database";
      }  
    }
  }
  ?>
<br>
<?php a:?>
  </div>
  </center>
  </div>
    <ul class="breadcrumb" id="footer" style="background-color:#202020">
      <li><a href="admin_management.php">Home</a></li>
      <li><a href="asretrieve_elective.php">Select semester and type</a></li>
      <li class="active">Elective List</li>
    </ul>
</div>
</div>
</body>
</html>