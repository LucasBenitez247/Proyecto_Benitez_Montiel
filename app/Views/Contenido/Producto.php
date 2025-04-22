<link rel="stylesheet" href="<?= base_url('assets/css/mi_estilo_productos.css') ?>">
<h1>Producto</h1>
<div class="container my-5">
    <h1 class="mb-4"><?= esc($titulo) ?></h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      
      <?php if ($categoria === 'todos' || $categoria === 'remeras'): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= base_url('assets/img/reme_ferrari.jpg') ?>" class="card-img-top" alt="Remera Ferrari">
          <div class="card-body">
            <h5 class="card-title">Remera Ferrari</h5>
            <p class="card-text">Color clásico rojo</p>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100">
          <img src="<?= base_url('assets/img/reme_alpine.jpg') ?>" class="card-img-top" alt="Remera Alpine">
          <div class="card-body">
            <h5 class="card-title">Remera Alpine</h5>
            <p class="card-text">Remera 2025 Escudería Alpine</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if ($categoria === 'todos' || $categoria === 'gorras'): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= base_url('assets/img/gorra_redbull.png') ?>" class="card-img-top" alt="Gorra Red Bull">
          <div class="card-body">
            <h5 class="card-title">Gorra Red Bull</h5>
            <p class="card-text">Edición 2025</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if ($categoria === 'todos' || $categoria === 'buzos'): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= base_url('assets/img/buzo_aston.jpg') ?>" class="card-img-top" alt="Buzo Aston Martin">
          <div class="card-body">
            <h5 class="card-title">Buzo Aston Martin</h5>
            <p class="card-text">Temporada 2025</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>

