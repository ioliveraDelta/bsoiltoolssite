<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    if(isset($_GET['id'])){
      $produtos=$pdo->prepare("SELECT * FROM produtos WHERE ID = :id");
      $produtos->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $produtos->execute();
      $produtos = $produtos->fetch();
    }

    $paginaURL       = "./produto.php?id=".$produtos['ID'];
    $paginaTitulo    = $produtos['titulo'];
    $paginaImagem    = "./uploads/produtos/".$produtos['imagem'];
    $paginaDescricao = $produtos['resumo'];

    include_once('./inc/head.php');

    ?>
    <!-- Title -->
    <title><?= $paginaTitulo ?></title>
    <meta name="description" content="<?= $paginaDescricao ?>" />

  </head>
  <body >

    <?php include_once('./inc/navbar.php') ?>

    <!-- CONTEUDO-->
    <section id="conteudo" class="py-8 py-md-5 border-bottom" style="background-color: #f4f4f4">

      <div class="container mt-3" >
        <div class="row" >
          
          <div class="col-8 p-3">

            <a class="d-block my-5 small" href="produtos.php?tipo=<?= $produtos['tipo1'] ?>"><i class="fas fa-arrow-left"></i> Voltar para lista de produtos</a>

            <h3 class="mb-3"><?= $produtos['titulo'] ?></h3>
            

            <h4 class="text-primary border border-primary border-top-0 border-left-0 border-right-0"><i class="fas fa-circle h5"></i> Descritivo</h4>
            <p><?= $produtos['descritivo'] ?></p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Perspectiva Isométrica <i class="fas fa-cube h5"></i>
            </button>
            <img src="./upload/<?= (!empty($produtos['imagem']) ? 'produtos/'.$produtos['imagem'].'?v=1' : '/no-image.png') ?>" class="img-fluid" alt="<?= $produtos['titulo'] ?>" style="max-width: 80px;">
            <hr>

            <?php if(!empty($produtos['beneficios'])){ ?>
              <h4 class="text-primary border border-primary border-top-0 border-left-0 border-right-0"><i class="fas fa-check-circle h5"></i> Benefícios</h4>
              <p><?= $produtos['beneficios'] ?></p>
              <hr>
            <?php } ?>

            <?php if(!empty($produtos['aplicacoes'])){ ?>
              <h4 class="text-primary border border-primary border-top-0 border-left-0 border-right-0"><i class="fas fa-plus h5"></i> Aplicações</h4>
              <p><?= $produtos['aplicacoes'] ?></p>
              <hr>
            <?php } ?>

            <?php if(!empty($produtos['operacao'])){ ?>
              <div class="card p-5 shadow">
              <h4 class="text-primary border border-primary border-top-0 border-left-0 border-right-0"><i class="fas fa-wrench h5"></i> Operação</h4>
              <p><?= $produtos['operacao'] ?></p>
              </div>
              <hr>
            <?php } ?>

            <?php if(!empty($produtos['arquivo'])){ ?>
              <h4 class="text-primary">Guia Técnico</h4>
              <a href="./upload/produtos/<?= $produtos['arquivo'] ?>" class="btn btn-primary"><i class="fa fas-plus h5"></i> Baixar arquivo em PDF</a>
              <hr>
            <?php } ?>

          </div>


          <div class="col-4 p-3">
            <img src="./upload/<?= (!empty($produtos['imagem2']) ? 'produtos/'.$produtos['imagem2'].'?v=1' : '/no-image.png') ?>" class="img-fluid rounded-start" alt="<?= $produtos['titulo'] ?>" >
          </div>

        </div>
      </div>

    </section>


    <!-- SHAPE -->
    <div class="position-relative mt-n1">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- DEPOIMENTOS-->
    <?php include_once('./inc/faq.php'); ?>
    <!-- DEPOIMENTOS -->

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- FOOTER -->
    <?php include_once('./inc/footer.php'); ?>
    <!-- // FOOTER -->

    <!-- Politica de Privacidade -->
    <?php include_once('./inc/privacidade.php'); ?>
    <!-- // Politica de Privacidade -->

    <!-- JAVASCRIPT -->
    <?php include_once('./inc/scripts.php'); ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $produtos['titulo'] ?></h5>
            <button type="button" class="close btn btn-primary btn-sm" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
            <img src="./upload/<?= (!empty($produtos['imagem']) ? 'produtos/'.$produtos['imagem'].'?v=1' : '/no-image.png') ?>" class="img-fluid rounded-start" alt="<?= $produtos['titulo'] ?>">
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div> -->
        </div>
      </div>
    </div>

  </body>
</html>