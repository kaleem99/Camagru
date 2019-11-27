<?php
include("config/setup.php");

    session_start();

    if(!isset($_SESSION['success']))
    {
      header("location: sign.php");
    }

    $query = $db->query("SELECT * FROM images ORDER BY id DESC");
    $array = $query->fetchall();
    $x = 0;
    $img_id = $array['id'];
    echo $img_id;

    
    // $query = $db->prepare("SELECT username FROM images WHERE id = $img_id");
    // $query->execute();
    // $results = $query->fetchall();
    // $poster_id = $results['username'];
    //echo $poster_id;
   
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
        <a href=""><img src="uploads/<?php echo $array[$x]['image_name']?>"></a>
        <?php
            echo $comment;
            
        ?>
        <a href="https://www.facebook.com/"><img src="https://cdn3.iconfinder.com/data/icons/social-icons-5/606/Facebook.png" width="50px" height="50px"></a>
        <form method="post">
            <input type="hidden" name="userID" value="anonymous">
            <textarea name="message"></textarea><br>
            <input type="hidden" name="imgurl" value="<?php echo $array[$x]['image_name']?>">
            <?  if(!isset($_SESSION['success']))
                {
                    echo "You can only comment and like when you are logged in";
                }
                else{?>
                    <button type="submit" name="submit" class="button1">Comment</button>
                    <button type="submit" class="button2" name="like">Like</button>
                     <a href="delete.php?action=delete&id=<?php echo $array[$x]['id'];?>" class="button3" name="delete">Delete</a>
                <?}
                ?>
        </form>
        <br>
        <?php
        $x++;
        }
?>

</body>
</html>

<?php
    $imgurl = $_POST["imgurl"];
    $username = $_SESSION["username"];
    $comment = $_POST["message"];
    echo $comment;
    
?>