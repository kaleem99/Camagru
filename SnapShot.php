<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="SnapShot.css">
   <script src="script.js" type="text/javascript"></script>
   <title>SnapShot</title>
</head>
<body class="news">
    <header>
        <div class="nav">
            <ul>
                <li class="home"><a href="homepage.php">Home</a></li>
                <li class="profile"><a href="profile.php">Profile</a></li>
                <li class="gallery"><a href="gallery.php">Gallery</a></li>
                <li class="SnapShot"><a class="active">SnapShot</a></li>
                <li class="logout"><a href="logout.php">Logout</a></li>
                <li class="upload"><a href="upload.php">Upload</a></li>
            </ul>
        </div>
        <script src="script.js"></script>
        <div id="newImages">
            <div>
                <video id="player">Video is loading...</video>
			</div>
			<div>
                <canvas class="snap" name="image" id="canvas" width="500px" height="375px">Canvas Still Loading</canvas>
                <canvas class="snap1" name="image1" id="canvas_stickers" width="50px" height="50px">Canvas Still Loading</canvas>
                <img id="scream" width="100px" height="100px" src="stickers/61J8UP8pySL._SY355_.jpg" alt="The Scream">
                <canvas name="image" id="player">Canvas still loading</canvas>
                <!-- <a id="download" download="image.png">Download Image</canvas> -->
                <input type="submit" class="button1" value="SnapShot" id="capture">
                <input type="submit" class="" value="Save" id="save">
                <!-- <input type="submit" class="button2" claue="download" id="down"> -->
            </div>
  </header>
  <div id="container">
<video autoplay = "true" id = "videoElement">
</video>
</div>
<script type="text/javascript">
    var video = document.querySelector("#videoElement");
    navigator.getUserMedia=navigator.getUserMedia||navigator.webkitGetUsermedia||
    navigator.mozGetUserMedia||navigator.msGetUserMedia||navigator.oGetUserMedia;

    var canvas = document.getElementById("canvas");
    if (navigator.getUserMedia) 
    {
        navigator.getUserMedia({video:true}, handleVideo, videoError);

    }
    function handleVideo(localStream)
    {
        self.video.srcObject = localStream;
    }    
    function videoError(e)
    {

    }
    // function download(){
    //     var dt = canvas.toDataURL();
    //     this.href = dt;
    // }

    // document.getElementById("download").addEventListener("click", download, false)

    var context = canvas.getContext('2d');
    capture.addEventListener("click", function(){
    context.drawImage(video, 0, 0, 600, 600);});
    
    // window.onload = function() {
    // var c = document.getElementById("myCanvas");
    // var ctx = c.getContext("2d");
    // var img = document.getElementById("scream");
    // ctx.drawImage(img, 10, 10,);

    document.getElementById('save').addEventListener('click', function(e){
        var image = canvas.toDataURL('image/png');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                alert(this.responseText);
            }
        }
        xhttp.open("post", "webcam.php",false);
        xhttp.send(image);
    })
    
</script>
</body>
</html>

<?php




?>