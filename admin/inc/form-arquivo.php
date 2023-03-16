<form method="post" id="uploadArquivo" action="#" enctype="multipart/form-data">

  <input type="hidden" name="idArquivo" id="idArquivo" value="<?= $campo_id; ?>" />

  <div class="row">

    <div class="col-md-12 mb-3">
      <div class="form-group border p-3 rounded text-muted bg-light">
        <label for="arquivo"><i class="fas fa-plus mr-3"></i> Clique aqui para inserir o arquivo em PDF - DOC - XLS</label>
        <input type="file"  id="arquivo" name="arquivo" class="show-for-sr" accept="" required>
      </div>
    </div>

  </div>

  <?php if($btStatus != 'INCLUIR'){ ?>

  <button type="submit" class="btn btn-primary-soft btn-xs mb-3" <?php if($btStatus == 'INCLUIR') echo 'disabled';  ?>>Atualizar Arquivo</button>

  <?php } ?>

  <?php if($btStatus == 'INCLUIR'){ ?>

  <div class="alert alert-danger alert-dismissible fade show <?php if($btStatus != 'INCLUIR') echo 'd-none';  ?>" role="alert">
    <span style="font-size: .8rem; line-height: 1rem">ATENÇÃO - Para publicar a arquivo primeiro salve o conteúdo.</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php } ?>
  
</form>

<?php if($btStatus != 'INCLUIR'){ ?>

<p class="small text-muted"><i class="fas fa-file-pdf"></i> <?= ($avisoArquivo == '') ? $campo_arquivo : $avisoArquivo; ?></p>

<p>
  <a href="../upload/<?=  $tabelaBanco ?>/<?= $campo_arquivo ?>" class="btn btn-sm btn-rounded-circle btn-primary" target="_blanck">
    <span class="fe fe-file" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="visualizar" aria-label="visualizar"></span> 
  </a>
</p>

<?php } ?>