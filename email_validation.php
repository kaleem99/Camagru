<?php
include("config/setup.php");
$msg = "";
if(isset($_POST['submit'])){
   $username = $_GET['username'];
   try{
       $sql = "UPDATE users SET verified = 1 WHERE username =  '$username'";
       $db->exec($sql);
       header("location: sign.php");
       echo "your email has been verified you may login";
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
    <link rel="stylesheet" type="text/css" href="email_validation.css">
</head>

<body>
<h1>Please press enter to validate your email</h1>
<form action="" method="POST">
    <input type="submit" class="btn" name="submit" value="Submit">
</form>
</body>

</html>