<?php

namespace App\Controllers;

use App\Controller;
use App\Models\CreateAccount;
use App\Models\Database;

class CreateAccController extends Controller
{
    public function createView()
    {
        $this->render('Login/CreateAccount');
    }

    public function createAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = $_POST['email'] ?? "";
            $pass = $_POST['password'] ?? "";

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                die("Invalid Email Address!");
            }
            if (strlen($pass) < 6) {
                die("Password must be al least 6 characters long.");
            }
            $hash_pass = password_hash($pass, PASSWORD_BCRYPT);

            $db = Database::getInstance();
            $accountModel = new CreateAccount($db);
            $accountModel->createUser($email, $hash_pass);

            header("location: /Login");
        }
        $this->render('Login/CreateAccount');
    }
}
