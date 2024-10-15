<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/user/register', 'UserController::create');
$routes->post('/user/login', 'UserController::login');

$routes->get('/travel', 'TravelController::show');
$routes->get('/travel/(:num)', 'TravelController::getById/$1');

