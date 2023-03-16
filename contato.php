<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $textos=$pdo->prepare("SELECT * FROM textos WHERE ID = 5");
    $textos->execute();
    $textos = $textos->fetch();

    $paginaURL       = "./contato.php";
    $paginaTitulo    = $textos['titulo'];
    $paginaImagem    = "./uploads/textos/".$textos['imagem'];
    $paginaDescricao = $textos['resumo'];

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

          <div class="col-12 bs-text-justify" data-aos="fade-up" data-aos-delay="50">
            <h2>
              <?= $textos['titulo'] ?>
            </h2>
            <!-- Text -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.0164672219466!2d-38.45635078506623!3d-12.906662562005291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x716105b395ef4bd%3A0x69930216a6dc905b!2sB%26S%20Oil%20Tools%20Equip%20Ind%20Ltda!5e0!3m2!1spt-BR!2sbr!4v1669900416394!5m2!1spt-BR!2sbr" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <p class="mt-6 mb-6 mb-md-0">

              <?= $textos['texto'] ?>
              
              <?php if(!empty($textos['arquivo'])){ ?>
                <hr>
                <h4 class="text-primary"><?= $paginaTitulo ?></h4>
                <a href="./upload/textos/<?= $textos['arquivo'] ?>" class="btn btn-primary"><i class="fa fas-plus"></i> Baixar arquivo em PDF</a>
                <hr>
              <?php } ?>
              
            </p>

          </div>

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