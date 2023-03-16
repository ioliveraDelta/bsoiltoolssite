<?php $avatar = (empty($_SESSION['usuarioPhoto'])) ? "./img/person.png" : "../upload/usuarios/".$_SESSION['usuarioPhoto']; ?>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-md">

    <!-- Brand -->
    <a class="navbar-brand" href="./home.php">
      <img src="../brand.svg" class="navbar-brand-img w-100" alt="...">
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="navbarCollapse">

      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fe fe-x"></i>
      </button>

      <!-- Navigation -->
      <ul class="navbar-nav ms-auto">

        <li class="nav-item p-2">
          <a href="home.php"><i class="fas fa-home text-muted"></i></a>
        </li>
        <!-- Configurações do Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarLandings" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
            Conteúdos
          </a>
          <div class="dropdown-menu dropdown-menu-xl p-0" aria-labelledby="navbarLandings">
            <div class="row gx-0">
              <div class="col-12 col-lg-6">
                <div class="dropdown-img-start" style="background-image: url(./assets/img/photos/photo-3.jpg);">

                  <!-- Heading -->
                  <h4 class="fw-bold text-white mb-0">
                    <?= $site_titulo  ?>
                  </h4>

                  <!-- Text -->
                  <p class="fs-sm text-white text-center">
                    Clique no botão abaixo para visualizar o site.
                  </p>

                  <!-- Button -->
                  <a href="../index.php" class="btn btn-sm btn-white shadow-dark fonFt-size-sm" target="_blanck">
                    voltar ao site
                  </a>

                </div>
              </div>
              <div class="col-12 col-lg-6">
                <div class="dropdown-body">
                  <div class="row gx-0">
                    <div class="col-6">

                      <!-- Heading -->
                      <h6 class="dropdown-header">
                        Conteúdos
                      </h6>

                      <!-- List -->
                      <a class="dropdown-item" href="./fullBanner.php">
                        FullBanner
                      </a> 
                      <a class="dropdown-item" href="./textos.php">
                        Textos
                      </a>
                      <a class="dropdown-item" href="./noticias.php">
                        Notícias
                      </a>

                      <hr>
                      
                      <!-- Heading -->
                      <h6 class="dropdown-header">
                        Galeria de Fotos
                      </h6>

                      <!-- List -->
                      <a class="dropdown-item" href="./galeria.php">
                        Galerias
                      </a>
                      <a class="dropdown-item" href="./galeria_fotos.php">
                        Fotos
                      </a>

                    </div>

                    <div class="col-6">

                      <!-- Heading -->
                      <h6 class="dropdown-header">
                        Sistema
                      </h6>

                      <!-- List -->
                      <a class="dropdown-item" href="./produtos.php">
                        Produtos
                      </a>
                      <a class="dropdown-item mb-5" href="./arquivos.php">
                        Arquivos
                      </a>

                    </div>
                  </div> <!-- / .row -->
                </div>
              </div>
            </div> <!-- / .row -->
          </div>
        </li>
        <!-- // Configurações do Menu -->

        <!-- Configurações do Site -->
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
            Site
          </a>
          <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
            <div class="list-group list-group-flush">

              <a class="list-group-item" href="./site.php">

                <!-- Icon -->
                <div class="icon text-primary">
                  <i class="fe fe-globe" style="font-size: 1.5rem"></i>
                </div>

                <!-- Content -->
                <div class="ms-4">

                  <!-- Heading -->
                  <h6 class="fw-bold text-uppercase text-primary mb-0">
                    Site
                  </h6>

                  <!-- Text -->
                  <p class="fs-sm text-gray-700 mb-0">
                    Informações SEO
                  </p>

                </div>

              </a>

              <a class="list-group-item" href="./smtp.php">

                <!-- Icon -->
                <div class="icon text-primary">
                  <i class="fe fe-mail" style="font-size: 1.5rem"></i>
                </div>

                <!-- Content -->
                <div class="ms-4">

                  <!-- Heading -->
                  <h6 class="fw-bold text-uppercase text-primary mb-0">
                    SMTB
                  </h6>

                  <!-- Text -->
                  <p class="fs-sm text-gray-700 mb-0">
                    Configurações de Email
                  </p>

                </div>

                <!-- Badge -->
                <span class="badge rounded-pill bg-primary-soft ms-auto">
                  v.1.0
                </span>

              </a>

            </div>
          </div>
        </li>
        <!-- // Configurações do Site -->

        <!-- Configurações do usuario -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
            Usuários
          </a>
          <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
            <div class="list-group list-group-flush">

              <a class="list-group-item" href="./usuarios.php">

                <!-- Icon -->
                <div class="icon text-primary">
                  <i class="fe fe-users" style="font-size: 1.5rem"></i>
                </div>

                <!-- Content -->
                <div class="ms-4">

                  <!-- Heading -->
                  <h6 class="fw-bold text-uppercase text-primary mb-0">
                    Usuários
                  </h6>

                  <!-- Text -->
                  <p class="fs-sm text-gray-700 mb-0">
                    Lista de acesso ao Admin
                  </p>

                </div>

              </a>

              <a class="list-group-item" href="./usuarios-form.php?id=<?= $_SESSION['usuarioID'] ?>">

                <!-- Icon -->
                <div class="icon text-primary">
                  <img src="<?= $avatar ?>" alt="..." class="avatar-img rounded-circle" style="width: 30px">
                </div>

                <!-- Content -->
                <div class="ms-4">

                  <!-- Heading -->
                  <h6 class="fw-bold text-uppercase text-primary mb-0">
                    <?= $_SESSION['usuarioNome'] ?>
                  </h6>

                  <!-- Text -->
                  <p class="fs-sm text-gray-700 mb-0">
                    Meus dados
                  </p>

                </div>

              </a>

              <a class="list-group-item" href="./home.php?sair">

                <!-- Icon -->
                <div class="icon text-primary">
                  <i class="fe fe-user-x" style="font-size: 1.5rem"></i>
                </div>

                <!-- Content -->
                <div class="ms-4">

                  <!-- Heading -->
                  <h6 class="fw-bold text-uppercase text-primary mb-0">
                    Sair
                  </h6>

                  <!-- Text -->
                  <p class="fs-sm text-gray-700 mb-0">
                    Clique aqui para sair do Admin
                  </p>

                </div>

              </a>

            </div>
          </div>
        </li>
        <!-- // Configurações do usuario -->

      </ul>

    </div>

  </div>
</nav>