<?php

use App\Models\Database;

$pdo = Database::getInstance();

$sql = "DROP TABLE IF EXISTS users;";

try {
    $pdo->exec($sql);
    $pdo->exec("DELETE FROM migrations WHERE migration = '001_create_users_table'");
    echo "Dropped table: users<br>";
} catch (\PDOException $e) {
    die("Error dropping table users: " . $e->getMessage());
}
