<?php
include("connection.php");
$msg = "";
if(isset($_POST['submit'])){
   $username = $_GET['username'];
   try{
       //$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
       $sql = "UPDATE users SET verified = 1 WHERE username =  '$username'";
       $db->exec($sql);
       header("location: sign.php");
   }
   catch(PDOException $ex){
       $msg = "error";
       echo $msg;
   }

}


?>

<html>

<head>
    <title>Validate</title>
</head>

<body>
<h1>Please press enter to validate your email</h1>
<form action="" method="POST">
    <input type="submit" name="submit" value="Submit">
</form>
</body>

</html>