<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/portofolio', 'Home::portofolio');
$routes->get('/tentang', 'Home::tentang');
