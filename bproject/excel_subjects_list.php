<?php

 require_once __DIR__ . '/db_connect.php';
        $db = new DB_CONNECT();
if($_SERVER["REQUEST_METHOD"] == "POST"){
$sem=$_POST['sem'];
echo $sem;
$query = "SELECT * FROM syllabus WHERE S_type='core' and sem= '".$sem."'";
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
header("Content-Disposition: attachment; filename=sem".$sem."_syllabus.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";
}
?>