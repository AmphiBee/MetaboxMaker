<?php

use AmphiBee\MetaboxMaker\Fields\Button;
use AmphiBee\MetaboxMaker\Fields\ButtonGroup;

test('can configure button with custom attributes', function () {
    $button = Button::make('Submit', 'submit_button');
    $button->setAttributes([
        'required' => true,
        'data-option1' => 'value1',
        'data-option2' => json_encode(['key1' => 'value1', 'key2' => 'value2']),
    ]);

    expect($button->getAttributes())->toMatchArray([
        'required' => true,
        'data-option1' => 'value1',
        'data-option2' => '{"key1":"value1","key2":"value2"}',
    ]);
});

test('can configure button group with multiple selection and inline display', function () {
    $options = [
        'btn1' => 'Button 1',
        'btn2' => 'Button 2',
    ];

    $buttonGroup = ButtonGroup::make('Button Group', 'button_group');
    $buttonGroup->options($options)
        ->multiple(true)
        ->inline(false);

    expect($buttonGroup->build())->toMatchArray([
        'type' => 'button_group',
        'name' => 'Button Group',
        'id' => 'button_group',
        'options' => $options,
        'multiple' => true,
        'inline' => false,
    ]);
});
