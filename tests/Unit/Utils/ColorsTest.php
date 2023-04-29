<?php

use App\Utils\Colors;

it('returns default colors', function () {
    $colors = App\Utils\Colors::DEFAULT_COLORS;

    expect($colors)->toBeArray()
        ->and($colors)->toHaveCount(8)
        ->and($colors)->toHaveKey('red')
        ->and($colors)->toHaveKey('green')
        ->and($colors)->toHaveKey('blue')
        ->and($colors)->toHaveKey('yellow')
        ->and($colors)->toHaveKey('cyan')
        ->and($colors)->toHaveKey('magenta')
        ->and($colors)->toHaveKey('white')
        ->and($colors)->toHaveKey('black');
});

it('converts RGB to HSV', function () {
    $hsv = App\Utils\Colors::RGBtoHSV(156, 243, 191);

    expect($hsv)
        ->toBeArray()
        ->and($hsv)->toHaveCount(3)
        ->and($hsv)->toHaveKey('h')
        ->and($hsv)->toHaveKey('s')
        ->and($hsv)->toHaveKey('v')
        ->and($hsv['h'])->toBe(144)->toBeInt()
        ->and($hsv['s'])->toBe(358)->toBeInt()
        ->and($hsv['v'])->toBe(953)->toBeInt();
});

it('converts default color to HSV', function ($color) {
    $defaultColorToHSV = App\Utils\Colors::defaultColorToHSV($color);
    $hsv = App\Utils\Colors::RGBtoHSV(Colors::DEFAULT_COLORS[$color]);

    expect($defaultColorToHSV)->toBe($hsv);

})->with(array_keys(Colors::DEFAULT_COLORS));
