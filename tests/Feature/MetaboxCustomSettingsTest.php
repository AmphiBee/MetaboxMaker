<?php

use AmphiBee\MetaboxMaker\Metabox;
use AmphiBee\MetaboxMaker\Location;
use AmphiBee\MetaboxMaker\Fields\Text;

test('can add custom settings to a metabox', function () {
    $metabox = Metabox::make('Custom Settings Test', 'custom_settings_test')
        ->description('Test metabox with custom settings')
        ->priority('high')
        ->setting('custom_option', 'custom_value')
        ->setting('enable_ajax', true)
        ->setting('data_source', '/api/data')
        ->location(Location::where('post_type', 'post'));

    $data = $metabox->build();

    expect($data)->toMatchArray([
        'title' => 'Custom Settings Test',
        'id' => 'custom_settings_test',
        'description' => 'Test metabox with custom settings',
        'priority' => 'high',
        'custom_option' => 'custom_value',
        'enable_ajax' => true,
        'data_source' => '/api/data',
        'post_type' => 'post',
    ]);
});


$metabox = Metabox::make('Metabox with Fields', 'metabox_with_fields')
    ->fields([
        Text::make('Name', 'name')->required(),
        Text::make('Email', 'email')->type('email'),
    ])
    ->setting('validation_endpoint', '/api/validate')
    ->setting('autosave_interval', 30)
    ->location(Location::where('post_type', 'page'));

test('custom settings work with fields', function () {
    $metabox = Metabox::make('Metabox with Fields', 'metabox_with_fields')
        ->fields([
            Text::make('Name', 'name')->required(),
            Text::make('Email', 'email')->type('email'),
        ])
        ->setting('validation_endpoint', '/api/validate')
        ->setting('autosave_interval', 30)
        ->location(Location::where('post_type', 'page'));

    $data = $metabox->build();

    expect($data)->toMatchArray([
        'title' => 'Metabox with Fields',
        'id' => 'metabox_with_fields',
        'validation_endpoint' => '/api/validate',
        'autosave_interval' => 30,
        'post_type' => 'page',
    ]);

    expect($data['fields'])->toHaveCount(2);
    expect($data['fields'][0])->toMatchArray([
        'name' => 'Name',
        'id' => 'name',
        'type' => 'text',
        'required' => true,
    ]);
});

test('empty custom settings are not included in metabox build output', function () {
    $metabox = Metabox::make('No Custom Settings', 'no_custom_settings')
        ->description('Test without custom settings')
        ->location(Location::where('post_type', 'post'));

    $data = $metabox->build();

    expect($data)->not->toHaveKey('settings');
    expect($data)->toMatchArray([
        'title' => 'No Custom Settings',
        'id' => 'no_custom_settings',
        'description' => 'Test without custom settings',
        'post_type' => 'post',
    ]);
});

test('custom settings can override existing metabox properties', function () {
    $metabox = Metabox::make('override_test', 'Override Test')
        ->description('Original description')
        ->setting('description', 'Overridden description')
        ->location(Location::where('post_type', 'post'));

    $data = $metabox->build();

    expect($data['description'])->toBe('Overridden description');
});

test('getSettings method returns all custom settings', function () {
    $metabox = Metabox::make('get_settings_test', 'Get Settings Test')
        ->setting('option1', 'value1')
        ->setting('option2', 'value2')
        ->setting('option3', true);

    $settings = $metabox->getSettings();

    expect($settings)->toBe([
        'option1' => 'value1',
        'option2' => 'value2',
        'option3' => true,
    ]);
});
