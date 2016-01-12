<html >
<head>
<meta charset="UTF-8">
<title>Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<button type="button"onclick="launchFullscreen(document.documentElement);">Start</button>  
<img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Harvester_fire_-_geograph.org.uk_-_45145.jpg">
<span><p>Hello</p></span>
<script>
function launchFullscreen(element) {
  if(element.requestFullscreen) {
    element.requestFullscreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen();
  } else if(element.msRequestFullscreen) {
    element.msRequestFullscreen();
  }
  //$("p").hide();
  //$("button").hide();
}
var fullscreenEnabled = document.fullscreenEnabled || document.mozFullScreenEnabled || document.webkitFullscreenEnabled;

/*$( document ).ready(function() {
  $("span").text(fullscreenEnabled);  
});*/
function myF(){
  $("button").toggle();
  $("p").toggle();   
}

document.addEventListener("webkitfullscreenchange", function () {
    myF();
}, false);


</script>
</body>
</html>