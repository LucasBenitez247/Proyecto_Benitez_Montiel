<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;
use App\Models\Venta_model;
use App\Models\Detalle_venta_model;

class Ventas_Controller extends BaseController{
    

public function listar_ventas(){
    $venta = new Venta_model();
    $detalle_venta = new Detalle_venta_model;

    $data['titulo'] = 'Listar ventas';

    $data['ventas'] = $venta-> join('usuarios','id_usuarios = venta.id_cliente')->first();
    $data['detalle'] = $detlle_venta-> join('productos','productos.id_producto = detalle_venta.id_producto')->findAll();

    return view(('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Listar_ventas.php', $data).view('Plantilla/footer_view.php', $data);)
}

public function listar_detalle_ventas($id=NULL){
    $venta = new Venta_model();
    $detalle_venta = new Detalle_venta_model;

    $data['titulo'] = 'Listar detalle de ventas';

    $data['ventas'] = $venta-> join('usuarios','id_usuarios = venta.id_cliente')->first();
    $data['detalle'] = $detlle_venta-> join('productos','productos.id_producto = detalle_venta.id_producto')->findAll();

    return view(('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Listar_detalle_ventas.php', $data).view('Plantilla/footer_view.php', $data);)
}
}
