<?php
   
   session_start();
   include("connection.php");
   
   if(isset($_POST['sign'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      // $hashed = password_hash($password, PASSWORD_DEFAULT);

      $check_username = $db->prepare("SELECT * FROM users WHERE username = ?");
      $check_username->execute(array($username));
      // $check_password = $db->prepare("SELECT passwd FROM users WHERE passwd = ?");
      // $check_password->execute([$password]);
      $user = $check_username->fetch(PDO::FETCH_ASSOC);
      //var_dump($user['passwd']);
      //die();
      $hashed = $user['passwd'];
      if (password_verify($password, $hashed))
      {
         $_SESSION["username"]= $username;
         echo "Correct";
         header("Location: homepage.php");
      }
      else
      {
         echo "Your Username  or Password is Incorrect";
      }
   }

      
   //    if ($check_username->rowCount() > 0 && $check_password->rowCount() > 0)
   //    {
   //        echo "you are no logged in";
   //        exit();
   //        header("Location: http://localhost:8080/camagru/homepage.php");
   //    }
   //    else if ($check_username->rowCount() == 0 || $check_password->rowCount() == 0)
   //    {
   //       echo "please check your username or password";
   //    }
   // }
   // $username = $_POST['username'];
   // $password = $_POST['password'];
   // $db->execute(array(':username' => $username));

   // $row = $db->fetch(PDO::FETCH_ASSOC);
   // session_regenerate_id();
   // $_SESSION["authorised"] = true;
   // $_SESSION["sess_username"] = $row['username'];
   // $_SESSION["sess_password"] = row['password'];
   // session_write_close();
   // header("Location: http://localhost:8080/CAMAGRU/homepage.php");


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

