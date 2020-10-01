<?php
  session_start();
  if(!isset($_SESSION['id_school'])){
    header('location: authentication.php');
  }
  echo "<p id='school' style='display: none;'>".$_SESSION['id_school']."</p>";
?>
<html lang="es">
<head>
  <title>Vota por tu favorito</title>
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
          url: 'videos.php?id_school=' + $("#school").text(),
          type: 'get',
          dataType: 'JSON',
          success: function(response){
            console.log('foo');
            table = response;
            for(var i = 0; i < response.length; i++) {
              var index = i + 1;
              var url = "https://img.youtube.com/vi/" + table[i].url + "/default.jpg";
              $("#videos").append("<img onclick='imageClick(" + index + ")' data-toggle='modal' data-target='#myModal' src='" + url + "' style='width: 33%;'/>");
            }
          }
      });
    var currenVideo = 0;
    function imageClick(index) {
      currenVideo = index;
      console.log(currenVideo);
      $("#modalImage").attr("src", table[currenVideo - 1].url);
      $("#title").html(table[currenVideo - 1].title);
    }

    function vote() {
      var prefix;
      switch(parseInt($("#school").text())){
        case 1:
          prefix = "AD";
          break;
        case 2:
          prefix = "IC";
          break;
        case 3:
          prefix = "CM";
          break;
        case 4:
          prefix = "CS";
          break;
        case 5:
          prefix = "DI";
          break;
        case 6:
          prefix = "DT"
          break;
        case 7:
          prefix = "EI";
          break;
        case 8:
          prefix = "FI";
          break;
        case 9:
          prefix = "MK";
          break;
        case 10:
          prefix = "EM";
          break;

      }
      location.replace("final.php?videoId=" + prefix + currenVideo);
    }

  </script>
  <div id="container" style="background-color:black;">
    <br><br>
     <img src="res/votetitle.png" style="width:60%; position:relative;" class="center"><br><br>
     <img src="res/votedescription.png" style="width:60%; position:relative;" class="center"><br><br>
  </div>

  <div class="container" style="height: 100%; width: 80%;">
    <div class="row" id="videos">
    </div>
  </div>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="video-responsive">
            <iframe id="modalImage" width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-body">
        	<h4 style="color: black;" class="modal-title" id="title"></h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-default" data-toggle='modal' data-target='#warning'>Votar por este video</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="warning" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="color: black;">
        	¿Estás seguro de que quieres votar por este video?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="vote()">Sí</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <lol></lol>
</div>
</body>
</html>