<?php

use AmphiBee\MetaboxMaker\Fields\Icon;

test('icon field can be configured with various icon library settings', function () {
    $iconField = Icon::make('Choose an Icon', 'icon_field');
    $iconField->iconSet('font-awesome-pro')
        ->iconFile('assets/icons.json')
        ->iconCss('https://url/to/icon/style.css')
        ->iconDir('assets/icons');

    $config = $iconField->build();

    expect($config)->toMatchArray([
        'type' => 'icon',
        'name' => 'Choose an Icon',
        'id' => 'icon_field',
        'icon_set' => 'font-awesome-pro',
        'icon_file' => 'assets/icons.json',
        'icon_css' => 'https://url/to/icon/style.css',
        'icon_dir' => 'assets/icons',
    ]);
});
