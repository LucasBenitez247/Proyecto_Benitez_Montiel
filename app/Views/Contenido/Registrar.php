<link href="<?= base_url('assets/css/mi_estilo_registro.css')?>"  rel="stylesheet" >
<h1>Registro</h1>
<div class="page-container">
    <div class="form-container">
        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ej. María" name="nombre">
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" placeholder="Ej. Perez" name="apellido">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Ej: tuemail@gmail.com" name="email">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="number" class="form-control no-arrow" id="telefono" placeholder="Ej: 379-11111" name="telefono">

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Repetir Contraseña:</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Registrar</button>
        </form>
    </div>
</div>