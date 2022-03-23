<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->match(['get', 'post'], '/', 'Auth::login');

$routes->get('/home', 'Home::index');

$routes->get('/auth/logout', 'Auth::logout');

//buat data member

$routes->get('/master/tambah-member', 'DataMaster::create');

$routes->get('/master/index', 'DataMaster::index');

$routes->get('/master/edit-member/(:segment)', 'DataMaster::edit/$1');

$routes->delete('/master/index/(:num)', 'DataMaster::delete/$1');


//buat data proyek

$routes->get('/master/tambah-proyek', 'DataMaster::createProyek');

$routes->get('/master/data-proyek', 'DataMaster::dataProyek');

$routes->get('/master/edit-proyek/(:segment)', 'DataMaster::editProyek/$1');

$routes->delete('/master/data-proyek/(:num)', 'DataMaster::deleteProyek/$1');

$routes->get('/master/detail-proyek/(:any)', 'DataMaster::detailProyek/$1');

//buat data prospek

$routes->get('/master/tambah-prospek', 'DataMaster::createProspek');

$routes->get('/master/data-prospek', 'DataMaster::dataProspek');

$routes->get('/master/edit-prospek/(:segment)', 'DataMaster::editProspek/$1');

$routes->delete('/master/data-prospek/(:num)', 'DataMaster::deleteProspek/$1');

//buat data komisi
$routes->get('/komisi/index', 'Komisi::index');

$routes->get('/komisi/edit-komisi/(:segment)', 'Komisi::editKomisi/$1');

//buat data profile


$routes->get('/dashboard/profile', 'Home::Profile');

$routes->get('/dashboard/edit-profile/(:segment)', 'Home::editProfile/$1');


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
