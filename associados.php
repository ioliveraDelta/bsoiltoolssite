<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $paginaURL       = "./associados.php";
    $paginaTitulo    = $site_titulo." - Associados";
    $paginaImagem    = "tile.png";
    $paginaDescricao = "Estamos em contato com as principais iniciativas do setor. Conheça as instituições que se associaram e contribuem para o fortalecimento da nossa atividade. Caso tenha interesse em fazer parte desse grupo, associe-se.";

    include_once('./inc/head.php'); 

    ?>
    <!-- Title -->
    <title><?= $paginaTitulo ?></title>
    <meta name="description" content="<?= $paginaDescricao ?>" />

  </head>
  <body>

    <?php include_once('./inc/navbar.php') ?>

    <!-- CONTEUDO-->
    <section id="conteudo" class="py-8 py-md-5border-bottom">
      <div class="container">
        <div class="row">

          <div class="col-12 bs-text-justify" data-aos="fade-up" data-aos-delay="50">
            <h2>Associados</h2>
            <!-- Text -->
            <p class="mb-6 mb-md-0">
              Estamos em contato com as principais iniciativas do setor. Conheça as instituições que se associaram e contribuem para o fortalecimento da nossa atividade. Caso tenha interesse em fazer parte desse grupo, associe-se.
            </p>

            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">Associado</th>
                  <th scope="col">Endereço</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class="w-50" scope="row">AIR LIQUIDE BRASIL LTDA<br>CNPJ: 00331788002081</th>
                  <td>VIA MATOIM, S/N - DISTRITO INDUSTRIAL - CEP: 43813-000 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BASF S/A<br>CNPJ: 48539407007201</th>
                  <td>RUA BENZENO, 765 - POLO INDUSTRIAL - CEP: 42810-020 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BIRLA CARBON BRASIL LTDA.<br>CNPJ: 02634915000508</th>
                  <td>VIA FRONTAL, S/N - POLO INDUSTRIAL - CEP: 42810-320 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM S.A<br>CNPJ: 42150391003439</th>
                  <td>VIA MATOIM, S/N - POLO INDUSTRIAL - CEP: 43813-000 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM – Q1 BA<br>CNPJ: 42150391000170</th>
                  <td>RUA ETENO, 1561, COPEC - POLO INDUSTRIAL - CEP: 42810-000 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM S/A UNIDADE PE1<br>CNPJ: 42150391000847</th>
                  <td>RUA ETENO, 1582, POLO PETROQUIMICO - POLO INDUSTRIAL - CEP: 42810-000 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM S/A UNIDADE PE2<br>CNPJ: 42150391003005</th>
                  <td>RUA HIDROGÊNIO, 3520 - POLO INDUSTRIAL - CEP: 42810-280 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM S/A UNIDADE PE3<br>CNPJ: 42150391003277</th>
                  <td>RUA BENZENO, 2391 - POLO INDUSTRIAL - CEP: 42810-020 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">BRASKEM S/A UNIDADE PVC<br>CNPJ: 42150391001738</th>
                  <td>RUA HIDROGÊNIO, 3342, POLO PETROQUIMICO - POLO INDUSTRIAL
