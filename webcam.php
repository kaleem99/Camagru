<?php
echo "image uploaded";
include_once('config/setup.php');
session_start();
$imgfile = file_get_contents("php://input");
$x = explode(',', $imgfile);
$photo = base64_decode($x[1]);
$img_name = uniqid().".png";
if (!file_exists("uploads/"))
{
   mkdir("uploads/");
}
file_put_contents("uploads/".$img_name, $photo);
$check = "INSERT INTO camagru.images (username, image_name) VALUES(?,?)";
$sql = $db->prepare($check);
$sql->execute(['root',$img_name]);
echo "success";
?>