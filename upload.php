<?php
session_start();
if(!isset($_SESSION['success']))
{
    header("location: sign.php");
}
include("config/setup.php");
if (isset($_POST['submit']))
{
    session_start();
    $username = $_SESSION['username'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $filter = explode('.', $fileName);
    $fileActualExt = strtolower(end($filter));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed))
    {
        if ($fileError ===0)
        {
            if ($fileSize < 1000000)
            {
                $_SESSION["email"]= $email;
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $check = "INSERT INTO camagru.images (username, image_name) VALUES(?,?)";
                $sql = $db->prepare($check);
                $sql->execute([$username,$fileNameNew]);
                header("Location: profile.php");
                echo "image uploaded";
            }
            else
            {
                echo "your file is too big!";
            }
             
        }
        else
        {
            echo "There was an error uploading your file!";
        }
    }
    else
    {
        echo "you cannot upload files of this type";
    }
}
?>
<!DOCTYPE html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="upload.css">
   <script src="script.js" type="text/javascript"></script>
   <title>SnapShot</title>
</head>
<body class="news">
    <header>
        <div class="nav">
            <ul>
                <li class="home"><a href="homepage.php">Home</a></li>
                <li class="profile"><a href="profile.php">Profile</a></li>
                <li class="gallery"><a href="#">Gallery</a></li>
                <li class="SnapShot"><a href="SnapShot.php">SnapShot</a></li>
                <li class="logout"><a href="logout.php">Logout</a></li>
                <li class="upload"><a class="active">Upload</a></li>
            </ul>
        </div>
        <div class="color1">
        <form action = "upload.php" method="POST" enctype="multipart/form-data">
            <button class="file"><input type="file" name="file"></button>
            <button type="submit" class="btn_submit" name="submit">UPLOAD</button> 
</div>    
    </body>
</html>