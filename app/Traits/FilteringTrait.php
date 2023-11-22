<?php


namespace App\Traits;


trait FilteringTrait


{
    use CheckQueryTrait;
    public static function filterByName($name): bool | array
    {
        $query = self::where('name', 'LIKE', '%' . $name . '%')->orderBy('name')->get();
        return self::queryNotEmpty($query);
    }

    public static function filterByPrice(): bool | array
    {
        $query = self::orderBy('price')->get();
        return self::queryNotEmpty($query);
    }

    public static function filterByMinMax($min, $max): bool | array
    {
        $query = self::where('price', '>=', $min)->where('price', '<=', $max)->get();
        return self::queryNotEmpty($query);
    }
}
