<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;
use App\Models\Venta_model;
use App\Models\Detalle_venta_model;
use App\Models\Direccion_usuario_model;
use App\Models\Usuarios_model;

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
        $producto_model = new \App\Models\Producto_model();

        $id_producto = $request->getPost('id');
        $producto = $producto_model->find($id_producto);
        $cantidad_en_carrito = 0;

        foreach ($cart->contents() as $item) {
            if ($item['id'] == $id_producto) {
                $cantidad_en_carrito += $item['qty'];
            }
        }

       if ($producto && ($producto['stock_producto'] > $cantidad_en_carrito)) {
        $data = array(
            'id'    => $id_producto,
            'name'  => $request->getPost('titulo'),
            'price' => $request->getPost('precio'),
            'qty'   => 1
        );
        $cart->insert($data);
        return redirect()->route('ver_carrito')->with('mensaje','El producto se agregó al carrito correctamente');
    } else {
        return redirect()->route('ver_carrito')->with('mensaje','No hay suficiente stock para este producto');
    }
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
            'direccion' => 'required|max_length[150]',
            'ciudad' => 'required|max_length[100]', 
            'provincia' => 'required|max_length[100]',
            'cod_postal' => 'required|max_length[20]|integer',
            'entrega' => 'required',
            'pago' => 'required'
        ],
        [
            'direccion' => [
                'required' => 'La dirección es obligatoria.',
                'max_length' => 'La dirección no puede exceder los 150 caracteres.'
            ],
            'ciudad' => [
                'required' => 'La ciudad es obligatoria.',
                'max_length' => 'La ciudad no puede exceder los 100 caracteres.'
            ],
            'provincia' => [
                'required' => 'La provincia es obligatoria.',
                'max_length' => 'La provincia no puede exceder los 100 caracteres.'
            ],
            'cod_postal' => [
                'required' => 'El código postal es obligatorio.',
                'max_length' => 'El código postal no puede exceder los 20 caracteres.',
                'integer' => 'El código postal debe ser un número entero.'
            ],
            'entrega' => [
                'required' => 'El método de entrega es obligatorio.'
            ],
            'pago' => [
                'required' => 'El método de pago es obligatorio.'
            ],

        ]
    );

    if ($validation->withRequest($request)->run()) {


     $data = [
        'id_usuario' => session('id'),
        'direccion' => $request->getPost('direccion'),
        'ciudad' => $request->getPost('ciudad'),
        'provincia' => $request->getPost('provincia'),
        'cod_postal' => $request->getPost('cod_postal'),
        'entrega' => $request->getPost('entrega'),
        'pago' => $request->getPost('pago')
     ];
    $datos = new Direccion_usuario_model();
    $datos->insert($data);
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
    $direccion_model = new \App\Models\Direccion_usuario_model();
    $request = \Config\Services::request();
    
    foreach ($items as $item) {
        $producto = $productos_model->find($item['id']);
        if (!$producto || $producto['stock_producto'] < $item['qty']) {
            return redirect()->to('/ver_carrito')->with('mensaje', 'No hay suficiente stock para ' . $item['name']);
        }
    }
    $data_direccion = [
        'id_usuario' => session('id'),
        'direccion' => $request->getPost('direccion'),
        'ciudad' => $request->getPost('ciudad'),
        'provincia' => $request->getPost('provincia'),
        'cod_postal' => $request->getPost('cod_postal'),
        'entrega' => $request->getPost('entrega'),
        'pago' => $request->getPost('pago')
    ];
    $direccion_model->insert($data_direccion);
    
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