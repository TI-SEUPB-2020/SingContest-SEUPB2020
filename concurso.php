<html>
<head>
<title>
</title>
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
              var url = "https://www.youtube.com/embed/" + table[i].url;
              $("#videos").append(url);
            }
          }
      });
	</script>
	<div class="container" style="height: 100%; width: 80%;">
    <div class="row" id="videos">
    </div>
  </div>
</body>
</html>