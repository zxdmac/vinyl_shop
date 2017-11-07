<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Fugaz+One|Montserrat+Alternates:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>

  <body class="detailed-body">
    <div class="detailed-back">
    </div>
  <?php
    include('functions.php');
    $nr = $_GET['id'];
    $track_id = getTrackId($nr); // ispausdina 13
    $tracks = getAllTracks($nr, $track_id);
    $vinyl = getVinyl($nr);
    $image_info = getImageSrc($nr);

    ?><img src="vinyls/<?php echo $image_info['src'];?>" alt="" id="detailed-img">

    <div class="detailed-back">
      <a href="index.php">
        <img src="png/fast-forward-button.png" alt="" class="back">
        <h3>BACK</h3>
      </a>
    </div>
    <div class="detailed-info">
      <h1><?php echo $vinyl['artist'] ?></h1>
      <h2><?php echo $vinyl['name'] ?></h2>
      <h3>TRACK LIST</h3>
      <p>

      <?php

        while ($nr === $tracks['name_id']) {
          $tracks = getAllTracks($nr, $track_id);
          //  echo $track_id;
          print_r($tracks['track']);
          echo "</br>";
          $track_id++;
        }
        ?>
        <span><?php
         echo $vinyl['price'];
        ?><img src="png/euro-symbol.png" alt=""></span>

      </p>
    </div>
  </body>
</html>
