<link rel="stylesheet" href="<?= base_url('assets/css/estilo_contacto.css') ?>">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container py-5">
  <div class="row">
    <div class="col-md-6">
      <h1 id="contacto" class="titulo">Contacto</h1>
      <p><i class="fa-solid fa-clock"></i>  Horarios: Lunes a viernes de 9 a 20 hs de corrido.</p>
      <p><i class="fa-solid fa-envelope"></i>   Correo: tiendaf1natic@gmail.com</p>
      <p><i class="fa-brands fa-square-whatsapp"></i>  WhatsApp: 379-4123456 <br> </p>
      <p><i class="fab fa-facebook-f"></i>   Facebook: Tienda_f1</p>
      <p><i class="fa-brands fa-square-instagram"></i>   Instagram: Tienda_f1_nati</p>
      
      <p><i class="fa-solid fa-location-dot"></i>   Dirección: Corrientes,Capital: 9 de julio 1449.</p>
      
    </div>

   

    <div class="col-md-6">

       <?php if (!empty ($validation)): ?>
        <div class= "alert alert-danger" role ="alert">
          <ul>
            <?php foreach ($validation as $error): ?>
              <li><?= esc ($error) ?></li>
              <?php endforeach ?>
          </ul>
          </div>
      <?php endif ?>
      
      <div class="contact-form mt-5">
        <?php echo form_open ('consulta') ?>
          <label for='nombre' class="form-label">Nombre Completo:</label>
          <?php echo form_input (['name'=> 'nombre', 'id'=> 'nombre', 'type'=> 'text', 'class'=> 'form-control','placeholder' => 'Ej. María', 'value'=> set_value('nombre')]);?>
          
          <label for='email' class= "form-lable">Email:</label>
          <?php echo form_input ([ 'name' => 'email', 'id' => 'email', 'type'=>'text', 'class'=>'form-control custom-input' , 'placeholder'=>'Ej: tuemail@gmail.com', 'value'=> set_value('email')]);?>
         
          <label for='telefono' class= "form-label">Telefono:</label>
          <?php echo form_input(['name'=> 'telefono', 'id'=>'telefono', 'type'=>'number', 'class'=>"form-control no-arrow", 'placeholder'=>'Ej: 379-11111', 'value' => set_value('telefono')]);?>
          
          <label for='mensaje' class= "form-label">Mensaje:</label>
          <?php echo form_textarea ([ 'name'=>'mensaje', 'id'=> 'mensaje', 'type'=> 'text', 'class'=>'form-control custom-input', 'rows'=>'3', 'placeholder'=>'Ej: Quiero más info sobre...', 'value'=> set_value('mensaje')]);?>
          
          <?php echo form_submit('consulta', 'Enviar'," class= 'btn mt-2'");?>

         <?php echo form_close();?>
         
      </div>
    </div>

     <!-- SweetAlert2 -->
      <?php if (session()->getFlashdata('texto_mensaje')): ?>
      <script>
        Swal.fire({
          title: '¡Buen trabajo!',
          text: '<?= session()->getFlashdata('texto_mensaje') ?>',
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });
      </script>
      <?php endif; ?>
   </div>
  </div>

<div class="mapa-full">
  <div class="map-responsive">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0877693792017!2d-58.83475703902547!3d-27.466526772483565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses!2sar!4v1745325519956!5m2!1ses!2sar" 
      frameborder="0" 
      allowfullscreen 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>