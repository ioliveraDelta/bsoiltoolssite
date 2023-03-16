<?php
  // SISTEMA
  // Status inicial do formulário
  $tabelaBanco = "produtos";
  $tamImagem   = "1920 x 1080px";

  // Verifica se tem algum registro para carregar no form
  if(isset($_GET['id'])){
      $sistema=$pdo->prepare("SELECT * FROM {$tabelaBanco} WHERE ID = :id");
      $sistema->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $sistema->execute();
      $sistema = $sistema->fetch();
  }

  $campo_id             = (isset($_GET['id'])) ? $sistema['ID'] : "";
  $campo_titulo         = (isset($_GET['id'])) ? $sistema['titulo'] : "";
  $campo_resumo         = (isset($_GET['id'])) ? $sistema['resumo'] : "";
  $campo_descritivo     = (isset($_GET['id'])) ? $sistema['descritivo'] : "";
  $campo_beneficios     = (isset($_GET['id'])) ? $sistema['beneficios'] : "";
  $campo_aplicacoes     = (isset($_GET['id'])) ? $sistema['aplicacoes'] : "";
  $campo_operacao       = (isset($_GET['id'])) ? $sistema['operacao'] : "";
  $campo_outros         = (isset($_GET['id'])) ? $sistema['outros'] : "";
  $campo_tipo1          = (isset($_GET['id'])) ? $sistema['tipo1'] : "";
  $campo_tipo2          = (isset($_GET['id'])) ? $sistema['tipo2'] : "";
  $campo_tipo3          = (isset($_GET['id'])) ? $sistema['tipo3'] : "";

  $campo_imagem         = (isset($_GET['id'])) ? $sistema['imagem'] : "";
  $campo_imagem2        = (isset($_GET['id'])) ? $sistema['imagem2'] : "";
  $campo_legenda        = (isset($_GET['id'])) ? $sistema['legenda'] : "";
  $campo_arquivo        = (isset($_GET['id'])) ? $sistema['arquivo'] : "";
  $campo_IDgaleria      = (isset($_GET['id'])) ? $sistema['IDgaleria'] : "";
  $campo_status         = (isset($_GET['id'])) ? $sistema['status'] : 1;

  $btStatus             = (isset($_GET['id'])) ? "ATUALIZAR" : "INCLUIR";
  $onde_estou           = (isset($_GET['id'])) ? $campo_titulo : "INCLUIR ".$tabelaBanco;

  $campo_autor          = $_SESSION['usuarioNome'];
  $campo_IDusuario      = $_SESSION['usuarioID'];
  $campo_data           = date("Y-m-d");
  $msg_arquivo1         = "";
  $msg_arquivo2         = "";
  $avisoImagem          = "";
  $avisoImagem2         = "";
  $avisoArquivo         = "";
  $aviso                = "";

  // Se o botão do formulario for clicado ele verifiva se é uma inclusão ou atualização
  if(isset($_POST['status'])){

      $post_id             = intval($_POST['id']);
      $post_titulo         = $_POST['titulo'];
      $post_resumo         = $_POST['resumo'];
      $post_descritivo     = $_POST['descritivo'];
      $post_beneficios     = $_POST['beneficios'];
      $post_aplicacoes     = $_POST['aplicacoes'];
      $post_operacao       = $_POST['operacao'];
      $post_outros         = $_POST['outros'];
      $post_tipo1          = $_POST['tipo1'];
      $post_tipo2          = $_POST['tipo2'];
      $post_tipo3          = $_POST['tipo3'];

      $url_amigavel        = generate_friendly_url($_POST['titulo']);     

      $post_IDgaleria      = $_POST['IDgaleria'];
      $post_status         = intval($_POST['status']);

      // ATUALIZA OS DADOS DO FORMULARIO

      if($_POST['id'] != ""){

        $sistemaQuery = "UPDATE {$tabelaBanco} SET  titulo        = :titulo,
                                                    resumo        = :resumo,
                                                    descritivo    = :descritivo,
                                                    beneficios    = :beneficios,
                                                    aplicacoes    = :aplicacoes,
                                                    operacao      = :operacao,
                                                    outros        = :outros,
                                                    tipo1         = :tipo1,
                                                    tipo2         = :tipo2,
                                                    tipo3         = :tipo3,
                                                    url           = :url,
                                                    IDgaleria     = :IDgaleria,
                                                    autor         = :autor,
                                                    IDusuario     = :IDusuario,
                                                    status        = :status
                                                    WHERE  ID     = {$post_id}";

         $aviso = "Atualização efetuada com sucesso!";

       }else{

        require_once('inc/proximo_registro_do_banco.php');

        $sistemaQuery = "INSERT INTO {$tabelaBanco} (
                                                     titulo, 
                                                     resumo, 
                                                     descritivo,
                                                     beneficios,
                                                     aplicacoes,
                                                     operacao,
                                                     outros,
                                                     tipo1,
                                                     tipo2,
                                                     tipo3,
                                                     url,
                                                     IDgaleria,
                                                     autor,
                                                     IDusuario,
                                                     data,
                                                     status
                                                     )
                                             VALUES (
                                                     :titulo,
                                                     :resumo, 
                                                     :descritivo,
                                                     :beneficios,
                                                     :aplicacoes,
                                                     :operacao,
                                                     :outros,
                                                     :tipo1,
                                                     :tipo2,
                                                     :tipo3,
                                                     :url,
                                                     :IDgaleria,
                                                     :autor,
                                                     :IDusuario,
                                                     CURDATE(),
                                                     :status
                                                   )";
         
         $aviso = "Cadastro efetuado com sucesso!";
         $btStatus = "ATUALIZAR";
         header("Location:".$tabelaBanco."-form.php?id=".$proximoID);

      }

       $sistema=$pdo->prepare($sistemaQuery);
       $sistema->bindParam(':titulo', $post_titulo, PDO::PARAM_STR);
       $sistema->bindParam(':resumo', $post_resumo, PDO::PARAM_STR);
       $sistema->bindParam(':descritivo', $post_descritivo, PDO::PARAM_STR);
       $sistema->bindParam(':beneficios', $post_beneficios, PDO::PARAM_STR);
       $sistema->bindParam(':aplicacoes', $post_aplicacoes, PDO::PARAM_STR);
       $sistema->bindParam(':operacao', $post_operacao, PDO::PARAM_STR);
       $sistema->bindParam(':outros', $post_outros, PDO::PARAM_STR);
       $sistema->bindParam(':tipo1', $post_tipo1, PDO::PARAM_INT);
       $sistema->bindParam(':tipo2', $post_tipo2, PDO::PARAM_INT);
       $sistema->bindParam(':tipo3', $post_tipo3, PDO::PARAM_INT);
       $sistema->bindParam(':url', $url_amigavel, PDO::PARAM_STR);
       $sistema->bindParam(':IDgaleria', $post_IDgaleria, PDO::PARAM_INT);
       $sistema->bindParam(':autor', $campo_autor, PDO::PARAM_STR);
       $sistema->bindParam(':IDusuario', $campo_IDusuario, PDO::PARAM_INT);
       $sistema->bindParam(':status', $post_status, PDO::PARAM_INT);
       $sistema->execute();

       $campo_titulo            = $post_titulo;
       $campo_resumo            = $post_resumo;
       $campo_descritivo        = $post_descritivo;
       $campo_aplicacoes        = $post_aplicacoes;
       $campo_operacao          = $post_operacao;
       $campo_tipo1             = $post_tipo1;
       $campo_tipo2             = $post_tipo2;
       $campo_tipo3             = $post_tipo3;
       $campo_IDgaleria         = $post_IDgaleria;
       $campo_status            = $post_status;

  }

  // UPLOAD ARQUIVO PDF
  require_once('inc/upload_arquivo.php');

  // UPLOAD RESIZE AND CROP IMAGES
  require_once('inc/resize-img.php');

  $imagemAtual  = (empty($campo_imagem)) ? '../upload/img-crop.png' : '../upload/'.$tabelaBanco.'/'.$campo_imagem;

  // UPLOAD RESIZE AND CROP IMAGES
  require_once('inc/resize-img2.php');

  $imagemAtual2 = (empty($campo_imagem2)) ? '../upload/img-crop.png' : '../upload/'.$tabelaBanco.'/'.$campo_imagem2;

  // GALERIA DE FOTOS
  $galeria=$pdo->prepare("SELECT * FROM galeria ORDER BY ID ASC");
  $galeria->execute();
  $row_galeria = $galeria->fetchAll(PDO::FETCH_OBJ);

?>
