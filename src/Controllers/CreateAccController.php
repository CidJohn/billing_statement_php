<?php

namespace App\Controllers;

use App\Controller;
use App\Models\CreateAccount\CreateAccount as CreateAccountCreateAccount;
use App\Models\Database;

session_start();

class CreateAccController extends Controller
{
    public function createView()
    {
        $this->render('Login/CreateAccount');
    }

    public function createAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $fname = $_POST['fname'] ?? "";
            $mname = $_POST['mname'] ?? "";
            $lname = $_POST['lname'] ?? "";
            $plateno = $_POST['plateno'] ?? "";
            $email = $_POST['email'] ?? "";
            $pass = $_POST['password'] ?? "";
            $cpass = $_POST['cpass'] ?? "";

            $db = Database::getInstance();
            $accountModel = new CreateAccountCreateAccount($db);
            $accountModel->createUser($fname, $lname, $mname, $plateno, $email, $pass, $cpass);

            header("location: /view/login");
            exit;
        }
        $this->render('Login/CreateAccount');
    }
}
