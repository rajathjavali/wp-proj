<?php

$con=mysqli_connect('localhost','root','root','bproject');

if (mysqli_connect_errno()) { 
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$sem = $_POST['sem'];
$dept = $_POST['dept'];
$course = $_POST['course'];
$acy = $_POST['acy'];
$sub = $_POST['sub'];
$usn = $_SESSION['usn']


$query = "SELECT distinct cdte,ctme FROM attends,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' 
        and syllabus.S_type='".$course."' and attends.ccode=syllabus.S_code and syllabus.Name='".$sub."'";
$export = mysqli_query($con,$query ) or die(mysqli_error($con));

$totalclass=0;
$datetimeheader="usn\t";
while( $row = mysqli_fetch_row( $export ) )
{
    foreach( $row as $value )
    {            
        $datetimeheader.=$value." ";
    
    }
    $datetimeheader.="\t";
    $totalclass=$totalclass+1;
}

$query = "SELECT susn,cdte,ctme,status FROM attends,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' 
        and syllabus.S_type='".$course."' and attends.ccode=syllabus.S_code 
        and syllabus.Name='".$sub."' and attends.susn='".$usn."'";
$export = mysqli_query($con,$query ) or die(mysqli_error($con));

$data ='';
$count=1;
while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    $j=1;
    foreach( $row as $value )
    {    
        if($count == 1 && $j == 1){
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"';  
            $line = $value;  
        }

        if($j == 4){
            $line .= "\t".$value;
        }
        
        $j=$j+1;
    }
    if($count == $totalclass){
        $data .= $line . "\n";
        $count = 1;
    }
    else{
        $data.= $line;
        $count=$count+1;
    }

    
}

$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}


// allow exported file to download forcefully
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Sem".$sem."_".$sub."_attendancelist.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$datetimeheader\n$data";
}
?>