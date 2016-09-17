<?php

namespace App\Helpers;

class Helper
{
    public static function floatZeroEnding(float $value)
    {
        return $value . '0';
    }
}