<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::login');
$routes->get('/home/coba-parameter/(:alpha)/(:num)/(:alphanum)', 'home::belajar_segment/$1/$2/$3');
$routes->get('/percabangan', 'Home::percabangan');
$routes->get('/perulangan', 'Home::perulangan');
$routes->get('/admin/login-admin', 'Admin::login');
$routes->get('/admin/dashboard-admin', 'Admin::dashboard');
$routes->post('/admin/autentikasi-login', 'Admin::autentikasi');
$routes->get('/admin/logout', 'Admin::logout');
//routes module admin
$routes->get('/admin/master-data-admin', 'Admin::master_data_admin');
$routes->get('/admin/input-data-admin', 'Admin::input_data_admin');
$routes->post('/admin/simpan-admin', 'Admin::simpan_data_admin');
$routes->get('/admin/edit-data-admin/(:alphanum)', 'Admin::edit_data_admin/$1');
$routes->post('/admin/update-admin', 'Admin::update_data_admin');
$routes->get('/admin/hapus-data-admin/(:alphanum)', 'Admin::hapus_data_admin/$1');
//routes module anggota
$routes->get('anggota/master-data-anggota', 'Anggota::master_data_anggota');
$routes->get('anggota/input-data-anggota', 'Anggota::input_data_anggota');
$routes->post('anggota/simpan-data-anggota', 'Anggota::simpan_data_anggota');
$routes->get('anggota/edit-data-anggota/(:segment)', 'Anggota::edit_data_anggota/$1');
$routes->post('anggota/update-data-anggota', 'Anggota::update_data_anggota');
$routes->get('anggota/hapus-data-anggota/(:segment)', 'Anggota::hapus_data_anggota/$1');
//buku
$routes->get('/admin/master-buku', 'Admin::master_buku');
$routes->get('/admin/edit-buku/(:alphanum)', 'Admin::edit_buku/$1');
$routes->post('/admin/update-buku', 'Admin::update_buku');
$routes->get('/admin/hapus-buku/(:alphanum)', 'Admin::hapus_buku/$1');
$routes->get('/admin/input-buku', 'Admin::input_buku');
$routes->post('/admin/simpan-buku', 'Admin::simpan_buku');
// --- Rute untuk Modul Rak ---
$routes->get('rak/master-data-rak', 'Rak::master_data_rak');
$routes->get('rak/input-data-rak', 'Rak::input_data_rak');
$routes->post('rak/simpan-data-rak', 'Rak::simpan_data_rak');
$routes->get('rak/edit-data-rak/(:segment)', 'Rak::edit_data_rak/$1');
$routes->post('rak/update-data-rak', 'Rak::update_data_rak');
$routes->get('rak/hapus-data-rak/(:segment)', 'Rak::hapus_data_rak/$1');

// --- Rute untuk Modul Kategori ---
$routes->get('kategori/master-data-kategori', 'Kategori::master_data_kategori');
$routes->get('kategori/input-data-kategori', 'Kategori::input_data_kategori');
$routes->post('kategori/simpan-data-kategori', 'Kategori::simpan_data_kategori');
$routes->get('kategori/edit-data-kategori/(:segment)', 'Kategori::edit_data_kategori/$1');
$routes->post('kategori/update-data-kategori', 'Kategori::update_data_kategori');
$routes->get('kategori/hapus-data-kategori/(:segment)', 'Kategori::hapus_data_kategori/$1');

