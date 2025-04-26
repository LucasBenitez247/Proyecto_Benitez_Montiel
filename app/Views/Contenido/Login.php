<link href="<?= base_url('assets/css/mi_estilo_login.css')?>"  rel="stylesheet" >
<h1>Login</h1>

<div class="page-container">
    <div class="form-container">
        <form>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
        </form>
        <p class="mt-3 text-center">¿No tienes una cuenta?</p>
        <div class="text-center">
            <a href="<?php echo base_url('registro'); ?>">Regístrate</a>
        </div>
    </div>
</div>

