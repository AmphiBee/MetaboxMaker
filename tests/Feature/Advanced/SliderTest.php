<?php

declare(strict_types=1);

use Pollora\Metabox\Fields\Slider;

test('slider field can be configured with individual js options', function () {
    $sliderField = Slider::make('Volume Control', 'volume');
    $sliderField->prefix('$')
        ->suffix(' USD')
        ->minValue(10)
        ->maxValue(255)
        ->stepValue(5)
        ->startValue(150)
        ->range(true);

    $config = $sliderField->build();

    expect($config)->toMatchArray([
        'type' => 'slider',
        'name' => 'Volume Control',
        'id' => 'volume',
        'prefix' => '$',
        'suffix' => ' USD',
        'js_options' => [
            'min' => 10,
            'max' => 255,
            'step' => 5,
            'range' => true,
            'value' => 150,
        ],
    ]);
});

test('slider does not override the default value', function () {
    $config = Slider::make('Volume', 'volume')->default(50)->build();

    expect($config['std'])->toBe(50)
        ->and($config['js_options'])->not->toHaveKey('value');
});
