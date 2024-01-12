<?php

use CodeIgniter\Router\RouteCollection;
$routes->setDefaultController('Usuarios');
/**
 * @var RouteCollection $routes
 */

//Rotas GET
$routes->get('/', 'Usuarios::index');
$routes->get('/listarDados', 'Usuarios::listarDados');
$routes->get('/listarPorId/(:any)', 'Usuarios::listarPorId/$1');
$routes->get('/editar/(:any)', 'Usuarios::editar/$1');
$routes->get('/excluir/(:any)', 'Usuarios::excluir/$1');

//Rotas POST
$routes->post('/inserir', 'Usuarios::inserir'); 
$routes->post('/atualizar/(:any)', 'Usuarios::atualizar/$1');

