<?php

use App\Models\Database;

$pdo = Database::getInstance();

$sql = "DROP TABLE IF EXISTS user_access;";

try {
    $pdo->exec($sql);
    $pdo->exec("DELETE FROM migrations WHERE migration = '002_create_user_access_table'");
    echo "Dropped table: users<br>";
} catch (\PDOException $e) {
    die("Error dropping table users: " . $e->getMessage());
}
