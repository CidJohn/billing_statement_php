<?php

use App\Models\Database;

$pdo = Database::getInstance();

$sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        plate_no VARCHAR(100) NOT NULL,
        assign_route VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
";

try {
    $pdo->exec($sql);
    $pdo->exec("INSERT INTO migrations (migration) VALUES ('001_create_users_table')");
    echo "Created table: users<br>";
} catch (\PDOException $e) {
    die("Error creating table users: " . $e->getMessage());
}
