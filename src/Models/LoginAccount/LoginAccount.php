<?php

namespace App\Models\LoginAccount;

use App\Enums\ErrorCodes;
use App\Utils\Serializer;
use PDO;
use PDOException;

class LoginAccount
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function createTable(PDO $pdo)
    {
        $pdo->exec("
                CREATE TABLE IF NOT EXISTS user_access (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL UNIQUE,
                user_identity VARCHAR(255) NOT NULL,
                status VARCHAR(255) NOT NULL,
                user_type VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ");
    }

    public function getEmailExist($email, $pass): ?array
    {
        $sql = "SELECT id, username, password, email FROM users WHERE email= :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":email" => $email,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($pass, $user['password'])) {
            return [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];
        }
        return [ErrorCodes::USER_EXISTS->getMessage()];
    }

    public function getUserExists($id): ?bool
    {
        $sql = "SELECT user_id, user_identity FROM user_access WHERE user_id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $user = $stmt->execute([
            ":id" => $id,
        ]);

        return $stmt->fetchColumn() > 0;
    }


    public function rememberMeToken($id)
    {
        $token = bin2hex(random_bytes(32));
        $expires  = time() + (30 * 24 * 60 * 60);

        $sql = "UPDATE users SET remember_token = :token, token_expiry = FROM_UNIXTIME(:expiry) WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':token' => password_hash($token, PASSWORD_BCRYPT),
            ':expiry' => $expires,
            ':id' => $id
        ]);
        setcookie("remember_me", $token, $expires, "/", "", true, true);
    }

    public function userCredVerification($email, $pass, $rememberMe)
    {
        $this->createTable($this->pdo);

        $sql = "INSERT INTO user_access (user_id,user_identity,status,user_type) VALUES (:user_id,:user_identity,:status,:user_type) ";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = ErrorCodes::INVALID_EMAIL->getMessage();
            header("Location: /view/login");
        }
        try {
            $getuser = $this->getEmailExist($email, $pass);
            $userExist = $this->getUserExists($getuser['id']);

            if (!$getuser) {
                $_SESSION['error'] = $getuser;
                header("Location: /view/login");
                exit();
            }
            $identity = Serializer::toJson($getuser);
            if ($userExist) {
                $_SESSION['error'] = ErrorCodes::DUPLICATE_ENTRY->getMessage();
                $this->rememberMeToken($getuser['id']);
                header("Location: /view/login");
                exit();
            }
            if ($rememberMe) {
                $this->rememberMeToken($getuser['id']);
            }

            $hash_identity = password_hash($identity, PASSWORD_BCRYPT);
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute([
                ':user_id' => $getuser['id'],
                ':user_identity' => $hash_identity,
                ':status' => 'ACTIVE',
                ':user_type' => 'CUSTOMER'
            ]);

            if (!$result) {
                $_SESSION['error'] = ErrorCodes::INVALID_EMAIL->getMessage();
                header("Location: /view/login");
                exit;
            }
        } catch (PDOException $ex) {
            die(ErrorCodes::DUPLICATE_ENTRY->getMessage());
        }
    }
}
