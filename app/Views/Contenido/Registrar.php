<link href="<?= base_url('assets/css/mi_estilo_registro.css')?>"  rel="stylesheet" >
<h1>Registro</h1>
<div class="container col-md-6">
      <div class="contact-form">
        <form>
          <label form="nombre">Nombre:</label>
          <input type="text" class="form-control custom-input" placeholder="Ej. María" name="nombre">

          <label form="nombre">Apellido:</label>
          <input type="text" class="form-control custom-input" placeholder="Ej. Perez" name="apellido">

          <label form="email">Email:</label>
          <input type="email" class="form-control custom-input" placeholder="Ej: tuemail@gmail.com" name="email">

          <label form="telefono">Telefono:</label>
          <input type="number" class="form-control custom-input" placeholder="Ej: 379-11111" name="telefono">

          <label for="exampleInputPassword1" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1">

          <label for="exampleInputPassword1" class="form-label">Repetir Contraseña</label>
          <input type="password" class="form-control" id="exampleInputPassword1">

          <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>
      </div>
    </div>