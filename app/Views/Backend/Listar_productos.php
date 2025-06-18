<link href="<?= base_url('assets/css/mi_estilo_listar_productos.css') ?>" rel="stylesheet">

<div class="container mt-5">
    <h1 class="mb-4">Listado de Productos</h1>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
                 <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['nombre_producto']) ?></td>
                        <td><?= esc($producto['descripcion_producto']) ?></td>
                        <td><?= esc($producto['stock_producto']) ?></td>
                        <td><?= esc($producto['precio_producto']) ?></td>
                        <td><?= esc($producto['nombre_categoria']) ?></td>
                        <td>
                            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" alt="Imagen" width="80">
                        </td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>
