<?php
include("config/setup.php");
$db = new PDO("mysql:host=localhost;dbname=camagru", "root", "Nuhaa2013");
$sql = "CREATE TABLE  IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    username VARCHAR(10) NOT NULL,
    email VARCHAR(30) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    verified BOOLEAN
    )";
$db->exec($sql);
?>

<?php
include("config/setup.php");
$db = new PDO("mysql:host=localhost;dbname=camagru", "root", "Nuhaa2013");
$sql = "CREATE TABLE IF NOT EXISTS camagru.images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(10) NOT NULL,
    image_name VARCHAR(100)
    )";
$db->exec($sql);
?>

