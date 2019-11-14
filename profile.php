<?php
    session_start();
    if(!isset($_SESSION['success']))
    {
        header("location: sign.php");
    }
   include("config/setup.php");
   $old_username = $_SESSION['username'];
   
   if(isset($_POST['submit_name']))
   {
       $new_username = $_POST['Username'];
       $statement = $db->prepare("UPDATE users SET username = '$new_username' WHERE username = '$old_username'");
       $statement->execute();
       $_SESSION['username'] = $username;
       echo "usename updated";
   }
   if(isset($_POST['submit_email']))
   {
       $email = $_POST['email'];
       $statement = $db->prepare("UPDATE users SET email = '$email' WHERE username = '$old_username'");
       $statement->execute();
       echo "email updated";
   }
   if(isset($_POST['submit_passwd']))
   {
       $pass = $_POST['password'];
       $hashed = password_hash($pass, PASSWORD_BCRYPT);
       $statement = $db->prepare("UPDATE users SET passwd = '$hashed' WHERE username = '$old_username'");
       $statement->execute();
       echo "password updated";
   }
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="profile.css">
   <title>Profile</title>
</head>
<body>
    <div class="nav">
        <ul>
            <li class="home"><a href="homepage.php">Home</a></li>
            <li class="profile"><a class="active">Profile</a></li>
            <li class="gallery"><a href="gallery.php">Gallery</a></li>
            <li class="SnapShot"><a href="SnapShot.php">SnapShot</a></li>
            <li class="logout"><a href="logout.php">Logout</a></li>
            <li class="upload"><a href="upload.php">Upload</a></li>
        </ul>
        </div>

        <div class="update">
        <div class="information">
            <h1>User Information</h1>
        </div>
        <form action="" method="post" autocomplete="off">
            <div class="one">
                <input type="text" name="Username" placeholder="<?php echo $_SESSION['username']?>" id="username" minlength="6">
                <input type="submit" class="button1" id = "username" value="Update_username"  name="submit_name">
            </div>
            <div class="two">
         <input type="email" name="email" placeholder="Email" id="email">
         <input type="submit" class="button2" id = "email" value="Update_email"  name="submit_email">
        </div>
        <div class="three">
        <input type="password" name="password" placeholder="Password" id="password" minlength="8">
        <input type="submit" class="button3" id = "password" value="Update_password"  name="submit_passwd">
        </div>
        <br>
        <br>
        
    </form>
    </div>

</body>
</html>