<?php
use AmphiBee\MetaboxMaker\Fields\Color;

test('color field can be created with valid js_options', function () {
    $jsOptions = [
        'palettes' => ['#125', '#459', '#78b', '#ab0', '#de3', '#f0f'],
    ];

    $colorField = Color::make('Color picker', 'field_id');
    $colorField->alphaChannel(true)->jsOptions($jsOptions);

    expect($colorField->build())->toMatchArray([
        'type' => 'color',
        'name' => 'Color picker',
        'id' => 'field_id',
        'alpha_channel' => true,
        'js_options' => $jsOptions
    ]);
});

test('color field throws exception for invalid color formats', function () {
    $jsOptions = [
        'palettes' => ['#125z', 'invalidColor', 'rgb(300,300,300)'],
    ];

    $colorField = Color::make('Color picker', 'field_id');

    // Expect an exception when invalid colors are set
    expect(fn() => $colorField->jsOptions($jsOptions))
        ->toThrow(InvalidArgumentException::class, 'Please provide a valid color.');
});
