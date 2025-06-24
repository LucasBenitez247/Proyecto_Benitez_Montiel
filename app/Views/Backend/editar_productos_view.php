<link href="<?= base_url('assets/css/mi_estilo_registrar_producto.css')?>"  rel="stylesheet" >
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="page-container">
  <div class="form-container mt-5">
    <h1>Edición de Productos</h1>

<?php if (!empty($validation)): ?>
   
    <script>
        Swal.fire({
            title: 'Error al actualizar',
            html: `<?php foreach($validation as $error){ echo esc($error) . "<br>"; } ?>`,
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    </script>
<?php endif; ?>
    <?php echo form_open_multipart('actualizar/' . $productos['id_producto']);?>
    <?= form_hidden('id', $productos['id_producto'] ?? '') ?>
      <div class="form-group mb-3">
        <label for="nombre" class="form-label">Título del producto</label>
        <?php echo form_input(['name'=>'nombre','id'=>'nombre', 'type'=>'text', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$productos['nombre_producto']]);?>
      </div>
      <div class="form-group mb-3">
        <label for="precio" class="form-label">Precio</label>
        <?php echo form_input(['name'=>'precio', 'id'=>'precio', 'type'=>'number', 'class'=>'form-control no-arrow', 'autofocus'=>'autofocus', 'value'=>$productos['precio_producto']]);?>
      </div>
<div class="form-group mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <?php echo form_input(['name'=>'descripcion','id'=>'descripcion', 'type'=>'text', 'class'=>'form-control', 'autofocus'=>'autofocus', 'value'=>$productos['descripcion_producto']]);?>
      </div>
      <div class="form-group mb-3">
        <label for="imagen">Imagen</label>
        <img src="<?php echo base_url('assets/uploads/'.$productos['imagen_producto']);?>" alt="" 
        height= "100" width= "100" />
        <?php echo form_input(['name'=>'imagen', 'id'=>'imagen', 'type'=>'file']); ?>
      </div>

      <div class="form-group mb-3">
        <label for="stock" class="form-label">Stock</label>
        <?php echo form_input(['name'=>'stock', 'id'=>'stock', 'type'=>'number', 'class'=>'form-control no-arrow',  'autofocus'=>'autofocus', 'value'=>$productos['stock_producto']]);?>
      </div>
      
      <div class="form-group mb-3">
        <label for="categorias" class="form-label">Categoría</label>
      <?php 
      $lista ['0']= 'Seleccione Categoria';
      foreach ($categorias as $row){
        $lista[$row['id_categoria']] = $row['descripcion_categoria'];
      }
      $sel = $productos['categoria_producto'];
      echo form_dropdown('categorias',$lista,$sel,'calss="form-control"')?>
      </div>
    

    <div class="form-goup mb-3">
      <?php echo form_submit('actualizar', "Modificar", "class='btn btn-primary w-100 mt-3'"); ?>
    </div>
    <?php echo form_close();?>
  </div>
</div>