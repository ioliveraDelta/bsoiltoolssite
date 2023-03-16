<?php

// UPLOAD DA IMAGEM 
  if(isset($_POST['idUpload2'])){

    $ID                   = intval($_POST['idUpload2']);
    $info_imagem2         = basename( $_FILES["imagem2"]["name"]);

    $diretorio            = "../upload/".$tabelaBanco."/"; // define o diretorio do arquivo
    $caminho              = $diretorio . $info_imagem2;
    $uploadOk2            = 1;
    $imageFileType        = strtolower(pathinfo($caminho,PATHINFO_EXTENSION));
    $novoNome2            = $tabelaBanco."-".rand(1000000, 9999999).".".$imageFileType;

    // Apaga a imagem antiga do servidor
    if(!empty($sistema['imagem2'])){
    	$imagemApagar2 = $sistema['imagem2'];
    }else{
    	$imagemApagar2 = "";
    }

    if($imagemApagar2 != ''){
    	unlink($diretorio.$imagemApagar2);
    	unlink($diretorio."thumbs/".$imagemApagar2);
    	unlink($diretorio."crop/".$imagemApagar2);
    }

    $imgFormatos = ['jpg', 'JPG', 'jpeg', 'gif', 'png'];

    // Define o formato da imagem
    if(in_array($imageFileType, $imgFormatos)) {
        $avisoImagem2 = "Desculpe, somente arquivos JPG, JPEG, PNG & GIF.";
        $uploadOk2    = 1;
    }else{
    	$uploadOk2    = 0;
    }

    // Caso tenha erro não envia imagem
    if ($uploadOk2 == 0) {
        $avisoImagem2 = "Desculpe, arquivo não enviado.";
    // se estiver tudo ok ele segue adiante
    } else {
        if (move_uploaded_file($_FILES["imagem2"]["tmp_name"], $diretorio.$novoNome2)) {

            $atualizarImagem=$pdo->prepare("UPDATE $tabelaBanco SET imagem2 = :imagem2 WHERE ID = :ID");
            $atualizarImagem->bindParam(':ID', $ID, PDO::PARAM_INT);
            $atualizarImagem->bindParam(':imagem2', $novoNome2, PDO::PARAM_STR);
            $atualizarImagem->execute();

            $campo_imagem2     = $novoNome2;

            $avisoImagem2 = "Imagem atualizada com sucesso!<br>Arquivo: [ ".$novoNome2. " ]";

            $resize = new ResizeImage($diretorio.$novoNome2);
            $resize->resizeTo(1080, 1080, 'maxWidth');
            $resize->saveImage($diretorio.$novoNome2);

            $thumbs = new ResizeImage($diretorio.$novoNome2);
            $thumbs->resizeTo(600, 600, 'maxWidth');
            $thumbs->saveImage($diretorio.'thumbs/'.$novoNome2);

            // criar a imagem do crop
            if($imageFileType == 'jpg' || $imageFileType == 'JPG' || $imageFileType == 'jpeg'){
            	$new = imagecreatefromjpeg($diretorio.'thumbs/'.$novoNome2);
            }
            if($imageFileType == 'png'){     
            	$new = imagecreatefrompng($diretorio.'thumbs/'.$novoNome2);        
            }
            if($imageFileType == 'gif'){
            	$new = imagecreatefromgif($diretorio.'thumbs/'.$novoNome2);
            } 

            $crop_width = imagesx($new);
            $crop_height = imagesy($new);
              
            $size = min($crop_width, $crop_height);


            if($crop_width >= $crop_height) {
            $newx= ($crop_width-$crop_height)/2;

            $im2 = imagecrop($new, ['x' => $newx, 'y' => 0, 'width' => $size, 'height' => $size]);
            }
            else {
              $newy= ($crop_height-$crop_width)/2;

              $im2 = imagecrop($new, ['x' => 0, 'y' => $newy, 'width' => $size, 'height' => $size]);
              }

            if($imageFileType == 'jpg' || $imageFileType == 'JPG' || $imageFileType == 'jpeg'){
            	imagejpeg($im2,$diretorio.'crop/'.$novoNome2,80);
            }
            if($imageFileType == 'png'){
            	imagepng($im2,$diretorio.'crop/'.$novoNome2);
            }
            if($imageFileType == 'gif'){
            	imagegif($im2,$diretorio.'crop/'.$novoNome2);
            }

        } else {
            $avisoImagem2 = "Desculpe, arquivo não enviado, tente novamente.";
        }
      }  
   }
?>