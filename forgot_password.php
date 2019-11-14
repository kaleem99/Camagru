<?php
include("config/setup.php");

if(isset($_POST['submit1']))
{
    $email = $_POST['email'];
    $check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->execute([$email]);
    if ($check_email->rowCount() > 0)
    { 
        echo "email is registered ";
        $to = "$email";
        $subject = "Your password";
        $message = "<a href=http://localhost:8080/kmohamma/reset_password.php?email=$email>link</a>
        
        <p>Thanks for Registering.</p>
        <p>Your email is: <b>$email</b></p>";
        
        $from = "kaleem1999@outlook.com";
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
        $headers .= "From: $from" . "\n";
        mail($to,$subject,$message,$headers);
        echo "We have sent you an email with a link to reset your password.<br>";
    }
    else
    {
        echo "your email address is not registered";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Forgot_Password</title>
<link rel="stylesheet" type="text/css" href="forgot_password.css">
</head>
<body>
<div class = "sign">
    <img class="pic" src="http://www.createmepink.com/wp-content/uploads/st/thumb-stock-illustration-sketch-instagram-modern-camera-logo.jpg">
    <div class="box">
    <form action="" method="post" autocomplete="off">
        <h3>Please enter your email to reset your password</h3>
        <br>
        <br>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <input type="submit" class="button1" id = "submit1" value="submit"  name="submit1">
        
    </form>
    <br>
    <br>
    </div>
    <br><br>
    <br>
    </div>
   
</body>


</html>
