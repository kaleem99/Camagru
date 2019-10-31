<?php

include("connection.php");
include("form.php");
//include("homepage.php");


if(isset($_POST['register'])){
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

    $check_email = $db->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->execute([$email]);
    $check_username = $db->prepare("SELECT username FROM users WHERE username = ?");
    $check_username->execute([$username]);
    // if ($check_email->rowCount() > 0)
    // {
    //     echo "email already exists";
    //     exit();
    // }
    // else if ($check_username->rowCount() > 0)
    // {
    //     echo "username already exists";
    //     exit();
    // }
    if ($check_username->rowCount() > 0 || $check_email->rowCount() > 0)
    {
        echo "username or email already exists";
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`fullname`, `username`, `email`, `passwd`) VALUES ('$name', '$username', '$email', '$hashed')";
    $db->query($query);
    echo "User registered 2\n";

    $to = $email;
    $subject = "Your password";
    $message = "<p>Hello user,</p>
    <p>Thanks for applying at chicken licken.</p>
    <p>Your email is: <b>atitus@chickenlicken.com</b></p>
    ";
    $from = "kaleemnike1@gmail.com";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    // Send email
    mail($to,$subject,$message,$headers);
    // Inform the user
    echo "Thanks for registering! We have just sent you an email with your password.";  
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


