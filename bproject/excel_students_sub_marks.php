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
//echo $sem. " ".$etype;
$query = "SELECT susn,t1,q1,t2,q2,t3,q3,lab,assign FROM marks,syllabus WHERE syllabus.sem='".$sem."' and 
        (syllabus.Host_Dpt='".$dept."' or syllabus.Host_Dpt='HSS') and syllabus.acy='".$acy."' and syllabus.S_type='".$course."' and marks.ccode=syllabus.S_code and syllabus.Name='".$sub."'";
$header = '';
$data ='';

$export = mysqli_query($con,$query ) or die(mysqli_error($con));



while ($fieldinfo=mysqli_fetch_field($export))
{
    $header .= $fieldinfo->name."\t";
}

while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\nNo Record(s) Found!\n";                        
}


// allow exported file to download forcefully
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Sem".$sem."_".$sub."_markslist.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
}
?>