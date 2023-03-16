<?php
//Cria uma URL amigavel
function translate_similar_chars($buffer) {
    $single_double = array(
        'Æ' => 'AE',
        'æ' => 'ae'
    );
    $buffer = strtr(
        $buffer,
        $single_double
    );
    $buffer = strtr(
        utf8_decode($buffer),
        utf8_decode('áàâäãåÁÀÂÄÃÅÞþßćčçĆČÇđĐÐéèêëÉÈÊËíìîïÍÌÎÏñÑóòôöõðøÓÒÔÖÕŕŔšŠ$úùûüÚÙÛÜýÿÝžŽØªº¹²³'),
        utf8_decode('aaaaaaAAAAAAbbBcccCCCdDDeeeeEEEEiiiiIIIInNoooooooOOOOOrRsSSuuuuUUUUyyYzZ0ao123')
    );
    $buffer = utf8_encode($buffer);
    return $buffer;
}
function generate_friendly_url($buffer) {
    $buffer = html_entity_decode($buffer);                       // Converte todas as entidades HTML para os seus caracteres
    $buffer = translate_similar_chars($buffer);                  // Converte caracteres que não estão no padrão para representações deles
    $buffer = strtolower($buffer);                               // Converte uma string para minúscula
    $buffer = preg_replace("/[\s]+/", " ", $buffer);             // Comprime múltiplas ocorrências de espaços
    $buffer = preg_replace("/[_]+/", "_", $buffer);              // Comprime múltiplas ocorrências de underscores
    $buffer = preg_replace("/[-]+/", "-", $buffer);              // Comprime múltiplas ocorrências de hífens
    $buffer = preg_replace("/[\/]+/", "-", $buffer);             // Comprime múltiplas ocorrências de barras
    $buffer = preg_replace("/[\\\]+/", "-", $buffer);            // Comprime múltiplas ocorrências de barras invertidas
    $buffer = preg_replace("/[[\s]+]?-[[\s]+]?/", "-", $buffer); // Remove espaços antes e após hífens
    $buffer = preg_replace("/[\s]/", "-", $buffer);              // Converte espaços em hífens
    $buffer = preg_replace("/[_]/", "-", $buffer);               // Converte underscores em hífens
    $buffer = preg_replace("/[\/]/", "-", $buffer);              // Converte barras em hífens
    $buffer = preg_replace("/[\\\]/", "-", $buffer);             // Converte barras invertidas em hífens
    $buffer = preg_replace("/[^a-z0-9_-]/", "", $buffer);        // Remove caracteres que não estejam no padrão

    return $buffer;
}

function imgExist($cod, $imagem, $folder){

  $crop = '../upload/'.$folder.'/thumbs/'.$folder.'-'.$cod.'.jpg';

    if (file_exists($crop)) {
      echo $crop;
    } else {
      echo '../upload/'.$folder.'/img-crop.png';
    }
}

//funçao para formatar a imagem
function imgCrop($cod, $imagem, $folder){

    $crop = '../upload/'.$folder.'/crop/'.$folder.'-'.$cod.'.jpg';

       if (file_exists($crop)) {
         echo $crop;
         } else {
         echo '../upload/'.$folder.'/'.$imagem;
       }

}

//funçao para formatar a imagem Sistema
function imgCropSistema($cod, $imagem, $folder){

    $arquivo = '../upload/'.$folder.$imagem;

    $crop = '../upload/'.$folder.'/crop/'.$folder.'-'.$cod.'.jpg';

       if (file_exists($crop)) { echo $crop; end;

       }elseif ($imagem != '') {
         echo $folder.'/'.$imagem; end;

       } else {
         echo '../upload/'.$folder.'/crop/img-crop.png'; end;
       }

}

//funçao para somar o intervalo de dias
function somarDias($dias){
  $date = date_create(date("Y-m-d"));
  date_add($date, date_interval_create_from_date_string($dias.' days'));
  return date_format($date, 'Y-m-d');
}

//funçao para formatar Data 2017-11-12
function formataData($data){
	return $data = substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
}

//funçao para desformatar Data 12-12-2017
function desformataData($data){
	return $data = substr($data,6,4)."/".substr($data,3,2)."/".substr($data,0,2);
}

//funçao para formatar Hora 00:00
function formataHora($data){
	return $data = substr($data,0,2).":".substr($data,3,2);
}

function imageResize($imageResourceId,$width,$height) {

    $targetWidth =200;
    $targetHeight =200;

    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);

    return $targetLayer;
}

function limpar_telefone($str){ 
  $str = preg_replace("/[^0-9]/", "", $str);
  return $str = "(".substr($str,0,2).") ".substr($str,2,5)."-".substr($str,7,4); 
}

?>
