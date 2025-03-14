<?php

namespace App\Models\MdlHome;

use PDO;

class MdlHome
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function GetUserInfo($userid): ?array
    {
        $stmt = $this->pdo->prepare("SELECT username, plate_no, email FROM users WHERE id = :userid;");
        $stmt->execute([':userid' => $userid]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $userInfo = [
                [
                    'Name' => $result['username'],
                    'Plate No' => $result['plate_no'],
                    'email' => $result['email']
                ]
            ];
            return $userInfo;
        }
        return null;
    }
}
