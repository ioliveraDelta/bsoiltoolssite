<?php

  $timeout = 600; // Tempo da sessao em segundos

  // Verifica se existe o parametro timeout
  if(isset($_SESSION['timeout'])) {
      // Calcula o tempo que ja se passou desde a cricao da sessao
      $duracao = time() - (int) $_SESSION['timeout'];

    	// Verifica se ja expirou o tempo da sessao
      if($duracao > $timeout) {
          // Destroi a sessao e cria uma nova
          session_destroy();
          session_start();
      }
  }

 ?>
