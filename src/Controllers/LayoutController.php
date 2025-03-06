<?php

namespace App\Controllers;

class LayoutController
{

    public function navbar()
    {
        $navItem = require __DIR__ . "/../content/NavContent.php";
        $verify = $_SESSION['verify'];
        if (!$verify) {
            $navItem = [[
                'name' => 'Sign in',
                'to' => "/view/login"
            ]];
        }
        if (!is_array($navItem)) {
            $navItem = [];
        }
        extract(["navItem" => $navItem]);
        include __DIR__ . "/../Views/templates/Navbar/Navbar.php";
    }
}
