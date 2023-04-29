<?php

namespace App\Enums;

enum LightState: int
{
    case Off = 0;
    case On = 1;

    public function label(): string
    {
        return match ($this) {
            self::On => 'Ligada ✅',
            self::Off => 'Desligada ❌',
        };
    }

    public static function tryFromString(string $state): ?self
    {
        $state = str($state)->lower()->trim()->__toString();

        return match ($state) {
            'on' => self::On,
            'off' => self::Off,
            default => null,
        };
    }

    public static function tryFromBool(bool $state): self
    {
        return match ($state) {
            true => self::On,
            default => self::Off,
        };
    }
}
