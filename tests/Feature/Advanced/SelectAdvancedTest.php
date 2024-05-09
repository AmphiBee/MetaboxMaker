<?php

use AmphiBee\MetaboxMaker\Fields\SelectAdvanced;

test('select advanced field can be configured with multiple options and Select2 features', function () {
    $options = [
        'option1' => 'Label One',
        'option2' => 'Label Two',
    ];

    $jsOptions = ['width' => '100%', 'placeholder' => 'Select an option'];

    $selectAdvanced = SelectAdvanced::make('Advanced Selection', 'advanced_selection');
    $selectAdvanced->options($options)
        ->multiple(true)
        ->placeholder('Choose options')
        ->toggleAllButton(true)
        ->jsOptions($jsOptions);

    $config = $selectAdvanced->build();

    expect($config)->toMatchArray([
        'type' => 'select_advanced',
        'name' => 'Advanced Selection',
        'id' => 'advanced_selection',
        'options' => $options,
        'multiple' => true,
        'placeholder' => 'Choose options',
        'select_all_none' => true,
        'js_options' => $jsOptions,
    ]);
});
