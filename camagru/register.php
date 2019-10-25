<?php

include("connection.php");

if(isset($_POST['register'])){
    echo 'User registered\n';
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password_confirmation'];

    if ($password != $password2)
    {
        echo "passwords do not match";
        exit();
    }

    $query = "INSERT INTO `users` (`fullname`, `username`, `email`, `passwd`) VALUES ('$name', '$username', '$email', '$password')";
    $db->query($query);
    echo 'User registered 2\n';
    
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CAMAGRU</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
<div class = "register">
    <img class="pic" src="http://www.createmepink.com/wp-content/uploads/st/thumb-stock-illustration-sketch-instagram-modern-camera-logo.jpg">
    <div class="box">
        <br>
    <form action="register.php" method="post" autocomplete="off">
        
        <input type="text" name="Name" placeholder="Name" id="name" required>

        <input type="text" name="Username" placeholder="Username" id="username" required>
        
        <input type="email" name="email" placeholder="Email" id="email" required>
		
        <input type="password" name="password" placeholder="Password" id="password" required>
        
        <input type="password" name="password_confirmation" placeholder="Password Confirmation" id="password confirmation" required>

        <a onclick="location.href = '';"><input type="submit" class="button1" id = "register" value="register"  name="register"></a>
        <a onclick="location.href = 'sign.php';"><input type="submit" class="button2" value="Sign in"></a>
        <br>
        <br>
        
    </form>
    <br><br>
        <br><br>
    </div>
    <!-- <script type="text/javascript">
        alert("running");
        function handleRegistration()
        {
            var name = document.getElementById("name").value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 // this is the response from the php file this.responseText;
                    if (this.response === "success"){
                        //redirect to home page
                        console.log("your query was a success");
                        
                    }
                    else {
                        alert("all you errors here");
                    }
                }
            };
            xhttp.open("POST", "test.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            console.log("send ", name);
            
            xhttp.send("name=" + name +"&surname=jdjd&&password=fdfd");

            return false;
        }


        function register(data) {
            
        }
        </script> -->
</body>


</html>

