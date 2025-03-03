<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Database;
use App\Models\MdlNavbar\MdlNavbar as NavbarValidation;
use App\Models\Journal;
use App\Utils\Session;

Session::start();

class HomeController extends Controller
{
    public function home()
    {
        $db = Database::getInstance();
        $modelNavbar = new NavbarValidation($db);
        $modelNavbar->checkRememberMe();

        $modelNavbar->verifyUser($_SESSION['user']);

        $journals = [
            new Journal('My Third Journal Entry', '2023'),
            new Journal('My Second Journal Entry', '2022'),
            new Journal('My First Journal Entry', '2021')
        ];
        $this->render('Home/home', ['journals' => $journals]);
    }
}
