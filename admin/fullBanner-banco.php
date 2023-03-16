<?php
  // SISTEMA - FullBanner
  // Status inicial do formulário
  $tabelaBanco = "fullBanner";
  $tamImagem   = "1920 x 650px";

  // Verifica se tem algum registro para carregar no form
  if(isset($_GET['id'])){
      $sistema=$pdo->prepare("SELECT * FROM {$tabelaBanco} WHERE ID = :id");
      $sistema->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $sistema->execute();
      $sistema = $sistema->fetch();
  }

  $campo_id             = (isset($_GET['id'])) ? $sistema['ID'] : "";
  $campo_titulo         = (isset($_GET['id'])) ? $sistema['titulo'] : "";
  $campo_subTitulo      = (isset($_GET['id'])) ? $sistema['subTitulo'] : "";
  $campo_resumo         = (isset($_GET['id'])) ? $sistema['resumo'] : "";
  $campo_texto          = (isset($_GET['id'])) ? $sistema['texto'] : "";
  $campo_publicar       = (isset($_GET['id'])) ? $sistema['publicar'] : date("Y-m-d");
  $campo_tipo           = (isset($_GET['id'])) ? $sistema['tipo'] : 0;
  $campo_link           = (isset($_GET['id'])) ? $sistema['link'] : "";
  $campo_url            = (isset($_GET['id'])) ? $sistema['url'] : "";

  $campo_imagem         = (isset($_GET['id'])) ? $sistema['imagem'] : "";
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
  $avisoArquivo         = "";
  $aviso                = "";

  // Se o botão do formulario for clicado ele verifiva se é uma inclusão ou atualização
  if(isset($_POST['status'])){

      $post_id             = intval($_POST['id']);
      $post_titulo         = $_POST['titulo'];
      $post_subTitulo      = $_POST['subTitulo'];
      $post_resumo         = $_POST['resumo'];
      $post_link           = $_POST['link'];
      $post_publicar       = $_POST['publicar'];
      $post_tipo           = intval($_POST['tipo']);

      $url_amigavel        = generate_friendly_url($_POST['titulo']);

      $post_IDgaleria      = $_POST['IDgaleria'];
      $post_status         = intval($_POST['status']);
      
      // ATUALIZA OS DADOS DO FORMULARIO

      if($_POST['id'] != ""){

        $sistemaQuery = "UPDATE {$tabelaBanco} SET  titulo        = :titulo,
                                                    subTitulo     = :subTitulo,
                                                    resumo        = :resumo,
                                                    texto         = :texto,
                                                    publicar      = :publicar,
                                                    tipo          = :tipo,
                                                    link          = :link,
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
                                                     subtitulo,
                                                     resumo, 
                                                     texto,
                                                     publicar,
                                                     tipo,
                                                     link,
                                                     url,
                                                     IDgaleria,
                                                     autor,
                                                     IDusuario,
                                                     data,
                                                     status
                                                     )
                                             VALUES (
                                                     :titulo,
                                                     :subTitulo,
                                                     :resumo, 
                                                     :texto,
                                                     :publicar,
                                                     :tipo,
                                                     :link,
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
       $sistema->bindParam(':subTitulo', $post_subTitulo, PDO::PARAM_STR);
       $sistema->bindParam(':resumo', $post_resumo, PDO::PARAM_STR);
       $sistema->bindParam(':texto', $post_texto, PDO::PARAM_STR);
       $sistema->bindParam(':publicar', $post_publicar, PDO::PARAM_STR);
       $sistema->bindParam(':tipo', $post_tipo, PDO::PARAM_INT);
       $sistema->bindParam(':link', $post_subTitulo, PDO::PARAM_STR);
       $sistema->bindParam(':url', $url_amigavel, PDO::PARAM_STR);
       $sistema->bindParam(':IDgaleria', $post_IDgaleria, PDO::PARAM_INT);
       $sistema->bindParam(':autor', $campo_autor, PDO::PARAM_STR);
       $sistema->bindParam(':IDusuario', $campo_IDusuario, PDO::PARAM_INT);
       $sistema->bindParam(':status', $post_status, PDO::PARAM_INT);
       $sistema->execute();

       $campo_titulo            = $post_titulo;
       $campo_subTitulo         = $post_subTitulo;
       $campo_resumo            = $post_resumo;
       $campo_texto             = $post_texto;
       $campo_publicar          = $post_publicar; 
       $campo_tipo              = $post_tipo;
       $campo_link              = $post_link;
       $campo_IDgaleria         = $post_IDgaleria;
       $campo_status            = $post_status;

  }

  // UPLOAD ARQUIVO PDF
  require_once('inc/upload_arquivo.php');

  // UPLOAD RESIZE AND CROP IMAGES
  require_once('inc/resize-img.php');

  $imagemAtual = (empty($campo_imagem)) ? '../upload/img-crop.png' : '../upload/'.$tabelaBanco.'/'.$campo_imagem;

  // GALERIA DE FOTOS
  $galeria=$pdo->prepare("SELECT * FROM galeria ORDER BY ID ASC");
  $galeria->execute();
  $row_galeria = $galeria->fetchAll(PDO::FETCH_OBJ);

?>
