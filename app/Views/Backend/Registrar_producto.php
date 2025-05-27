<link href="<?= base_url('assets/css/mi_estilo_registrar_producto.css')?>"  rel="stylesheet" >
<div class="page-container">
  <div class="form-container">
    <h1>Registro de Producto</h1>
    <form>
      <div class="mb-3">
        <label for="nombre" class="form-label">Título del producto</label>
        <?php echo form_input(['name'=>'nombre','id'=>'nombre', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ej. María', 'value'=> set_value('nombre')]);?>
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <?php echo form_input(['name'=>'descripcion','id'=>'descripcion', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Ej. Producto con calidad', 'value'=> set_value('descripcion')]);?>
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <?php echo form_input(['name'=>'stock', 'id'=>'stock', 'type'=>'number', 'class'=>'form-control no-arrow', 'placeholder'=>'Ej: 10', 'value'=> set_value('stock')]);?>
      </div>
      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <?php echo form_input(['name'=>'precio', 'id'=>'precio', 'type'=>'number', 'class'=>'form-control no-arrow', 'placeholder'=>'Ej: 1999.99', 'value'=> set_value('precio')]);?>
      </div>
      <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select class="form-select" name="categoria" id="categoria">
          <option selected>Seleccione categoría</option>
          <option value="1">Remeras</option>
          <option value="2">Buzos</option>
          <option value="3">Gorras</option>
          <option value="4">Autos</option>
        </select>
      </div>
      <?php echo form_submit('registro_usuario', "Registrar", "class='btn btn-primary w-100 mt-3'"); ?>
    </form>
  </div>
</div>
