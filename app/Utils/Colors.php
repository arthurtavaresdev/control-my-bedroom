<?php

namespace App\Utils;

class Colors
{
    public const DEFAULT_COLORS = [
        'red' => '255,0,0',
        'green' => '0,255,0',
        'blue' => '0,0,255',
        'yellow' => '255,255,0',
        'cyan' => '0,255,255',
        'magenta' => '255,0,255',
        'white' => '255,255,255',
        'black' => '0,0,0',
    ];

    public static function RGBtoHSV(...$args): array
    {
        if (is_string($args[0]) && count($args) === 1) {
            [$red, $green, $blue] = explode(',', $args[0]);
        } elseif (is_array($args[0])) {
            [$red, $green, $blue] = $args[0];
        } else {
            [$red, $green, $blue] = $args;
        }

        if ($red < 0) {
            $red = 0;
        }
        if ($green < 0) {
            $green = 0;
        }
        if ($blue < 0) {
            $blue = 0;
        }
        if ($red > 255) {
            $red = 255;
        }
        if ($green > 255) {
            $green = 255;
        }
        if ($blue > 255) {
            $blue = 255;
        }
        $red /= 255;
        $green /= 255;
        $blue /= 255;
        $M = max($red, $green, $blue);
        $m = min($red, $green, $blue);
        $C = $M - $m;
        if ($C === 0) {
            $h = 0;
        } elseif ($M === $red) {
            $h = (($green - $blue) / $C) % 6;
        } elseif ($M === $green) {
            $h = ($blue - $red) / $C + 2;
        } else {
            $h = ($red - $green) / $C + 4;
        }
        $h *= 60;
        if ($h < 0) {
            $h += 360;
        }
        $v = $M;
        if ($C === 0) {
            $s = 0;
        } else {
            $s = $C / $v;
        }
        $s *= 100;
        $v *= 100;

        return
            ['h' => (int) round($h),
                's' => (int) round($s * 10),
                'v' => (int) round($v * 10),
            ];
    }

    public static function defaultColorToHSV(string $color): array
    {
        return self::RGBtoHSV(self::DEFAULT_COLORS[$color]);
    }
}
