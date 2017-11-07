<?php
  include('header.php');
?>

  <div id="container">
    <p><a href="#">Vinyls</a></p>
  </div>
  <div class="main-shop clearfix">
    <div class="aside">
      <h3>Filter by</h3>
      <h3 class="filter1"><a href="#">Artist<img src="png/up-arrow.png" alt=""></a></h3>
        <ul class="toggle-this1">
          <li><a href="#">Kendrick Lamar</a></li>
          <li><a href="#">Macklemore</a></li>
          <li><a href="#">Wu-Tang Clan</a></li>
          <li><a href="#">Anberlin</a></li>
          <li><a href="#">Tame Impala</a></li>
          <li><a href="#">Kings of Leon</a></li>
        </ul>
      <h3 class="filter2"><a href="#">Genre<img src="png/up-arrow.png" alt=""></a></h3>
        <ul class="toggle-this2">
          <li><a href="#">Hip-Hop, Rap</a></li>
          <li><a href="#">Rock</a></li>
          <li><a href="#">Pop</a></li>
        </ul>
      <h3 class="filter3"><a href="#">Price<img src="png/up-arrow.png" alt=""></a></h3>
      <ul class="toggle-this3">
        <li><a href="#">110–120 eur</a></li>
        <li><a href="#">120–160 eur</a></li>
        <li><a href="#">160–200 eur</a></li>
      </ul>
    </div>
    <div class="products">

<!-- Is db paima ir atvazduoja albumu nuotraukas ir pavadinimus -->
<!-- Koadas be php  -->
<!-- <div class="vinyl">
   <img src="vinyls\cage_in_the_elephant-Melophobia.jpg" alt="">
   <p>Cage in the elephant-Melophobia</p>
 </div> -->
 <?php

 $all_vinyls = getVinyls();
 $all_images = getImageSrcs();

 $temp_vinyl = mysqli_fetch_assoc($all_vinyls);
 $temp_image = mysqli_fetch_assoc($all_images);
 if ($temp_vinyl != NULL && $temp_image != NULL) {
   while ($temp_vinyl && $temp_image ) {
     ?>
       <div class="vinyl">
         <a href="detailed.php?id=<? echo $temp_vinyl["id"]; ?>">
           <img src="vinyls/<?php echo $temp_image['src'] ?>" alt="" id="vinyl">
         </a>
         <a href="detailed.php?id=<? echo $temp_vinyl["id"]; ?>"><p><?php echo $temp_vinyl['artist'] . " - " . $temp_vinyl['name']; ?></p></a>
       </div>
     <?
     $temp_vinyl = mysqli_fetch_assoc($all_vinyls);
     $temp_image = mysqli_fetch_assoc($all_images);
   }
 }

 ?>



    </div> <!-- End of "products" div -->
  </div>
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
  </body>
</html>
