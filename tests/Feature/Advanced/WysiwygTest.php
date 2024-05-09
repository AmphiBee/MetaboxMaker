<?php

use AmphiBee\MetaboxMaker\Fields\Wysiwyg;

test('wysiwyg field can be configured with specific editor settings', function () {
    $wysiwygField = Wysiwyg::make('Advanced Editor', 'advanced_editor');
    $wysiwygField->raw()
        ->wpautop(false)
        ->mediaButtons(true)
        ->dragDropUpload(true)
        ->textareaName('custom_content');

    $config = $wysiwygField->build();

    expect($config)->toMatchArray([
        'type' => 'wysiwyg',
        'name' => 'Advanced Editor',
        'id' => 'advanced_editor',
        'raw' => true,
        'options' => [
            'wpautop' => false,
            'media_buttons' => true,
            'drag_drop_upload' => true,
            'textarea_name' => 'custom_content',
        ],
    ]);
});
