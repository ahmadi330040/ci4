<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Halaman Website
$routes->get('/', 'Pages::index');
$routes->get('/produk', 'Pages::produk');
$routes->get('/contact', 'Pages::contact');
$routes->get('/panduan', 'Pages::panduan');
$routes->get('/blog', 'Pages::blog');
$routes->get('/blog-detail', 'Pages::blogDetail');

// Halaman admin
$routes->get('/admin', 'Admin/Home::index');

$routes->get('/admin/blog', 'Admin/Blog::index');

$routes->get('/admin/panduan-deposit', 'Admin/PanduanDeposit::index');
$routes->get('/admin/tambah-panduan-deposit', 'Admin/PanduanDeposit::tambahPanduan');

$routes->get('/admin/panduan-transaksi', 'Admin/PanduanTransaksi::index');
$routes->delete('/admin/panduan-transaksi/(:num)', 'Admin/PanduanTransaksi::delete/$1');
$routes->get('/admin/tambah-panduan-transaksi', 'Admin/PanduanTransaksi::tambahPanduan');
$routes->post('/tambah-panduan-transaksi/save', 'Admin/PanduanTransaksi::save');




// $routes->get('/komik/create', 'Komik::create');
// $routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
// $routes->delete('/komik/(:num)', 'Komik::delete/$1');
// $routes->get('/komik/(:any)', 'Komik::detail/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
