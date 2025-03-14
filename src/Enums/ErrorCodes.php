<?php

namespace App\Enums;

enum ErrorCodes: string
{
    //Errors
    case INVALID_EMAIL = 'Invalid email format.';
    case WEAK_PASSWORD = 'Password must be at least 6 characters long.';
    case NOT_MATCH_PASSWORD = 'Password do not Match!';
    case CONTAIN_SYMBOLS = "Full Name cannot contain special characters!";
    case USER_EXISTS = 'User already exists.';
    case DATABASE_ERROR = 'A database error occurred.';
    case UNKNOWN_ERROR = 'An unknown error occurred.';
    case DUPLICATE_ENTRY = 'You already sign in!';
    case USER_DOES_NOT_EXIST = "Email does not exist";

    public function getMessage(): string
    {
        return $this->value;
    }
}
