<?php

declare(strict_types=1);

use Pollora\Metabox\Fields\Hidden;

test('hidden field stores predefined value', function () {
    $hiddenField = Hidden::make('Hidden value', 'hidden_field_id')->default('Hidden value');

    $config = $hiddenField->build();

    expect($config)->toMatchArray([
        'type' => 'hidden',
        'id' => 'hidden_field_id',
        'std' => 'Hidden value',
    ]);
});
