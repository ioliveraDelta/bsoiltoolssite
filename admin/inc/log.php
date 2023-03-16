<?php

  $tokenUsuario = md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

  if(isset($_SESSION['usuarioToken'])){

    if($_SESSION['usuarioToken'] != $tokenUsuario){
      header("Location:index.php?erro=tokenErro");
    }

  }else{
    header("Location:index.php?erro=1");
  }

  if(isset($_GET['sair'])){

    $registroID         = $_SESSION['usuarioID'];
    $registroIP         = gethostbyname($_SERVER['REMOTE_ADDR']);
    $registroPagina     = $_SERVER['REQUEST_URI'];
    $registroHora       = date("H:i:s");
    $registroData       = date("Y-m-d");

    $registros=$pdo->prepare("UPDATE usuarios SET usuariosUltimoAcesso = '{$registroData}',
                                                  usuariosIP = '{$registroIP}',
                                                  usuariosPagina = '{$registroPagina}'
                                                  WHERE ID = '{$registroID}'");
    $registros->execute(); 

    unset($_SESSION['usuarioNivel']);
    unset($_SESSION['usuarioNome']);
    unset($_SESSION['usuarioEmail']);
    unset($_SESSION['usuarioTel']);
    unset($_SESSION['usuarioUltimoAcesso']);
    unset($_SESSION['usuarioToken']);

    header("Location:index.php");

  }
?>