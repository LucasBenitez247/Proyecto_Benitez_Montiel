<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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
$routes->post('user_admin', 'Usuarios_controller::admin');