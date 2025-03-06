<?php

use Dotenv\Dotenv;

require_once __DIR__ . '/../../vendor/autoload.php';

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();
return  [
    'host' => $_ENV['DB_HOST'] ?? 'sql301.infinityfree.com',
    'dbname' => $_ENV['DB_DATABASE'] ?? 'if0_38392112_billing_statement_db',
    'user' => $_ENV['DB_USERNAME'] ?? 'if0_38392112',
    'password' => $_ENV['DB_PASSWORD'] ?? 'ornNy7BHuxu',
    'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
];
