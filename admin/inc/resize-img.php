<?php
/**
 * Resize image class will allow you to resize an image
 *
 * Can resize to exact size
 * Max width size while keep aspect ratio
 * Max height size while keep aspect ratio
 * Automatic while keep aspect ratio
 */
class ResizeImage
{
	private $ext;
	private $image;
	private $newImage;
	private $origWidth;
	private $origHeight;
	private $resizeWidth;
	private $resizeHeight;

	/**
	 * Class constructor requires to send through the image filename
	 *
	 * @param string $filename - Filename of the image you want to resize
	 */
	public function __construct( $filename )
	{
		if(file_exists($filename))
		{
			$this->setImage( $filename );
		} else {
			throw new Exception('Image ' . $filename . ' can not be found, try another image.');
		}
	}

	/**
	 * Set the image variable by using image create
	 *
	 * @param string $filename - The image filename
	 */
	private function setImage( $filename )
	{
		$size = getimagesize($filename);
		$this->ext = $size['mime'];

		switch($this->ext)
	    {
	    	// Image is a JPG
	        case 'image/jpg':
	        case 'image/jpeg':
	        	// create a jpeg extension
	            $this->image = imagecreatefromjpeg($filename);
	            break;

	        // Image is a GIF
	        case 'image/gif':
	            $this->image = @imagecreatefromgif($filename);
	            break;

	        // Image is a PNG
	        case 'image/png':
	            $this->image = @imagecreatefrompng($filename);
	            break;

	        // Mime type not found
	        default:
	            throw new Exception("Arquivo não reconhecido como imagem, escolha outro tipo de arquivo.", 1);
	    }

	    $this->origWidth = imagesx($this->image);
	    $this->origHeight = imagesy($this->image);
	}

	/**
	 * Save the image as the image type the original image was
	 *
	 * @param  String[type] $savePath     - The path to store the new image
	 * @param  string $imageQuality 	  - The qulaity level of image to create
	 *
	 * @return Saves the image
	 */
	public function saveImage($savePath, $imageQuality="90", $download = false)
	{
	    switch($this->ext)
	    {
	        case 'image/jpg':
	        case 'image/JPG':
	        case 'image/jpeg':
	        case 'image/JPEG':
	        	// Check PHP supports this file type
	            if (imagetypes() & IMG_JPG) {
	                imagejpeg($this->newImage, $savePath, $imageQuality);
	            }
	            break;

	        case 'image/gif':
	        	// Check PHP supports this file type
	            if (imagetypes() & IMG_GIF) {
	                imagegif($this->newImage, $savePath);
	            }
	            break;

	        case 'image/png':
	            $invertScaleQuality = 9 - round(($imageQuality/100) * 9);

	            // Check PHP supports this file type
	            if (imagetypes() & IMG_PNG) {
	                imagepng($this->newImage, $savePath, $invertScaleQuality);
	            }
	            break;
	    }

	    if($download)
	    {
	    	header('Content-Description: File Transfer');
			header("Content-type: application/octet-stream");
			header("Content-disposition: attachment; filename= ".$savePath."");
			readfile($savePath);
	    }

	    imagedestroy($this->newImage);
	}

	/**
	 * Resize the image to these set dimensions
	 *
	 * @param  int $width        	- Max width of the image
	 * @param  int $height       	- Max height of the image
	 * @param  string $resizeOption - Scale option for the image
	 *
	 * @return Save new image
	 */
	public function resizeTo( $width, $height, $resizeOption = 'default' )
	{
		switch(strtolower($resizeOption))
		{
			case 'exact':
				$this->resizeWidth = $width;
				$this->resizeHeight = $height;
			break;

			case 'maxwidth':
				$this->resizeWidth  = $width;
				$this->resizeHeight = $this->resizeHeightByWidth($width);
			break;

			case 'maxheight':
				$this->resizeWidth  = $this->resizeWidthByHeight($height);
				$this->resizeHeight = $height;
			break;

			default:
				if($this->origWidth > $width || $this->origHeight > $height)
				{
					if ( $this->origWidth > $this->origHeight ) {
				    	 $this->resizeHeight = $this->resizeHeightByWidth($width);
			  			 $this->resizeWidth  = $width;
					} else if( $this->origWidth < $this->origHeight ) {
						$this->resizeWidth  = $this->resizeWidthByHeight($height);
						$this->resizeHeight = $height;
					}  else {
						$this->resizeWidth = $width;
						$this->resizeHeight = $height;
					}
				} else {
		            $this->resizeWidth = $width;
		            $this->resizeHeight = $height;
		        }
			break;
		}

		$this->newImage = imagecreatetruecolor($this->resizeWidth, $this->resizeHeight);
    	imagecopyresampled($this->newImage, $this->image, 0, 0, 0, 0, $this->resizeWidth, $this->resizeHeight, $this->origWidth, $this->origHeight);
	}

