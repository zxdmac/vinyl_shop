<?php

define('DB_USER', 'root' ); // root
define('DB_PASSWORD', 'root' ); // root
define('DB_NAME', 'vinyl_shop' );
define('DB_HOST', 'localhost' );

// prisijungima prie DB, 8889 - mysql portas
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// mysqli_set_charset($connection, "UTF8");

  function getConnection() {
      global $connection;
      if($connection) {
          // echo "Sveikiname, prisijungete prie DB sekmingai <br>";
      } else {
          die ( "Error: " . mysqli_connect_error());
      }
      return $connection;
  }
  // getConnection();

// grazina images lenteles eilute(nurodoma argumente), norint atvaizduoti: $src = getImage(1), $src['src']
  function getVinyls($kiekis = 9999) {
    $text_sql = "SELECT * FROM vinyls LIMIT $kiekis;";
    $rezultatai = mysqli_query(getConnection(), $text_sql);

    if ($rezultatai) {
      return $rezultatai;
    } else {
      echo "nera nei vieno vinilo";
      return NULL;
    }
  }

  function getImageSrcs($kiekis = 9999) {
    $text_sql = "SELECT * FROM images LIMIT $kiekis;";
    $rezultatai = mysqli_query(getConnection(), $text_sql);

    if ($rezultatai) {
      return $rezultatai;
    } else {
      echo "nera nei vieno vinilo";
      return NULL;
    }
  }

  function getImageSrc($nr) {
    $sql_tekstas = "SELECT * FROM images WHERE id=$nr; ";
    $rezultatai = mysqli_query( getConnection(), $sql_tekstas);
    if ($rezultatai) {
        // mysqli_fetch_assoc - is Obj sudeda viska i asociatyvu masyva
        $rezultatai = mysqli_fetch_assoc($rezultatai);
        return $rezultatai;
    } else {
        echo "Klaida: " . mysqli_error(getConnection());
        return NULL;
    }
  }

  //paims lenteles vinyls eilute
  function getVinyl($nr) {
    $sql_tekstas = "SELECT * FROM vinyls WHERE id=$nr; ";
    $rezultatai = mysqli_query( getConnection(), $sql_tekstas);
    if ($rezultatai) {
        $rezultatai = mysqli_fetch_assoc($rezultatai);
        return $rezultatai;
    } else {
        echo "Klaida: " . mysqli_error(getConnection());
        return NULL;
    }
  }

  // $artist = getVinyl(1);
  // echo $artist['artist'] . " - " . $artist['name'];


  // function getAllTracks($name_id) {
    function getAllTracks($name_id, $track_id) {
      $sql_tekstas = "SELECT * FROM tracks WHERE name_id=$name_id AND id=$track_id; ";
      $rezultatai = mysqli_query( getConnection(), $sql_tekstas);
      if ($rezultatai) {
          $rezultatai = mysqli_fetch_assoc($rezultatai);
          return $rezultatai;
      } else {
          echo "Klaida: " . mysqli_error(getConnection());
          return NULL;
      }
    }

// nurodyt name_id ir grazins pirma id
    function getTrackId($name_id) {
      $sql_tekstas = "SELECT * FROM tracks WHERE name_id=$name_id; ";
      $rezultatai = mysqli_query( getConnection(), $sql_tekstas);
      $rezultatai = mysqli_fetch_assoc($rezultatai);
      // print_r($rezultatai['id']);
      if ($rezultatai) {
        return $rezultatai['id'];
      } else {
        return NULL;
      }
      //pakeist, kad neisspaudina, o grazina
    }
  
  ?>
