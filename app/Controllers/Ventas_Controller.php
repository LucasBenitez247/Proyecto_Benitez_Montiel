<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;
use App\Models\Venta_model;
use App\Models\Detalle_venta_model;

class Ventas_Controller extends BaseController{

   public function listar_ventas(){
    $venta = new Venta_model();

    $data['titulo'] = 'Listar ventas';

    $data['ventas'] = $venta->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario')
                            ->join('usuarios', 'usuarios.id_usuario = venta.id_usuario')
                            ->findAll();

    return view('Plantilla/header_view', $data)
         . view('Plantilla/nav_adm_view')
         . view('Backend/Listar_ventas.php')
         . view('Plantilla/footer_view');
}



public function listar_detalle_ventas($id = null){
    $venta = new Venta_model();
    $detalle_venta = new Detalle_venta_model();

    $data['titulo'] = 'Listar detalle de ventas';

    $data['ventas'] = $venta
        ->select('venta.*, usuarios.nombre_usuario, usuarios.apellido_usuario, usuarios.email_usuario')
        ->join('usuarios','usuarios.id_usuario = venta.id_usuario')
        ->where('id_venta', $id)
        ->first();

    $data['detalle'] = $detalle_venta
        ->select('detalle_venta.*, productos.descripcion, productos.precio')
        ->join('productos','productos.id_producto = detalle_venta.id_producto')
        ->where('id_venta', $id)
        ->findAll();

    return view('Plantilla/header_view', $data)
        .view('Plantilla/nav_adm_view', $data)
        .view('Backend/Listar_detalle_ventas.php', $data)
        .view('Plantilla/footer_view.php', $data);
}

}
