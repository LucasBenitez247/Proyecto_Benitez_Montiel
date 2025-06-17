<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;
use App\Models\Venta_model;
use App\Models\Detalle_venta_model;

class Carrito_Controller extends BaseController{
    
    public function ver_carrito(){
        $cart = \Config\Services::cart();
        $data['titulo'] = 'Carrito de compras';
        return view('Plantilla/header_view', $data)
        .view('Plantilla/nav_view.php', $data)
        .view('Contenido/carrito_view', $data)
        .view('Plantilla/footer_view.php', $data);
    }

    public function agregar_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $data = array(
            'id'=>$request->getPost('id'),
            'name' =>$request->getPost('titulo'),
            'price'=>$request->getPost('precio'),
            'qty'=>1
        );
        $cart->insert($data);

        return redirect()->route('ver_carrito')->with('mensaje','El producto se agregó al carrito correctamente');
    }


    function borrar($id){
        $cart = \Config\Services::cart();
        if ($id=="all"){
            $cart->destroy();
        }else{
            $cart->remove($id);
        }
        return redirect()->route('ver_carrito');
    }

       
    public function procesar_checkout()
{
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
        [
            'direccion' => 'required|max_length[255]',
            'provincia' => 'required',
            'localidad' => 'required',
            'codigo_postal' => 'required|numeric|min_length[4]|max_length[8]',
            'entrega' => 'required|in_list[retiro,envio]',
            'pago' => 'required|in_list[tarjeta,efectivo]',
        ],
        [
            'direccion' => [
                'required' => 'La dirección es obligatoria',
                'max_length' => 'La dirección es demasiado larga'
            ],
            'provincia' => [
                'required' => 'Seleccioná una provincia'
            ],
            'localidad' => [
                'required' => 'La localidad es obligatoria'
            ],
            'codigo_postal' => [
                'required' => 'El código postal es obligatorio',
                'numeric' => 'Debe contener solo números',
                'min_length' => 'Debe tener al menos 4 dígitos',
                'max_length' => 'Debe tener como máximo 8 dígitos',
            ],
            'entrega' => [
                'required' => 'Debes elegir una opción de entrega',
                'in_list' => 'Opción de entrega no válida'
            ],
            'pago' => [
                'required' => 'Debes elegir una forma de pago',
                'in_list' => 'Forma de pago no válida'
            ]
        ]
    );

    if ($validation->withRequest($request)->run()) {
        return redirect()->to('/productos')->with('mensaje', '¡Compra finalizada con éxito!');
    } else {
        $data['validation'] = $validation->getErrors();
        return view('Plantilla/header_view')
            . view('Plantilla/nav_usu_view')
            . view('Contenido/ventas', $data)
            . view('Plantilla/footer_view');
    }
}


    public function guardar_venta()
    {
    $cart = \Config\Services::cart();
    $venta = new \App\Models\Venta_model();
    $detalle = new \App\Models\Detalle_venta_model();
    $productos_model = new \App\Models\Producto_model();
    $request = \Config\Services::request();

    $items = $cart->contents();

    if (empty($items)) {
        return redirect()->to('/productos')->with('mensaje', 'El carrito está vacío');
    }

    $total = 0;
    foreach ($items as $item) {
        $total += $item['subtotal'];
    }

    $data_venta = [
        'id_usuario'    => session('id'), 
        'fecha_venta'   => date('Y-m-d'),
        'total_venta'   => $total
    ];

    $venta_id = $venta->insert($data_venta);

    foreach ($items as $item) {
        $detalle->insert([
            'id_venta'        => $venta_id,
            'id_producto'     => $item['id'],
            'cantidad'=> $item['qty'],
            'precio_unitario'  => $item['price']
        ]);

        $producto = $productos_model->find($item['id']);
        if ($producto) {
            $nuevo_stock = $producto['stock_producto'] - $item['qty'];
            $productos_model->update($item['id'], ['stock_producto' => $nuevo_stock]);
        }
    }

    $cart->destroy();

    return redirect()->to('/productos')->with('mensaje', '¡Compra finalizada con éxito!');
    }


}