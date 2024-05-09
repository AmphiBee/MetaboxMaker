<?php

use AmphiBee\MetaboxMaker\Enums\SidebarFieldType;
use AmphiBee\MetaboxMaker\Fields\Sidebar;

test('can add sidebar with advanced select type', function () {
    $args = Sidebar::make('Sidebar', 'sidebar')
        ->fieldType(SidebarFieldType::SELECT_ADVANCED)
        ->placeholder('Select a sidebar')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'sidebar',
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'field_type' => 'select_advanced',
        'placeholder' => 'Select a sidebar',
    ]);
});
