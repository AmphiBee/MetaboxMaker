<?php

use AmphiBee\MetaboxMaker\Fields\TextList;

it('can create a text list field', function () {
    $textList = TextList::make('Text List', 'text_list')
        ->options([
            'John Smith' => 'Name',
            'name@domain.com' => 'Email',
        ])
        ->cloneable();

    $settings = $textList->build();

    expect($settings['type'])->toBe('text_list')
        ->and($settings['options'])->toBe([
            'John Smith' => 'Name',
            'name@domain.com' => 'Email',
        ])
        ->and($settings['clone'])->toBeTrue();
}); 