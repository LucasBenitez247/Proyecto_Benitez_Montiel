<link href="<?= base_url('assets/css/mi_estilo_login.css')?>"  rel="stylesheet" >
<h1>Login</h1>



<div class="page-container">
    <div class="form-container">

    <?php if (!empty ($validation)): ?>
        <div class= "alert alert-danger" role ="alert">
          <ul>
            <?php foreach ($validation as $error): ?>
              <li><?= esc ($error) ?></li>
              <?php endforeach ?>
          </ul>
          </div>
         <?php endif ?>

        <?php echo form_open('verificar_usuario')?>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                <input name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input name = 'password' type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        <?php echo form_close();?>
        <p class="mt-3 text-center">¿No tienes una cuenta?</p>
        <div class="text-center">
            <a href="<?php echo base_url('registro'); ?>">Regístrate</a>
        </div>
    </div>
</div>

 <?php if (session()->getFlashdata('mensaje')): ?>
      <script>
        Swal.fire({
          title: '¡Buen trabajo!',
          text: '<?= session()->getFlashdata('mensaje') ?>',
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });
      </script>
      <?php endif; ?>