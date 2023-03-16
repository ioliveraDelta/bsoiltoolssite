<!-- BT -> Status -->
<div class="badge badge-rounded-circle bg-success-soft ms-4">
    <i class="fas <?= ($sistema->status == 1) ? 'fa-check text-sucess' : 'fa-times text-danger' ?>" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="status" aria-label="status"></i>
</div>

<!-- BT -> Editar -->
<div class="badge badge-rounded-circle bg-success-soft ms-4">
  <a href="<?= $tabela ?>-form.php?id=<?= $sistema->ID ?>">
    <i class="fas fa-pen" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="editar" aria-label="editar"></i>
  </a>
</div>

<!-- BT -> Apagar -->
<div class="badge badge-rounded-circle bg-success-soft ms-4">
  <a class="text-reset" href="#!" data-bs-toggle="modal" data-bs-target="#modalApagar<?= $sistema->ID ?>">
    <i class="fas fa-eraser text-danger" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="excluir" aria-label="excluir"></i>
  </a>
</div>