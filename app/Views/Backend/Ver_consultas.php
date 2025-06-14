
<h1>Ver Consultas</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($consultas)): ?>
            <?php foreach ($consultas as $consulta): ?>
                <tr>
                    <td><?= esc($consulta['nombre_mensaje']) ?></td>
                    <td><?= esc($consulta['correo_mensaje']) ?></td>
                    <td><?= esc($consulta['telefono_mensaje']) ?></td>
                    <td><?= esc($consulta['texto_mensaje']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4" class="text-center">No hay consultas registradas</td></tr>
        <?php endif; ?>
    </tbody>
</table>