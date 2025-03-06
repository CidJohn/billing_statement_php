<?php

namespace App\Models\MdlNavbar;

use App\Utils\Serializer;
use PDO;


class MdlNavbar
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkRememberMe()
    {
        if (isset($_COOKIE['remember_me'])) {
            $token = $_COOKIE['remember_me'];

            $sql = "SELECT id, username, email, remember_token, token_expiry 
                FROM users 
                WHERE token_expiry > NOW() 
                LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            if (!$stmt->execute()) {
                print_r($stmt->errorInfo());
            }

            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($token, $user['remember_token'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                ];
                return;
            }
        }
    }

    public function verifyUser($identity): bool
    {
        $stmt = $this->pdo->prepare("SELECT user_identity FROM user_access WHERE user_id = :uid");
        $stmt->execute([
            'uid' => $identity['id']
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            return false;
        }
        $hash_identity = Serializer::toJson($identity);
        if (password_verify($hash_identity, $result['user_identity'])) {
            $_SESSION['verify'] = "1";
            return true;
        }

        return false;
    }
}
