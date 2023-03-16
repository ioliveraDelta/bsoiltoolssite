<?php 
  require_once('inc/db_cms.php');

  $tempo_cookies   = time() + (86400*30); // 30 dias para expirar

  $erroMsg = isset($_GET['erro']) ? $_GET['erro'] : '';

  switch ($erroMsg) {
    case 0:
        $erroMsg = "";
        break;
    case 1:
        $erroMsg = "Favor verificar Login e Senha";
        break;
    case 2:
        $erroMsg = "Acesso Negado";
        break;
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <?php include_once('inc/head.php') ?>
  </head>
  <body>

    <!-- CONTENT -->
    <section>
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">
          <div class="col-12 col-md-6 col-lg-4 py-8 py-md-11">

            <img class="w-50" src="../tile.png" alt="Logo <?= $site_titulo  ?>">

            <!-- Text -->
            <p class="mb-6 text-muted">
              <?php 
              
                if(isset($_GET['erro'])){

                  $i = $_GET['erro'];
                  switch ($i) {
                      case 1:
                        echo "Login e senha não encontrado!";
                        break;
                      case 2:
                        echo "Verifique seu dados ou recupere sua senha...";
                        break;
                      case 3:
                        echo "Área restrita, informe seu login e senha!";
                        break;
                      default:
                        echo "Erro";
                  }

                }else{
                  echo "Informe seu login e senha para entrar.";
                }

              ?>
            </p>

            <!-- Form -->
            <form class="mb-6" method="POST" action="home.php">

              <!-- Email -->
              <div class="form-group">
                <label class="form-label" for="login">
                  Login
                </label>
                <input type="login" class="form-control" id="login" name="login" placeholder="nome.sobrenome" required autofocus>
              </div>

              <!-- Password -->
              <div class="form-group mb-5">
                <label class="form-label" for="password">
                  Senha
                </label>
                <input type="password" class="form-control" id="password" name="senha" placeholder="Informe sua Senha" required>
              </div>

              <!-- Submit -->
              <button class="btn w-100 btn-primary" type="submit">
                Entrar
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 fs-sm text-muted">
              Não lembra sua senha? <a href="password-reset.php">Recuperar senha</a>.
            </p>

          </div>
          <div class="col-lg-7 offset-lg-1 align-self-stretch d-none d-lg-block">

            <!-- Image -->
            <div class="h-100 w-cover bg-cover" style="background-image: url(./img/cover.jpg);"></div>

            <!-- Shape -->
            <div class="shape shape-start shape-fluid-y svg-shim text-white">
              <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>
            </div>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <?php include_once('inc/scripts.php') ?>

  </body>
</html>
