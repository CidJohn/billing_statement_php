<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Database;
use App\Models\MdlNavbar\MdlNavbar as NavbarValidation;

class BillingListController extends Controller
{
    public function viewBillingList()
    {
        $db = Database::getInstance();
        $modelNavbar = new NavbarValidation($db);
        $modelNavbar->checkRememberMe();

        $user = $modelNavbar->verifyUser($_SESSION['user']);
        if ($user) {
            $this->render("BillingList/BillingList");
        }
    }
}
