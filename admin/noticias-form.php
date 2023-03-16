<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');
  require_once('noticias-banco.php');

  $id = (isset($_GET['id'])) ? $_GET['id'] : "";

  $tituloHeader = (isset($_GET['id'])) ? "Atualizar" : "Incluir";

  if(isset($_GET['id'])){

    // sistema
    $sistema=$pdo->prepare("SELECT * FROM textos WHERE ID = {$id}");
    $sistema->execute();
    $row_sistema = $sistema->fetchAll(PDO::FETCH_OBJ);

  }

  //var_dump($_POST);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <?php include_once('inc/head.php') ?>
  </head>
  <body class="bg-light">
    
    <!-- NAVBAR -->
    <?php include_once('inc/navbar.php') ?>

    <!-- HEADER HOME -->
    <!-- WELCOME -->
    <header data-jarallax data-speed=".8" class="py-10 py-md-10 overlay overlay-black overlay-60 bg-cover jarallax" style="background-image: url(./img/cover.jpg);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-7 text-center">

            <!-- Heading -->
            <h1 class="display-2 fw-bold text-lowercase" style="color: rgba(255,255,255,0.3)">
              <?= $tabelaBanco ?> / <?= $tituloHeader ?>
            </h1>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </header>

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      
      </div>
    </div>

    <!-- FORM -->
    <section class="mt-n6">
      <div class="container">
        <div class="row bg-white rounded">

            <!-- FORM MAIN -->    
            <div class="col-12 col-md-9">

              <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll">
                  <li class="breadcrumb-item">
                    <a class="text-gray-700" href="home.php">
                      <i class="fas fa-home" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Voltar para a home do Admin" aria-label="visualizar"></i>
                    </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-gray-700" href="<?=  $tabelaBanco ?>.php">
                      <?=  $tabelaBanco ?>
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <a class="text-gray-700" href="../noticia.php?n=<?=  $campo_id ?>" target="_blank">
                      <i class="fas fa-eye" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Visualizar página publicada" aria-label="visualizar"></i> Visualizar Notícia
                    </a>
                  </li>
                </ol>
              </nav>

              <form method="post" id="formulario" action="#" enctype="multipart/form-data">
              
              <!-- FORM HIDDEN--> 
              <input type="hidden" name="id" id="id" value="<?= $campo_id; ?>" /> 
              <input type="hidden" name="IDgaleria" id="IDgaleria" value="" /> 
              <!-- // FORM HIDDEN -->    

              <div class="p-3 mb-0 form-group text-capitalize">
                <label class="text-muted" for="titulo"><i class="fas fa-angle-right"></i> titulo</label>
                <input type="text" class="form-control form-control-flush" name="titulo" id="titulo" value="<?= $campo_titulo ?>" placeholder="Titulo">
              </div>

              <div class="p-3 mb-0 form-group text-capitalize">
                <label class="text-muted" for="resumo"><i class="fas fa-angle-right"></i> resumo <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O resumo é utilizado para pequenas chamadas no site com link direto para o texto" aria-label="visualizar"></i></label>
                <textarea class="form-control form-control-flush" name="resumo" id="resumo" rows="4" maxlength="255" placeholder="Resumo"><?= $campo_resumo ?></textarea>
                <span class="text-muted mt-2" style="font-size: .8rem">Max [ <b class="caracteres">255</b> ]</span>
              </div>

              <div class="p-3 mb-0 form-group text-capitalize">
                <label class="text-muted" for="texto"><i class="fas fa-angle-right"></i> texto</label>
                <textarea class="form-control form-control-flush" name="texto" id="texto" rows="4" ><?= $campo_texto ?></textarea>
              </div>

              <div class="p-3 mb-0 form-group text-capitalize">
                <label class="text-muted" for="publicar"><i class="fas fa-angle-right"></i> publicar <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Informe a partir de que data deve ser publicada" aria-label="visualizar"></i></label>
                <input type="date" class="form-control form-control-flush" name="publicar" id="publicar" value="<?= $campo_publicar ?>" placeholder="Publicar em DD/MM/AAAA">
              </div>

              <div class="row">

                <!-- status no sistema -->
                <span class="d-block col-md-6">
                  <div class="p-3 mb-0 form-group text-capitalize">
                    
                    <div class="form-check form-check form-switch">
                      <input type="hidden" name="status" value="0" />
                      <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?= ($campo_status == 1) ? "checked" : ""; ?>>
                      <label class="form-check-label text-muted" for="status">Status de publicação no site <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ao desmarcar esse item o texto não será visualizado no site, ideal para quando precisa de uma moderação antes de publicar."></i></label>
                    </div>

                  </div>
                </span>
                <!-- // status no sistema -->

                <!-- tipo da noticia -->
                <span class="d-block col-md-6">
                  <div class="p-3 mb-0 form-group text-capitalize">
                    
                    <div class="form-check form-check form-switch">
                      <input type="hidden" name="tipo" value="0" />
                      <input type="checkbox" class="form-check-input" name="tipo" id="tipo" value="1" <?= ($campo_tipo == 1) ? "checked" : ""; ?>>
                      <label class="form-check-label text-muted" for="tipo">Definir como destaque <i class="fas fa-star" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Definir a notícia como destaque na página inicial"></i></label>
                    </div>

                  </div>
                </span>
                <!-- // tipo da noticia-->

              </div>

              <div class="p-3">
                <button type="submit" class="btn btn-primary-soft btn-xs mb-3 w-100" >Salvar Conteúdo</button>
              </div>
              </form>
              
            </div>

            <!-- FORM SIDE BAR -->
            <div class="col-12 col-md-3 p-3">

              <?php include_once('inc/form-imagem.php') ?>

              <hr class="my-3">

              <?php include_once('inc/form-arquivo.php') ?>

            </div>


        </div> <!-- / .row -->
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once('inc/footer.php') ?>

    <!-- JAVASCRIPT -->
    <?php include_once('inc/scripts.php') ?>

  </body>
</html>