<?php

include("config/setup.php");
// include("form.php");

if(isset($_POST['register'])){
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];
    $TK = password_hash(time(), PASSWORD_BCRYPT);
    if ($password != $password2)
    {
        echo "passwords do not match";
        exit();
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) 
    {
        echo "password should be strong";
    }

    $check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->execute([$email]);
    $check_username = $db->prepare("SELECT username FROM users WHERE username = ?");
    $check_username->execute([$username]);
    
    if ($check_username->rowCount() > 0 || $check_email->rowCount() > 0)
    {
        echo "username or email already exists";
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`fullname`, `username`, `email`, `passwd`, `Token`) VALUES ('$name', '$username', '$email', '$hashed', '$TK')";
    $db->query($query);
    echo "User registered 2\n";
  
    $to = "$email";
    $subject = "Your password";
    $message = "<a href=http://localhost:8080/kmohamma/email_validation.php?username=$username>link</a>.<p>Hello: $name</p>
    
    <p>Thanks for Registering.</p>
    <p>Your email is: <b>$email</b></p>";
    
    $from = "kaleem1999@outlook.com";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    mail($to,$subject,$message,$headers);
    echo "Thanks for registering! We have just sent you an email with a link to the login page.<br>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>CAMAGRU</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<div class = "register">
    <img class="pic" src="http://www.createmepink.com/wp-content/uploads/st/thumb-stock-illustration-sketch-instagram-modern-camera-logo.jpg">
    <div class="box">
        <br>
    <form action="index.php" method="post" autocomplete="off">
        
        <input type="text" name="Name" placeholder="Name" id="name" required>

        <input type="text" name="Username" placeholder="Username" id="username" required>
        
        <input type="email" name="email" placeholder="Email" id="email" required>
		
        <input type="password" name="password" placeholder="Password" id="password" required>
        
        <input type="password" name="password_confirmation" placeholder="Password Confirmation" id="password confirmation" required>

        <a onclick="location.href = '';"><input type="submit" class="button1" id = "register" value="register"  name="register"></a>
        <a onclick="location.href = 'sign.php';"><input type="submit" class="button2" value="Sign in"></a>
        <br>
        <br>
        
    </form>
    <br><br>
        <br><br>
    </div>
</body>


</html>


