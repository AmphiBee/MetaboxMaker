<?php

use AmphiBee\MetaboxMaker\Fields\Number;

test('can add number field with min, max and step values', function () {
    $args = Number::make('Number', 'number')
        ->min(0)
        ->max(100)
        ->step(0.5)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'number',
        'name' => 'Number',
        'id' => 'number',
        'min' => 0,
        'max' => 100,
        'step' => 0.5,
    ]);
});
