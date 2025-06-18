
<link href="<?= base_url('assets/css/estilo_checkout.css?v=1.0') ?>" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="container">
    <h1 class="display-4 text-center mt-3 mb-5">Finalizar Compra</h1>

    <form method="post" action="<?= base_url('guardar_venta') ?>">
        <div class="card mb-4">
            <div class="card-header">Tus datos</div>
            <div class="card-body">
                <div class="row">
                   <div class="col-md-6 mb-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?= esc(session()->get('nombre')) ?>" required>
                        <?php if (isset($validation['nombre'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['nombre']) ?>
                            </div>
                               <?php endif; ?>
                    </div>
                   
                    <div class="col-md-6 mb-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" value="<?= esc(session()->get('apellido')) ?>" required>
                         <?php if (isset($validation['apellido'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['apellido']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= esc(session()->get('email')) ?>" required>
                     <?php if (isset($validation['email'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['email']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="<?= esc(session()->get('telefono')) ?>" required>
                        <?php if (isset($validation['telefono'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['telefono']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Calle y número</label>
                        <input type="text" name="direccion" id="direccion" class="form-control <?= isset($validation['direccion']) ? 'is-invalid' : '' ?>" value="<?= set_value('direccion') ?>" required>
                        <?php if (isset($validation['direccion'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['direccion']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control <?= isset($validation['ciudad']) ? 'is-invalid' : '' ?>" value="<?= set_value('ciudad') ?>" required>
                        <?php if (isset($validation['ciudad'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['ciudad']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Provincia</label>
                        <input type="text" name="provincia" id="provincia" class="form-control <?= isset($validation['provincia']) ? 'is-invalid' : '' ?>" value="<?= set_value('provincia') ?>" required>
                        <?php if (isset($validation['provincia'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['provincia']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Código Postal</label>
                        <input type="text" name="cod_postal" id="cod_postal" class="form-control <?= isset($validation['cod_postal']) ? 'is-invalid' : '' ?>" value="<?= set_value('cod_postal') ?>" required>
                        <?php if (isset($validation['cod_postal'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($validation['cod_postal']) ?>
                            </div>
                        <?php endif; ?>
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
            <button type="button" class="btn btn-violeta" data-bs-toggle="modal" data-bs-target="#confirmarCompraModal">
                Finalizar Compra
            </button>
        </div>

        <div class="modal fade" id="confirmarCompraModal" tabindex="-1" aria-labelledby="confirmarCompraLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmarCompraLabel">¿Confirmar compra?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                   <div class="modal-body">
                    <p><strong>Nombre:</strong> <?= esc(session()->get('nombre')) ?> <?= esc(session()->get('apellido')) ?></p>
                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                    <p><strong>Teléfono:</strong> <span id="modal-telefono"></span></p>
                    <p><strong>Dirección:</strong> <span id="modal-direccion"></span>, <span id="modal-ciudad"></span>, <span id="modal-provincia"></span> (CP: <span id="modal-cod_postal"></span>)</p>

                    <p><strong>Total de la compra:</strong> $<?= number_format($cart->total(), 2) ?></p>
                    <hr>
                    <p>¿Estás segura/o de que querés confirmar esta compra?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-violeta">Sí, comprar</button>
                    </div>
                </div>
            </div>
        </div>

        
    </form> 

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const envio = document.getElementById('envio');
    const retiro = document.getElementById('retiro');
    const direccion = document.getElementById('direccion-envio');

    function toggleDireccion() {
        direccion.style.display = envio.checked ? 'block' : 'none';
    }

    envio.addEventListener('change', toggleDireccion);
    retiro.addEventListener('change', toggleDireccion);
    toggleDireccion();
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const campos = document.querySelectorAll("input, select, textarea");

    campos.forEach(function (campo) {
        campo.addEventListener("input", function () {
            if (campo.classList.contains("is-invalid")) {
                campo.classList.remove("is-invalid");
                const feedback = campo.parentElement.querySelector(".invalid-feedback");
                if (feedback) {
                    feedback.style.display = "none";
                }
            }
        });
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById('confirmarCompraModal');

    modal.addEventListener('show.bs.modal', function () {
        document.getElementById('modal-email').textContent = document.getElementById('email').value;
        document.getElementById('modal-telefono').textContent = document.getElementById('telefono').value;
        document.getElementById('modal-direccion').textContent = document.getElementById('direccion').value;
        document.getElementById('modal-ciudad').textContent = document.getElementById('ciudad').value;
        document.getElementById('modal-provincia').textContent = document.getElementById('provincia').value;
        document.getElementById('modal-cod_postal').textContent = document.getElementById('cod_postal').value;
    });
});
</script>


