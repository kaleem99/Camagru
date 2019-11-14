<?php
try{
    $db = new PDO('mysql:host=localhost', 'root', 'Nuhaa2013');
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $stm = $db->prepare($sql);
    $stm->execute();
    $db = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'Nuhaa2013');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
