<?php
  // SISTEMA
  // Status inicial do formulário
  $tabelaBanco = "usuarios";
  $tamImagem   = "1920 x 1080px";

  // Verifica se tem algum registro para carregar no form
  if(isset($_GET['id'])){
      $sistema=$pdo->prepare("SELECT * FROM {$tabelaBanco} WHERE ID = :id");
      $sistema->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
      $sistema->execute();
      $sistema = $sistema->fetch();
  }

  $campo_id             = (isset($_GET['id'])) ? $sistema['ID'] : "";
  $campo_nivel          = (isset($_GET['id'])) ? $sistema['nivel'] : "";
  $campo_nome           = (isset($_GET['id'])) ? $sistema['nome'] : "";
  $campo_sobrenome      = (isset($_GET['id'])) ? $sistema['sobrenome'] : "";
  $campo_cel            = (isset($_GET['id'])) ? $sistema['cel'] : "";
  $campo_email          = (isset($_GET['id'])) ? $sistema['email'] : "";
  $campo_login          = (isset($_GET['id'])) ? $sistema['login'] : "";
  $campo_senha          = (isset($_GET['id'])) ? $sistema['senha'] : "";

  $campo_imagem         = (isset($_GET['id'])) ? $sistema['imagem'] : "";
  $campo_legenda        = (isset($_GET['id'])) ? $sistema['legenda'] : "";
  $campo_status         = (isset($_GET['id'])) ? $sistema['status'] : 1;

  $btStatus             = (isset($_GET['id'])) ? "ATUALIZAR" : "INCLUIR";

  $campo_hash           = "BS".rand(10000000000000, 99999999999999);
  $campo_autor          = $_SESSION['usuarioNome'];
  $campo_IDusuario      = $_SESSION['usuarioID'];
  $campo_data           = date("Y-m-d");
  $avisoImagem          = "";
  $aviso                = "";

  // Se o botão do formulario for clicado ele verifiva se é uma inclusão ou atualização
  if(isset($_POST['status'])){

      $post_id             = intval($_POST['id']);
      $post_nivel          = $_POST['nivel'];
      $post_nome           = $_POST['nome'];
      $post_sobrenome      = $_POST['sobrenome'];
      $post_cel            = $_POST['cel'];
      $post_email          = $_POST['email'];
      $post_login          = $_POST['login'];
      $post_status         = intval($_POST['status']);

      if($_POST['senha'] == $campo_senha){
        $post_senha      = $campo_senha;
      }else{
        $post_senha      = md5($_POST['senha']);
      }

      // ATUALIZA OS DADOS DO FORMULARIO

      if(isset($_GET['id'])){

        $sistemaQuery = "UPDATE {$tabelaBanco} SET  nivel         = :nivel,
                                                    nome          = :nome,
                                                    sobrenome     = :sobrenome,
                                                    cel           = :cel,
                                                    email         = :email,
                                                    login         = :login,
                                                    senha         = :senha,
                                                    autor         = :autor,
                                                    IDusuario     = :IDusuario,
                                                    hash          = :hash,
                                                    status        = :status
                                                    WHERE  ID     = {$post_id}";

         $aviso = "Atualização efetuada com sucesso!";

       }else{

        require_once('inc/proximo_registro_do_banco.php');

        $sistemaQuery = "INSERT INTO {$tabelaBanco} (
                                                     nivel,
                                                     nome, 
                                                     sobrenome, 
                                                     cel,
                                                     email,
                                                     login,
                                                     senha,
                                                     autor,
                                                     IDusuario,
                                                     hash,
                                                     data,
                                                     status
                                                     )
                                             VALUES (
                                                     :nivel,
                                                     :nome,
                                                     :sobrenome, 
                                                     :cel,
                                                     :email,
                                                     :login,
                                                     :senha,
                                                     :autor,
                                                     :IDusuario,
                                                     :hash,
                                                     CURDATE(),
                                                     :status
                                                   )";
         
         $aviso = "Cadastro efetuado com sucesso!";
         $btStatus = "ATUALIZAR";
         header("Location:".$tabelaBanco."-form.php?id=".$proximoID);

      }

       $sistema=$pdo->prepare($sistemaQuery);
       $sistema->bindParam(':nivel', $post_nivel, PDO::PARAM_INT);
       $sistema->bindParam(':nome', $post_nome, PDO::PARAM_STR);
       $sistema->bindParam(':sobrenome', $post_sobrenome, PDO::PARAM_STR);
       $sistema->bindParam(':cel', $post_cel, PDO::PARAM_STR);
       $sistema->bindParam(':email', $post_email, PDO::PARAM_STR);
       $sistema->bindParam(':login', $post_login, PDO::PARAM_STR);
       $sistema->bindParam(':senha', $post_senha, PDO::PARAM_STR);
       $sistema->bindParam(':autor', $campo_autor, PDO::PARAM_STR);
       $sistema->bindParam(':IDusuario', $campo_IDusuario, PDO::PARAM_INT);
       $sistema->bindParam(':hash', $campo_hash, PDO::PARAM_STR);
       $sistema->bindParam(':status', $post_status, PDO::PARAM_INT);
       $sistema->execute();

       $campo_nivel             = $post_nivel;
       $campo_nome              = $post_nome;
       $campo_sobrenome         = $post_sobrenome;
       $campo_cel               = $post_cel;
       $campo_email             = $post_email;
       $campo_login             = $post_login;
       $campo_senha             = $post_senha;
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
