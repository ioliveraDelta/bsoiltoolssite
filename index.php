<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $paginaURL       = $site_url;
    $paginaTitulo    = $site_titulo;
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

    <!-- FULL BANNER -->
    <?php include_once('./inc/full-banner.php') ?>

    <!-- PRODUTOS-->
    <?php include_once('./inc/produtos.php') ?>

    <!-- FEATURES -->
    <?php include_once('./inc/features.php') ?>

    <!-- ASSOCIADOS LOGO -->
    <?php include_once('./inc/video-institucional.php'); ?>
    <!-- // ASSOCIADOS LOGO --> 

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