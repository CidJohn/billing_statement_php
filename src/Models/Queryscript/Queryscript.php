<?php

namespace App\Models\Queryscript;

use App\Models\CreateAccount\CreateAccount;
use App\Models\LoginAccount\LoginAccount;
use PDO;

class Queryscript
{
    private $pdo, $dbname, $charset, $host, $user, $pass;

    public function __construct($dbname, $charset, $host, $user, $pass)
    {
        $this->dbname = $dbname;
        $this->charset = $charset;
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function dbConn()
    {
        $dsn = "mysql:host={$this->host};charset={$this->charset}";
        $this->pdo = new \PDO($dsn, $this->user, $this->pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }

    public function dbCreate()
    {
        $this->pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->dbname} CHARACTER SET {$this->charset}");
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        $this->pdo = new \PDO($dsn, $this->user, $this->pass);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }
    public function tblMigrations()
    {
        $this->pdo->exec("
                CREATE TABLE IF NOT EXISTS migrations (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    migration VARCHAR(255) NOT NULL,
                    applied_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                );
            ");
    }

    public function scripts()
    {
        LoginAccount::createTable($this->pdo);
        CreateAccount::createTable($this->pdo);
    }
}
