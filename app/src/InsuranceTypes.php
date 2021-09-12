<?php

namespace App;

interface InsuranceTypes
{
    public const HOME = 1;
    public const AUTO = 2;
    public const COLLECTABLES = 3;
    public const UMBRELLA = 4;

    public const NAMES = [
        self::HOME => 'Home',
        self::AUTO => 'Auto',
        self::COLLECTABLES => 'Collectables',
        self::UMBRELLA => 'Umbrella',
    ];
}