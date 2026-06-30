<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/portofolio', 'Home::portofolio');
$routes->get('/portofolio/detail/(:num)', 'Home::detail/$1');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/reang', 'Home::reang');
$routes->post('/reang', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/proyek', 'Admin::proyek');
$routes->get('/admin/proyek/tambah', 'Admin::tambahProyek');
$routes->post('/admin/proyek/simpan', 'Admin::simpanProyek');
$routes->get('/admin/proyek/edit/(:num)', 'Admin::editProyek/$1');
$routes->post('/admin/proyek/update/(:num)', 'Admin::updateProyek/$1');
$routes->post('/admin/proyek/hapus/(:num)', 'Admin::hapusProyek/$1');
$routes->get('/admin/tentang', 'Admin::tentang');
