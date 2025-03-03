<?php

namespace App\Controllers;

use App\Controller;
use App\Enums\ErrorCodes;
use App\Models\CreateAccount\CreateAccount as CreateAccountCreateAccount;
use App\Models\LoginAccount\LoginAccount as SignInAccount;
use App\Models\Database;
use App\Models\MdlSignout\Signout;
use App\Utils\Session;

session_start();

class AuthController extends Controller
{
    public function viewRegistration()
    {
        $this->render('Login/CreateAccount');
    }

    public function createAccout()
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

            $_SESSION['notif'] = ErrorCodes::CREATED_ACCOUNT->getMessage();
            header("location: /view/create-account");
            exit;
        }
        $this->render('Login/CreateAccount');
    }

    public function viewLogin()
    {
        $this->render("Login/Login");
    }

    public function signInAccount()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"] ?? "";
            $password = $_POST["password"] ?? "";
            $rememberMe = $_POST['rememberMe'] ? 1 : 0;

            $db = Database::getInstance();
            $loginModel = new SignInAccount($db);
            $loginModel->userCredVerification($email, $password, $rememberMe);
            header("Location: /");
            exit;
        }
    }

    public function signOutAccount()
    {
        $db = Database::getInstance();
        $logoutModel = new Signout($db);
        $logoutModel->signOutAccount($_SESSION['user']['id']);
        header('Location: /view/login');
        exit;
    }
}
