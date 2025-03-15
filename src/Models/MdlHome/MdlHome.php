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

    public function tableCol()
    {
        return ['name', 'date', 'action'];
    }

    public function tabsItem()
    {
        return [
            [
                "name" => "Profile",
                "to" => "profile"
            ],
            [
                "name" => "Statement Entry",
                "to" => "statement-entry"
            ],
            [
                "name" => "Daily Monitoring",
                "to" => "monitoring"
            ],
            [
                "name" => "Information",
                "to" => "information"
            ]
        ];
    }

    public function stateForm()
    {
        return [
            [
                "name" => 'Name',
                "id" => "name",
                "type" => "text"
            ],
            [
                "name" => 'Plate Number',
                "id" => "plateno",
                "type" => "text"
            ],
            [
                "name" => 'Billing Number',
                "id" => "billNum",
                "type" => "number"
            ],
            [
                "name" => 'Assigned Route',
                "id" => "rtAssigned",
                "type" => "text"
            ],
            [
                "name" => 'Number of Trips',
                "id" => "numTrips",
                "type" => "number"
            ],
            [
                "name" => 'Amount',
                "id" => "numAmount",
                "type" => "number"
            ],
            [
                "name" => 'Billing Date',
                "id" => "billdate",
                "type" => "date"
            ],
            [
                "name" => 'From',
                "id" => "dptFrom",
                "type" => "date"
            ],
            [
                "name" => 'To',
                "id" => "dptTo",
                "type" => "date"
            ]
        ];
    }
}
