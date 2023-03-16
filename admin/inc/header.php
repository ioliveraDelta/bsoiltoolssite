<header class="bg-dark pt-9 pb-11 d-none d-md-block">
  <div class="container-md">
    <div class="row align-items-center">
      <div class="col">

        <!-- Heading -->
        <h1 class="fw-bold text-white mb-2">
          <?= $tituloPagina ?>
        </h1>

        <!-- Text -->
        <p class="fs-lg text-white-75 mb-0">
          Bem vind@ <a class="text-reset" href="mailto:dhgamache@gmail.com"><?= $_SESSION['usuarioNome'] ?></a>
        </p>

      </div>
      <div class="col-auto">

        <!-- Button -->
        <a href="home.php?sair" class="btn btn-sm btn-gray-300-20">
          Sair
        </a>

      </div>
    </div> <!-- / .row -->
  </div> <!-- / .container -->
</header>