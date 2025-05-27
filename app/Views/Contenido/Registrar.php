<link href="<?= base_url('assets/css/mi_estilo_registro.css')?>"  rel="stylesheet" >

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<h1>Registro</h1>
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
       



        <?php echo form_open('registro_usuario')?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <?php echo form_input(['name'=>'nombre','id'=>'nombre', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ej. María', 'value'=> set_value('nombre')]);?>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <?php echo form_input(['name'=>'apellido', 'id'=>'apellido', 'type'=>'text', 'class'=>'form-control' , 'placeholder'=>'Ej. Perez', 'value'=> set_value('apellido')]);?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <?php echo form_input(['name'=>'email', 'id'=>'email', 'type'=>'email', 'class'=>'form-control', 'placeholder'=>'Ej: tuemail@gmail.com','value'=> set_value('email')])?>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <?php echo form_input(['name'=>'telefono', 'id'=>'telefono', 'type'=>'number', 'class'=>'form-control no-arrow' , 'placeholder'=>'Ej: 379-11111', 'value'=> set_value('telefono')]);?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <?php echo form_input(['name'=>'password','id'=>'password', 'type'=>'password', 'class'=>'form-control','value'=> set_value('password')]);?>
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Repetir Contraseña:</label>
                <?php echo form_input(['name'=>'confirmPassword', 'id'=>'confirmPassword', 'type'=>'password', 'class'=>'form-control' , 'value'=> set_value('confirmPassword')]);?>
            </div>
            <?php echo form_submit('registro_usuario', "Registrarme", "class='btn btn-primary w-100 mt-3'"); ?>
        
        <?php echo form_close();?>
    </div>
</div>
 <!-- SweetAlert2 -->
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
      