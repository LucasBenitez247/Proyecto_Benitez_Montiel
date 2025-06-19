<?php

namespace App\Controllers;

class Home extends BaseController
{
   
    public function index(): string
    {
        $data['titulo']="Principal";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Inicio.php').view('Plantilla/footer_view.php');
    }
     public function index_adm(): string
    {
        $data['titulo']="Principal";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_adm_view.php').view('Contenido/Inicio.php').view('Plantilla/footer_view.php');
    }
    public function somos(): string
    {
        $data['titulo']="Quienes somos";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Quienes_somos.php').view('Plantilla/footer_view.php');
    }
    public function comercializacion(): string
    {
        $data['titulo']="Comercialización";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Comercialización.php').view('Plantilla/footer_view.php');
    }
    public function info(): string
    {
        $data['titulo']="Contacto";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/contacto.php').view('Plantilla/footer_view.php');
    }
    public function terminos(): string 
    {
        $data['titulo']="Contacto";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Terminos_usos.php').view('Plantilla/footer_view.php');
    }
    public function productos(): string 
    {
        $data['titulo'] = "Todos los Productos";
        $data['categoria'] = "todos";
        $producto_model = new \App\Models\Producto_model();
        $data['productos'] = $producto_model
        ->where('estado_producto', 1)
        ->where('stock_producto >', 0)
        ->findAll();
        return view('Plantilla/header_view.php', $data)
        .view('Plantilla/nav_view.php')
        . view('Contenido/Catalogo_producto.php', $data)
        . view('Plantilla/footer_view.php');
    }

public function categoria($nombreCategoria): string 
{
    $data['titulo'] = ucfirst($nombreCategoria);
    $data['categoria'] = $nombreCategoria;

    // Buscar la categoría en la base de datos
    $categoria_model = new \App\Models\Categoria_producto_model();
    $categoria = $categoria_model->where('nombre_categoria', $nombreCategoria)->first();

    $producto_model = new \App\Models\Producto_model();

    if ($categoria) {
        // Si existe la categoría, filtra los productos por esa categoría
        $data['productos'] = $producto_model
            ->where('estado_producto', 1)
            ->where('stock_producto >', 0)
            ->where('categoria_producto', $categoria['id_categoria'])
            ->findAll();
    } else {
        // Si no existe la categoría, no muestra productos
        $data['productos'] = [];
    }

    return view('Plantilla/header_view.php', $data)
        .view('Plantilla/nav_view.php')
        .view('Contenido/Catalogo_producto.php', $data)
        .view('Plantilla/footer_view.php');
}
    public function login(): string 
    {
        $data['titulo']="Login";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Login.php').view('Plantilla/footer_view.php');
    }
    public function carrito(): string 
    {
        $data['titulo']="Carrito";
        return view('Plantilla/header_view.php',$data)
        .view('Plantilla/nav_view.php')
        .view('Contenido/Carrito_view.php')
        .view('Plantilla/footer_view.php');
    }
    public function registro(): string 
    {
        $data['titulo']="Registrar";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Registrar.php').view('Plantilla/footer_view.php');
    }



     public function consultas(): string 
    {
        $data['titulo']="Consultas";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_adm_view.php').view('Backend/Ver_consultas.php').view('Plantilla/footer_view.php');
    }
    public function registro_producto(): string 
    {
        $data['titulo']="Registrar Productos";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_adm_view.php').view('Backend/Registrar_producto.php').view('Plantilla/footer_view.php');
    }

    public function listar_productos(): string 
    {
        $data['titulo']="Listar Productos";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_adm_view.php').view('Backend/Listar_productos.php').view('Plantilla/footer_view.php');
    }
    public function gestionar_productos(): string 
    {
        $data['titulo']="Gestionar Productos";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_adm_view.php').view('Backend/Gestionar_productos.php').view('Plantilla/footer_view.php');
    }
}
