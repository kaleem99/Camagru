<?php
include("config/setup.php");
$_SESSION['username']= $username;
echo $_SESSION['username'];
$query = $db->query("SELECT * FROM images");
$array = $query->fetchall();
$x = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="gallery.css">
</head>
<body>
<div class="nav">
<ul>
    <li class="home"><a href="homepage.php">Home</a></li>
    <li class="profile"><a href="profile.php">Profile</a></li>
    <li class="gallery"><a class="active">Gallery</a></li>
    <li class="SnapShot"><a href="SnapShot.php">SnapShot</a></li>
    <li class="logout"><a href="logout.php">Logout</a></li>
    <li class="upload"><a href="upload.php">Upload</a></li>
</ul>
</div>
<div class="images">
    <?php
        $x = 0;
        while ($x < count($array))
        {?>
        <div class = pic>
        <a href=""><img src="uploads/<?php echo $array[$x]['image_name']?>"></a>
        </div>
        <?php
        $x++;
        }
    ?>
    <!-- Load Facebook SDK for JavaScript -->
<!-- <div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6"></script> -->

<!-- Your embedded comments code -->
<!-- <div class="fb-comment-embed"
   data-href="https://www.facebook.com/zuck/posts/10102735452532991?comment_id=1070233703036185"
   data-width="500"></div>
    </div> -->
</body>
</html>