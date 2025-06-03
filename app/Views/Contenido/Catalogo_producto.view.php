<div class="container">

    <h1 class="display-4 text-center">Lista de productos</h1>

<div class="row">

    <?php foreach($libro as $row) { ?>

    <div class="col-md-4">

    <div class="card text-center">

        <img class="card-img-top" src="<?php echo base_url('assets/uploads/'.$row['libro_imagen']);?>">

        <div class="card-body">

            <h5 class="card-title"><?php echo $row['nombre_producto']; ?></h5>

            <p class="card-text"><?php echo $row['descripcion_producto']; ?> </p>

            <p class="card-text"><?php echo "$"; echo $row['precio_producto']; ?> </p>

            <p class="card-text"><?php echo "Categoria: "; echo $row['categoria_producto']; ?> </p>

            <p class="card-text"><?php echo "Stock: "; echo $row['stock_producto']; ?> </p>

<?php if (session('login')) {

        echo form_open('add_cart');

        echo form_hidden('id', $row['libro_id']);
        echo form_hidden('titulo', $row['libro_titulo']);
        echo form_hidden('precio', $row['libro_precio']);

        echo form_submit('comprar', 'Agregar al carrito',"class='btn btn-success'");
        echo form_close();

} ?>


<hr>
        </div>
    </div>
</div>