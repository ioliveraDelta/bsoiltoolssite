<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $paginaURL       = "./quem-somos.php";
    $paginaTitulo    = $site_titulo." - Quem somos";
    $paginaImagem    = "tile.png";
    $paginaDescricao = $site_descricao;

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
              Publicações
            </h2>       
          </div>


          <!-- publicacao -->
          <div class="col-12 col-md-6 col-lg-4 d-flex">
            <!-- Card -->
            <div class="card mb-6 mb-lg-0 shadow-light-lg">
              <!-- Image -->
              <a class="card-img-top" href="./doc/Seminário Teletrabalho 25.11.2021 - Apresentação SINDIQUIMICA Dr. João Gabriel Lopes.pptm">
                <img src="./doc/Seminário_eletrabalho_25.11.2021.png" alt="" class="card-img-top">
              </a>
              <!-- Shape -->
              <div class="position-relative">
                <div class="shape shape-fluid-x shape-bottom text-white">
                  <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"></path></svg>                </div>
              </div>
              <!-- Body -->
              <a class="card-body" href="./doc/Seminário Teletrabalho 25.11.2021 - Apresentação SINDIQUIMICA <br>Dr. João Gabriel Lopes.pptm" download>
                <!-- Heading -->
                <h3>
                  Seminário Trabalho Remoto
                </h3>
                <p>Apresentação SINDIQUIMICA Dr. João Gabriel Lopes</p>
                <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                  <time datetime="25.11.2021">25-11-2021</time>
                </p>
                
                <!-- Text -->
              </a>
              
            </div>
            <!-- / .card -->
          </div>
          <!-- / publicacao -->



          <!-- publicacao -->
          <div class="col-12 col-md-6 col-lg-4 d-flex">
            <!-- Card -->
            <div class="card mb-6 mb-lg-0 shadow-light-lg">
              <!-- Image -->
              <a class="card-img-top" href="./doc/Seminário_eletrabalho_25.11.2021.pptx">
                <img src="./doc/Seminário_eletrabalho_25.11.2021.png" alt="" class="card-img-top">
              </a>
              <!-- Shape -->
              <div class="position-relative">
                <div class="shape shape-fluid-x shape-bottom text-white">
                  <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"></path></svg>                </div>
              </div>
              <!-- Body -->
              <a class="card-body" href="./doc/Seminário_eletrabalho_25.11.2021.pptx" download>
                <!-- Heading -->
                <h3>
                  Seminário Trabalho Remoto
                </h3>
                <p>Apresentação SINPEQ <br>Dr. Paulo Reis</p>
                <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                  <time datetime="25.11.2021">25-11-2021</time>
                </p>
                
                <!-- Text -->
              </a>
              
            </div>
            <!-- / .card -->
          </div>
          <!-- / publicacao -->
       

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