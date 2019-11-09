<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Camera</title>
<link rel="stylesheet" href="Camera.css"> 
</head>

<body>
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
</script>
</body>


</html>