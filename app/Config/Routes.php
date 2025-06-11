<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('home_adm', 'Home::index_adm');

$routes->get('nosotros', 'Home::somos');
$routes->get('comercio', 'Home::comercializacion');
$routes->get('contacto', 'Home::info');
$routes->get('terminos_usos', 'Home::terminos');
$routes->get('productos', 'Home::productos');
$routes->get('productos/(:segment)', 'Home::categoria/$1');
$routes->get('login', 'Home::login');
$routes->get('carrito', 'Home::carrito');
$routes->get('registro', 'Home::registro');

$routes->get('contacto', 'Home::info');
$routes->post('consulta', 'Consulta_Controller::add_consulta');

$routes->get('registro', 'Usuarios_controller::registro');
$routes->post('registro_usuario', 'Usuarios_controller::add_cliente');

$routes->get('login_cliente', 'Usuarios_controller::login');
$routes->post('verificar_usuario', 'Usuarios_controller::buscar_usuario');

$routes->get('logout', 'Usuarios_controller::cerrar_sesion');
$routes->get('user_admin', 'Usuarios_controller::admin');

$routes->get('consultas', 'Home::consultas');
$routes->get('registro_producto', 'Home::registro_producto');
$routes->get('listar_ventas', 'Home::listar_ventas');
$routes->get('listar_productos', 'Home::Listar_productos');
$routes->get('gestionar_productos', 'Home::Gestionar_productos');

$routes->get('agregar', 'Producto_Controller::form_add_producto');
$routes->post('registrar_producto', 'Producto_Controller::add_producto');

$routes->get('gestionar', 'Producto_Controller::gestionar_productos', ['as' => 'gestionar_producto']);
$routes->get('listar', 'Producto_Controller::Listado_productos');

$routes->get('productos', 'Producto_Controller::Listar_productos');

$routes->get('editar/(:num)', 'Producto_Controller::editar_producto/$1');
$routes->post('actualizar/(:num)', 'Producto_Controller::actualizar_producto/$1');

$routes->get('eliminar/(:num)', 'Producto_Controller::eliminar_producto/$1', ['as' => 'eliminar']);
$routes->get('activar/(:num)', 'Producto_Controller::activar_producto/$1', ['as' => 'activar']);

$routes->get('ver_carrito', 'Carrito_Controller::ver_carrito');
$routes->post('add_cart', 'Carrito_Controller::agregar_carrito');

$routes->get('eliminar_item/(:any)', 'Carrito_Controller::borrar/$1');
$routes->get('vaciar_carrito/(:any)', 'Carrito_Controller::borrar/$1');

$routes->post('guardar_venta', 'Carrito_controller::guardar_venta');
$routes->get('ventas', 'Carrito_Controller::procesar_checkout');