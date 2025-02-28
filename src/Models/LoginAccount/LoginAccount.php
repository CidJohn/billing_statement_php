<?php

namespace App\Models\LoginAccount;

use App\Enums\ErrorCodes;

class LoginAccount
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function createTable(\PDO $pdo)
    {
        $pdo->exec("
                CREATE TABLE IF NOT EXISTS user_access (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                username VARCHAR(100) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                active VARCHAR(255) NOT NULL,
                user_type VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ");
    }
    
}
