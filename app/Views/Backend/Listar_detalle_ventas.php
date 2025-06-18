<link href="<?= base_url('assets/css/mi_estilo_listar_productos.css') ?>" rel="stylesheet">

<div class="container mt-5" style="max-width: 800px;">
    <p>Apellido: <?= esc($ventas['apellido_usuario']) ?></p>
    <p>Nombre: <?= esc($ventas['nombre_usuario']) ?></p>
    <p>Email: <?= esc($ventas['mail_usuario']) ?></p>

    <table id= "mytable"class="table table-bordered table-striped table-hover">
        <thead>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
        </thead>
        <tbody>
                 <?php foreach ($detalle as $row):?>
                    <tr>
                        <td><?= esc($row['descripcion_producto']) ?></td>
                        <td><?= esc($row['precio_producto']) ?></td> 
                        <td><?= esc($row['cantidad']) ?></td>                      
                    </tr>
                <?php endforeach; ?>
             </tbody>
    </table>
</div>