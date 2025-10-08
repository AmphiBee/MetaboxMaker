<?php

use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Fields\Select;
use AmphiBee\MetaboxMaker\Fields\Number;

test('can add custom settings to a field', function () {
    $field = Text::make('Name', 'name')
        ->placeholder('Enter your name')
        ->required()
        ->setting('custom_attribute', 'custom_value')
        ->setting('another_setting', true)
        ->setting('numeric_setting', 42)
        ->build();

    expect($field)->toMatchArray([
        'type' => 'text',
        'name' => 'Name',
        'id' => 'name',
        'placeholder' => 'Enter your name',
        'required' => true,
        'custom_attribute' => 'custom_value',
        'another_setting' => true,
        'numeric_setting' => 42,
    ]);
});

test('custom settings work with different field types', function () {
    $selectField = Select::make('Country', 'country')
        ->options(['us' => 'United States', 'ca' => 'Canada'])
        ->setting('ajax', true)
        ->setting('ajax_url', '/api/countries')
        ->build();

    expect($selectField)->toMatchArray([
        'type' => 'select',
        'name' => 'Country',
        'id' => 'country',
        'options' => ['us' => 'United States', 'ca' => 'Canada'],
        'ajax' => true,
        'ajax_url' => '/api/countries',
    ]);
});

test('custom settings do not interfere with standard properties', function () {
    $field = Number::make('Age', 'age')
        ->min(0)
        ->max(120)
        ->step(1)
        ->setting('validation', 'age_range')
        ->setting('error_message', 'Please enter a valid age')
        ->build();

    expect($field)->toMatchArray([
        'type' => 'number',
        'name' => 'Age',
        'id' => 'age',
        'min' => 0,
        'max' => 120,
        'step' => 1,
        'validation' => 'age_range',
        'error_message' => 'Please enter a valid age',
    ]);
});

test('empty custom settings are not included in build output', function () {
    $field = Text::make('Email', 'email')
        ->placeholder('Enter your email')
        ->build();

    expect($field)->not->toHaveKey('settings');
    expect(count($field))->toBeGreaterThan(0);
});

test('custom settings can override existing properties', function () {
    $field = Text::make('Custom', 'custom')
        ->placeholder('Original placeholder')
        ->setting('placeholder', 'Overridden placeholder')
        ->build();

    expect($field['placeholder'])->toBe('Overridden placeholder');
});