<!-- SHAPE -->
<div class="position-relative">
  <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
    <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
</div>
<!-- FOOTER -->
<footer class="py-8 py-md-11 bg-gray-200">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">

        <!-- Brand -->
        <img src="../img/pinet.svg" alt="Pinet Web Solutions" class="footer-brand img-fluid mb-2" style="max-width: 100px">

        <!-- Text -->
        <p class="text-gray-700 mb-2">
          Think for you! <i class="fas fa-heart text-danger"></i>
        </p>

        <!-- Social -->
        <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">
          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.instagram.com/pinetwebsolutions/" class="text-decoration-none" target="_blank">
              <img src="../assets/img/icons/social/instagram.svg" class="list-social-icon" alt="...">
            </a>
          </li>
          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.facebook.com/pinetwebsolutions/" class="text-decoration-none" target="_blank">
              <img src="../assets/img/icons/social/facebook.svg" class="list-social-icon" alt="...">
            </a>
          </li>
          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.twitter.com/pinetwebsolutions/" class="text-decoration-none" target="_blank">
              <img src="../assets/img/icons/social/twitter.svg" class="list-social-icon" alt="...">
            </a>
          </li>
        </ul>

      </div>

      <div class="col-6 col-md-2">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Conteúdos
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <li class="mb-3">
            <a href="fullBanner.php" class="text-reset">
              FullBanner
            </a>
          </li>
          <li class="mb-3">
            <a href="noticias.php" class="text-reset">
              Notícias
            </a>
          </li>
          <li class="mb-3">
            <a href="textos.php" class="text-reset">
              Textos
            </a>
          </li>      
        </ul>

      </div>

      <div class="col-6 col-md-2">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Sistema
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <li class="mb-3">
            <a href="produtos.php" class="text-reset">
              Produtos
            </a>
          </li>     
          <li class="mb-3">
            <a href="arquivos.php" class="text-reset">
              Arquivos
            </a>
          </li>
        </ul>

      </div>

      <div class="col-6 col-md-2">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Galeria de Fotos
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <li class="mb-3">
            <a href="galerias.php" class="text-reset">
              Galerias
            </a>
          </li>
          <li class="mb-3">
            <a href="fotos.php" class="text-reset">
              Fotos
            </a>
          </li>
        </ul>

      </div>

      <div class="col-12 col-md-3">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Configurações
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-0">
          <li class="mb-3">
            <a href="site.php" class="text-reset">
              Site SEO
            </a>
          </li>
          <li class="mb-3">
            <a href="smtp.php" class="text-reset">
              SMTP
            </a>
          </li>
          <li class="mb-3">
            <a href="usuarios.php" class="text-reset">
              Usuarios
            </a>
          </li>
          <li class="mb-3">
            <a href="usuarios-form.php?id=<?= $_SESSION['usuarioID'] ?>" class="text-reset">
              Meus Dados
            </a>
          </li>
          <li class="mb-3">
            <a href="home.php?sair" class="text-reset">
              Sair
            </a>
          </li>
        </ul>

      </div>

    </div> <!-- / .row -->
  </div> <!-- / .container -->
</footer>