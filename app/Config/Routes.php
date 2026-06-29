<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/portofolio', 'Home::portofolio');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/reang', 'Home::reang');
$routes->post('/reang', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/proyek', 'Admin::proyek');
$routes->get('/admin/tentang', 'Admin::tentang');
