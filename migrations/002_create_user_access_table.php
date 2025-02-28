<?php

use App\Models\Database;

$pdo = Database::getInstance();

$sql = "
    CREATE TABLE IF NOT EXISTS user_access (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        active VARCHAR(255) NOT NULL,
        user_type VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
";

try {
    $pdo->exec($sql);
    $pdo->exec("INSERT INTO migrations (migration) VALUES ('002_create_user_access_table')");
    echo "Created table: users<br>";
} catch (\PDOException $e) {
    die("Error creating table users: " . $e->getMessage());
}
