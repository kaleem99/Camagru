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
				<canvas class="snap" name="image" id="canvas" width="520px" height="340px">Canvas Still Loading</canvas>
				<canvas name="image" id="player">Canvas still loading</canvas>
                <input type="submit" class="button1" value="SnapShot" id="capture">
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
    var context = canvas.getContext('2d');
    capture.addEventListener("click", function(){
    context.drawImage(video, 0, 0, 400, 400);});
</script>
</body>
</html>

