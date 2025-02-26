<?php
require 'vendor/autoload.php';

use App\Models\Database;

$db = Database::getInstance();

$command = $argv[1] ?? null;

if ($command === "migrate") {

    $appliedMigrations = [];
    $stmt = $db->query("SELECT migration FROM migrations");
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $appliedMigrations[] = $row['migration'];
    }

    $migrationFiles = glob(__DIR__ . '/migrations/[0-9]*_*.php');
    foreach ($migrationFiles as $file) {
        $migrationName = basename($file, ".php");
        if (!in_array($migrationName, $appliedMigrations)) {
            require $file;
        }
    }

    echo "All migrations executed successfully!\n";
} elseif ($command === "rollback") {

    $stmt = $db->query("SELECT migration FROM migrations ORDER BY id DESC LIMIT 1");
    $lastMigration = $stmt->fetchColumn();

    if ($lastMigration) {
        $rollbackFile = __DIR__ . "/migrations/rollback_" . str_replace("create_", "drop_", $lastMigration) . ".php";
        if (file_exists($rollbackFile)) {
            require $rollbackFile;
            echo "Rolled back: $lastMigration\n";
        } else {
            echo "No rollback file found for: $lastMigration\n";
        }
    } else {
        echo "No migrations to roll back.\n";
    }
} else {
    echo "Usage: php setup.php [migrate|rollback]\n";
}
