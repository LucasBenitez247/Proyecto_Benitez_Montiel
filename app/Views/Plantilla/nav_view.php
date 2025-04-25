<body>

<link href="http://localhost/Proyecto_2025/assets/css/mi_estilo_nav.css" rel="stylesheet" > 

<link href="assets/js/bootstrap.min.js" rel="stylesheet">

    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg mt-1">
        <div class="container-fluid">
           <a class="navbar-brand" href="#">
              <img src="http://localhost/Proyecto_2025/assets/img/logo_f1.PNG" alt="Bootstrap" width="40" height="28">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url('/'); ?>">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('nosotros'); ?>">Quienes somos</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('comercio'); ?>">Comercialización</a>
              </li>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Productos
                </a>
                <ul class="dropdown-menu">
                  </li>
                    <li><a class="dropdown-item" href="<?= base_url('productos'); ?>">Todos los Productos</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('productos/remeras'); ?>">Remeras</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('productos/gorras'); ?>">Gorras</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('productos/buzos'); ?>">Buzos</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('productos/autos'); ?>">Autitos Coleccionables</a></li>
                </ul>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('contacto'); ?>">Contacto</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('terminos_usos'); ?>">Terminos y usos</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
  <div>

