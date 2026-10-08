<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('mahasiswa', 'Mahasiswa::index');

$routes->get('mahasiswa/tambah', 'Mahasiswa::tambah');

$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');

$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');


$routes->get('mahasiswa/hapus/(:num)', 'Mahasiswa::hapus/$1');

$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->get('logout', 'Login::logout');