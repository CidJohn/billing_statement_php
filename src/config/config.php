<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
return  [
    'host' => $_ENV['DB_HOST'],
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
    'charset' => $_ENV['DB_CHARSET'],
];
