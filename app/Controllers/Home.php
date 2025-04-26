<?php

namespace App\Controllers;

class Home extends BaseController
{
   
    public function index(): string
    {
        $data['titulo']="Principal";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Inicio.php').view('Plantilla/footer_view.php');
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
        return view('Plantilla/header_view.php', $data)
        .view('Plantilla/nav_view.php')
        . view('Contenido/Producto.php', $data)
        . view('Plantilla/footer_view.php');
    }
    public function categoria($nombreCategoria): string 
    {
        $data['titulo'] = ucfirst($nombreCategoria);
        $data['categoria'] = $nombreCategoria;
        return view('Plantilla/header_view.php', $data)
        .view('Plantilla/nav_view.php')
        .view('Contenido/Producto.php', $data)
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
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Carrito.php').view('Plantilla/footer_view.php');
    }
    public function registro(): string 
    {
        $data['titulo']="Registrar";
        return view('Plantilla/header_view.php',$data).view('Plantilla/nav_view.php').view('Contenido/Registrar.php').view('Plantilla/footer_view.php');
    }
}
