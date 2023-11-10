<?php

namespace common\enums;

interface UserRolesEnum
{
    public const ROLE_USER = 'user';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_ADMINISTRATOR = 'administrator';

    public const ALL = [
        self::ROLE_ADMINISTRATOR => "Administrator",
        self::ROLE_MANAGER => "Manager",
        self::ROLE_USER => "User",
    ];
}