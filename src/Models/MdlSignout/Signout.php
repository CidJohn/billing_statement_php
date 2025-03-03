<?php

namespace App\Models\MdlSignout;

use App\Utils\Session;
use PDO;

class Signout
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function signOutAccount($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM user_access WHERE user_id = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        Session::destroy();

        if (isset($_COOKIE['remember_me'])) {
            setcookie('remember_me', '', time() - 3600, "/");
        }
    }
}
