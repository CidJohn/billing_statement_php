<?php

namespace App\Enums;

enum MessageCodes: string
{
    case CREATED_ACCOUNT = "Your account is created succussfully!";

    public function getMessage(): string
    {
        return $this->value;
    }
}
