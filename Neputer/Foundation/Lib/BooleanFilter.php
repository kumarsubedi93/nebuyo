<?php

namespace Neputer\Foundation\Lib;

final class BooleanFilter
{
    const YES = 1;
    const NO = 0;

    public static $current = [
        null  =>  'Select One',
        self::NO => 'No',
        self::YES  =>  'Yes',
    ];

    public static $checkValue = [
        self::NO => 'No',
        self::YES  =>  'Yes',
    ];
}