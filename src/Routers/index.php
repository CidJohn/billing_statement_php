<?php

use App\Controllers\AuthController;
use App\Controllers\BillingListController;
use App\Controllers\HomeController;
use App\Router;

$router = new Router();

//GET
$router->get('/', HomeController::class, 'home');
$router->get('/view/create-account', AuthController::class, 'viewRegistration');
$router->get('/view/login', AuthController::class, 'viewLogin');
$router->get('/logout', AuthController::class, 'signOutAccount');
$router->get('/view/billing-list', BillingListController::class, 'viewBillingList');

//POST
$router->post('/create-account', AuthController::class, 'createAccout');
$router->post('/login-account', AuthController::class, 'signInAccount');
$router->post('/logout', AuthController::class, 'signOutAccount');


$router->dispatch();
