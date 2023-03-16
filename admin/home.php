<?php
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');
  session_start();

  $tempo_cookies   = time() + (86400*30); // 30 dias para expirar

  if(isset($_POST['senha'])){
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
  }else if(!isset($_SESSION['usuarioNome'])){
    header("Location:index.php?erro=3");
    die();
  }

  if(isset($senha)){

    $usuarios=$pdo->prepare("SELECT * FROM usuarios WHERE login = :login AND senha = :senha AND status = 1 LIMIT 1");
    $usuarios->bindParam(':login', $login, PDO::PARAM_STR, 30);
    $usuarios->bindParam(':senha', $senha, PDO::PARAM_STR, 12);
    $usuarios->execute();
    $row_usuarios = $usuarios->fetchAll(PDO::FETCH_NUM); 

    if($usuarios->rowCount() > 0){
      $_SESSION['usuarioID']              = $row_usuarios[0][0];
      $_SESSION['usuarioNivel']           = $row_usuarios[0][1];
      $_SESSION['usuarioNome']            = $row_usuarios[0][2];
      $_SESSION['usuarioSobreNome']       = $row_usuarios[0][3];
      $_SESSION['usuarioCel']             = $row_usuarios[0][4];
      $_SESSION['usuarioEmail']           = $row_usuarios[0][5];
      $_SESSION['usuarioLogin']           = $row_usuarios[0][6];
      $_SESSION['usuarioHash']            = $row_usuarios[0][8];
      $_SESSION['usuarioUpdate']          = $row_usuarios[0][9];
      $_SESSION['usuarioPhoto']           = $row_usuarios[0][12];
      $_SESSION['usuarioToken']           = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

      if(isset($_POST['lembrarSenha']) && $_POST['lembrarSenha'] == 1){
        setcookie('userHash', $row_usuarios[0][8], $tempo_cookies);
      }

    }else{
      header("Location:index.php?erro=1");
    }

  }

  if(isset($_GET['sair'])){

    unset($_SESSION['usuarioID']);          
    unset($_SESSION['usuarioNivel']);
    unset($_SESSION['usuarioNome']);
    unset($_SESSION['usuarioSobreNome']);
    unset($_SESSION['usuarioCel']);
    unset($_SESSION['usuarioEmail']);
    unset($_SESSION['usuarioLogin']);
    unset($_SESSION['usuarioUpdate']);
    unset($_SESSION['usuarioPhoto']);
    unset($_SESSION['usuarioToken']);  
    unset($_SESSION['usuarioHash']);

    if(isset($_COOKIE['userHash'])){
      setcookie('userHash', '', time() - (86400*30));
    }

    header("Location:index.php");

  }

  // Destaque
  $destaque=$pdo->prepare("SELECT * FROM noticias WHERE tipo = 1 ORDER BY publicar DESC LIMIT 1");
  $destaque->execute();
  $row_destaque = $destaque->fetchAll(PDO::FETCH_OBJ);

  // Noticias
  $noticias=$pdo->prepare("SELECT * FROM noticias WHERE tipo = 0 ORDER BY publicar DESC LIMIT 3");
  $noticias->execute();
  $row_noticias = $noticias->fetchAll(PDO::FETCH_OBJ);

  // Textos
  $textos=$pdo->prepare("SELECT * FROM textos ORDER BY dataUpdate DESC LIMIT 3");
  $textos->execute();
  $row_textos = $textos->fetchAll(PDO::FETCH_OBJ);

  $tituloPagina = "Home";

  $tabela = "busca";

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
            <h1 class="display-2 fw-bold text-white">
              <?= $tituloPagina ?>
            </h1>

            <!-- Text -->
            <p class="lead mb-0 text-white-75">
              Bem vind@ <a class="text-reset" href="mailto:<?= $_SESSION['usuarioEmail'] ?>"><?= $_SESSION['usuarioNome'] ?></a>
            </p>

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
            <!-- Form -->
            <form class="rounded shadow mb-4" action="produtos.php" method="POST">
              
              <div class="input-group input-group-lg">

                <!-- Text -->
                <span class="input-group-text border-0 pe-1">
                  <i class="fe fe-search"></i>
                </span>

                <!-- Input -->
                <input class="form-control border-0 px-1" id="busca" name="busca" type="text" aria-label="Busca na base de dados de produtos" placeholder="Buscar produto...">

                <!-- Text -->
                <span class="input-group-text border-0 py-0 ps-1 pe-3">
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fe fe-search"></i>
                  </button>
                </span>

              </div>
            </form>

          </div>
        </div> <!-- / .row -->
      </div>
    </section>   

    <!-- LISTAGEM -->
    <section class="pt-7 pt-md-10">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <!-- Card -->
            <div class="card card-row shadow-light-lg mb-6 lift lift-lg">
              <div class="row gx-0">

                <?php foreach($row_destaque as $destaque){ ?>
                  <div class="col-12">

                    <!-- Badge -->
                    <span class="badge rounded-pill bg-light badge-float badge-float-inside">
                      <span class="h6 text-uppercase">Destaque</span>
                    </span>

                  </div>
                  <a class="col-12 col-md-6 order-md-2 bg-cover card-img-end" style="background-image: url(<?= (isset($destaque->imagem)) ? '../upload/noticias/'.$destaque->imagem : '../upload/no-image.png' ?>);" href="noticias-form.php?id=<?= $destaque->ID ?>">

                    <!-- Image (placeholder) -->
                    <img src="<?= (isset($destaque->imagem)) ? '../upload/noticias/'.$destaque->imagem : '../upload/no-image.png' ?>" alt="..." class="img-fluid d-md-none invisible">

                    <!-- Shape -->
                    <div class="shape shape-start shape-fluid-y svg-shim text-white d-none d-md-block">
                      <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h62.759v172C38.62 384 112 517 112 517v173H0V0z" fill="currentColor"/></svg>                  </div>

                  </a>
                  <div class="col-12 col-md-6 order-md-1">

                    <!-- Body -->
                    <a class="card-body" href="noticias-form.php?id=<?= $destaque->ID ?>">

                      <!-- Heading -->
                      <h3>
                        <?= $destaque->titulo ?>
                      </h3>

                      <!-- Text -->
                      <p class="mb-0 text-muted">
                        <?= $destaque->resumo ?>
                      </p>

                    </a>

                    <!-- Meta -->
                    <a class="card-meta" href="#!">

                      <!-- Divider -->
                      <hr class="card-meta-divider">

                      <!-- Avatar -->
                      <div class="avatar avatar-sm me-2">
                        <img src="<?= $avatar ?>" alt="..." class="avatar-img rounded-circle">
                      </div>

                      <!-- Author -->
                      <h6 class="text-uppercase text-muted me-2 mb-0">
                        <?= $destaque->autor ?>
                      </h6>

                      <!-- Date -->
                      <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                         <i class="fas fa-clock text-success"></i> Publicar em: <time datetime="<?= $destaque->publicar ?>"><?= formataData($destaque->publicar) ?></time>
                      </p>

                    </a>

                  </div>
                <?php } ?>

              </div> <!-- / .row -->
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- ARTICLES -->
    <section class="pt-7 pt-md-10">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-12 col-md">

            <!-- Heading -->
            <h3 class="mb-0">
              Últimas Notícias
            </h3>

            <!-- Text -->
            <p class="mb-0 text-muted">
              Notícias publicadas recentemente.
            </p>

          </div>
          <div class="col-12 col-md-auto">

            <!-- Button -->
            <a href="noticias.php" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
              Visualizar todas
            </a>

          </div>
        </div> <!-- / .row -->
        <div class="row">

          <?php foreach($row_noticias as $noticias){ ?>
          <div class="col-12 col-md-4 d-flex">

            <!-- Card -->
            <div class="card mb-6 mb-lg-0 shadow-light-lg lift lift-lg">

              <!-- Image -->
              <a class="card-img-top" href="noticias-form.php?id=<?= $noticias->ID ?>">

                <!-- Image -->
                <img src="<?= (isset($noticias->imagem)) ? '../upload/noticias/'.$noticias->imagem : '../upload/no-image.png' ?>" alt="..." class="card-img-top">

                <!-- Shape -->
                <div class="position-relative">
                  <div class="shape shape-bottom shape-fluid-x svg-shim text-white">
                    <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor"/></svg>                  </div>
                </div>

              </a>

              <!-- Body -->
              <a class="card-body" href="noticias-form.php?id=<?= $noticias->ID ?>">

                <!-- Heading -->
                <h3>
                  <?= $noticias->titulo?>
                </h3>

                <!-- Text -->
                <p class="mb-0 text-muted">
                  <?= $noticias->resumo?>
                </p>

              </a>

              <!-- Meta -->
              <a class="card-meta mt-auto" href="#!">

                <!-- Divider -->
                <hr class="card-meta-divider">

                <!-- Avatar -->
                <div class="avatar avatar-sm me-2">
                  <img src="<?= $avatar ?>" alt="..." class="avatar-img rounded-circle">
                </div>

                <!-- Author -->
                <h6 class="text-uppercase text-muted me-2 mb-0">
                  <?= $noticias->autor ?>
                </h6>

                <!-- Date -->
                <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                  <i class="fas fa-clock text-success"></i> <time datetime="<?= $noticias->publicar ?>"><?= formataData($noticias->publicar) ?></time>
                </p>

              </a>

            </div>

          </div>
          <?php } ?>

        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- TEXTOS EDITADOS RECENTEMENTE -->
    <section class="pt-7 pt-md-10">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-12 col-md">

            <!-- Heading -->
            <h3 class="mb-0">
              Textos editados recentemente
            </h3>

            <!-- Text -->
            <p class="mb-0 text-muted">
              Textos publicados recentemente.
            </p>

          </div>
          <div class="col-12 col-md-auto">

            <!-- Button -->
            <a href="textos.php" class="btn btn-sm btn-outline-gray-300 d-none d-md-inline">
              Visualizar todos
            </a>

          </div>
        </div> <!-- / .row -->
        <div class="row">
          <div class="col-12">

            <!-- Card -->
            <div class="card card-row shadow-light-lg mb-6">
              <div class="row gx-0">
                <div class="col-12 col-md-6">

                  <!-- Slider -->
                  <div class="card-img-slider" data-flickity='{"fade": true, "imagesLoaded": true, "pageDots": false, "prevNextButtons": false, "asNavFor": "#blogSlider", "draggable": false}'>

                    <?php foreach($row_textos as $textos){ ?>
                    <a class="card-img-start w-100 bg-cover" style="background-image: url(<?= (isset($textos->imagem)) ? '../upload/textos/'.$textos->imagem : '../upload/no-image.png' ?>);" href="textos-form.php?id=<?= $textos->ID ?>">
                      <!-- Image (placeholder) -->
                      <img src="<?= (isset($textos->imagem)) ? '../upload/textos/'.$textos->imagem : '../upload/no-image.png' ?>" alt="..." class="img-fluid d-md-none invisible">
                    </a>
                    <?php } ?>

                  </div>

                  <!-- Shape -->
                  <div class="shape shape-end shape-fluid-y svg-shim text-white d-none d-md-block">
                    <svg viewBox="0 0 112 690" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M116 0H51v172C76 384 0 517 0 517v173h116V0z" fill="currentColor"/></svg>                  </div>

                </div>

                <div class="col-12 col-md-6 position-static">

                  <!-- Slider -->
                  <div class="position-static" data-flickity='{"wrapAround": true, "pageDots": false, "imagesLoaded": true, "adaptiveHeight": true}' id="blogSlider">

                    <?php foreach($row_textos as $textos){ ?>
                    <div class="w-100">

                      <!-- Body -->
                      <a class="card-body" href="textos-form.php?id=<?= $textos->ID ?>">

                        <!-- Heading -->
                        <h3>
                          <?= $textos->titulo ?>
                        </h3>

                        <!-- Text -->
                        <p class="mb-0 text-muted">
                          <?= $textos->resumo ?>
                        </p>

                      </a>

                      <!-- Meta -->
                      <a class="card-meta mt-auto" href="#!">

                        <!-- Divider -->
                        <hr class="card-meta-divider">

                        <!-- Avatar -->
                        <div class="avatar avatar-sm me-2">
                          <img src="<?= $avatar ?>" alt="..." class="avatar-img rounded-circle">
                        </div>

                        <!-- Author -->
                        <h6 class="text-uppercase text-muted me-2 mb-0">
                          <?= $textos->autor ?>
                        </h6>

                        <!-- Date -->
                        <p class="h6 text-uppercase text-muted mb-0 ms-auto">
                          <i class="fas fa-clock text-success"></i> Data: <time datetime="<?= $textos->data ?>"><?= formataData($textos->data) ?></time>
                        </p>

                      </a>

                    </div>
                    <?php } ?>

                  </div>

                </div>
              </div> <!-- / .row -->
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- FOOTER -->
    <?php include_once('inc/footer.php') ?>

    <!-- JAVASCRIPT -->
    <?php include_once('inc/scripts.php') ?>

  </body>
</html>