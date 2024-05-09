<?php

use AmphiBee\MetaboxMaker\Fields\ImageSelect;

test('image select field can be configured with multiple options', function () {
    $options = [
        'left' => 'http://placehold.it/90x90&text=Left',
        'right' => 'http://placehold.it/90x90&text=Right',
        'none' => 'http://placehold.it/90x90&text=None',
    ];

    $imageSelectField = ImageSelect::make('Layout', 'image_select');
    $imageSelectField->options($options)->multiple(true);

    $config = $imageSelectField->build();

    expect($config)->toMatchArray([
        'type' => 'image_select',
        'name' => 'Layout',
        'id' => 'image_select',
        'options' => $options,
        'multiple' => true,
    ]);
});

test('image select field handles single selection correctly', function () {
    $options = [
        'none' => 'http://placehold.it/90x90&text=None',
    ];

    $imageSelectField = ImageSelect::make('Layout', 'image_select_single');
    $imageSelectField->options($options)->multiple(false);

    $config = $imageSelectField->build();

    expect($config)->toMatchArray([
        'type' => 'image_select',
        'name' => 'Layout',
        'id' => 'image_select_single',
        'options' => $options,
        'multiple' => false,
    ]);
});
