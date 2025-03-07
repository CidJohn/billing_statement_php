<?php

namespace App\Models;

use App\Models\Queryscript\Queryscript;

class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        $config = require __DIR__ . '/../config/config.php';

        try {
            $script = new Queryscript($config['dbname'], $config['charset'], $config['host'], $config['user'], $config['password']);
            $this->pdo = $script->dbConn();
            $this->pdo = $script->dbCreate();
            $script->setPdo($this->pdo);
            $script->tblMigrations();
            $script->scripts();
        } catch (\PDOException $ex) {
            die("Database Connection Failed: " . $ex->getMessage());
        }
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }
}
