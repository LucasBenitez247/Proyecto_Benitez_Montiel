<link href="<?= base_url('assets/css/mi_estilo_login.css')?>"  rel="stylesheet" >
<h1>Login</h1>

<div class="container col-md-6">
    <form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
    <p><br>¿No tienes una cuenta?</p>
    <a href="<?php echo base_url('registro'); ?>">Registrate</a>
</div>
