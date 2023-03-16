<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    if(isset($_GET['tipo'])){
      $produtos=$pdo->prepare("SELECT * FROM produtos WHERE tipo1 = :tipo AND status = 1");
      $produtos->bindParam(':tipo', $_GET['tipo'], PDO::PARAM_INT);
      $produtos->execute();
      $row_produtos = $produtos->fetchAll(PDO::FETCH_OBJ);
    }

    $paginaURL       = "./produtos.php?tipo=".$_GET['tipo'];
    $paginaTitulo    = $prodCat[$_GET['tipo']];
    $paginaImagem    = "./tile.png";
    $paginaDescricao = "Lista de produtos na categoria - ".$prodCat[$_GET['tipo']];

    include_once('./inc/head.php');

    ?>
    <!-- Title -->
    <title><?= $paginaTitulo ?></title>
    <meta name="description" content="<?= $paginaDescricao ?>" />

  </head>
  <body>

    <?php include_once('./inc/navbar.php') ?>

    <!-- CONTEUDO-->
    <section id="conteudo" class="py-8 py-md-5border-bottom"> 
      <div class="container">
        <div class="row">

          <div class="col-12 mb-5" data-aos="fade-up" data-aos-delay="50">
            <h2><?= $prodCat[$_GET['tipo']] ?></h2>
          </div>

          <?php foreach($row_produtos as $produto){ ?>
            <div class="col-md-6 mb-3">
              <div class="card mb-3 shadow" data-aos="fade-up">
                <div class="row g-0">
                  <div class="col-4 col-md-3 p-0 bg-light">
                    <a href="./produto.php?id=<?= $produto->ID ?>">
                      <img src="./upload/<?= (!empty($produto->imagem2) ? 'produtos/'.$produto->imagem2 : '/no-image.png') ?>" class="img-fluid img-multiply rounded shadow" alt="<?= $produto->titulo ?>">
                    </a>
                  </div>
                  <div class="col-8 col-md-9">
                    <div class="card-body pl-0">
                      <h4 class="card-title"><?= $produto->titulo?></h4>
                      <p class="card-text small" style="min-height: 240px; text-align: justify;">
                        <a href="./produto.php?id=<?= $produto->ID ?>"><?= $produto->resumo ?></a>
                      </p>
                      <a class="small" href="./produto.php?id=<?= $produto->ID ?>"> 
                        <i class="fas fa-plus"></i> Mais Informações
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>


    <!-- SHAPE -->
    <div class="position-relative mt-n1">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- DEPOIMENTOS-->
    <?php include_once('./inc/faq.php'); ?>
    <!-- DEPOIMENTOS -->

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- FOOTER -->
    <?php include_once('./inc/footer.php'); ?>
    <!-- // FOOTER -->

    <!-- Politica de Privacidade -->
    <?php include_once('./inc/privacidade.php'); ?>
    <!-- // Politica de Privacidade -->

    <!-- JAVASCRIPT -->
    <?php include_once('./inc/scripts.php'); ?>

  </body>
</html>