<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/portofolio', 'Home::portofolio');
$routes->get('/portofolio/detail/(:num)', 'Home::detail/$1');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/cv-latest', 'Home::cvLatest');
$routes->get('/admin', 'Home::login');
$routes->post('/admin', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/proyek', 'Admin::proyek');
$routes->get('/admin/proyek/tambah', 'Admin::tambahProyek');
$routes->post('/admin/proyek/simpan', 'Admin::simpanProyek');
$routes->get('/admin/proyek/edit/(:num)', 'Admin::editProyek/$1');
$routes->post('/admin/proyek/update/(:num)', 'Admin::updateProyek/$1');
$routes->post('/admin/proyek/hapus/(:num)', 'Admin::hapusProyek/$1');
$routes->get('/admin/tentang', 'Admin::tentang');
$routes->post('/admin/tentang/updateProfil', 'Admin::updateProfil');
$routes->post('/admin/tentang/updateCV', 'Admin::updateCV');
$routes->post('/admin/tentang/tambahSkill', 'Admin::tambahSkill');
$routes->post('/admin/tentang/updateSkill/(:num)', 'Admin::updateSkill/$1');
$routes->post('/admin/tentang/hapusSkill/(:num)', 'Admin::hapusSkill/$1');
$routes->post('/admin/tentang/tambahKarir', 'Admin::tambahKarir');
$routes->post('/admin/tentang/updateKarir/(:num)', 'Admin::updateKarir/$1');
$routes->post('/admin/tentang/hapusKarir/(:num)', 'Admin::hapusKarir/$1');
$routes->get('/admin/pengaturan', 'Admin::pengaturan');
$routes->post('/admin/pengaturan/update', 'Admin::updatePengaturan');
