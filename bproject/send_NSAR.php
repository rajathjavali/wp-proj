<?php include ('navbar.php'); ?>
<?php include ('header.php'); ?>
<?php
session_start();
// Check, if username session is NOT set then this page will jump to login page
if ((!isset($_SESSION['usn']))||(!isset($_SESSION['password']) )){
header('Location: /bproject/index.html');
}
?>



<?php

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "smtp.example.com"; // SMTP server

$mail->From     = "asbhatta@gmail.com";
$mail->AddAddress("suhasbhatta.a@gmail.com");

$mail->Subject  = "First PHPMailer Message";
$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
$mail->WordWrap = 50;

if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<?php 
$i=0;
for($i=0;$i<10;$i++) {
echo '
<label id="check"><input type="checkbox" class="checkbox1" id="check" name="NSAR" value="value">'.$i.'</label><br>
';
}
?>
<input id = "selectall" type="checkbox" name="select all" value="select all" > 
<script type="text/javascript">
	$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
	}
</script>
</body>
</html>