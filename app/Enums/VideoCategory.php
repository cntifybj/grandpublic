<?php

namespace App\Enums;


enum VideoCategory: string
{
    case Opinion = 'opinion';
    case Insolite = 'insolite';
    case Portrait = 'portrait';
    case Events = 'events';

    public function label(): string
    {
        return match ($this) {
            self::Opinion => 'OPINION',
            self::Portrait => 'PORTRAIT',
            self::Insolite => 'INSOLITE',
            self::Events => 'EVENTS',
        };
    }
}
