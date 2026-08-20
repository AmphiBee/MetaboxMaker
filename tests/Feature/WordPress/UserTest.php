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

test('can add user field with ajax search', function () {
    $args = User::make('Speakers', 'speaker_ids')
        ->queryArgs(['role' => 'subscriber'])
        ->fieldType(EntityFieldType::SELECT_ADVANCED)
        ->multiple()
        ->ajax()
        ->minimumInputLength(2)
        ->displayField('user_email')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'user',
        'id' => 'speaker_ids',
        'query_args' => ['role' => 'subscriber'],
        'field_type' => 'select_advanced',
        'multiple' => true,
        'ajax' => true,
        'display_field' => 'user_email',
        'js_options' => [
            'minimumInputLength' => 2,
        ],
    ]);
});
