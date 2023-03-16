<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $paginaURL       = "./form-envia.php";
    $paginaTitulo    = $site_titulo." - Formulário de contato";
    $paginaImagem    = "tile.png";
    $paginaDescricao = $site_descricao;

    include_once('./inc/head.php'); 

    $cnpj    = $_POST['cnpj'];
    $nome    = $_POST['nome'];
    $email   = $_POST['email'];

    $message = "Retornar contato para ".$nome." no e-mail: ".$email." para empresa inscrita no CNPJ: ".$cnpj."<br> At. Carlos Neto";

    mail('josecarlos@coficpolo.com.br', 'Contato site SINPEQ', $message);



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
              Formulário enviado com sucesso!
            </h2>
            <!-- Text -->
            <p class="mb-6 mb-md-0">
              <?= $cnpj ?>
              <br>
              <?= $nome ?>
              <br>
              <?= $email ?>
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