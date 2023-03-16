<?php

if(isset($_POST['galeriaID'])){

    // File upload configuration
    $targetDir = "../upload/galeria_fotos/"; // define o diretorio do arquivo
    $allowTypes = array('jpg','png','jpeg','gif');
    
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName       = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $galeriaID = intval($_POST['galeriaID']);
                    $insertValuesSQL .= "('".$galeriaID."', '".$fileName."', NOW()),";

                    $resize = new ResizeImage($targetDir.$fileName);
		            $resize->resizeTo(1200, 1200, 'maxWidth');
		            $resize->saveImage($targetDir.$fileName);

		            $thumbs = new ResizeImage($targetDir.$fileName);
		            $thumbs->resizeTo(600, 600, 'maxWidth');
		            $thumbs->saveImage($targetDir.'thumbs/'.$fileName);		            

                    // criar a imagem do crop
                    if($fileType == 'jpg' || $fileType == 'JPG' || $fileType == 'jpeg'){
                        $new = imagecreatefromjpeg($targetDir.'thumbs/'.$fileName);
                    }
                    if($fileType == 'png'){
                        $new = imagecreatefrompng($targetDir.'thumbs/'.$fileName);
                    }
                    if($fileType == 'gif'){
                        $new = imagecreatefromgif($targetDir.'thumbs/'.$fileName);
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
		     
		            imagejpeg($im2,$targetDir.'crop/'.$fileName,60);

                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
        
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = $pdo->query("INSERT INTO galeria_fotos (IDgaleria, imagem, data) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Arquivos enviados com sucesso.".$errorMsg;

            }else{
                $statusMsg = "Descupe, erro ao enviar os arquivos.";
            }
        }
    }else{
        $statusMsg = 'Selecione os arquivos que deseja enviar.';
    }
    
    // Display status message
    echo $statusMsg;
}

?>