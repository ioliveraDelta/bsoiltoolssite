<!doctype html>
<html lang="pt-br">
  <head>
    <?php 
      require_once('inc/db_cms.php'); 
      include_once('inc/head.php'); 
    ?>
  </head>
  <body>

    <!-- CONTENT -->
    <section class="section-border border-primary">
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center gx-0 min-vh-100">
          <div class="col-8 col-md-6 col-lg-7 offset-md-1 order-md-2 mt-auto mt-md-0 pt-8 pb-4 py-md-11">

            <!-- Image -->
            <img src="../assets/img/illustrations/illustration-4.png" alt="..." class="img-fluid">

          </div>
          <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">

            <!-- Heading -->
            <h1 class="mb-0 fw-bold">
              Password reset
            </h1>

            <!-- Text -->
            <p class="mb-6 text-center text-muted">
              Informe seu email para recuperar a senha.
            </p>

            <!-- Form -->
            <form class="mb-6">

              <!-- Email -->
              <div class="form-group">
                <label class="form-label" for="email">
                  Email
                </label>
                <input type="email" class="form-control" id="email" placeholder="nome@empresa.com.br">
              </div>

              <!-- Submit -->
              <button class="btn w-100 btn-primary" type="submit">
                Recuperar Senha
              </button>

            </form>

            <!-- Text -->
            <p class="mb-0 fs-sm text-center text-muted">
              Lembrou da sua senha? <a href="index.php">Entrar</a>.
            </p>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT -->
    <?php include_once('inc/scripts.php') ?>

  </body>
</html>
