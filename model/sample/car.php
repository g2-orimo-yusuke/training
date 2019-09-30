<?php

namespace model\sample;


class Car
{
    protected static $price = 1;
    public static function getFormattedPrice()
    {
        // self::$price と書くとgetFormattedPrice()の戻り値は1固定になってしまう。
        return number_format(static::$price);
    }
}