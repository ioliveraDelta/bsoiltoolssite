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
include("inc/conexao.php");
$pdo=conectar();

include("admin/inc/arrays.php");

include("admin/inc/funcoes.php");

// INFORMAÇÕES SOBRE O SITE
$site=$pdo->prepare("SELECT * FROM site LIMIT 1");
$site->execute();
$row_site = $site->fetchAll(PDO::FETCH_NUM);

$URL_ATUAL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlAtual  = explode('/', $URL_ATUAL);
if(isset($urlAtual[5])){
	$menuScroll = $urlAtual[5];
}

$url_local = "bsoiltools.local";
$url_host  = "bsoiltools.com.br";

// MUDAR CAMINHO AO PUBLICAR O SITE
$siteServidor = $_SERVER['HTTP_HOST'];
if ($siteServidor == $url_local) {
	$site_url = "https://".$url_local;
}else{
    $site_url = "https://".$url_host;
}

$site_titulo                    = strip_tags($row_site[0][1]);
$site_descricao                 = strip_tags($row_site[0][2]);
$site_endereco                  = $row_site[0][3];
$site_telefone                  = $row_site[0][4];
$site_email                     = $row_site[0][5];
$site_whatsapp                  = $row_site[0][6];
$site_twitter                   = $row_site[0][7];
$site_facebook                  = $row_site[0][8];
$site_instagram                 = $row_site[0][9];
$site_rodape                    = $row_site[0][10];
$site_foto                      = "favicon.png";
$site_chave                     = $row_site[0][11];
$site_analytics                 = $row_site[0][12];

$site_celular                   = "71 90000-0000";
$site_maps                      = "https://www.google.com/maps/place/B%26S+Oil+Tools+Equip+Ind+Ltda/@-12.9066626,-38.4563508,17z/data=!3m1!4b1!4m5!3m4!1s0x716105b395ef4bd:0x69930216a6dc905b!8m2!3d-12.9067353!4d-38.4541906";

// Exibe todos os erros PHP (see changelog)
// error_reporting(E_ALL);

// FULLBANNER
$fullbanner=$pdo->prepare("SELECT * FROM fullBanner WHERE publicar <= CURDATE() AND status = 1 ORDER BY publicar DESC LIMIT 3 ");
$fullbanner->execute();
$row_fullbanner = $fullbanner->fetchAll(PDO::FETCH_NUM);

$fullbanner_id_0                 = strip_tags($row_fullbanner[0][0]);
$fullbanner_titulo_0             = strip_tags($row_fullbanner[0][1]);
$fullbanner_subtitulo_0          = strip_tags($row_fullbanner[0][2]);
$fullbanner_resumo_0             = strip_tags($row_fullbanner[0][3]);
$fullbanner_link_0               = strip_tags($row_fullbanner[0][10]);
$fullbanner_imagem_0             = strip_tags($row_fullbanner[0][12]);

$fullbanner_id_1                 = strip_tags($row_fullbanner[1][0]);
$fullbanner_titulo_1             = strip_tags($row_fullbanner[1][1]);
$fullbanner_subtitulo_1          = strip_tags($row_fullbanner[1][2]);
$fullbanner_resumo_1             = strip_tags($row_fullbanner[1][3]);
$fullbanner_link_1               = strip_tags($row_fullbanner[1][10]);
$fullbanner_imagem_1             = strip_tags($row_fullbanner[1][12]);

$fullbanner_id_2                 = strip_tags($row_fullbanner[2][0]);
$fullbanner_titulo_2             = strip_tags($row_fullbanner[2][1]);
$fullbanner_subtitulo_2          = strip_tags($row_fullbanner[2][2]);
$fullbanner_resumo_2             = strip_tags($row_fullbanner[2][3]);
$fullbanner_link_2               = strip_tags($row_fullbanner[2][10]);
$fullbanner_imagem_2             = strip_tags($row_fullbanner[2][12]);


// NOTÍCIAS
$noticias_home=$pdo->prepare("SELECT * FROM noticias WHERE tipo = 1 ORDER BY publicar DESC LIMIT 3 ");
$noticias_home->execute();
$row_noticias_home = $noticias_home->fetchAll(PDO::FETCH_NUM);

if(isset($row_noticias_home[0][0])){
	$noticias_home_id_0          = strip_tags($row_noticias_home[0][0]);
	$noticias_home_titulo_0      = strip_tags($row_noticias_home[0][1]);
	$noticias_home_resumo_0      = strip_tags($row_noticias_home[0][3]);
	$noticias_home_publicar_0    = strip_tags($row_noticias_home[0][5]);
	$noticias_home_tipo_0        = strip_tags($row_noticias_home[0][8]);
	$noticias_home_imagem_0      = strip_tags($row_noticias_home[0][9]);
	$noticias_home_url_0         = strip_tags($row_noticias_home[0][13]);
	$noticias_home_data_0        = strip_tags($row_noticias_home[0][14]);
}

// TEXTOS
if(isset($_GET['t'])){

	$textos=$pdo->prepare("SELECT * FROM textos WHERE url = :valor  AND status = 1");
	$textos->bindParam(':valor', $_GET['t'], PDO::PARAM_STR);
	$textos->execute();
	$row_textos = $textos->fetchAll(PDO::FETCH_NUM);
	$textos_id                             = strip_tags($row_textos[0][0]);
	$textos_titulo                         = strip_tags($row_textos[0][1]);
	$textos_resumo                         = strip_tags($row_textos[0][2]);
	$textos_texto                          = $row_textos[0][3];
	$textos_imagem                         = strip_tags($row_textos[0][5]);
	$textos_legenda                        = strip_tags($row_textos[0][6]);
	$textos_galeria                        = strip_tags($row_textos[0][7]);
	$textos_url                            = strip_tags($row_textos[0][9]);

	$textos_texto = str_replace('../upload/', './upload/', $textos_texto); 

}


?>