	/**
	 * Get the resized height from the width keeping the aspect ratio
	 *
	 * @param  int $width - Max image width
	 *
	 * @return Height keeping aspect ratio
	 */
	private function resizeHeightByWidth($width)
	{
		return floor(($this->origHeight/$this->origWidth)*$width);
	}

	/**
	 * Get the resized width from the height keeping the aspect ratio
	 *
	 * @param  int $height - Max image height
	 *
	 * @return Width keeping aspect ratio
	 */
	private function resizeWidthByHeight($height)
	{
		return floor(($this->origWidth/$this->origHeight)*$height);
	}
}

// UPLOAD DA IMAGEM 
  if(isset($_POST['idUpload'])){

    $ID                  = intval($_POST['idUpload']);
    $info_imagem         = basename( $_FILES["imagem"]["name"]);
    $info_legenda        = $_POST['legenda'];

    $diretorio           = "../upload/".$tabelaBanco."/"; // define o diretorio do arquivo
    $caminho             = $diretorio . $info_imagem;
    $uploadOk            = 1;
    $imageFileType       = strtolower(pathinfo($caminho,PATHINFO_EXTENSION));
    $novoNome            = $tabelaBanco."-".rand(1000000, 9999999).".".$imageFileType;

    // Apaga a imagem antiga do servidor
    if(!empty($sistema['imagem'])){
    	$imagemApagar = $sistema['imagem'];
    }else{
    	$imagemApagar = "";
    }

    if($imagemApagar != ''){
    	unlink($diretorio.$imagemApagar);
    	unlink($diretorio."thumbs/".$imagemApagar);
    	unlink($diretorio."crop/".$imagemApagar);
    }

    $imgFormatos = ['jpg', 'JPG', 'jpeg', 'gif', 'png'];

    // Define o formato da imagem
    if(in_array($imageFileType, $imgFormatos)) {
        $avisoImagem = "Desculpe, somente arquivos JPG, JPEG, PNG & GIF.";
        $uploadOk    = 1;
    }else{
    	$uploadOk    = 0;
    }

    // Caso tenha erro não envia imagem
    if ($uploadOk == 0) {
        $avisoImagem = "Desculpe, arquivo não enviado.";
    // se estiver tudo ok ele segue adiante
    } else {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio.$novoNome)) {

            $atualizarImagem=$pdo->prepare("UPDATE $tabelaBanco SET imagem = :imagem, legenda = :legenda WHERE ID = :ID");
            $atualizarImagem->bindParam(':ID', $ID, PDO::PARAM_INT);
            $atualizarImagem->bindParam(':imagem', $novoNome, PDO::PARAM_STR);
            $atualizarImagem->bindParam(':legenda', $info_legenda, PDO::PARAM_STR);
            $atualizarImagem->execute();

            $campo_imagem     = $novoNome;
            $campo_legenda    = $info_legenda;

            $avisoImagem = "Imagem atualizada com sucesso!<br>Arquivo: [ ".$novoNome. " ]";

            $resize = new ResizeImage($diretorio.$novoNome);
            $resize->resizeTo(1080, 1080, 'maxWidth');
            $resize->saveImage($diretorio.$novoNome);

            $thumbs = new ResizeImage($diretorio.$novoNome);
            $thumbs->resizeTo(600, 600, 'maxWidth');
            $thumbs->saveImage($diretorio.'thumbs/'.$novoNome);

            // criar a imagem do crop
            if($imageFileType == 'jpg' || $imageFileType == 'JPG' || $imageFileType == 'jpeg'){
            	$new = imagecreatefromjpeg($diretorio.'thumbs/'.$novoNome);
            }
            if($imageFileType == 'png'){
            	$new = imagecreatefrompng($diretorio.'thumbs/'.$novoNome);
            }
            if($imageFileType == 'gif'){
            	$new = imagecreatefromgif($diretorio.'thumbs/'.$novoNome);
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
            	imagejpeg($im2,$diretorio.'crop/'.$novoNome,80);
            }
            if($imageFileType == 'png'){
            	imagepng($im2,$diretorio.'crop/'.$novoNome);
            }
            if($imageFileType == 'gif'){
            	imagegif($im2,$diretorio.'crop/'.$novoNome);
            }

        } else {
            $avisoImagem = "Desculpe, arquivo não enviado, tente novamente.";
        }
      }  
   }
?>