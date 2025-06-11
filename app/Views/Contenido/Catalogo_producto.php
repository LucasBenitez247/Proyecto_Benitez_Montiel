<link href="<?= base_url('assets/css/mi_estilo_catalogo.css')?>"  rel="stylesheet" > 

<div class="container">

    <h1 class="display-4 text-center mt-3 mb-5">Lista de productos</h1>

        <div class="row">

        <?php foreach($productos as $row) { ?>

            <div class="col-sm-6 col-md-3 mb-3">


                <div class="card h-100 custom-card text-center">

                    <img class="card-img-top" src="<?php echo base_url('assets/uploads/'. $row['imagen_producto']); ?>"  alt="Cardimage cap">

                    <div class="card-body">

                    <h5 class="card-title"><?php echo $row['nombre_producto']; ?></h5>

                    <p class="card-text"><?php echo $row['descripcion_producto']; ?> </p>

                    <p class="card-text"><?php echo "$"; echo $row['precio_producto']; ?> </p>

                    <p class="card-text"><?php echo "Categoria: "; echo $row['categoria_producto']; ?> </p>

                    <p class="card-text"><?php echo "Stock: "; echo $row['stock_producto']; ?> </p>

                    <hr>
                  
                  <?php if (session('login')) {

                    echo form_open('add_cart');

                    echo form_hidden('id', $row['id_producto']);
                    echo form_hidden('titulo', $row['nombre_producto']);
                    echo form_hidden('precio', $row['precio_producto']);

                    echo form_submit('comprar', 'Agregar al carrito',"class='btn btn-success'");
                    echo form_close();

                  } ?>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>
