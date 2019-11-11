<!-- 
// include("setup.php");
// echo "hello world";
// if (isset($_POST['but_upload'])){
//     $filename = $FILES['file']['name'];
//     $target_dir = "upload/";
//     if ($filename != ''){

//         $target_file = $target_dir.basename($_FILES['file']['name']);

//         $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//         $extensions_arr = array("jpg","jpeg","png","gif");

//         if(in_array($extension,$extensions_arr)){

//             $image_base64 = base64_encode(file_get_contents($_Files['file']
//             ['tmp_name']));

//             $image = "data::image/".$extension.";base64,".$image_base64;

//             if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){

//                 $query = "INSERT INTO `images` (`image_data`, `image_name`) VALUES ('$filename', '$image.')";
//                 $db->query($query);
//             }
//         }
//     }
// }
?> -->

<!-- <!DOCTYPE html>
<html>
<head>
<title>Upload</title>

</head>

<body>
    <form method='post' action='' enctype="multipart/form-data">
        <input type="file" name ="file">
        <input type="submit" name="but_upload">
    </form>
</body>

</html> -->

<?php
include("setup.php");
// $db = connectiondb();
if (isset($_POST['submit']))
{
    session_start();
    $username = $_SESSION['username'];
    // $username = $_SESSION['log_in'];
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
        echo "Felicia is a goga";
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
                header("Location: http://127.0.0.1:8080/camagru/profile.php");
                echo "hello";
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
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <form action = "upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>     
    </body>
</html>