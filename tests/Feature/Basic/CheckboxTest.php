<?php

use AmphiBee\MetaboxMaker\Fields\Checkbox;
use AmphiBee\MetaboxMaker\Fields\CheckboxList;

test('can set checkbox as checked by default', function () {
    $args = Checkbox::make('Accept Terms', 'accept_terms')
        ->checkedByDefault(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'checkbox',
        'name' => 'Accept Terms',
        'id' => 'accept_terms',
        'std' => true,  // True indicates that the checkbox is checked by default
    ]);
});

test('can configure checkbox list with options and toggle all feature', function () {
    $options = [
        'option1' => 'Label One',
        'option2' => 'Label Two',
    ];

    $args = CheckboxList::make('Select Options', 'select_options')
        ->options($options)
        ->inline(true)
        ->toggleAllButton(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'checkbox_list',
        'name' => 'Select Options',
        'id' => 'select_options',
        'options' => $options,
        'inline' => true,
        'select_all_none' => true,
    ]);
});
