<link href="<?= base_url('assets/css/miestilo_popup.css')?>" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Bundle JS (incluye Popper) -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<?php  $cart = \Config\Services::cart();?>

<h1 class= "mt-3 text-center">Carrito de Compras</h1>
<a href="<?php echo base_url('productos'); ?>" class="my-3 mx-4 btn btn-outline-success">Continuar Comprando</a>

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
                <td><?php echo anchor(
                      'eliminar_item/'.$item['rowid'],
                      '<i class="fa-solid fa-trash"></i> Eliminar',
                      ['class' => 'btn btn-danger btn-sm']
                      );?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td>Total Compra: $<?php echo $total;?></td>
                <td>
                  <a href="<?php echo base_url('vaciar_carrito/all');?>"
                  class="btn btn-success">
                  <i class="fa-solid fa-cart-shopping"></i>
                  Vaciar Carrito
                </a>
                </td>
               <td><button class="btn btn-success" onclick="abrirPopup()">Ordenar Compra</button></td>
            </tr>
            <div id="popup" class="popup">
            <div class="popup-content">
                <h3>¿Qué querés hacer?</h3>
                <div class="popup-buttons">
                <a href="<?php echo base_url('productos'); ?>" class="btn btn-secondary">Seguir Comprando</a>
                <a href="<?php echo base_url('ventas'); ?>" class="btn btn-success">Finalizar Compra</a>
                </div>
            </div>
            </div>
 <?php if (session()->getFlashdata('mensaje')): ?>
        <!-- Modal Bootstrap -->
<div class="modal fade" id="modalCompraExitosa" tabindex="-1" aria-labelledby="modalCompraExitosaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalCompraExitosaLabel">¡Se agregó al carrito!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <?= session()->getFlashdata('mensaje') ?>
      </div>

      <div class="modal-footer">
        <a href="<?= base_url('productos') ?>" class="btn btn-success">Seguir comprando</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
        <script>
            
            function abrirPopup() {
                document.getElementById("popup").style.display = "flex";
            }
            window.onclick = function(e) {
            var popup = document.getElementById("popup");
            if (e.target == popup) {
            popup.style.display = "none";
            }
        }
        </script>

 <?php if (session()->getFlashdata('mensaje')): ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = new bootstrap.Modal(document.getElementById('modalCompraExitosa'));
        modal.show();
    });
</script>
<?php endif; ?>

        </tbody>
    </table>
<?php endif; ?>