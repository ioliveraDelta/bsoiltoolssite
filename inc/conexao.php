<?php
header('Content-type: text/html; charset=utf-8');
setlocale(LC_ALL, 'pt_BR.utf-8');

function conectar(){

  $caminhoServidor = $_SERVER['HTTP_HOST'];

  if ($caminhoServidor == "bsoiltools.local") {

    // AMBIENTE DE DESENVOLVIMENTO
    $hostname_pinet = "bsoiltools.local";
    $database_pinet = "bs2022";
    $username_pinet = "root";
    $password_pinet = "root";

  }else{

    // AMBIENTE DE HOSPEDAGEM
    $hostname_pinet = "localhost";
    $database_pinet = "pinetay4_bs2022";
    $username_pinet = "pinetay4_neto";
    $password_pinet = "M@lu2011";

  }

  try {
    $pdo = new PDO("mysql:host={$hostname_pinet};dbname={$database_pinet}","{$username_pinet}","{$password_pinet}");
    $pdo->exec('SET CHARACTER SET utf8');//Define o charset como UTF-8
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
  }
  return $pdo;
}
error_reporting(E_ALL);
ini_set('display_errors',1); // visualizar erros do php

?>
