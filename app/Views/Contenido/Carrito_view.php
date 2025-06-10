<?php  $cart = \Config\Services::cart();?>

<h1 class= "tex-center">Carrito de Compras</h1><a href="productos"
class= "btn btn-succes" role="button">Continuar Comprando</a>

<?php if($cart->contents() == NULL): ?>
    <h2 class="text-center alert alert-danger">El carrito está vacío</h2>
<?php else: ?>
    <table id="mytable" class="table table-bordered table-striped">
        <thead>
            <td>N° item</td>
            <td>Producto</td>
            <td>Precio</td> 
            <td>Cantidad</td>
            <td>Subtotal</td>
            <td>Acción</td>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $i = 1;
            $cart1 = $cart->contents();
            foreach ($cart1 as $item): ?>
            <tr>
                <td><?php echo $i++;?> </td>
                <td><?php echo $item['name'];?> </td>
                <td><?php echo $item['price'];?> </td>
                <td><?php echo $item['qty'];?> </td>
                <td><?php echo $item['subtotal']; $total += $item['subtotal'];?></td>
                <td><?php echo anchor('eliminar_item/'.$item['rowid'],'Eliminar') ;?> </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td>Total Compra: $<?php echo $total;?></td>
                <td><a href="<?php echo base_url('vaciar_carrito/all');?>" class="btn btn-success">Vaciar Carrito</a></td>
                <td><a href="ventas" class="btn btn-success" role="button">Ordenar Compra</a></td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>