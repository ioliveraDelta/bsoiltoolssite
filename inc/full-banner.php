<div id="carouselExampleIndicators" class="carousel slide bg-black" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">

    <div class="carousel-item carousel-float text-center active">
      <img src="./upload/fullBanner/<?= $fullbanner_imagem_0 ?>" alt="First slide">
      <div>
        <h5><?= $fullbanner_subtitulo_0  ?></h5>
        <h3><?= $fullbanner_titulo_0  ?></h3>
        <hr>
        <?php if($fullbanner_link_0 != ''){ ?>
          <p><a href="<?= $fullbanner_subtitulo_0  ?>" target="_blank"><?= $fullbanner_resumo_0  ?></a></p>
        <?php }else{ ?>
          <p><?= $fullbanner_resumo_0  ?></p>
        <?php } ?> 
      </div>
    </div>

    <div class="carousel-item carousel-float text-center">
      <img src="./upload/fullBanner/<?= $fullbanner_imagem_1 ?>" alt="Second slide">
      <div>
        <h5><?= $fullbanner_subtitulo_1  ?></h5>
        <h3><?= $fullbanner_titulo_1  ?></h3>
        <hr>
        <?php if($fullbanner_link_1 != ''){ ?>
          <p><a href="<?= $fullbanner_subtitulo_1  ?>" target="_blank"><?= $fullbanner_resumo_1  ?></a></p>
        <?php }else{ ?>
          <p><?= $fullbanner_resumo_1  ?></p>
        <?php } ?> 
      </div>
    </div>

    <div class="carousel-item carousel-float text-center">
      <img src="./upload/fullBanner/<?= $fullbanner_imagem_2 ?>" alt="Third slide">
      <div>
        <h5><?= $fullbanner_subtitulo_2  ?></h5>
        <h3><?= $fullbanner_titulo_2  ?></h3>
        <hr>
        <?php if($fullbanner_link_2 != ''){ ?>
          <p><a href="<?= $fullbanner_subtitulo_2  ?>" target="_blank"><?= $fullbanner_resumo_2  ?></a></p>
        <?php }else{ ?>
          <p><?= $fullbanner_resumo_2  ?></p>
        <?php } ?> 
      </div>
    </div>

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <i class="fas fa-chevron-left h2"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <i class="fas fa-chevron-right h2"></i>
    <span class="sr-only">Next</span>
  </a>
</div>