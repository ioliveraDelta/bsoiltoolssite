
<section class="p-0 py-md-5 bg-light shadow">

  <div class="container">
    
    <div class="row">

      <?php foreach ($prodCat as $prodCod => $prodTitulo) { if($prodCod != 0){ ?>

        <div class="col-6 col-md-2 p-3" data-aos="fade-up">

          <img class="img-fluid rounded" src="./img/prod-<?= $prodCod ?>.png?v=1" alt="<?= $prodTitulo ?> ">

          <a href="./produtos.php?tipo=<?= $prodCod ?>" class="d-block rounded shadow p-3 text-uppercase text-primary mb-0 h6" style="height: 100px;">  
            <?= $prodTitulo ?>       
          </a>

        </div>

      <?php }} ?>

    </div> <!-- / .row -->

  </div> <!-- / .container -->

</section>