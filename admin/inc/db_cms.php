<?php
	// Protection
	header("X-XSS-Protection: 1; mode=block");
	header("Strict-Transport-Security: max-age=63072000; includeSubDomains; preload");
	header("X-Frame-Options: deny");
	header("X-Content-Type-Options: nosniff");
	header("Referrer-Policy: origin-when-cross-origin");
	header("Cache-Control: no-store");
	header("Permissions-Policy: microphone = (), camera = ()");
	header("Content-Security-Policy: default-src * 'self' data: 'unsafe-inline' 'unsafe-hashes' 'unsafe-eval'");

	ini_set('default_charset','UTF-8');
	// Conexão com o banco de dados
	include("../inc/conexao.php");
	$pdo=conectar();

	// INFORMAÇÕES SOBRE O SITE
	$site=$pdo->prepare("SELECT * FROM site LIMIT 1");
	$site->execute();
	$row_site = $site->fetchAll(PDO::FETCH_NUM);

	$site_titulo                    = strip_tags($row_site[0][1]);
	$site_descricao                 = strip_tags($row_site[0][2]);
	$site_rodape                    = $row_site[0][10];
	$site_chave                     = $row_site[0][11];

	$cms_version                    = "V. 5.0.1";

	// Notícias"../img/" : 
	$noticiasTopo=$pdo->prepare("SELECT * FROM noticias WHERE status = 1 ORDER BY data DESC LIMIT 5");
	$noticiasTopo->execute();
	$row_noticiasTopo = $noticiasTopo->fetchAll(PDO::FETCH_OBJ);
    
?>