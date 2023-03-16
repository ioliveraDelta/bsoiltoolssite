<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');

  $tabela = "fullBanner";

  // sistema

  if(isset($_POST['busca'])){
    $busca = "%".$_POST['busca']."%";
    $sistema=$pdo->prepare("SELECT * FROM {$tabela}
                                     WHERE (titulo LIKE :busca OR subtitulo LIKE :busca OR resumo LIKE :busca)
                                     ORDER BY publicar DESC LIMIT 50");
    $sistema->bindParam(':busca', $busca, PDO::PARAM_STR);
  }else{
    $busca = "";
    $sistema=$pdo->prepare("SELECT * FROM {$tabela} ORDER BY publicar DESC LIMIT 50");
  }

  $sistema->execute();
  $row_sistema = $sistema->fetchAll(PDO::FETCH_OBJ);

  $n_resultados = count($row_sistema);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <?php include_once('inc/head.php') ?>
  </head>
  <body class="bg-light">
    
    <!-- MODAL EXCLUIR -->
    <?php foreach($row_sistema as $sistema){ ?>
    <div class="modal fade" id="modalApagar<?= $sistema->ID ?>" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
    
            <!-- Close -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
            <!-- Image -->
            <div class="text-center">
              <img class="w-50 mb-3 rounded" src="../upload/<?= (!empty($sistema->imagem) ? $tabela.'/'.$sistema->imagem : '/no-image.png') ?> " alt="">
            </div>
    
            <!-- Heading -->
            <h5><?= $sistema->subTitulo ?></h5>
            <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
              <?= $sistema->titulo ?>
            </h2>
    
            <!-- Text -->
            <p class="fs-lg text-center mb-6 mb-md-8">
              <span class="text-danger font-weight-bold">ATENÇÃO: Essa ação não pode ser desfeita!</span>
              <hr>
              <a class="btn btn-danger btn-sm w-100" href="excluir.php?t=<?= $tabela ?>&id=<?= $sistema->ID ?>">
              <i class="fas fa-eraser" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="excluir" aria-label="excluir"></i>
              Excluir
              </a>
            </p>
    
          </div>
        </div>
      </div>
    </div>
    <?php }?>
    <!-- // MODAL EXCLUIR -->
    
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
              <?= $tabela ?> / lista
            </h1>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </header>

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- SEARCH -->
    <section class="mt-n6">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Formulário de busca no admin -->
            <?php include_once('inc/form-busca.php') ?>

          </div>
        </div> <!-- / .row -->
      </div>
    </section>
    <!-- / SEARCH -->  

    <section class="container">

      <div class="row">

        <div class="col-12 text-center mb-3">
          <a href="<?= $tabela ?>-form.php" class="btn btn-lg btn-rounded-circle btn-primary">
            <i class="fe fe-plus" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="adicionar" aria-label="adicionar"></i>
          </a>
        </div> 

        <div class="col-12 bg-white p-5 rounded shadow">
          <div class="list-group list-group-flush"> 

            <?= ($n_resultados == 0) ? "<h3 class='text-danger'>Nenhum registro encontrado</h3>" : ""; ?>


            <?php foreach($row_sistema as $sistema){ ?>

            <div class="list-group-item d-flex align-items-center"  data-aos="fade-up">

              <!-- Imagem -->
              <div class="p-3">
                 <img class="lista-imagem rounded shadow" src="../upload/<?= (!empty($sistema->imagem)) ? $tabela.'/'.$sistema->imagem : '/no-image.png' ?> " alt="">
              </div>
              
              <!-- Text -->
              <div class="me-auto p-3">
                
                <!-- Heading -->
                <small class="text-muted"><?= $sistema->subTitulo ?></small>
                <p class="busca-texto fw-bold mb-1">
                  <?= $sistema->titulo ?>
                </p>

                <!-- Text -->
                <p class="busca-texto fs-sm text-muted mb-3">
                  <?= $sistema->resumo ?>
                </p>

                <!-- Author -->
                <h6 class="text-uppercase text-muted me-2 mb-0">
                  <img src="<?= $avatar ?>" alt="..." class="avatar-img rounded-circle" style="width: 20px">
                  <?= $sistema->autor ?>
                  <i class="fas fa-clock"></i> <time datetime="<?= $sistema->data ?>"><?= formataData($sistema->data) ?></time> 
                  <i class="fas fa-clock text-success"></i> Publicar em <time datetime="<?= $sistema->data ?>"><?= formataData($sistema->publicar) ?></time>
                </h6>

              </div>

              <!-- BT -> Status -->
              <div class="badge badge-rounded-circle bg-success-soft ms-4">
                  <i class="fas <?= ($sistema->tipo == 1) ? 'fa-star text-primary' : 'fa-star text-white' ?>" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="destaque" aria-label="destaque"></i>
              </div>
              
              <!-- botões / status, editar, excluir -->  
              <?php include('inc/bt-forms.php') ?>

            </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <?php include_once('inc/footer.php') ?>

    <!-- JAVASCRIPT -->
    <?php include_once('inc/scripts.php') ?>

  </body>
</html>