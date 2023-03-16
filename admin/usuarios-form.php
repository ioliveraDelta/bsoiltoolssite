<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');
  require_once('usuarios-banco.php');

  $id = (isset($_GET['id'])) ? $_GET['id'] : "";

  $tituloHeader = (isset($_GET['id'])) ? "Atualizar" : "Incluir";

  if(isset($_GET['id'])){

    // sistema
    $sistema=$pdo->prepare("SELECT * FROM {$tabelaBanco} WHERE ID = {$id}");
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
                    <?=  $campo_nome?> <?=  $campo_sobrenome?> 
                  </li>
                </ol>
              </nav>

              <form method="post" id="formulario" action="#" enctype="multipart/form-data">

                <!-- FORM HIDDEN--> 
                <input type="hidden" name="id" id="id" value="<?= $campo_id; ?>" /> 
                <!-- // FORM HIDDEN -->    

              <div class="row p-3"> 

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="nome"><i class="fas fa-user"></i> nome</label>
                  <input type="text" class="form-control form-control-flush" name="nome" id="nome" value="<?= $campo_nome ?>" placeholder="nome">
                </div>

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="sobrenome"><i class="fas fa-angle-right"></i> sobrenome</label>
                  <input type="text" class="form-control form-control-flush" name="sobrenome" id="sobrenome" value="<?= $campo_sobrenome ?>" placeholder="sobrenome">
                </div>

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="cel"><i class="fas fa-mobile"></i> cel</label>
                  <input type="text" class="form-control form-control-flush" name="cel" id="cel" value="<?= $campo_cel ?>" placeholder="cel">
                </div>

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="email"><i class="fas fa-envelope"></i> email</label>
                  <input type="text" class="form-control form-control-flush" name="email" id="email" value="<?= $campo_email ?>" placeholder="email">
                </div>

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="login"><i class="fas fa-arrow-right"></i> login</label>
                  <input type="text" class="form-control form-control-flush" name="login" id="login" value="<?= $campo_login ?>" placeholder="login">
                </div>

                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="senha"><i class="fas fa-lock"></i> senha</label>
                  <input type="password" class="form-control form-control-flush" name="senha" id="senha" value="<?= $campo_senha ?>" placeholder="senha">
                </div>

                <!-- nivel no sistema -->
                <div class="col-md-6 p-3 mb-0 form-group text-capitalize">
                  
                  <div class="form-check form-check form-switch">
                    <input type="hidden" name="nivel" value="0" />
                    <input type="checkbox" class="form-check-input" name="nivel" id="nivel" value="1" <?= ($campo_nivel == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label text-muted" for="nivel">administrador <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O nível administrador pode controlar todos os itens do site"></i></label>
                  </div>

                </div>
                <!-- // nivel no sistema -->

                <!-- status no sistema -->
                <div class="col-md-6 p-3 mb-0 form-group">
                  
                  <div class="form-check form-check form-switch">
                    <input type="hidden" name="status" value="0" />
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?= ($campo_status == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label text-muted" for="status">Status de publicação no site <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ao desmarcar esse item o texto não será visualizado no site, ideal para quando precisa de uma moderação antes de publicar."></i></label>
                  </div>

                </div>
                <!-- // status no sistema -->

                <div class="col-md-12 p-3">
                  <button type="submit" class="btn btn-primary-soft btn-md mb-3 w-100" >Salvar Conteúdo</button>
                </div>

              </div> 

              
              </form> 
              
            </div>

            <!-- FORM SIDE BAR -->
            <div class="col-12 col-md-3 p-3">

              <?php include_once('inc/form-imagem.php') ?>

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