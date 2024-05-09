<?php
use AmphiBee\MetaboxMaker\Fields\Radio;

test('can configure radio buttons with options and inline display', function () {
    $options = [
        'value1' => 'Label One',
        'value2' => 'Label Two'
    ];

    $args = Radio::make('Choose Option', 'choose_option')
        ->options($options)
        ->inline(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'radio',
        'name' => 'Choose Option',
        'id' => 'choose_option',
        'options' => $options,
        'inline' => true
    ]);
});
