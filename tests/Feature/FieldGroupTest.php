<?php

use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;

$mainGroup = Group::make('Multi-level nested groups', 'main_group')
    ->fields([
        Text::make('Main Text', 'main_text')
            ->placeholder('Enter main text'),
        Group::make('Sub group', 'sub_group')
            ->fields([
                Text::make('Sub Text', 'sub_text')
                    ->placeholder('Enter sub text'),
            ]),
    ]);

test('can add group with nested groups and fields', function () {
    $mainGroup = Group::make('Multi-level nested groups', 'main_group')
        ->fields([
            Text::make('Main Text', 'main_text')
                ->placeholder('Enter main text'),
            Group::make('Sub group', 'sub_group')
                ->fields([
                    Text::make('Sub Text', 'sub_text')
                        ->placeholder('Enter sub text'),
                ]),
        ]);

    $expectedArray = [
        'type' => 'group',
        'name' => 'Multi-level nested groups',
        'id' => 'main_group',
        'fields' => [
            [
                'type' => 'text',
                'name' => 'Main Text',
                'id' => 'main_text',
                'placeholder' => 'Enter main text',
            ],
            [
                'type' => 'group',
                'name' => 'Sub group',
                'id' => 'sub_group',
                'fields' => [
                    [
                        'type' => 'text',
                        'name' => 'Sub Text',
                        'id' => 'sub_text',
                        'placeholder' => 'Enter sub text',
                    ],
                ],
            ],
        ],
    ];

    expect($mainGroup->build())->toMatchArray($expectedArray);
});

test('can add group with advanced properties handles settings correctly', function () {
    $group = Group::make('Advanced Settings', 'advanced_settings')
        ->fields([
            Text::make('Setting One', 'setting_one')
                ->placeholder('Enter setting one'),
        ])
        ->cloneable()
        ->sortable()
        ->collapsible()
        ->saveState(true)
        ->defaultState('collapsed')
        ->groupTitle('Advanced Settings Title');

    $expectedArray = [
        'name' => 'Advanced Settings',
        'id' => 'advanced_settings',
        'type' => 'group',
        'fields' => [
            [
                'type' => 'text',
                'name' => 'Setting One',
                'id' => 'setting_one',
                'placeholder' => 'Enter setting one',
            ],
        ],
        'clone' => true,
        'sort_clone' => true,
        'collapsible' => true,
        'save_state' => true,
        'default_state' => 'collapsed',
        'group_title' => 'Advanced Settings Title',
    ];

    expect($group->build())->toMatchArray($expectedArray);
});
