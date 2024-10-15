<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// register & login
$routes->post('/user/register', 'UserController::create');
$routes->post('/user/login', 'UserController::login');

// Profile
$routes->post('/user/profile', 'UserController::addUserProfile');
$routes->get('/user/profile', 'UserController::getUserProfile');

$routes->get('/travel', 'TravelController::show');
$routes->get('/travel/(:num)', 'TravelController::getById/$1');

