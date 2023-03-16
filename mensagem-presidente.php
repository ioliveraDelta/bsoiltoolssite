<!doctype html>
<html lang="pt-br">
  <head>
    <?php

    include_once('./inc/db_site.php'); 

    $paginaURL       = "./mensagem-presidente.php";
    $paginaTitulo    = $site_titulo." - Mensagem do Presidente";
    $paginaImagem    = "tile.png";
    $paginaDescricao = $site_descricao;

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
            <h2>
              Mensagem do Presidente
            </h2>
            <!-- Text -->
            <p>
              A Diretoria do SINPEQ, no que pese as incertezas decorrentes da pandemia da COVID-19 no Brasil e no mundo, permanece otimista com olhar atento ao crescimento da demanda e reflexos nos preços no mundo como um todo, inclusive nos países mais desenvolvidos, com os efeitos da inflação nas estruturas de custo das empresas associadas.
            </p>

            <p>
              A gestão do SINPEQ tem desenvolvido um trabalho voltado para a sustentabilidade do Sindicato e dos interesses das associadas com o apoio da FIEB em ações muito importantes no campo institucional, dentre as quais merecem registro:
            </p>
            
            <p>
              <b>1 - Acordo de Cooperação com a Federação das Indústrias do Estado da Bahia – FIEB</b>
              A manutenção e incremento de ações ancoradas no Acordo de Cooperação firmado com a FIEB, como sequência de uma relação que já vem de longa data, “visando à execução de ações para aumentar a competitividade das Indústrias filiadas ao SINPEQ”, conforme definido no objeto do citado Acordo.
              <br><br>

              A importância deste Acordo está no fato do reconhecimento dos trabalhos realizados pela FIEB, Confederação Nacional da Indústria – CNI, e pelo Sistema “S”, para as associadas do SINPEQ, e a necessidade de se dar continuidade a este trabalho.
            </p>

            <p>
              <b>2 – Esforço Conjunto com a ABIQUIM</b>
              <br>
              Há uma multiplicidade de temas conduzidos em conjunto com a ABIQUIM, de longa data, com muito sucesso. Contudo, dentre uma série de temas, merecem destaque:
              <br><br>
              Aprovação da Nova Lei do Gás Natural – O trabalho da Frente Parlamentar da Indústria Química, junto à Câmara Federal, foi um fator decisivo para sua aprovação, com o reconhecimento de que foi um grande passo dado no caminho da competitividade da Indústria Nacional.
              <br><br>
              Extensão do prazo do Regime Especial da Indústria Química – REIQ – foi outro trabalho realizado junto aos mais altos escalões do Governo, através da Frente Parlamentar da Indústria Química, que merece registro neste trabalho conjunto com a ABIQUIM, que neste caso contou também com o suporte da FIEB.
            </p>

            <p>
              <b>3 – Relação com o Sindicato Laboral</b>
              <br>
              Uma relação de décadas respaldada no mútuo respeito, o SINPEQ contou com o apoio irrestrito do SINDIQUÍMICA no trabalho realizado junto à ABIQUIM, no caso do REIQ citado acima, reconhecendo o SINDIQUÍMICA a importância de preservar o segmento da Indústria Química e Petroquímica nacional frente à dura competição internacional, que além de contar com tecnologias e escalas, conta também com matérias primas e insumos mais baratos e apoio de governos, inclusive fiscais.
            </p>

            <p>
              <b>4 - Ações na Defesa do Interesse de Associadas, diretamente e através do COFIC: </b>
              <br>
              ICMS – Transferências Interestaduais – Não Incidência – STF – ADC 49;
              <br>
              Eficácia dos EPI´s para Neutralização de Agentes Nocivos à Saúde dos Trabalhadores – REsp 1.828.606 – STJ;
              <br>
              Continuidade da operação de carga e descarga de matéria-prima no Porto de Aratu;
              <br> 
              Alteração da Lei Estadual do gás;
              <br> 
              Extensão do Prazo do REIQ;
              <br>
              Ação de não incidência de Contribuição Previdenciária sobre HRA - STJ;
              <br> 
              Troca de Turno, em ação conjunta com o sindicato laboral;
              <br> 
              Crise Hídrica;
              <br> 
              Prorrogação do prazo de vigência da não incidência do Adicional ao Frete para “Renovação da Marinha Mercante (AFRMM)” nas navegações de cabotagem, interior fluvial e lacustre;
              <br>
              Obrigação da indústria de contratar Bombeiro Civil;
              <br>
              No que pese os desafios, a Diretoria reitera sua confiança no sucesso de seu trabalho e sabe que pode contar com o apoio de suas associadas para superá-los, ao tempo que registra a importância da relação com o poder público, em especial com o Governo do Estado, mesmo que em alguns momentos o SINPEQ tenha que se posicionar na defesa dos interesses das associadas. De qualquer forma, o SINPEQ tem se colocado ao lado do Governo do Estado na defesa dos interesses da região, em diversas oportunidades, inclusive nas instâncias superiores da justiça do país, e tem se colocado à disposição para somar esforços no que estiver ao seu alcance. Finalizando, o SINPEQ agradece o apoio de todas as associadas, Membros da Diretoria, Representantes junto ao Conselho da FIEB, aos Membros do Conselho Fiscal, e ao Comitê de Fomento Industrial de Camaçari - COFIC como seu braço técnico-operacional, o suporte à gestão para vencer os grandes desafios na defesa do interesse de suas associadas.
              <br><br>
              Camaçari, 31 de julho de 2021 
              <br>Roberto Fiamenghi Presidente
            </p>

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
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor"/></svg>      </div>
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