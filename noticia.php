<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    if(isset($_GET['id'])){
      $noticias=$pdo->prepare("SELECT * FROM noticias WHERE ID = :id");
      $noticias->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $noticias->execute();
      $noticias = $noticias->fetch();
    }

    $paginaURL       = "./produto.php?id=".$noticias['ID'];
    $paginaTitulo    = $noticias['titulo'];
    $paginaImagem    = "./uploads/noticias/".$noticias['imagem'];
    $paginaDescricao = $noticias['resumo'];

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

          <div class="col-12 mb-5">
            <h2><?= $noticias['titulo'] ?></h2>
          </div>

        </div>
      </div>

      <div class="bg-white p-3 shadow" data-aos="fade-up" data-aos-delay="50">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center"> 
              <img src="./upload/<?= (!empty($noticias['imagem']) ? 'noticias/'.$noticias['imagem'] : '/no-image.png') ?>" class="img-fluid rounded-start" alt="<?= $noticias['titulo'] ?>" style="objet-fit: cover">
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-3">
        <div class="row">
          <div class="col-12 p-3 bs-text-justify">

            <p><?= $noticias['texto'] ?></p>
            <hr>

            <?php if(!empty($noticias['arquivo'])){ ?>
              <h4 class="text-primary">Arquivo da notícia</h4>
              <a href="./upload/noticias/<?= $noticias['arquivo'] ?>" class="btn btn-primary"><i class="fa fas-plus"></i> Baixar arquivo em PDF</a>
              <hr>
            <?php } ?>

          </div>
        </div>
      </div>





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