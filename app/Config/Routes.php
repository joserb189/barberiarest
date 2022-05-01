<?php namespace Config;

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
$routes->setDefaultNamespace('A pp\Controllers');
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
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');

$routes->group('api', ['namespace' => 'App\Controllers\API', 'filter' => 'authFilter'], function($routes) {
    
    $routes->get('clientes/create', 'Clientes::index');
    $routes->post('clientes/create', 'Clientes::create');
    $routes->get('clientes/edit/(:num)', 'Clientes::edit/$1');
    $routes->put('clientes/update/(:num)', 'Clientes::update/$1');
    $routes->delete('clientes/delete/(:num)', 'Clientes::delete/$1');

    $routes->get('barberia', 'Barberia::index');
    $routes->post('barberia/create', 'Barberia::create');
    $routes->get('barberia/edit/(:num)', 'Barberia::edit/$1');
    $routes->put('barberia/update/(:num)', 'Barberia::update/$1');
    $routes->delete('barberia/delete/(:num)', 'Barberia::delete/$1');

    $routes->get('citas', 'Citas::index');
    $routes->post('citas/create', 'Citas::create');
    $routes->get('citas/edit/(:num)', 'Citas::edit/$1');
    $routes->put('citas/update/(:num)', 'Citas::update/$1');
    $routes->delete('citas/delete/(:num)', 'Citas::delete/$1');

    $routes->get('barbero', 'Barberos::index');
    $routes->post('barbero/create', 'Barberos::create');
    $routes->get('Barbero/edit/(:num)', 'Barberos::edit/$1');
    $routes->put('barbero/update/(:num)', 'barberos::update/$1');
    $routes->delete('barbero/delete/(:num)', 'Barbero::delete/$1');

    
    $routes->get('barberos/cliente/(:num)', 'Barberos::getBarberosByCliente/$1');





});

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
 *
 */

 if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
     require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
 }