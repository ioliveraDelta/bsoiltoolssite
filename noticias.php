<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $noticias=$pdo->prepare("SELECT * FROM noticias WHERE status = 1");
    $noticias->execute();
    $row_noticias = $noticias->fetchAll(PDO::FETCH_OBJ);

    $paginaURL       = "./noticias.php";
    $paginaTitulo    = "Lista de notícias da B&S Oiltools";
    $paginaImagem    = "./tile.png";
    $paginaDescricao = "Lista de notícias da B&S Oiltools";

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

          <div class="col-12" data-aos="fade-up" data-aos-delay="50">
            <h2>
              Notícias
            </h2>       
          </div>

          <?php foreach($row_noticias as $noticia){ ?>
          <div class="col-12 col-md-4 d-flex mb-3">
            <!-- Card -->
            <div class="card mb-6 mb-lg-0 shadow-light-lg">
              <!-- Image -->
              <a class="card-img-top" href="noticia.php?id=<?= $noticia->ID ?>">
                <img src="./upload/<?= (!empty($notica->imagem) ? 'noticias/'.$noticia->imagem : '/no-image.png') ?>" alt="<?= $noticia->titulo ?>" class="card-img-top">
              </a>
              <!-- Shape -->
              <div class="position-relative">
                <div class="shape shape-fluid-x shape-bottom text-white">
                  <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"></path></svg>                </div>
              </div>
              <!-- Body -->
              <a class="card-body" href="noticia.php?id=<?= $noticia->ID ?>" target="_blank">
                <!-- Heading -->
                <h3>
                  <?= $noticia->titulo ?>
                </h3>
                <!-- Text -->
                <p class="mb-0 text-muted">
                  <?= $noticia->resumo ?>
                </p>
              </a>
              <!-- Meta -->
              <a class="card-meta" href="noticia.php?id=<?= $noticia->ID ?>">
                <!-- Divider -->
                <hr class="card-meta-divider">
                <!-- Avatar -->
                <div class="avatar avatar-sm me-2">
                  <img src="./admin/img/person.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <!-- Author -->
                <h6 class="text-uppercase text-muted me-2 mb-0">
                  <?= $noticia->autor ?>
                </h6>
                <!-- Date -->
                <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                  <time datetime="2021-07-16"><?= formataData($noticia->publicar) ?></time>
                </p>
              </a>
            </div>
            <!-- / .card -->
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