<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    
  <!-- Brand -->
  <a class="navbar-brand" href="./index.php">
    <img src="./brand.svg" class="navbar-brand-img" style="max-height: 3.5rem;" alt="SINPEQ" width="100px" height="100px">
  </a>
  
  <!-- Toggler -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  
  <!-- Collapse -->
  <div class="collapse navbar-collapse" id="navbarCollapse">
    
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fe fe-x h3"></i>
    </button>
    
    <!-- Navigation -->
    <ul class="navbar-nav ms-auto">

      <!-- O SINDICATO -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          A Empresa
        </a>
        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
          <div class="list-group list-group-flush">

            <a class="list-group-item" href="./quem-somos.php">
              <div class="icon icon-sm text-primary"><i class="fas fa-industry h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Sobre</h6> 
                <p class="fs-sm text-gray-700 mb-0">Fabricante de equipamentos de sub-superfície para a indústria de petróleo e gás...</p>       
              </div>        
            </a>

            <a class="list-group-item" href="./codigo-de-conduta.php">
              <div class="icon icon-sm text-primary"><i class="fas fa-compass h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Código de Conduta</h6> 
                <p class="fs-sm text-gray-700 mb-0">Construida em torno da idéia de que é possível fazer negócios de forma ética...</p>       
              </div>        
            </a>

            <a class="list-group-item" href="./politica-do-sistema-de-gestao-da-qualidade.php">
              <div class="icon icon-sm text-primary"><i class="fas fa-stamp h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Política do Sistema de Gestão da Qualidade</h6> 
                <p class="fs-sm text-gray-700 mb-0">Fabricação e comercialização nacional e internacional de equipamentos...</p>       
              </div>        
            </a>

            <a class="list-group-item" href="./video-institucional.php">
              <div class="icon icon-sm text-primary"><i class="far fa-play h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Vídeo Institucional</h6> 
                <p class="fs-sm text-gray-700 mb-0">Conheça um pouco sobre a nossa estrutura...</p>       
              </div>        
            </a>

            <a class="list-group-item" href="certificados.php">
              <div class="icon icon-sm text-primary"><i class="fas fa-download h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Certificados</h6> 
                <p class="fs-sm text-gray-700 mb-0">Clique aqui para fazer o Download.</p>       
              </div>        
            </a>
             
          </div>
        </div>
      </li>
      <!-- // O SINDICATO -->

      <!-- CATEGORIAS PRODUTOS-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
          <div class="list-group list-group-flush">

            <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>

              <a class="list-group-item" href="./produtos.php?tipo=<?= $prodCod ?>">
                <div class="icon icon-sm">
                  <img class="img-fluid rounded shadow" style="max-width: 60px;" src="./img/prod-<?= $prodCod ?>.png" alt="<?= $prodTitulo ?> ">
                </div>   
                <div class="ms-4">       
                  <h6 class="fw-bold text-uppercase text-primary mb-0"><?= $prodTitulo ?></h6>     
                </div>        
              </a>

            <?php }} ?>

          </div>
        </div>
      </li>

      <!-- NOTÍCIAS & PUBLICAÇÕES -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          Notícias & Publicações
        </a>
        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
          <div class="list-group list-group-flush">

            <a class="list-group-item" href="./noticias.php">
              <div class="icon icon-sm text-primary"><i class="fas fa-newspaper h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Notícias</h6> 
                <p class="fs-sm text-gray-700 mb-0">Industria, Tecnologia, inovação...</p>       
              </div>        
            </a>

            <a class="list-group-item" href="./publicacoes.php">
              <div class="icon icon-sm text-primary"><i class="far fa-file-download h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Publicações</h6> 
                <p class="fs-sm text-gray-700 mb-0">Artigos e Manuais</p>       
              </div>        
            </a>

          </div>
        </div>
      </li>
      <!-- // NOTÍCIAS & PUBLICAÇÕES -->

      <!-- CONTATOS -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          Contatos
        </a>
        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
          <div class="list-group list-group-flush">

            <a class="list-group-item" href="<?= $site_maps ?>" target="_blank">
              <div class="icon icon-sm text-primary"><i class="fas fa-map-marker-alt h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Localização</h6> 
                <p class="fs-sm text-gray-700 mb-0">
                  <?= $site_endereco ?>
                </p>       
              </div>        
            </a>

            <a class="list-group-item" href="./contato.php">
              <div class="icon icon-sm text-primary"><i class="far fa-envelope h3"></i></div>   
              <div class="ms-4">       
                <h6 class="fw-bold text-uppercase text-primary mb-0">Contato</h6> 
                <p class="fs-sm text-gray-700 mb-0">
                  Tel: +55 <?= $site_telefone ?><br>
                  Fax: +55 71 3646-6680<br>
                  vendas@bsoiltools.com.br
                </p>       
              </div>        
            </a>


          </div>
        </div>
      </li>
      <!-- // CONTATOS -->

      <!-- TRANSLATE -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-language" style="font-size: 1.6rem"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">

          <style>
            .goog-te-combo{
              width: 100%;
              height: 30px;
              border: 1px solid #ccc;
              border-radius: 0;
              background-color: #f5f5f5;
            }
            .goog-logo-link {
              display:none !important;
            } 
            .goog-te-gadget{
              color: transparent !important;
            }
            SELECT.goog-te-combo{
              color: #505050;
              text-transform: uppercase;
            }

            SELECT.goog-te-combo:hover{
              color:##506690;
            }

            .goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active {
               color:##506690;
            } 
          </style>
          

            <div id="google_translate_element"></div>
            <script type="text/javascript">
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'pt'}, 'google_translate_element');
              }
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

          
        </div>
      </li>
      <!-- // TRANSLATE -->
        
    </ul>
      
    </div>
    
  </div>
</nav>