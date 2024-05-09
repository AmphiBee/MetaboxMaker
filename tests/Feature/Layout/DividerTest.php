<?php

use AmphiBee\MetaboxMaker\Fields\Divider;

test('can initialize divider field', function () {
    $divider = new Divider();

    expect($divider->build())->toMatchArray([
        'type' => 'divider',
    ]);
});
