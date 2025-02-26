<?php

namespace App\Enums;

enum ErrorCodes: string
{
    case INVALID_EMAIL = 'Invalid email format.';
    case WEAK_PASSWORD = 'Password must be at least 6 characters long.';
    case USER_EXISTS = 'User already exists.';
    case DATABASE_ERROR = 'A database error occurred.';
    case UNKNOWN_ERROR = 'An unknown error occurred.';

    public function getMessage(): string
    {
        return $this->value;
    }
}
