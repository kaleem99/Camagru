<?php
   include("connection.php");
   session_start();
   
   
   if($_POST['username'] != NUll) {
      echo $_POST['username'];

      $username =$_POST['username'];
      $password =$_POST['password'];

      $password = md5($password);
      $sql = "SELECT * FROM users WHERE username = $username AND password = $password";
      $result = $db->exec($sql);

      
      if (count($result) == 1) {
         $_SESSION['message'] = "You are now logged in";
         $_SESSION['username'] = $username;
         header("location: homepage.php");
      }
      else{
         $_SESSION['message'] = "Username/password combination is incorrect";
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

        <a onclick="location.href = 'Register.php';"><input type="submit" class="button1" id = "register" value="register" Register></a>
        <a onclick="location.href = 'sign.php';"><input type="submit" class="button2" id = "sign" value="Sign in" sign></a>
        <br>
        <br>
        
    </form>
    <br>
    <br>
    </div>
    <br><br>
    <br>
    <a style="padding: 20px 50px;" href="#">Forgot Password</a>
    </div>
   
</body>


</html>

