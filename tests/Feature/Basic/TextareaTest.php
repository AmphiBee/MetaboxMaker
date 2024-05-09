<?php

use AmphiBee\MetaboxMaker\Fields\Textarea;

test('can create textarea with custom rows and cols', function () {
    $args = Textarea::make('Description', 'description')
        ->placeholder('Enter your description here...')
        ->cols(80)
        ->rows(10)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'textarea',
        'name' => 'Description',
        'id' => 'description',
        'placeholder' => 'Enter your description here...',
        'cols' => 80,
        'rows' => 10
    ]);
});
