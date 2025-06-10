<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;


class Carrito_Controller extends BaseController{
    
    public function ver_carrito(){
        $cart = \Config\Services::cart();
        $data['titulo'] = 'Carrito de compras';
        return view(('Plantilla/header_view', $data).view('Plantilla/nav_usu_view', $data).view('Contenido/carrito_view', $data).view('Plantilla/footer_view.php', $data));
    }

    public function agregar_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $data = array(
            'id'=>$request->getPost('id_producto'),
            'name' =>$request->getPost('nombre_producto'),
            'price'=>$request->getPost('precio_producto'),
            'qty'=>1
        );
        $cart->insert($data);

        return redirect()->route('ver_carrito')->with('mensaje','El producto se agregó al carrito correctamente');
    }

    function borrar($id){
        $cart = Config\Services::cart();
        if ($id=="all"){
            $cart->destroy();
        }else{
            $cart->remove($id);
        }
        return redirect()->route('ver_carrito');
    }

}