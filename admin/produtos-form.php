<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');
  require_once('produtos-banco.php');

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
                    <?=  $campo_titulo ?> 
                  </li>
                </ol>
              </nav>

              <form method="post" id="formulario" action="#" enctype="multipart/form-data">
              
              <!-- FORM HIDDEN--> 
              <input type="hidden" name="id" id="id" value="<?= $campo_id; ?>" /> 
              <input type="hidden" name="IDgaleria" id="IDgaleria" value="" /> 
              <!-- // FORM HIDDEN --> 

              <div class="row p-3">

              <div class="col-md-12 p-3 mb-0">
                  <label class="text-muted mb-3" for="tipo1"><i class="fas fa-angle-right"></i> Categoria do produto: <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Selecione em que categorias o produto deve ser listado" aria-label="visualizar"></i></label>
                  <select id="tipo1" name="tipo1" class="form-select form-select-sm" data-choices>
                    <option disabled>Escolha uma categoria</option>
                    <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>
                    <option value="<?= $prodCod ?>" <?php if($prodCod == $campo_tipo1){echo "selected";} ?>><?= $prodTitulo ?></option>
                    <?php }} ?>
                  </select>
                </div>

                <div class="col-md-12 p-3 mb-0">
                  <select id="tipo2" name="tipo2" class="form-select form-select-sm" data-choices>
                    <option disabled>Escolha uma categoria</option>
                    <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>
                    <option value="<?= $prodCod ?>" <?php if($prodCod == $campo_tipo2){echo "selected";} ?>><?= $prodTitulo ?></option>
                    <?php }} ?>
                  </select>
                </div>

                <div class="col-md-12 p-3 mb-0">
                  <select id="tipo3" name="tipo3" class="form-select form-select-sm" data-choices>
                    <option disabled>Escolha uma categoria</option>
                    <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>
                    <option value="<?= $prodCod ?>" <?php if($prodCod == $campo_tipo3){echo "selected";} ?>><?= $prodTitulo ?></option>
                    <?php }} ?>
                  </select>
                </div>   

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="titulo"><i class="fas fa-angle-right"></i> titulo</label>
                  <input type="text" class="form-control form-control-flush" name="titulo" id="titulo" value="<?= $campo_titulo ?>" placeholder="Titulo">
                </div>

                <div class="p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="resumo"><i class="fas fa-angle-right"></i> resumo <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O resumo é utilizado para pequenas chamadas no site com link direto para o texto" aria-label="visualizar"></i></label>
                  <textarea class="form-control form-control-flush" name="resumo" id="resumo" rows="4" maxlength="255" placeholder="Resumo"><?= $campo_resumo ?></textarea>
                  <span class="text-muted mt-2" style="font-size: .8rem">Max [ <b class="caracteres">255</b> ]</span>
                </div>

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="descritivo"><i class="fas fa-angle-right"></i> descritivo</label>
                  <textarea class="form-control form-control-flush" name="descritivo" id="descritivo" rows="4" ><?= $campo_descritivo ?></textarea>
                </div>

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="beneficios"><i class="fas fa-angle-right"></i> Benefícios e características <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O beneficios" aria-label="visualizar"></i></label>
                  <textarea class="form-control form-control-flush" name="beneficios" id="beneficios" rows="4" placeholder="beneficios"><?= $campo_beneficios ?></textarea>
                </div>

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="aplicacoes"><i class="fas fa-angle-right"></i> aplicações <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O aplicacoes" aria-label="visualizar"></i></label>
                  <textarea class="form-control form-control-flush" name="aplicacoes" id="aplicacoes" rows="4" placeholder="aplicacoes"><?= $campo_aplicacoes ?></textarea>
                </div>

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="operacao"><i class="fas fa-angle-right"></i> operação <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O operacao" aria-label="visualizar"></i></label>
                  <textarea class="form-control form-control-flush" name="operacao" id="operacao" rows="4" placeholder="operacao"><?= $campo_operacao ?></textarea>
                </div>

                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  <label class="text-muted" for="outros"><i class="fas fa-angle-right"></i> outros <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O outros" aria-label="visualizar"></i></label>
                  <textarea class="form-control form-control-flush" name="outros" id="outros" rows="4" placeholder="outros"><?= $campo_outros ?></textarea>
                </div> 

                <!-- status no sistema -->
                <div class="col-md-12 p-3 mb-0 form-group text-capitalize">
                  
                  <div class="form-check form-check form-switch">
                    <input type="hidden" name="status" value="0" />
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?= ($campo_status == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label text-muted" for="status">Status de publicação no site <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Ao desmarcar esse item o texto não será visualizado no site, ideal para quando precisa de uma moderação antes de publicar."></i></label>
                  </div>

                </div>
                <!-- // status no sistema -->

                <div class="col-md-12 p-3">
                  <button type="submit" class="btn btn-primary-soft btn-xs mb-3 w-100" >Salvar Conteúdo</button>
                </div>

              </div>  
              </form> 
              
            </div>

            <!-- FORM SIDE BAR -->
            <div class="col-12 col-md-3 p-3">

              <?php include_once('inc/form-imagem.php') ?>

              <hr class="my-3">

              <?php include_once('inc/form-imagem2.php') ?>

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