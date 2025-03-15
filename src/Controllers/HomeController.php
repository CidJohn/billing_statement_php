<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Database;
use App\Models\MdlHome\MdlHome;
use App\Models\MdlNavbar\MdlNavbar as NavbarValidation;
use App\Utils\Session;

Session::start();

class HomeController extends Controller
{
    public function home()
    {
        $db = Database::getInstance();
        $modelNavbar = new NavbarValidation($db);
        $modelNavbar->checkRememberMe();
        $details = $_SESSION['user'];
        $user = $modelNavbar->verifyUser($_SESSION['user']);

        $modalHome = new MdlHome($db);
        $userInfo = $modalHome->GetUserInfo($details['id']);
        $tabsItems = $modalHome->tabsItem();
        $tableCol = $modalHome->tableCol();
        $formInput = $modalHome->stateForm();
        if (!$user) {
            header('Location: view/login');
            exit();
        }
        $this->render('Home/home', ["users" => $userInfo, "tabsItem" => $tabsItems, "tblCol" => $tableCol, "formState" => $formInput]);
    }
}
