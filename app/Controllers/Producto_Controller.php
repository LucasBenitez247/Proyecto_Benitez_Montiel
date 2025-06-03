<?php

namespace App\Controllers;

use App\Models\Producto_model;
use App\Models\Categoria_producto_model;


class Producto_Controller extends BaseController
{
    public function form_add_producto(){
        $validation = \Config\Services::validation();
        $categorias = new Categoria_producto_model();
        $data['validation'] = $validation->getErrors();
        $data ['categorias'] = $categorias->findAll();
        $data['titulo']= 'Agregar producto';
        return view ('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Registrar_producto.php', $data).view('Plantilla/footer_view.php', $data);
    }
    
    public function add_producto(){
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
         
        [
        'nombre' => 'required|max_length[150]',
        'precio'=> 'required|max_length[150]',
        'descripcion'=>'required|max_length[150]',
        'stock' => 'required|max_length[150]',
        'imagen'=> 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]',
        'categorias'=> 'is_not_unique[categoria_producto.id_categoria]',
        ],
    [
        'nombre' => [
            'required'=>'El nombre es requerido',
            'max_length[150]'=> 'el nombre debe tener como máximo 150 caracteres ',
        ],
       
        'precio'=> [
        'required'=>'el precio es requerido',
        'max_length'=> 'el precio debe tener como máximo 150 caracteres',
        ],
        'descripcion'=> [
        'required'=>'La descripcion es requerida',
        'max_length'=> 'La descripcion debe tener como máximo 150 caracteres',
        ],
        'stock' =>[ 
            'required'=> 'el stock es requerido',
            'max_length'=> 'el stock debe tenet como máximo 150 caracteres',
        ],
        'imagen'=>[
            'uploaded'=>'Debe seleccionar una imagen',
            'is_image'=>'Debe ser una imagen valida',
        ],
         
        'categorias'=>[
            'is_not_unique'=>'Debe seleccionar una categoria',

        ]
        ]
    );

    if ($validation->withRequest($request)->run()){
        $img =$this->request->getFile('imagen');
        $nombre_aleatorio =$img->getRandomName();
        $img->move(ROOTPATH.'assets/uploads',$nombre_aleatorio);
        
        $data =[
            'nombre_producto'=>$request->getpost('nombre'),
            'precio_producto'=>$request->getpost('precio') , 
            'estado_producto'=> 1 ,
            'imagen_producto'=>$nombre_aleatorio, 
            'stock_producto' =>$request->getpost('stock'), 
            'categoria_producto'=>$request->getpost('categorias')
        ];
        
        $productos= new Producto_model();
        $productos->insert($data);
        return redirect()->route('agregar')->with('mensaje','El producto se registro correctamente');
    }else{
        $categorias = new Categoria_producto_model();
        $data['validation']=$validation->getErrors();
        $data['categorias']=$categorias->findAll();
        $data['titulo']= 'Agregar Producto';

        return view('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Registrar_producto.php', $data).view('Plantilla/footer_view.php', $data);
    }
 }
    function gestionar_productos(){
        $producto_model = new Producto_model();
        $categorias = new Categorias_producto_model();

        $data['productos']=$producto_model->join('categoria_producto', 'categoria_producto.id_categoria = productos.categoria_producto')->findAll();
        $data['titulo']='Listar Productos';

        return view('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Listar_productos.php', $data).view('Plantilla/footer_view.php', $data);
    }

    function editar_producto($id=null){
        $producto_model = new Producto_model();
        $categorias = new Categorias_producto_model();

        $data['categorias'] = $categorias->findAll();
        $data('productos') = $producto_model-> where('id_producto',$id)->first();
        $data['titulo']='Edicion de productos';

        return view('Plantilla/header_view', $data).view('Plantilla/nav_adm_view', $data).view('Backend/Gestionar_productos.php', $data).view('Plantilla/footer_view.php', $data);
    }

    function actualizar_producto(){
        $request = \Config\Services::request();

         $validation->setRules(
         
        [
        'nombre' => 'required|max_length[150]',
        'precio'=> 'required|max_length[150]',
        'descripcion'=>'required|max_length[150]',
        'stock' => 'required|max_length[150]',
        'imagen'=> 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]',
        'categorias'=> 'is_not_unique[categoria_producto.id_categoria]',
        ],
    [
        'nombre' => [
            'required'=>'El nombre es requerido',
            'max_length[150]'=> 'el nombre debe tener como máximo 150 caracteres ',
        ],
       
        'precio'=> [
        'required'=>'el precio es requerido',
        'max_length'=> 'el precio debe tener como máximo 150 caracteres',
        ],
        'descripcion'=> [
        'required'=>'La descripcion es requerida',
        'max_length'=> 'La descripcion debe tener como máximo 150 caracteres',
        ],
        'stock' =>[ 
            'required'=> 'el stock es requerido',
            'max_length'=> 'el stock debe tenet como máximo 150 caracteres',
        ],
        'imagen'=>[
            'uploaded'=>'Debe seleccionar una imagen',
            'is_image'=>'Debe ser una imagen valida',
        ],
         
        'categorias'=>[
            'is_not_unique'=>'Debe seleccionar una categoria',

        ]
        ]
    );

        $id = $request->getPost('id');

        $data =[
            'nombre_producto'=>$request->getpost('nombre'),
            'precio_producto'=>$request->getpost('precio') , 
            'estado_producto'=> 1 ,
            'imagen_producto'=>$nombre_aleatorio, 
            'stock_producto' =>$request->getpost('stock'), 
            'categoria_producto'=>$request->getpost('categorias')
        ];

        $productos =new Producto_model();
        $productos->update($id,$data);

        return redirect()->route('gestionar')->with('mensaje','El producto se modificó correctamente');
    }

    public function eliminar_producto($id=null){
        $data array('estado_producto'='0');
        $productos new Producto_model();
        $productos->update($id,$data);

         return redirect()->route('gestionar');
    }

    public function activar_producto($id=null){
        $data array('estado_producto'='1');
        $productos new Producto_model();
        $productos->update($id,$data);

         return redirect()->route('gestionar');
    }
}