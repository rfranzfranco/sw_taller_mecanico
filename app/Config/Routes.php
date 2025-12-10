<?php

namespace Config;

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
$routes->setAutoRoute(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/login', 'Auth::index', ['filter' => 'noauth']);
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout'); // Mover fuera del grupo o manejar filtro

// Rutas protegidas (Usuario logueado)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Home::index');

    // --- Módulo de Reservas ---
    $routes->get('/reservas/nueva', 'Reservas::crear');       // Formulario reservar
    $routes->post('/reservas/guardar', 'Reservas::guardar');  // Guardar datos
    $routes->get('/reservas/mis-reservas', 'Reservas::listarPorCliente');

    // --- Módulo de Vehículos ---
    $routes->get('/vehiculos', 'Vehiculos::index');
    $routes->post('/vehiculos/agregar', 'Vehiculos::agregar');

    // --- Módulo de Inventario (Solo Admin - podrías agregar otro filtro aquí) ---
    $routes->get('/inventario', 'Inventario::index');
    $routes->post('/inventario/actualizar', 'Inventario::update');

    // --- Facturación ---
    $routes->get('/facturacion', 'Facturas::index');
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
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
