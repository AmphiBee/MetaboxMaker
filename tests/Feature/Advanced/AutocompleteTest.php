<?php

use AmphiBee\MetaboxMaker\Fields\Autocomplete;

test('can configure autocomplete with static and remote options', function () {
    $staticOptions = [
        'option1' => 'Label One',
        'option2' => 'Label Two',
    ];

    $remoteURL = 'https://example.com/api/options';

    $argsStatic = Autocomplete::make('Static Autocomplete', 'static_autocomplete')
        ->options($staticOptions)
        ->size(25)
        ->build();

    $argsRemote = Autocomplete::make('Remote Autocomplete', 'remote_autocomplete')
        ->options($remoteURL)
        ->size(40)
        ->build();

    expect($argsStatic)->toMatchArray([
        'type' => 'autocomplete',
        'name' => 'Static Autocomplete',
        'id' => 'static_autocomplete',
        'options' => $staticOptions,
        'size' => 25,
    ])
        ->and($argsRemote)->toMatchArray([
            'type' => 'autocomplete',
            'name' => 'Remote Autocomplete',
            'id' => 'remote_autocomplete',
            'options' => $remoteURL,
            'size' => 40,
        ]);

});
