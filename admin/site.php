<?php
  require_once('inc/session_start.php');
  require_once('inc/log.php');
  require_once('inc/db_cms.php');
  require_once('inc/arrays.php');
  require_once('inc/funcoes.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $post_titulo    = $_POST['titulo'];
    $post_descricao = $_POST['descricao'];
    $post_endereco  = $_POST['endereco'];
    $post_telefone  = $_POST['telefone'];
    $post_email     = $_POST['email'];
    $post_whatsapp  = $_POST['whatsapp'];
    $post_twitter   = $_POST['twitter'];
    $post_facebook  = $_POST['facebook'];
    $post_instagram = $_POST['instagram'];
    $post_rodape    = $_POST['rodape'];

    $IDusuario      = $_SESSION['usuarioID'];

    $sistemaQuery = "UPDATE site SET  titulo      = :titulo,
                                      descricao   = :descricao,
                                      endereco    = :endereco,
                                      telefone    = :telefone,
                                      email       = :email,
                                      whatsapp    = :whatsapp,
                                      twitter     = :twitter,
                                      facebook    = :facebook,
                                      instagram   = :instagram,
                                      rodape      = :rodape,
                                      IDusuario   = {$IDusuario},
                                      data        = CURDATE()
                                      WHERE  ID   = 1";

    $sistema=$pdo->prepare($sistemaQuery);
    $sistema->bindParam(':titulo', $post_titulo, PDO::PARAM_STR);
    $sistema->bindParam(':descricao', $post_descricao, PDO::PARAM_STR);
    $sistema->bindParam(':descricao', $post_descricao, PDO::PARAM_STR);
    $sistema->bindParam(':endereco', $post_endereco, PDO::PARAM_STR);
    $sistema->bindParam(':telefone', $post_telefone, PDO::PARAM_STR);
    $sistema->bindParam(':email', $post_email, PDO::PARAM_STR);
    $sistema->bindParam(':whatsapp', $post_whatsapp, PDO::PARAM_STR);
    $sistema->bindParam(':twitter', $post_twitter, PDO::PARAM_STR);
    $sistema->bindParam(':facebook', $post_facebook, PDO::PARAM_STR);
    $sistema->bindParam(':instagram', $post_instagram, PDO::PARAM_STR);
    $sistema->bindParam(':rodape', $post_rodape, PDO::PARAM_STR);
    $sistema->execute();

    $aviso = "<h3 class='text-success'>Dados atualizados com sucesso</h3>";

  }

  $sistema=$pdo->prepare("SELECT * FROM site WHERE ID = 1");
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
                    Dados do Site
                  </li>
                </ol>
              </nav>

              <form method="post" id="formulario" action="#" enctype="multipart/form-data">

                <div class="row p-3">

                  <?php if(isset($aviso)) echo $aviso; ?>
                
                  <div class="col-md-12 p-3 mb-0 form-group">
                    <label class="text-muted" for="titulo"><i class="fas fa-angle-right"></i> Título</label>
                    <input type="text" class="form-control form-control-flush" name="titulo" id="titulo" value="<?= $row_sistema['titulo'] ?>" placeholder="Titulo">
                  </div>

                  <div class="col-md-12 p-3 mb-0 form-group">
                    <label class="text-muted" for="descricao"><i class="fas fa-angle-right"></i> Descrição <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="O descricao é utilizado para o texto dos mecanismos de busca como o Google" aria-label="visualizar"></i></label>
                    <textarea class="form-control form-control-flush" name="descricao" id="descricao" rows="4" placeholder="Resumo"><?= $row_sistema['descricao'] ?></textarea>
                    <span class="text-muted mt-2" style="font-size: .8rem">Max [ <b class="caracteres">255</b> ]</span>
                  </div>

                  <div class="col-md-12 p-3 mb-0 form-group">
                    <label class="text-muted" for="endereco"><i class="fas fa-map-marker"></i> Endereço</label>
                    <input type="text" class="form-control form-control-flush" name="endereco" id="endereco" value="<?= $row_sistema['endereco'] ?>" placeholder="Rua...">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="telefone"><i class="fas fa-mobile"></i> Telefone</label>
                    <input type="text" class="form-control form-control-flush" name="telefone" id="telefone" value="<?= $row_sistema['telefone'] ?>" placeholder="55 71 0000-0000">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="email"><i class="fas fa-envelope"></i> email</label>
                    <input type="text" class="form-control form-control-flush" name="email" id="email" value="<?= $row_sistema['email'] ?>" placeholder="55 71 0000-0000">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="whatsapp"><i class="fab fa-whatsapp"></i> whatsapp</label>
                    <input type="text" class="form-control form-control-flush" name="whatsapp" id="whatsapp" value="<?= $row_sistema['whatsapp'] ?>" placeholder="5571900000000">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="twitter"><i class="fab fa-twitter"></i> twitter</label>
                    <input type="text" class="form-control form-control-flush" name="twitter" id="twitter" value="<?= $row_sistema['twitter'] ?>" placeholder="@empresa">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="facebook"><i class="fab fa-facebook"></i> facebook</label>
                    <input type="text" class="form-control form-control-flush" name="facebook" id="facebook" value="<?= $row_sistema['facebook'] ?>" placeholder="Link do Facebook">
                  </div>

                  <div class="col-md-4 p-3 mb-0 form-group">
                    <label class="text-muted" for="instagram"><i class="fab fa-instagram"></i> Instagram</label>
                    <input type="text" class="form-control form-control-flush" name="instagram" id="instagram" value="<?= $row_sistema['instagram'] ?>" placeholder="Link do Instagram">
                  </div>

                  <div class="col-md-12 p-3 mb-0 form-group">
                    <label class="text-muted" for="rodape"><i class="fas fa-angle-right"></i> Rodapé <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Texto no rodapé do site" aria-label="visualizar"></i></label>
                    <textarea class="form-control form-control-flush" name="rodape" id="rodape" rows="4" placeholder="Texto rodape"><?= $row_sistema['rodape'] ?></textarea>
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