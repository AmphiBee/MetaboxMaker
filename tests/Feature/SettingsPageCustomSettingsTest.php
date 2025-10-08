<?php

use AmphiBee\MetaboxMaker\SettingsPage;

test('can add custom settings to a settings page', function () {
    $page = SettingsPage::make('Custom Settings Page', 'custom_settings_page')
        ->capability('manage_options')
        ->icon('dashicons-admin-settings')
        ->setting('enable_debug', true)
        ->setting('api_key', 'test_key_123')
        ->setting('cache_duration', 3600);

    $data = $page->build();

    expect($data)->toMatchArray([
        'page_title' => 'Custom Settings Page',
        'id' => 'custom_settings_page',
        'menu_title' => 'Custom Settings Page',
        'capability' => 'manage_options',
        'icon' => 'dashicons-admin-settings',
        'enable_debug' => true,
        'api_key' => 'test_key_123',
        'cache_duration' => 3600,
    ]);
});

test('custom settings work with tabs configuration', function () {
    $page = SettingsPage::make('Tabbed Settings', 'tabbed_settings')
        ->parent('options-general.php')
        ->tabs([
            'general' => 'General',
            'advanced' => 'Advanced',
        ])
        ->setting('custom_scripts', true)
        ->setting('theme_options', ['color' => 'blue']);

    $data = $page->build();

    expect($data)->toMatchArray([
        'page_title' => 'Tabbed Settings',
        'id' => 'tabbed_settings',
        'parent' => 'options-general.php',
        'tabs' => [
            'general' => 'General',
            'advanced' => 'Advanced',
        ],
        'custom_scripts' => true,
        'theme_options' => ['color' => 'blue'],
    ]);
});

test('empty custom settings are not included in settings page build output', function () {
    $page = SettingsPage::make('No Custom Settings', 'no_custom_settings')
        ->position(30);

    $data = $page->build();

    expect($data)->not->toHaveKey('settings');
    expect($data)->toMatchArray([
        'page_title' => 'No Custom Settings',
        'id' => 'no_custom_settings',
        'menu_title' => 'No Custom Settings',
        'position' => 30,
    ]);
});

test('custom settings can override existing settings page properties', function () {
    $page = SettingsPage::make('Override Test', 'override_test')
        ->capability('manage_options')
        ->setting('capability', 'edit_posts')
        ->style('boxes');

    $data = $page->build();

    expect($data['capability'])->toBe('edit_posts');
    expect($data['style'])->toBe('boxes');
});

test('getSettings method returns all custom settings', function () {
    $page = SettingsPage::make('Get Settings Test', 'get_settings_test')
        ->setting('feature_flag', true)
        ->setting('max_items', 100)
        ->setting('template', 'custom');

    $settings = $page->getSettings();

    expect($settings)->toBe([
        'feature_flag' => true,
        'max_items' => 100,
        'template' => 'custom',
    ]);
});

test('custom settings work with network and customizer options', function () {
    $page = SettingsPage::make('Network Settings', 'network_settings')
        ->network(true)
        ->customizer(true)
        ->setting('multisite_enabled', true)
        ->setting('sync_interval', 60);

    $data = $page->build();

    expect($data)->toMatchArray([
        'page_title' => 'Network Settings',
        'id' => 'network_settings',
        'network' => true,
        'customizer' => true,
        'multisite_enabled' => true,
        'sync_interval' => 60,
    ]);
});