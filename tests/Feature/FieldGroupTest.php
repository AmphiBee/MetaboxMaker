<?php

use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;

test('Group with nested groups and fields', function () {
    $mainGroup = Group::make('Multi-level nested groups', 'main_group')
        ->fields([
            Text::make('Main Text', 'main_text')
                ->placeholder('Enter main text'),
            Group::make('Sub group', 'sub_group')
                ->fields([
                    Text::make('Sub Text', 'sub_text')
                        ->placeholder('Enter sub text')
                ])
        ]);

    $expectedArray = [
            'type' => 'group',
            'name' => 'Multi-level nested groups',
            'id' => 'main_group',
            'attributes' => [],
            'fields' => [
                [
                    'type' => 'text',
                    'name' => 'Main Text',
                    'id' => 'main_text',
                    'attributes' => [],
                    'placeholder' => 'Enter main text',
                ],
                [
                    'type' => 'group',
                    'name' => 'Sub group',
                    'id' => 'sub_group',
                    'attributes' => [],
                    'fields' => [
                        [
                            'type' => 'text',
                            'name' => 'Sub Text',
                            'id' => 'sub_text',
                            'attributes' => [],
                            'placeholder' => 'Enter sub text',
                        ],
                    ],
                ],
            ],
        ];


        expect($mainGroup->build())->toMatchArray($expectedArray);
});

test('Group with advanced properties handles settings correctly', function () {
    $group = Group::make('Advanced Settings', 'advanced_settings')
        ->fields([
            Text::make('Setting One', 'setting_one')
                ->placeholder('Enter setting one')
        ])
        ->cloneable()
        ->sortable()
        ->collapsible()
        ->saveState(true)
        ->defaultState('collapsed')
        ->groupTitle('Advanced Settings Title');

    $expectedArray = [
        'type' => 'group',
        'name' => 'Advanced Settings',
        'id' => 'advanced_settings',
        'attributes' => [],
        'clone' => true,
        'sort_clone' => true,
        'collapsible' => true,
        'save_state' => true,
        'default_state' => 'collapsed',
        'group_title' => 'Advanced Settings Title',
        'fields' => [
            [
                'type' => 'text',
                'name' => 'Setting One',
                'id' => 'setting_one',
                'attributes' => [],
                'placeholder' => 'Enter setting one'
            ]
        ],
    ];

    expect($group->build())->toMatchArray($expectedArray);
});
