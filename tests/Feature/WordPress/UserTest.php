<?php

use AmphiBee\MetaboxMaker\Enums\EntityFieldType;
use AmphiBee\MetaboxMaker\Fields\User;

test('can add user field with specific query args', function () {
    $args = User::make('User Field', 'user_field')
        ->queryArgs(['role' => 'subscriber', 'orderby' => 'email'])
        ->fieldType(EntityFieldType::SELECT_ADVANCED)
        ->placeholder('Select a user')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'user',
        'name' => 'User Field',
        'id' => 'user_field',
        'query_args' => ['role' => 'subscriber', 'orderby' => 'email'],
        'field_type' => 'select_advanced',
        'placeholder' => 'Select a user',
    ]);
});
