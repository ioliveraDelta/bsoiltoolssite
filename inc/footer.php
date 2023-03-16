<footer class="py-8 py-md-11 bg-gray-200">
  <div class="container">
    <div class="row">

      <div class="col-12 col-md-2">

        <!-- Brand -->
        <img src="./brand.svg" alt="bsoiltools" class="footer-brand img-fluid mb-2 w-50">

        <!-- Social -->
        <ul class="list-unstyled list-inline list-social mb-6 mb-md-0">

          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.linkedin.com/bsoiltools" class="text-decoration-none" target="_blank">
              <img src="./assets/img/icons/social/linkedin.svg" class="list-social-icon" alt="...">
            </a>
          </li>

          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.instagram.com/bsoiltools" class="text-decoration-none" target="_blank">
              <img src="./assets/img/icons/social/instagram.svg" class="list-social-icon" alt="...">
            </a>
          </li>
          
          <li class="list-inline-item list-social-item me-3">
            <a href="https://www.twitter.com/bsoiltools" class="text-decoration-none" target="_blank">
              <img src="./assets/img/icons/social/twitter.svg" class="list-social-icon" alt="...">
            </a>
          </li>
         
        </ul>

      </div>

      <div class="col-6 col-md-2">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          A Empresa
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <li class="mb-3">
            <a href="sobre.php" class="text-reset text-small">
              Sobre
            </a>
          </li>
          <li  class="mb-3">
            <a href="codigo-de-conduta.php" class="text-reset text-small">
              Código de Conduta
            </a>
          </li>
          <li class="mb-3">
            <a href="video-institucional.php" class="text-reset text-small">
              Vídeo Institucional
            </a>
          </li>
          <li class="mb-3">
            <a href="diretoria.php" class="text-reset text-small">
              Diretoria
            </a>
          </li>
          <li class="mb-3">
            <a href="certificados.php" class="text-reset text-small">
              Certificados
            </a>
          </li>
        </ul>

      </div>

      <div class="col-6 col-md-5">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Produtos
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>

            <li class="mb-3">
              <a href="./produtos.php?tipo=<?= $prodCod ?>" class="text-reset text-small">
                <?= $prodTitulo ?>
              </a>
            </li>

            <?php }} ?>

        </ul>

      </div>

      <div class="col-6 col-md-3">

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Notícias & Publicações
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-6 mb-md-8 mb-lg-0">
          <li class="mb-3">
            <a href="noticias.php" class="text-reset text-small">
              Noticias
            </a>
          </li>
          <li class="mb-3">
            <a href="publicacoes.php" class="text-reset text-small">
              Publicações
            </a>
          </li>
        </ul>

        <!-- Heading -->
        <h6 class="fw-bold text-uppercase text-gray-700">
          Contatos
        </h6>

        <!-- List -->
        <ul class="list-unstyled text-muted mb-0">
          <li class="mb-3">
            <a href="contato.php" class="text-reset text-small">
              Localização
            </a>
          </li>
          <li class="mb-3">
            <a href="contato.php" class="text-reset text-small">
              Contato
            </a>
          </li>
        </ul>

      </div>

    </div> <!-- / .row -->
  </div> <!-- / .container -->
</footer>