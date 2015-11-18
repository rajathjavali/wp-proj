<?php
    
    require ('class.phpmailer.php');
                        $mail = new PHPMailer(); // create a new object
                        $mail->IsSMTP(); // enable SMTP
                         // debugging: 1 = errors and messages, 2 = messages only
                        $mail->SMTPAuth = true; // authentication enabled
                        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 587; // or 465
                        $mail->IsHTML(false);
                        $mail->Username = "wpprojectrrss@gmail.com";
                        $mail->Password = "rvceisewpproject";
                        //$mail->WordWrap = 50;
                        $mail->Subject = "Hello";
                        $mail->Body = "Hopefully this work";
                        //$idee = "vivekv573@gmail.com";
                        $mail->AddAddress("suhasbhatta.a@gmail.com");
                        if(!@$mail->Send())
                        {
                            echo "<script> alert(\"' Error! mail could not be sent because '.$mail->ErrorInfo\"); </script>";
                            header('Refresh:1,url= index.php');
                        }
                        else
                        {
                            echo "<script> alert(\"Message Sent\"); </script>";
                            //header('Refresh:1,url= index.php');
                        }
                   

?>
