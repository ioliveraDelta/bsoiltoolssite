<?php

// UPLOAD DA IMAGEM 
  if(isset($_POST['idArquivo'])){

    $ID                  = intval($_POST['idArquivo']);
    $info_arquivo        = basename( $_FILES["arquivo"]["name"]);

    $diretorio           = "../upload/".$tabelaBanco."/"; // define o diretorio do arquivo
    $caminho             = $diretorio . $info_arquivo;
    $uploadOk            = 1;
    $arquivoFileType     = strtolower(pathinfo($caminho,PATHINFO_EXTENSION));
    $novoNome            = $tabelaBanco."-".rand(1000000, 9999999).".".$arquivoFileType;

    // Apaga a arquivo antiga do servidor
    if(!empty($sistema['arquivo'])){
    	$arquivoApagar = $sistema['arquivo'];
    }else{
    	$arquivoApagar = "";
    }

    if($arquivoApagar != ''){
    	unlink($diretorio.$arquivoApagar);
    }

    // Verifica o tamanho do arquivo
    if ($_FILES["arquivo"]["size"] > 5000000) {
        $avisoArquivo = "Desculpe, esse arquivo é muito grande > 5Mb.";
        $uploadOk     = 0;
    }
    // Define o formato da arquivo
    if($arquivoFileType != "pdf") {
        $avisoArquivo = "Desculpe, somente arquivos PDF.";
        $uploadOk     = 0;
    }
    // Caso tenha erro não envia arquivo
    if ($uploadOk == 0) {
        $avisoArquivo = "Desculpe, arquivo não enviado.";
    // se estiver tudo ok ele segue adiante
    } else {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $diretorio.$novoNome)) {

            $atualizarArquivo=$pdo->prepare("UPDATE $tabelaBanco SET arquivo = :arquivo WHERE ID = :ID");
            $atualizarArquivo->bindParam(':ID', $ID, PDO::PARAM_INT);
            $atualizarArquivo->bindParam(':arquivo', $novoNome, PDO::PARAM_STR);
            $atualizarArquivo->execute();

            $campo_arquivo    = $novoNome;

            $avisoArquivo = "Arquivo atualizado com sucesso!<br>Nome do arquivo [ ".$novoNome. " ] - OK";

        } else {
            $avisoArquivo = "Desculpe, arquivo não enviado, tente novamente.";
        }
      }  
   }
?>