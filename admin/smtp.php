<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');

  $tabelaBanco    = "smtp";

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $post_name      = $_POST['name'];
    $post_host      = $_POST['host'];
    $post_email     = $_POST['email'];
    $post_port      = $_POST['port'];
    $post_user      = $_POST['user'];
    $post_password  = $_POST['password'];
    $post_security  = $_POST['security'];
    $post_active    = $_POST['active'];

    $IDusuario      = $_SESSION['usuarioID'];

    $sistemaQuery = "UPDATE {$tabelaBanco} SET  name        = :name,
                                                host        = :host,
                                                email       = :email,
                                                user        = :user,
                                                active      = :active,
                                                twitter     = :twitter,
                                                facebook    = :facebook,
                                                instagram   = :instagram,
                                                rodape      = :rodape,
                                                IDusuario   = {$IDusuario},
                                                data        = CURDATE()
                                                WHERE  ID   = 1";

    $sistema=$pdo->prepare($sistemaQuery);
    $sistema->bindParam(':name', $post_name, PDO::PARAM_STR);
    $sistema->bindParam(':host', $post_host, PDO::PARAM_STR);
    $sistema->bindParam(':host', $post_host, PDO::PARAM_STR);
    $sistema->bindParam(':email', $post_email, PDO::PARAM_STR);
    $sistema->bindParam(':user', $post_user, PDO::PARAM_STR);
    $sistema->bindParam(':active', $post_active, PDO::PARAM_STR);
    $sistema->bindParam(':twitter', $post_twitter, PDO::PARAM_STR);
    $sistema->bindParam(':facebook', $post_facebook, PDO::PARAM_STR);
    $sistema->bindParam(':instagram', $post_instagram, PDO::PARAM_STR);
    $sistema->bindParam(':rodape', $post_rodape, PDO::PARAM_STR);
    $sistema->execute();

    $aviso = "<h3 class='text-success'>Dados atualizados com sucesso</h3>";

  }

  $sistema=$pdo->prepare("SELECT * FROM {$tabelaBanco} WHERE ID = 1");
  $sistema->execute();
  $row_sistema = $sistema->fetch();

  //var_dump($row_sistema);

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
              Dados do site
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
            <div class="col-12">

              <nav class="mb-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-scroll">
                  <li class="breadcrumb-item">
                    <a class="text-gray-700" href="home.php">
                      <i class="fas fa-home" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Voltar para a home do Admin" aria-label="visualizar"></i>
                    </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Configuração SMTP
                  </li>
                </ol>
              </nav>

              <form method="post" id="formulario" action="#" enctype="multipart/form-data">

                <div class="row p-3">

                  <?php if(isset($aviso)) echo $aviso; ?>
                
                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" class="form-control form-control-flush" name="name" id="name" value="<?= $row_sistema['name'] ?>" placeholder="name">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="host"><i class="fas fa-globe"></i> Host</label>
                    <input type="text" class="form-control form-control-flush" name="host" id="host" value="<?= $row_sistema['host'] ?>" placeholder="smtp.empresa.com.br">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="email"><i class="fas fa-envelope"></i> email</label>
                    <input type="text" class="form-control form-control-flush" name="email" id="email" value="<?= $row_sistema['email'] ?>" placeholder="55 71 0000-0000">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="user"><i class="fas fa-user"></i> User</label>
                    <input type="text" class="form-control form-control-flush" name="user" id="user" value="<?= $row_sistema['user'] ?>" placeholder="55 71 0000-0000">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="active"><i class="fas fa-check"></i> active</label>
                    <input type="text" class="form-control form-control-flush" name="active" id="active" value="<?= $row_sistema['active'] ?>" placeholder="5571900000000">
                  </div>

                  <div class="p-3">
                    <button type="submit" class="btn btn-primary-soft btn-xs mb-3 w-100" >Atualizar</button>
                  </div>

                </div>

              </form> 
              
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