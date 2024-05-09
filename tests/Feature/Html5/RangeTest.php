<?php

use AmphiBee\MetaboxMaker\Fields\Range;

test('can add range field with min, max and step values', function () {
    $args = Range::make('Range', 'range')
        ->min(20)
        ->max(200)
        ->step(1)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'range',
        'name' => 'Range',
        'id' => 'range',
        'min' => 20,
        'max' => 200,
        'step' => 1,
    ]);
});
