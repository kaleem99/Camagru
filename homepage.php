<?php
    session_start();
    if(!isset($_SESSION['success']))
    {
      header("location: sign.php");
    }
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="homepage.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Homepage</title>
</head>
<body>
    <div class="nav">
      <ul>
        <li class="home"><a class="active" href="#">Home</a></li>
        <li class="profile"><a href="profile.php">Profile</a></li>
        <li class="gallery"><a href="gallery.php">Gallery</a></li>
        <li class="SnapShot"><a href="SnapShot.php">SnapShot</a></li>
        <li class="logout"><a href="logout.php">Logout</a></li>
        <li class="upload"><a href="upload.php">Upload</a></li>
      </ul>
    </div>
</body>
<html>
