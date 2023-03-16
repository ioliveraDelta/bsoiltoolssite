<?php
  session_start();
  if($_SESSION['usuarioNivel'] != 1){
    header("Location:index.php?erro=2");
    die();
  }
?>