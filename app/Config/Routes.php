<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->post('/sign-in', 'Authenticate::auth');
$routes->get('/forgot-password', 'Authenticate::forgotPassword');
$routes->get('/recover-password', 'Authenticate::recoverPassword');


$routes->group('', ['filter' => 'MenuDataFilter'], static function ($routes) {
  $routes->get('/dashboard', 'Home::dashboard');
  $routes->get('/role', 'AdminController::role');
  $routes->get('/menu', 'AdminController::menu');
  $routes->get('/user', 'AdminController::user');
  $routes->get('/profile', 'AdminController::profile');
});


$routes->post('/menu', 'AdminController::menu');
$routes->post('/menu-edit', 'AdminController::menuEdit');
$routes->get('/all-menu', 'AdminController::getParentMenu');
$routes->get('/menu-id', 'AdminController::getMenuById');
$routes->get('/logout', 'Authenticate::logout');


$routes->post('/role', 'AdminController::role');
$routes->get('/role-id', 'AdminController::getRoleById');
$routes->post('/role-edit', 'AdminController::roleEdit');
$routes->get('/edit-menu-mapping', 'AdminController::editMenuMapping');


$routes->post('/user', 'AdminController::user');
$routes->post('/user-edit', 'AdminController::userEdit');
$routes->get('/user-access-edit', 'AdminController::userAccessEdit');
$routes->get('/user-edit', 'AdminController::userDataEdit');



//Routes for API
$routes->post('/api/v1/auth','Api\Api::Login');
$routes->post('/api/v1/reset-password','Api\Api::resetPassword');

$routes->set404Override(static function () {
  echo view('errors/html/error_404.php');
});
