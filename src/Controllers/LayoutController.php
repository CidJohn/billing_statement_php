<?php

namespace App\Controllers;

class LayoutController
{
    public function navbar()
    {
        $navItem = require __DIR__ . "/../../public/content/NavContent.php";

        if (!is_array($navItem)) {
            $navItem = [];
        }
        extract(["navItem" => $navItem]);

        include __DIR__ . "/../Views/templates/Navbar/Navbar.php";
    }
}
