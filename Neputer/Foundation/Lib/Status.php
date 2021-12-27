<?php

namespace Neputer\Foundation\Lib;

final class Status
{
    /**
     * Active Status
     */
    const ACTIVE_STATUS = 1;

    /**
     * INACTIVE STATUS
     */
    const INACTIVE_STATUS = 0;

    /**
     * @var string[]
     */
    public static $current = [
        self::ACTIVE_STATUS   => 'Active',
        self::INACTIVE_STATUS => 'In-Active',
    ];
}