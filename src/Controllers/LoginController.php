<?php

namespace App\Controllers;

use App\Controller;
use App\Enums\ErrorCodes;

session_start();

class LoginController extends Controller
{
    public function signinView()
    {
        $this->render("Login/Login");
    }

    public function accountSignIn()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"] ?? "";
            $password = $_POST["password"] ?? "";

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = ErrorCodes::INVALID_EMAIL->getMessage();
            }
        }
    }
}
