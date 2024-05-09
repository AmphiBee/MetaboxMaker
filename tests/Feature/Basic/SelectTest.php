<?php
use AmphiBee\MetaboxMaker\Fields\Select;

test('can configure select with multiple choices and toggle all feature', function () {
    $options = [
        'value1' => 'Label One',
        'value2' => 'Label Two'
    ];

    $args = Select::make('Select Your Option', 'select_your_option')
        ->options($options)
        ->multiple(true)
        ->placeholder('Choose an option')
        ->toggleAllButton(true)
        ->flatten(false)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'select',
        'name' => 'Select Your Option',
        'id' => 'select_your_option',
        'options' => $options,
        'multiple' => true,
        'placeholder' => 'Choose an option',
        'select_all_none' => true,
        'flatten' => false
    ]);
});
