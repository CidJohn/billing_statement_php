<?php

namespace App\Models;

use PDO;

class CreateAccount
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $this->pdo->exec("
         CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            plate_no VARCHAR(100) NOT NULL,
            assign_route VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ");
    }
    public function createUser($email, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email,:pass)");

        $stmt->execute([
            ':email' => $email,
            ':pass' => $password
        ]);
    }
}
