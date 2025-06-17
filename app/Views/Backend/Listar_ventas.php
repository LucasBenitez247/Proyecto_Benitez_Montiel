<link href="<?= base_url('assets/css/mi_estilo_listar_productos.css') ?>" rel="stylesheet">

<div class="container mt-5">
    <h2><?= esc($titulo) ?></h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Fecha de venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($ventas)): ?>
            <?php foreach ($ventas as $row): ?>
                <tr>
                    <td><?= esc($row['nombre_usuario'] . ' ' . $row['apellido_usuario']) ?></td>
                    <td><?= esc($row['fecha_venta']) ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= base_url('ver_detalle/' . $row['id_venta']) ?>">Ver detalle completo</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No hay ventas registradas.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
