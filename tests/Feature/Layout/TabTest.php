<?php

use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Metabox;

$mainGroup = Metabox::make('Multi-level nested groups', 'main_group')
    ->tabs([
        'contact' => 'Contact',
        'social' => [
            'label' => 'Social Media',
            'icon' => 'dashicons-share',
        ],
    ])
    ->fields([
        Text::make('Main Text', 'main_text')
            ->placeholder('Enter main text')
            ->tab('contact'),
        Group::make('Sub group', 'sub_group')
            ->tab('social')
            ->fields([
                Text::make('Sub Text', 'sub_text')
                    ->placeholder('Enter sub text'),
            ]),
    ]);

test('can assign tabs to fields', function () {
    $tabs = Metabox::make('Multi-level nested groups', 'main_group')
        ->tabs([
            'contact' => 'Contact',
            'social' => [
                'label' => 'Social Media',
                'icon' => 'dashicons-share',
            ],
        ])
        ->fields([
            Text::make('Main Text', 'main_text')
                ->placeholder('Enter main text')
                ->tab('contact'),
            Group::make('Sub group', 'sub_group')
                ->tab('social')
                ->fields([
                    Text::make('Sub Text', 'sub_text')
                        ->placeholder('Enter sub text'),
                ]),
        ]);

    expect($tabs->build())->toMatchArray([
            'context' => 'normal',
            'fields' => [
                [
                    'type' => 'text',
                    'name' => 'Main Text',
                    'id' => 'main_text',
                    'placeholder' => 'Enter main text',
                    'tab' => 'contact',
                ],
                [
                    'type' => 'group',
                    'name' => 'Sub group',
                    'id' => 'sub_group',
                    'tab' => 'social',
                    'fields' => [
                        [
                            'type' => 'text',
                            'name' => 'Sub Text',
                            'id' => 'sub_text', 'placeholder' => 'Enter sub text']
                    ]
                ]
            ],
            'tabs' => [
                'contact' => 'Contact',
                'social' => [
                    'label' => 'Social Media',
                    'icon' => 'dashicons-share'
                ]
            ],
            'style' => 'default',
            'title' => 'Multi-level nested groups',
            'id' => 'main_group',
            'post_type' => ['post']
        ]
    );
});
