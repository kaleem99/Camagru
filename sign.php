<?php
   
   session_start();
   include("config/setup.php");
   
   if(isset($_POST['sign'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $check_username = $db->prepare("SELECT * FROM users WHERE username = ?");
      $check_username->execute(array($username));
      $user = $check_username->fetch(PDO::FETCH_ASSOC);
      $hashed = $user['passwd'];
      if (password_verify($password, $hashed))
      {
         $_SESSION["username"]= $username;
         $_SESSION["success"] = "you have logged in successfully";
         echo "Correct";
         header("Location: homepage.php");
      }
      else
      {
         echo "Your Username  or Password is Incorrect";
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>CAMAGRU</title>
<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
<div class = "sign">
    <img class="pic" src="http://www.createmepink.com/wp-content/uploads/st/thumb-stock-illustration-sketch-instagram-modern-camera-logo.jpg">
    <div class="box">
        <br>
    <form action="sign.php" method="post" autocomplete="off">
        
        <input type="text" name="username" placeholder="Username" id="username" required>
		
        <input type="password" name="password" placeholder="Password" id="password" required>

        <a onclick="location.href = 'index.php';"><input type="submit" class="button1" id = "register" value="register" Register></a>
        <a onclick="location.href = 'sign.php';"><input type="submit" class="button2" id = "sign" value="Sign in"  name= "sign" sign></a>
        <br>
        <br>
        
    </form>
    <br>
    <br>
    </div>
    <br><br>
    <br>
    <a style="padding: 20px 50px;" href="forgot_password.php">Forgot Password</a>
    </div>
   
</body>


</html>

