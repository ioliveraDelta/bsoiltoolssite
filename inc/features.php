
<?php 
// quem somos
$textos1=$pdo->prepare("SELECT * FROM textos WHERE ID = 1");
$textos1->execute();
$textos1 = $textos1->fetch();

// codigo de conduta
$textos2=$pdo->prepare("SELECT * FROM textos WHERE ID = 2");
$textos2->execute();
$textos2 = $textos2->fetch();

// contato
$textos3=$pdo->prepare("SELECT * FROM textos WHERE ID = 5");
$textos3->execute();
$textos3 = $textos3->fetch();
?>
<section id="contato" class="py-8 py-md-5border-bottom">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">
        <!-- Heading -->
        <h3 class="border border-primary border-top-0 border-left-0 border-right-0 mb-3">
          <?= $textos1['titulo'] ?>
        </h3>
        <!-- Text -->
        <p class="text-muted mb-6 mb-md-0" style="text-align: justify;">
          <a class="small mt-3" href="quem-somos.php"><?= strip_tags($textos1['resumo']); ?></a>
        </p>
      </div>

      <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">
        <!-- Heading -->
         <h3 class="border border-primary border-top-0 border-left-0 border-right-0 mb-3">
          <?= $textos2['titulo'] ?>
        </h3>
        <!-- Text -->
        <p class="text-muted mb-6 mb-md-0" style="text-align: justify;">
          <a class="small mt-3" href="quem-somos.php"><?= strip_tags($textos2['resumo']); ?></a>
        </p>
      </div>

      <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">
        <!-- Heading -->
         <h3 class="border border-primary border-top-0 border-left-0 border-right-0 mb-3">
          <?= $textos3['titulo'] ?>
        </h3>
        <!-- Text -->
        <p class="text-muted mb-6 mb-md-0" style="text-align: justify;">
          <a class="small mt-3" href="quem-somos.php"><?= $textos3['resumo']; ?></a>
        </p>
      </div>

    </div> <!-- / .row -->
  </div> <!-- / .container -->
</section>