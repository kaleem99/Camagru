<?php
include("connection.php");
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

