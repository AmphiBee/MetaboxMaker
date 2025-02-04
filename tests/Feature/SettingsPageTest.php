<?php

use AmphiBee\MetaboxMaker\SettingsPage;
use AmphiBee\MetaboxMaker\Enums\MenuType;
use AmphiBee\MetaboxMaker\Enums\IconType;
use AmphiBee\MetaboxMaker\Enums\TabStyle;

beforeEach(function () {
    $this->settings = SettingsPage::make('Example Settings', 'example-settings');
});

test('can create a SettingsPage instance', function () {
    expect($this->settings)->toBeInstanceOf(SettingsPage::class)
        ->and($this->settings->build())->toHaveKey('page_title', 'Example Settings')
        ->and($this->settings->build())->toHaveKey('id', 'example-settings')
        ->and($this->settings->build())->toHaveKey('menu_title', 'Example Settings');
});

test('can set menu title different from page title', function () {
    $this->settings->menuTitle('Custom Menu Title');
    expect($this->settings->build())->toHaveKey('menu_title', 'Custom Menu Title');
});

test('can set menu type', function () {
    $this->settings->menuType(MenuType::TOP_LEVEL);
    expect($this->settings->build())->toHaveKey('menu_type', 'top');
});

test('can set menu position', function () {
    $this->settings->position(25);
    expect($this->settings->build())->toHaveKey('position', 25);
});

test('can set submenu title', function () {
    $this->settings->submenuTitle('Custom Submenu');
    expect($this->settings->build())->toHaveKey('submenu_title', 'Custom Submenu');
});

test('can configure icon settings', function () {
    $this->settings
        ->iconType(IconType::DASHICONS)
        ->icon('dashicons-admin-settings');

    $config = $this->settings->build();

    expect($config)->toHaveKey('icon_type', 'dashicons')
        ->and($config)->toHaveKey('icon', 'dashicons-admin-settings');
});

test('can set parent menu', function () {
    $this->settings->parent('themes.php');
    expect($this->settings->build())->toHaveKey('parent', 'themes.php');
});

test('can configure display settings', function () {
    $this->settings
        ->capability('manage_options')
        ->class('custom-class')
        ->style('no-boxes')
        ->columns(2);

    $config = $this->settings->build();

    expect($config)->toHaveKey('capability', 'manage_options')
        ->and($config)->toHaveKey('class', 'custom-class')
        ->and($config)->toHaveKey('style', 'no-boxes')
        ->and($config)->toHaveKey('columns', 2);
});

test('can configure tabs', function () {
    $tabs = [
        'general' => [
            'label' => 'General',
            'icon' => 'dashicons-admin-settings'
        ],
        'advanced' => [
            'label' => 'Advanced',
            'icon' => 'dashicons-admin-tools'
        ]
    ];

    $this->settings
        ->tabs($tabs)
        ->tabStyle(TabStyle::LEFT);

    $config = $this->settings->build();

    expect($config)->toHaveKey('tabs', $tabs)
        ->and($config)->toHaveKey('tab_style', 'left');
});

test('can configure messages', function () {
    $this->settings
        ->submitButton('Save Changes')
        ->message('Settings saved successfully!');

    $config = $this->settings->build();

    expect($config)->toHaveKey('submit_button', 'Save Changes')
        ->and($config)->toHaveKey('message', 'Settings saved successfully!');
});

test('can configure customizer settings', function () {
    $this->settings
        ->customizer(true)
        ->customizerOnly(true);

    $config = $this->settings->build();

    expect($config)->toHaveKey('customizer', true)
        ->and($config)->toHaveKey('customizer_only', true);
});

test('can configure network settings', function () {
    $this->settings
        ->network(true)
        ->optionName('my_settings');

    $config = $this->settings->build();

    expect($config)->toHaveKey('network', true)
        ->and($config)->toHaveKey('option_name', 'my_settings');
});

test('can create a complete settings page configuration', function () {
    $settings = SettingsPage::make('Complete Settings', 'complete-settings')
        ->menuTitle('Custom Menu')
        ->menuType(MenuType::TOP_LEVEL)
        ->position(25)
        ->iconType(IconType::DASHICONS)
        ->icon('dashicons-admin-settings')
        ->capability('manage_options')
        ->tabs([
            'general' => 'General Settings',
            'advanced' => 'Advanced Settings'
        ])
        ->tabStyle(TabStyle::LEFT)
        ->columns(2);

    $expectedArray = [
        'page_title' => 'Complete Settings',
        'id' => 'complete-settings',
        'menu_title' => 'Custom Menu',
        'menu_type' => 'top',
        'position' => 25,
        'icon_type' => 'dashicons',
        'icon' => 'dashicons-admin-settings',
        'capability' => 'manage_options',
        'tabs' => [
            'general' => 'General Settings',
            'advanced' => 'Advanced Settings'
        ],
        'tab_style' => 'left',
        'columns' => 2
    ];

    expect($settings->build())->toMatchArray($expectedArray);
}); 