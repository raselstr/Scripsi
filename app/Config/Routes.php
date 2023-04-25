<?php

namespace Config;
// use App\Controllers\Pages;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//route bawaan CI 4 untuk page statis
// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

//route alamat page yg diinput manual
$routes->get('pegawai', 'Dashboard\PegawaiController::index');
$routes->match(['get', 'post'],'pegawai-form','Dashboard\PegawaiController::pegawai_form');
$routes->match(['get', 'post'],'pegawai-form/(:segment)','Dashboard\PegawaiController::pegawai_form/$1');
$routes->delete('pegawai-hapus/(:num)', 'Dashboard\PegawaiController::delete/$1');
// $routes->get('pegawai-hapus/(:num)','Dashboard\PegawaiController::delete/$1');
// $routes->match(['get', 'post'], 'pegawai/tambah','Dashboard\PegawaiController::tambah');
$routes->get('opd', 'Dashboard\OpdController::index');
$routes->get('opd-form', 'Dashboard\OpdController::form');
$routes->get('opd-form/(:segment)', 'Dashboard\OpdController::form/$1');
$routes->post('opd-save', 'Dashboard\OpdController::save');
$routes->delete('opd-hapus/(:num)', 'Dashboard\OpdController::delete/$1');


$routes->get('upload', 'Upload::index');          // Add this line.
$routes->post('upload/upload', 'Upload::upload'); // Add this line.
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
