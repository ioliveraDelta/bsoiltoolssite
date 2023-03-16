<!-- Form -->
<form class="rounded shadow mb-4" action="<?= $tabela ?>.php" method="POST">
  
  <div class="input-group input-group-lg">

    <!-- Text -->
    <span class="input-group-text border-0 pe-1">
      <i class="fe fe-search"></i>
    </span>

    <!-- Input -->
    <input class="form-control border-0 px-1" id="busca" name="busca" type="text" aria-label="Busca no Admin..." placeholder="Busca...">

    <!-- Text -->
    <span class="input-group-text border-0 py-0 ps-1 pe-3">
      <button type="submit" class="btn btn-sm btn-primary">
        <i class="fe fe-search"></i>
      </button>
    </span>

  </div>
</form>