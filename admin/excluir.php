<?php
	require_once('inc/session_start.php');
	require_once('inc/db_cms.php');
	require_once('inc/log.php'); 

	if(isset($_GET['t']) && isset($_GET['id'])){

		$tabela   = $_GET['t'];
		$id       = $_GET['id'];

		echo $tabela;

	    $apagar=$pdo->prepare("SELECT ID, imagem FROM {$tabela}  WHERE ID = :id LIMIT 1");
	    $apagar->bindParam(':id', $id);
		$apagar->execute();
		$row_apagar = $apagar->fetchAll(PDO::FETCH_NUM);

		$diretorio    = "../upload/".$tabela."/"; // define o diretorio do arquivo
		$imagemApagar = $row_apagar[0][1];

		if(!empty ($imagemApagar)){
			unlink($diretorio.$imagemApagar);
	    	unlink($diretorio."thumbs/".$imagemApagar);
	    	unlink($diretorio."crop/".$imagemApagar);
		}

		$sistema=$pdo->prepare("DELETE FROM {$tabela} WHERE ID = :id");
		$sistema->bindParam(':id', $id);
	    $sistema->execute(); 

	    if(isset($_GET['galeria'])){
	    	header("Location:galeria-form.php?id=".$_GET['galeria']);
	    }else{
	    	header("Location:{$tabela}.php");
	    }
	}
?>
