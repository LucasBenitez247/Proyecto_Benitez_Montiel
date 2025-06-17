<body>

<link href="http://localhost/Proyecto_Benitez_Montiel/assets/css/mi_estilo_nav.css" rel="stylesheet" > 
 <div class="container-fluid">
      <nav class="navbar navbar-expand-lg mt-1">
        <div class="container-fluid">
           <a class="navbar-brand" href="#">
              <img src="http://localhost/Proyecto_Benitez_Montiel/assets/img/logo_f1.PNG" alt="Bootstrap" width="40" height="28">
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('ver_consultas'); ?>">Ver Consultas</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('listar'); ?>">Listar productos</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('listar_ventas'); ?>">Listar Ventas</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('registro_producto'); ?>">Registrar Productos</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('gestionar'); ?>">Gestionar Productos</a>
              </li>
              
              <?php If (session('login')) { ?>

                <li class="nav-item">
                  <a class="nav-link" href="#"><?php echo session('apellido'); ?></a>
                </li>

             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('logout'); ?>">
                <span class="d-none d-lg-inline"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="d-inline d-lg-none">Salir</span>
                  Salir
                </a>
              </li>

              <?php } else { ?>

                <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('login'); ?>">
                <span class="d-none d-lg-inline"><i class="fa-solid fa-user"></i></span>
                <span class="d-inline d-lg-none">Iniciar Sesión</span>
                </a>
              </li>

                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('registro'); ?>">Registrarse</a>
                </li>
                

            <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  <div>

