<?php

use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Fieldset;
use AmphiBee\MetaboxMaker\Location;

test('Fieldset with groups and fields', function () {
    $mainGroup = Fieldset::make('Test Fieldset', 'test_fieldset')
        ->fields([
            Text::make('Main Text', 'main_text')
                ->placeholder('Enter main text'),
            Group::make('Sub group', 'sub_group')
                ->fields([
                    Text::make('Sub Text', 'sub_text')
                        ->placeholder('Enter sub text')
                ])
        ])
        ->context('side')
        ->location(Location::where('post_type', ['post', 'page']));


    $expectedArray = [
        'title' => 'Test Fieldset',
        'id' => 'test_fieldset',
        'context' => 'side',
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
        'post_type' => ['post', 'page'],
    ];

    expect($mainGroup->build())->toMatchArray($expectedArray);
});
