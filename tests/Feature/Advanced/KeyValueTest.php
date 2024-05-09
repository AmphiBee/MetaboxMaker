<?php

use AmphiBee\MetaboxMaker\Fields\KeyValue;

test('key value field can be configured with placeholders', function () {
    $placeholders = [
        'key' => 'Enter key',
        'value' => 'Enter value',
    ];

    $keyValueField = new KeyValue('Metadata', 'metadata_field');
    $keyValueField->placeholder($placeholders);

    $config = $keyValueField->build();

    expect($config)->toMatchArray([
        'type' => 'key_value',
        'name' => 'Metadata',
        'id' => 'metadata_field',
        'placeholder' => $placeholders,
    ]);
});
