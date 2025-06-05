<link href="<?= base_url('assets/css/mi_estilo_registrar_producto.css')?>"  rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="page-container">
  <div class="form-container mt-5">
    <h1>Registro de Producto</h1>

    <?php if (!empty($validation)):?>
      <div class="alert alert-danger" role="alert">
        <ul> 
          <?php foreach($validation as $error):?>
            <li><?=esc($error)?></li>
          <?php endforeach?>
        </ul>
       </div>
    <?php endif?>
    

    <?php echo form_open_multipart('registrar_producto')?>
      <div class="form-group mb-3">
        <label for="nombre" class="form-label">Título del producto</label>
        <?php echo form_input(['name'=>'nombre','id'=>'nombre', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Remeras', 'value'=> set_value('nombre')]);?>
      </div>
      <div class="form-group mb-3">
        <label for="precio" class="form-label">Precio</label>
        <?php echo form_input(['name'=>'precio', 'id'=>'precio', 'type'=>'number', 'class'=>'form-control no-arrow', 'placeholder'=>'Ej: 1999.99', 'value'=> set_value('precio')]);?>
      </div>
<div class="form-group mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <?php echo form_input(['name'=>'descripcion','id'=>'descripcion', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ej. Producto con calidad', 'value'=> set_value('descripcion')]);?>
      </div>
      <div class="form-group mb-3">
        <label for="stock" class="form-label">Stock</label>
        <?php echo form_input(['name'=>'stock', 'id'=>'stock', 'type'=>'number', 'class'=>'form-control no-arrow', 'placeholder'=>'Ej: 10', 'value'=> set_value('stock')]);?>
      </div>
      <div class="form-group mb-3">
        <label for="imagen">Imagen</label>
        <?php echo form_input(['name'=>'imagen', 'id'=>'imagen', 'type'=>'file', 'value'=> set_value('imagen')]); ?>
      </div>
      <div class="form-goup mb-3">
        <label class="form-label">Categoría</label>
        <select class="form-select" name="categorias" id="categorias">
          <option selected>Seleccione categoría</option>
          <option value="1">Remeras</option>
          <option value="2">Buzos</option>
          <option value="3">Gorras</option>
          <option value="4">Autos</option>
        </select>
      </div>
      
    <div class="form-goup mb-3">
      <?php echo form_submit('agregar', "Registrar", "class='btn btn-primary w-100 mt-3'"); ?>
    </div>
    <?php echo form_close();?>
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