<?php

use AmphiBee\MetaboxMaker\Fields\KeyValue;

it('can create a key-value field', function () {
    $keyValue = KeyValue::make('Key Value', 'key_value')
        ->placeholder([
            'key' => 'Enter key',
            'value' => 'Enter value',
        ]);

    $settings = $keyValue->build();

    expect($settings['type'])->toBe('key_value')
        ->and($settings['placeholder'])->toBe([
            'key' => 'Enter key',
            'value' => 'Enter value',
        ]);
});