<?php

namespace App\Utils;

class Serializer
{
    public static function toJson($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public static function toArray($json)
    {
        return json_decode($json, true);
    }
}
