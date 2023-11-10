<?php
/*
 *   Jamshidbek Akhlidinov
 *   5 - 10 2023 10:22:8
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace common\enums;

interface StatusEnum
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public const ALL = [
        self::ACTIVE => "Active",
        self::INACTIVE => "Inactive",
    ];
}