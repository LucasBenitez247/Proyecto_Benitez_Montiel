<link href="<?= base_url('assets/css/miestilo.css')?>"  rel="stylesheet" > 

<div id="carouselExampleAutoplaying" class="carousel slide mt-3" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('assets/img/ferrari.JPG') ?>" class="d-block w-100" alt="..." class="img-fluid">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/mercedes.JPG') ?>" class="d-block w-100" alt="..." class="img-fluid">
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/red_bull.JPG') ?>" class="d-block w-100" alt="..." class="img-fluid">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    </div>
  </div>
    
<div class="container py-5 my-5">
    <p class="text-center">
    Somos una empresa  de apasionados por la formula uno y queriamos llevar nuestra pasion a otro nivel, trayendo a nuestras tierras diferentes tipos de prendas para que vistas con la mejor onda y alientes a tu equipo con ropa de buena calidad y a la altura del evento.
    </p>
</div>

<div class="slider">
    <div class="slide-track">
      
        <?php for ($i = 0; $i < 2; $i++): ?>
            <div class="slide"><img src="<?= base_url('assets/img/alpine.png') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/aston_martin.svg') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/ferrari_logo.png') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/haas.jpg') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/mclaren.png') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/mercedes_logo.jpg') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/red_bull_logo.jpg') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/williams.png') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/stake.png') ?>" alt=""></div>
            <div class="slide"><img src="<?= base_url('assets/img/visa_cash_app_rb.png') ?>" alt=""></div>
            
        <?php endfor; ?>
    </div>
</div>

</div>

<div class="container py-5 my-5">
  <h2  class="titulo" >Novedades</h2>
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mb-3">
      <div class="card card h-100 custom-card">
        <img src="<?= base_url('assets/img/reme_ferrari.jpg') ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Remeras</h5>
          <p class="card-text">Color clásico rojo</p>
          <a href="#" class="btn">Comprar ahora</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card card h-100 custom-card">
        <img src="<?= base_url('assets/img/buzo_aston.jpg') ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Buzos</h5>
          <p class="card-text">Temporada 2025</p>
          <a href="#" class="btn">Comprar ahora</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card card h-100 custom-card">
        <img src="<?= base_url('assets/img/gorra_redbull.png') ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Gorras</h5>
          <p class="card-text">Edición 2025</p>
          <a href="#" class="btn">Comprar ahora</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
