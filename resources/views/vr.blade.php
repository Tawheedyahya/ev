<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Matterport Viewer</title>
</head>
<body>

<button onclick="document.getElementById('tour').style.display='block'">
  Show 3D Tour
</button>

<div id="tour" style="display:none; margin-top:10px;">
  <iframe
    src="https://my.matterport.com/show/?m=BDhGVDaKpnw"
    width="100%"
    height="600"
    frameborder="0"
    allow="autoplay; fullscreen; xr-spatial-tracking">
  </iframe>
</div>

</body>
</html>     
