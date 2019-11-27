<?php
include("config/setup.php");
$to = "$email";
    $subject = "Your password";
    $message = "<p>Hello: $name you will no longer recieve an email</p>
    
    <p>Thanks for Registering.</p>
    <p>Your email is: <b>$email</b></p>";
    
    $from = "kaleem1999@outlook.com";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    mail($to,$subject,$message,$headers);
    echo "you will no longer recive mail.<br>";
?>