<p class="text-muted" style="font-size: .8rem">
  <i class="fas fa-angle-right"></i> Imagem | 
  <?= $tamImagem ?>
  <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Tamanho sugerido para melhor ajuste da imagem no layout do site."></i>
</p>
<img id="img-preview" src="<?= $imagemAtual ?>" class="img-fluid border rounded mb-3 bg-light" alt="">

<form method="post" id="uploadImagem" action="#" enctype="multipart/form-data">

<input type="hidden" name="idUpload" id="idUpload" value="<?= $campo_id; ?>" />

<div class="row">

  <div class="col-md-12">
    <div class="form-group border p-3 rounded text-muted bg-light">
      <label for="imagem"><i class="fas fa-plus mr-3"></i> Clique aqui para inserir a imagem</label>
      <input type="file"  id="imagem" name="imagem" class="show-for-sr" accept="image/*" required >
    </div>
  </div>

  <div class="col-md-12 <?php if($btStatus == 'INCLUIR') echo 'd-none';  ?>">
    <div class="form-group">
      <label class="text-muted" for="legenda"><i class="fas fa-angle-right"></i> Legenda <i class="fas fa-question-circle" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="A legenda ajuda as pessoas com deficiência visual entender o que a imagem representa" aria-label="visualizar"></i> </label>
      <input type="text" name="legenda" id="legenda" value="<?= $campo_legenda ?>" class="form-control form-control-flush small" placeholder="Informe a legenda!"/>
    </div>
    <div>
      <button type="submit" class="btn btn-primary-soft btn-xs mb-3" <?php if($btStatus == 'INCLUIR') echo 'disabled';  ?>>Enviar Imagem</button>
    </div>
  </div>

</div>

<div class="alert alert-danger alert-dismissible fade show <?php if($btStatus != 'INCLUIR') echo 'd-none';  ?>" role="alert">
  <span style="font-size: .8rem; line-height: 1rem">ATENÇÃO - Para publicar uma imagem primeiro salve o conteúdo.</span>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

</form>

<?php if($avisoImagem != ""){ ?>

<div class="alert alert-success" role="alert">
  <p style="font-size: .8rem"><?= $avisoImagem; ?></p>
</div>

<?php } ?>