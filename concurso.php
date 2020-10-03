<html lang="es">
<head>
  <title>Disfruta de los videos de los concursantes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="res/favicon.png">
  <link rel="stylesheet" href="stylesheet.css">
  <style>
    body{
      color: white;
      background-image: url('res/wallpaper.jpg');
      background-attachment: fixed
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
    #container {
      position:relative;
    }
    .video-responsive {
      height: 0;
      overflow: hidden;
      padding-bottom: 56.25%;
      padding-top: 30px;
      position: relative;
    }
    .video-responsive iframe, .video-responsive object, .video-responsive embed {
      height: 100%;
      left: 0;
      position: absolute;
      top: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <script>
    var table;
    $.ajax({
          url: 'all_videos.php',
          type: 'get',
          dataType: 'JSON',
          success: function(response){
            console.log('foo');
            table = response;
            for(var i = 0; i < response.length; i++) {
              var index = i + 1;
              var url = "https://www.youtube.com/embed/" + table[i].url;
              $("#videos").append("<iframe width='560' height='315' src='" + url + "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>");
            }
          }
      });
  </script>
  <div class="container" style="height: 100%; width: 100%;">
    <div class="row" id="videos">
    </div>
  </div>
</body>
</html>