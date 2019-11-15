  
<?php
require_once("config/setup.php");
$msg = "";
if(isset($_POST['submit']))
{
    $email = $_GET['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];
    if ($password != $password2)
    {
        echo "password do not match";
        exit();
    }
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    try{
       $sql = "UPDATE `users` SET `passwd` = '$hashed' WHERE `email` = '$email'";
       $db->exec($sql);
       echo "your password has been reset";
       header("location: sign.php");
    }
    catch(PDOException $ex){
       $msg = "error";
       echo $msg;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CAMAGRU</title>
<link rel="stylesheet" type="text/css" href="reset_password.css">
</head>
<body>
<div class = "sign">
    <img class="pic" src="http://www.createmepink.com/wp-content/uploads/st/thumb-stock-illustration-sketch-instagram-modern-camera-logo.jpg">
    <div class="box">
        <br>
    <form action="reset_password.php" method="post" autocomplete="off">
        <h3>Please type in your new password</h3>
		
        <input type="password" name="password" placeholder="Password" id="password" required>
        
        <input type="password" name="password_confirmation" placeholder="Password Confirmation" id="password confirmation" required>

        <input type="submit" name="submit" value="Reset">

        <br>
        <br>
        
    </form>
    <br><br>
        <br><br>
    </div>
</body>


</html>