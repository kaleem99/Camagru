<?php
session_start();
include("config/setup.php");
// $_SESSION['username']= $username;
// echo $_SESSION['username'];
$query = $db->query("SELECT * FROM images ORDER BY id DESC");
$array = $query->fetchall();
$x = 0;
?>

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

<?php
        $x = 0;
        while ($x < count($array))
        {?>
        <!-- <div class = pic> -->
        <a href=""><img src="uploads/<?php echo $array[$x]['image_name']?>"></a>
        <a href="https://www.facebook.com/"><img src="https://cdn3.iconfinder.com/data/icons/social-icons-5/606/Facebook.png" width="50px" height="50px"></a>
        <form>
            <input type="hidden" name="userID" value="anonymous">
            <textarea name="message"></textarea><br>
            <button type="submit" name="submit">Comment</button>
        </form>
        <br>
        <!-- <div><form action='likecomment.php' method='POST'>
       <input type='submit' name='like' placeholder='like' value='like'>
           </form></div>";
    <div><form action='likecomment.php' method='POST'>
       <input type ='text' name='comment' placeholder='comment'>
       <input type='submit' name='submit_comment' placeholder='comment' value='comment'>
           </form></div>"; -->
        <!-- </div> -->
        <?php
        $x++;
        }
?>