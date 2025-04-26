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