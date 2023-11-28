<?php


namespace App\Traits;


trait CheckQueryTrait
{
    public static function queryNotEmpty ($query): bool | array
    {
        if (empty($query[0]) || empty($query)) {
            return false;
        }
        return $query;
    }
}
