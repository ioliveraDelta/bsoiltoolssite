<?php
  $associados = array(
                       'acrinor.png',
                       'airliquide.png', 
                       'basf.png', 
                       'brasken.png', 
                       'columbian.png', 
                       'copenor.png', 
                       'cristal.png', 
                       'deten.png', 
                       'dow.png', 
                       'edn.png', 
                       'elekeiroz.png',  
                     );
  shuffle($associados);
?>
<section class="py-6 py-md-8 border-bottom bg-white shadow">
  <div class="container">
    <div class="row align-items-center justify-content-center">

      <?php for ($i = 1; $i <= 6; $i++) { ?>
        <div class="col-6 col-sm-4 col-md-2 mb-4 mb-md-0">
          <img class="img-fluid" style="filter: grayscale(100%); opacity: .4;" src="./img/<?= $associados[$i] ?>" alt="">
        </div>
      <?php } ?>

    </div>
  </div>
</section>