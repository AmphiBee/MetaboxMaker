<?php

use AmphiBee\MetaboxMaker\Fields\Background;

test('can initialize background field with minimal settings', function () {
    $args = Background::make('Section background', 'background')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'background',
        'name' => 'Section background',
        'id' => 'background',
    ]);
});
