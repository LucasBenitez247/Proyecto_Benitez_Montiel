<link href="<?= base_url('assets/css/mi_estilo_listar_productos.css') ?>" rel="stylesheet">

<div class="container mt-5">
    <h1 class="mb-4">Listado de Ventas</h1>

        <?php if (!empty($ventas)): ?>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre y Apellido</th>
                <th>Fecha de Venta</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
                 <?php foreach ($ventas as $row):?>
                    <tr>
                        <td><?= esc($row['id_venta']) ?></td>
                        <td><?= esc($row['nombre_usuario'], " ", $row['apellido_usurio']) ?></td>
                        <td><?= esc($row['fecha_venta']) ?></td>   
                        <td>
                            <?php $id = $row['id_venta'];?>
                            <a class="btn btn-succes" href="<?php echo base_url('ver_detalle/', $id);?> ">Ver detalle completo</a>
                        </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">No hay ventas</td></tr>
            <?php endif; ?>
             </tbody>
    </table>
</div>