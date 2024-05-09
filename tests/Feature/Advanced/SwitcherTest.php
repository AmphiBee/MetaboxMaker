<?php
use AmphiBee\MetaboxMaker\Fields\Switcher;

test('switch field can be configured with specific style and labels', function () {
    $switchField = Switcher::make('Toggle Feature', 'toggle_feature');
    $switchField->style('square')
        ->onLabel('<i class="dashicons dashicons-yes"></i>')
        ->offLabel('<i class="dashicons dashicons-no"></i>');

    $config = $switchField->build();

    expect($config)->toMatchArray([
        'type' => 'switch',
        'name' => 'Toggle Feature',
        'id' => 'toggle_feature',
        'style' => 'square',
        'on_label' => '<i class="dashicons dashicons-yes"></i>',
        'off_label' => '<i class="dashicons dashicons-no"></i>',
    ]);
});
