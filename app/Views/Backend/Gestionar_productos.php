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
                <th>Editar</th>
                <th>Activar/Eliminar</th>
            </tr>
        </thead>
        <tbody>
                 <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['nombre_producto']) ?></td>
                        <td><?= esc($producto['descripcion_producto']) ?></td>
                        <td><?= esc($producto['stock_producto']) ?></td>
                        <td><?= esc($producto['precio_producto']) ?></td>
                        <td><?= esc($producto['categoria_producto']) ?></td>
                        <td>
                            <img src="<?= base_url('assets/uploads/' . $producto['imagen_producto']) ?>" alt="Imagen" width="80">
                        </td>
                         <td>
                            <a href="<?= base_url('editar/'. $producto['id_producto']) ?>" class="btn btn-success">Editar</a>
                        </td>
                          <td>
                            <?php if ($producto['estado_producto'] == 1): ?>
                                <a href="<?= base_url('eliminar/'.$producto['id_producto']) ?>" class="btn btn-danger">Eliminar</a>
                            <?php else: ?>
                                <a href="<?= base_url('activar/'.$producto['id_producto']) ?>" class="btn btn-primary">Activar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">No hay productos cargados</td></tr>
            <?php endif; ?>
             </tbody>
    </table>
</div>
