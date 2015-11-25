<?php include ('header.php'); ?>
<?php include ('navbar.php'); ?>
 
 <?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>
<h1>Elective Subject Data data</h1>
<?php
  
 
 $scode=$sname=$credit=$sem=$scode=$stype=$t=null;
  $usn=$_SESSION['usn'];
  $acy=$_POST['acy'];
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
switch ($sem) {
	case '5':
		$type1 ='A';
		$type2 ='B';		
		break;

	case '6':
		$type1='C';
		$type2='D';
		break;
}

$sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type1."'";
//echo $sql;
 		$result=mysql_query($sql);
 		$numrows=null; ?>
    <br><h4>Select one of subject from <i>Group <?php echo $type1;?></i>  </h4> <br></br> 
<form method="post" action="final_elective_register.php">
<fieldset  style="width:300px"><ol>
		<?php
 	 if ($result && mysql_num_rows($result)) 
 	 {	
    	    $numrows = mysql_num_rows($result);
            print "There are $numrows entries in <i>Group $type1</i> elective subject:<br /><br />";
    		/*$ta=array($numrows);
    		$na=array($numrows);*/
    		$i=0;
        while ($row = mysql_fetch_assoc($result)) 
        	{ 
            
     		 	$ta[$i]=$row['S_Code'];
     		 	$na[$i]=$row['Name'];
          //echo $na[$i];
     			 
          echo ' <li>'  .($na[$i]). '<input type="radio" name="scode1" required value="'.($ta[$i]).'"/><br></br></li>
       '; 
 $i=$i+1;
     			 //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }}   ?>

</ol>
 </fieldset>


<?php
  $sql = "SELECT S_Code,Name FROM syllabus,elective WHERE elective.E_Code = syllabus.S_Code and E_Type='".$type2."'";
 $result=mysql_query($sql);
    $numrows=null; ?>
    <br><h4>Select one of subject from <i>Group <?php echo $type2;?></i>  </h4> <br></br> 

<fieldset  style="width:300px"><ol>
    <?php
   if ($result && mysql_num_rows($result)) 
   {  
          $numrows = mysql_num_rows($result);
            print "There are $numrows entries in <i>Group $type2</i> elective subject:<br /><br />";
        /*$ta=array($numrows);
        $na=array($numrows);*/
        $i=0;
        while ($row = mysql_fetch_assoc($result)) 
          { 
            
          $ta[$i]=$row['S_Code'];
          $na[$i]=$row['Name'];
          //echo $na[$i];
           
          echo ' <li>'  .($na[$i]). '<input type="radio" name="scode2" required value="'.($ta[$i]).'"/><br></br></li>
       '; 
 $i=$i+1;
           //echo "<br></br> <b><li>Subject name </b>:".$row[Name]."  <b>Subject Code </b>:".$row[S_Code]."</li>";
      }}   ?>

</ol>
 </fieldset>
<?php
print "<br />";print "<br />";
            
print "<br />";
?>
				<input type="hidden" name="sem" value="<?php echo $sem; ?> ">
       <input type="hidden" name="acy" value="<?php echo $acy; ?>" >
				<br><br><input type="submit" name="submit" value="Register" >
				</form>


                    
          
       <?php

}
			
		else{
			echo "Problem in connecting to database";
		}	 
	 
}
 
?>