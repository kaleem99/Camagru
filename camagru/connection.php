<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'Nuhaa2013');
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOexetion $e){
    echo $e->getMessage();
}
?>
