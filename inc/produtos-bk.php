
<?php 
$produtos=$pdo->prepare("SELECT * FROM produtos WHERE RAND()");
$produtos->execute();
$produtos = $produtos->fetch();
?>
<section class="pt-4 pt-md-5 pb-3 bg-light shadow" style="overflow: hidden">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-12 col-md-8 order-md-1" data-aos="fade-up">

        <!-- Heading -->
        <h1 class="display-3 text-center text-md-start pb-3" style="font-size: 2rem">
          B&S  <span class="text-primary">OIL TOOLS</span>.
        </h1>

        <!-- Text -->
        <p class="lead text-center text-md-start text-muted mb-6 mb-lg-8">

          <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>

              <a href="produtos.php?tipo=<?= $prodCod ?>"><?= $prodTitulo ?></a>,

          <?php }} ?>

          <br>
          <a class="font-weight-bold small" href="./produto.php?id=<?= $produtos['ID'] ?>">
            <?= $produtos['titulo'] ?>  <i class="fas fa-arrow-right"></i>
          </a>

        </p>

      </div>

      <div class="col-12 col-md-4 order-md-2 rounded bg-light" data-aos="fade-up" data-aos-delay="100">

        <!-- Image -->
        <a class="font-weight-bold small" href="./produto.php?id=<?= $produtos['ID'] ?>">
          <img class="img-fluid img-multiply" src="./upload/<?= (!empty($produtos['imagem']) ? 'produtos/'.$produtos['imagem'] : '/no-image.png') ?>" alt="...">
        </a>
        

      </div>

    </div> <!-- / .row -->
  </div> <!-- / .container -->
</section>