<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/sign-in', 'Authenticate::auth');
$routes->post('/sign-in', 'Authenticate::auth');
$routes->get('/forgot-password', 'Authenticate::forgotPassword');
$routes->get('/recover-password', 'Authenticate::recoverPassword');


$routes->group('', ['filter' => 'MenuDataFilter'], static function ($routes) {
  $routes->get('/dashboard', 'Home::index');
  $routes->get('/role', 'AdminController::role');
  $routes->get('/menu', 'AdminController::menu');
  $routes->get('/user', 'AdminController::user');
  $routes->get('/profile', 'AdminController::profile');
  $routes->get('/causes', 'AdminController::causes');
  $routes->get('/cause-create', 'AdminController::causeCreate');
  $routes->get('/cause-edit/(:any)', 'AdminController::causeEdit/$1');
  $routes->get('/slider', 'AdminController::slider');
  $routes->get('/event', 'AdminController::events');
  $routes->get('/event-edit/(:any)', 'AdminController::eventEdit/$1');
  $routes->get('/contacts', 'AdminController::contacts');
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


$routes->post('/cause-create', 'AdminController::causeCreate');
$routes->post('/cause-edit-action', 'AdminController::causeEditAction');
$routes->get('/cause-view', 'AdminController::causeView');

$routes->post('/slider', 'AdminController::slider');

$routes->post('/event', 'AdminController::events');
$routes->post('/event-edit', 'AdminController::eventEditAction');
$routes->get('/event-view', 'AdminController::eventView');

$routes->post('/contacts', 'AdminController::contacts');

$routes->get('/', 'FrontendController::index');
$routes->get('/about', 'FrontendController::about');
$routes->get('/teams', 'FrontendController::team');
$routes->get('/blog', 'FrontendController::blog');
$routes->get('/contact', 'FrontendController::contact');
$routes->get('/donate', 'FrontendController::donate');
$routes->get('/events', 'FrontendController::event');
$routes->get('/cause-details/(:any)', 'FrontendController::causeDetails/$1');
$routes->get('/event-details/(:any)', 'FrontendController::eventDetails/$1');

$routes->set404Override(static function () {
  echo view('errors/html/error_404.php');
});