CEP: 42810-280 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">CARBONOR S.A.<br>CNPJ: 23644027000112</th>
                  <td>R JOAO URSULO, 640, PARTE - POLO INDUSTRIAL DE C - CEP: 42816-180 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">COMPANHIA BRASILEIRA DE ESTIRENO - CBE<br>CNPJ: 61079232001224</th>
                  <td>R HIDROGENIO, 824, PARTE A - POLO INDUSTRIAL - CEP: 42816-140 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">COPENOR COMPANHIA PETROQUIMICA DO NORDESTE S/A.<br>CNPJ: 16234627000147</th>
                  <td>RUA ETENO, 1042, COMPLEXO BASICO - POLO INDUSTRIAL - CEP: 42810-000 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">DETEN QUIMICA S.A.<br>CNPJ: 13546106000137</th>
                  <td>RUA HIDROGENIO, 1744 - POLO INDUSTRIAL - CEP: 42810-010 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">DOW BRASIL INDUSTRIA E COMERCIO DE PRODUTOS QUIMICOS LTDA<br>CNPJ: 60435351001714</th>
                  <td>VIA MATOIM, S/N, ROTULA 3 - POLO INDUSTRIAL - CEP: 43813-000 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">DOW BRASIL INDUSTRIA E COMERCIO DE PRODUTOS QUIMICOS LTDA<br>CNPJ: 60435351001986</th>
                  <td>FAZ CABOTO GUARA, S/N FAZENDA - ILHA DE MATARANDIBA - CEP: 44470-000 - VERA CRUZ - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">DOW BRASIL S.A. - TDI<br>CNPJ: 60435351002010</th>
                  <td>R HIDROGENIO, 3076, PARTE - POLO INDUSTRIAL - CEP: 42810-280 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">ELEKEIROZ S/A<br>CNPJ: 13788120000490</th>
                  <td>RUA JOAO URSULO, 1261, COPEC - POLO INDUSTRIAL - CEP: 42810-030 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">EMPRESA CARIOCA DE PRODUTOS QUIMICOS S/A<br>CNPJ: 33346586005835</th>
                  <td>RUA ETENO, 3189 - POLO INDUSTRIAL- CEP: 42810-000 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">FORTAL INDUSTRIA E COMERCIO S.A<br>CNPJ: 10904646000157</th>
                  <td>VIA DAS TORRES, S/N - CIA - CEP: 43813-100 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">GRAFTECH BRASIL PARTICIPACOES LTDA<br>CNPJ: 60479813000138</th>
                  <td>RODOVIA BA-522, S/N - DISTRITO INDUSTRIAL - CEP: 43813-300 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">IPC DO NORDESTE LTDA<br>CNPJ: 01627119000151</th>
                  <td>RUA HIDROGENIO, 785 - POLO INDUSTRIAL - CEP: 42810-000 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">ITF CHEMICAL LTDA<br>CNPJ: 03928294000104</th>
                  <td>RUA BETA, 574, AREA INDUSTRIAL - POLO INDUSTRIAL - CEP: 42810-300 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">MONSANTO DO BRASIL LTDA<br>CNPJ: 64858525013980</th>
                  <td>RUA ETENO, 5001 - POLO INDUSTRIAL - CEP: 42810-000 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">OLEOQUIMICA INDUSTRIA E COMERCIO DE PRODUTOS QUIMICOS LTDA<br>CNPJ: 07080388000127</th>
                  <td>RUA AMONIA, S/N - POLO INDUSTRIAL - CEP: 42810-340 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">OXITENO NORDESTE S A INDUSTRIA E COMERCIO<br>CNPJ: 14109664000106</th>
                  <td>RUA BENZENO, 1065 - POLO INDUSTRIAL - CEP: 42810-020 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">PROQUIGEL QUIMICA S/A<br>CNPJ: 27515154001225</th>
                  <td>VIA MATOIM, S/N, CONJUNTO INDUSTRIAL - DISTRITO INDUSTRIAL - CEP: 43813-000 - CANDEIAS - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">TRONOX PIGMENTOS DO BRASIL S.A<br>CNPJ: 15115504000124</th>
                  <td>ROD BA 099 ESTRADA DO COCO, 0 - AREMBEPE (ABRANTES) - CEP: 42829-710 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">UNIGEL PLASTICOS S/A<br>CNPJ: 02402478000173</th>
                  <td>RUA HIDROGÊNIO, 824 - POLO INDUSTRIAL - CEP: 42810-010 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">WHITE MARTINS GASES IND DO NORDESTE S/A<br>CNPJ: 24380578002980</th>
                  <td>RUA BENZENO, S/N - POLO INDUSTRIAL - CEP: 42810-000 - CAMACARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">WHITE MARTINS GASES INDUSTRIAIS DO NORDESTE LTDA.<br>CNPJ: 24380578004338</th>
                  <td>RUA JOÃO ÚRSULO, 700, PARTE - POLO INDUSTRIAL - CEP: 42810-390 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">WHITE MARTINS GASES INDUSTRIAIS DO NORDESTE LTDA.<br>CNPJ: 24380578000936</th>
                  <td>RUA ETENO, S/N - POLO INDUSTRIAL - CEP: 42810-000 - CAMAÇARI - BA</td>
                </tr>
                <tr>
                  <th class="w-50" scope="row">WHITE MARTINS GASES INDUSTRIAIS DO NORDESTE LTDA.<br>CNPJ: 24380578006705</th>
                  <td>RUA AMÔNIA, S/N, PARTE - POLO INDUSTRIAL - CEP: 42810-340 - CAMAÇARI - BA</td>
                </tr>
                
              </tbody>
            </table>
          </div>

        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>


    <!-- SHAPE -->
    <div class="position-relative mt-n1">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-dark">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
    </div>

    <!-- DEPOIMENTOS-->
    <?php include_once('./inc/faq.php'); ?>
    <!-- DEPOIMENTOS -->

    <!-- SHAPE -->
    <div class="position-relative">
      <div class="shape shape-bottom shape-fluid-x svg-shim text-gray-200">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>
      </div>
    </div>

    <!-- FOOTER -->
    <?php include_once('./inc/footer.php'); ?>
    <!-- // FOOTER -->

    <!-- Politica de Privacidade -->
    <?php include_once('./inc/privacidade.php'); ?>
    <!-- // Politica de Privacidade -->

    <!-- JAVASCRIPT -->
    <?php include_once('./inc/scripts.php'); ?>

  </body>
</html>