<?php

namespace App\Models\CreateAccount;

use App\Enums\ErrorCodes;


class CreateAccount
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function createTable(\PDO $pdo)
    {
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                plate_no VARCHAR(100) NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ");
    }

    public function emailExist($email): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    public function createUser($fname, $lname, $mname, $plateno, $email, $password, $cpass)
    {
        $this->createTable($this->pdo);
        $symbolPattern = '/[^a-zA-Z0-9 ]/';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = ErrorCodes::INVALID_EMAIL->getMessage();
            header("Location: /view/create-account");
        }
        if (strlen($password) < 6) {
            $_SESSION['error'] = ErrorCodes::WEAK_PASSWORD->getMessage();
            header("Location: /view/create-account");
        }
        if (preg_match($symbolPattern, $password)) {
            $_SESSION['error'] = ErrorCodes::CONTAIN_SYMBOLS->getMessage();
            header("Location: /view/create-account");
        }
        if ($password === $cpass) {
            $_SESSION['error'] = ErrorCodes::NOT_MATCH_PASSWORD->getMessage();
            header("Location: /view/create-account");
        }

        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        try {
            if ($this->emailExist($email)) {
                $_SESSION['error'] = ErrorCodes::USER_EXISTS->getMessage();
                header("Location: /view/create-account");
                exit;
            }
            $stmt = $this->pdo->prepare("INSERT INTO users (username, plate_no,email, password) VALUES (:username,:plateno,:email,:pass)");
            $stmt->execute([
                ':username' => trim("$fname $mname $lname"),
                ':plateno' => $plateno,
                ':email' => $email,
                ':pass' => $hash_pass
            ]);
        } catch (\PDOException $ex) {
            die(ErrorCodes::DATABASE_ERROR->getMessage());
        }
    }
}
