<link href="<?= base_url('assets/css/estilo_checkout.css')?>"  rel="stylesheet" >

<h1 class="text-center mb-4">Finalizar Compra</h1>

<div class="container">
    <form method="post" action="<?= base_url('guardar_venta') ?>">
      
    <?php if (!empty($validation)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($validation as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

        
        <div class="card mb-4">
            <div class="card-header">Tus datos</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= esc(session()->get('nombre')) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="<?= esc(session()->get('apellido')) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= esc(session()->get('email')) ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?= esc(session()->get('telefono')) ?>" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Método de entrega</div>
            <div class="card-body">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="entrega" id="envio" value="envio" checked>
                    <label class="form-check-label" for="envio">Envío a domicilio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="entrega" id="retiro" value="retiro">
                    <label class="form-check-label" for="retiro">Retiro en tienda</label>
                </div>

                <div id="direccion-envio" class="mt-3">
                    <div class="mb-3">
                        <label>Calle y número</label>
                        <input type="text" name="direccion" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Ciudad</label>
                        <input type="text" name="ciudad" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Provincia</label>
                        <input type="text" name="provincia" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Código Postal</label>
                        <input type="text" name="cp" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Método de pago</div>
            <div class="card-body">
                <select class="form-select" name="pago" required>
                    <option value="">Seleccioná una opción</option>
                    <option value="tarjeta">Tarjeta de crédito/débito</option>
                    <option value="mercadopago">MercadoPago</option>
                    <option value="efectivo">Efectivo contra entrega</option>
                </select>
            </div>
        </div>

     <div class="card mb-4">
    <div class="card-header">Resumen de compra</div>
    <div class="card-body">
        <?php $cart = \Config\Services::cart(); ?>
        <ul class="list-group">
            <?php foreach ($cart->contents() as $item): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $item['name'] ?> x<?= $item['qty'] ?>
                    <span>$<?= number_format($item['price'] * $item['qty'], 2) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
        <hr>
        <h5 class="text-end">Total: $<?= number_format($cart->total(), 2) ?></h5>
    </div>
</div>

        
       <div class="text-center mb-5">
         <button type="submit" class="btn btn-success">Finalizar Compra</button>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const envio = document.getElementById('envio');
    const retiro = document.getElementById('retiro');
    const direccion = document.getElementById('direccion-envio');

    function toggleDireccion() {
        if (envio.checked) {
            direccion.style.display = 'block';
        } else {
            direccion.style.display = 'none';
        }
    }

    envio.addEventListener('change', toggleDireccion);
    retiro.addEventListener('change', toggleDireccion);

    toggleDireccion(); 
});
</script>
