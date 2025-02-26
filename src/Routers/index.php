<?php

use App\Controllers\CreateAccController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Router;

$router = new Router();

//GET
$router->get('/', HomeController::class, 'home');
$router->get('/view/create-account', CreateAccController::class, 'createView');
$router->get('/view/login', LoginController::class, 'signinView');

//POST
$router->post('/create-account', CreateAccController::class, 'createAccount');

$router->dispatch();
