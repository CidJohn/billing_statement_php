<?php

namespace App\Controllers;

class LayoutController
{

    public function navbar()
    {
        $navItem = require __DIR__ . "/../../public/content/NavContent.php";
        $verify = $_SESSION['verify'];
        if ($verify) {
            if (!is_array($navItem)) {
                $navItem = [];
            }
            extract(["navItem" => $navItem]);
        } else {
            $navItem = [[
                'name' => 'Sign in',
                'to' => "/view/login"
            ]];
        }

        include __DIR__ . "/../Views/templates/Navbar/Navbar.php";
    }
}
