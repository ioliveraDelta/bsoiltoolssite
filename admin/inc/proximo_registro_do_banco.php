<?php

	// PEGA O PROXIMO REGISTRO DO BANCO DE DADOS
	try {
	  $sql = "SHOW TABLE STATUS LIKE '{$tabelaBanco}' ";  
	  $stmt = $pdo->prepare($sql);
	  $stmt->execute();
	  $resultado = $stmt->fetch();
	  $proximoID = $resultado['Auto_increment'];  // a chave esta aqui
	} catch (Exception $ex) {
	echo $ex->getMessage();
	}
	// PEGA O PROXIMO REGISTRO DO BANCO DE DADOS

?>