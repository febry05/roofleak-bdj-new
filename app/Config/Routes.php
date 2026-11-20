<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Dashboard::index');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

// API JSON (baca: semua user login; tulis: admin saja)
$routes->get('api/titik', 'Dashboard::titik');
$routes->post('api/penanganan', 'Dashboard::simpan');
$routes->post('api/tambah', 'Dashboard::tambah');
$routes->post('api/hapus', 'Dashboard::hapus');
$routes->get('api/foto/(:segment)', 'Dashboard::fotoList/$1');
$routes->post('api/foto-upload', 'Dashboard::fotoUpload');
$routes->post('api/foto-hapus', 'Dashboard::fotoHapus');

// Manajemen pengguna (admin saja)
$routes->get('users', 'Users::index');
$routes->post('users/simpan', 'Users::simpan');
$routes->post('users/ubah/(:num)', 'Users::ubah/$1');
$routes->post('users/hapus/(:num)', 'Users::hapus/$1');
